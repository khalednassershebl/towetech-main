<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'أنظمة كاميرات المراقبة',
                'name_en' => 'Surveillance Camera Systems',
                'image_url' => null, // Will try to fetch from website
            ],
            [
                'name' => 'أنظمة السنترال والاتصالات',
                'name_en' => 'Central and Communication Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة الحضور والانصراف',
                'name_en' => 'Attendance Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة الدخول والخروج',
                'name_en' => 'Access Control Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة النداء الصوتي',
                'name_en' => 'Public Address Systems',
                'image_url' => null,
            ],
            [
                'name' => 'انظمة الانتركم المرئي والصوتي',
                'name_en' => 'Video and Audio Intercom Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة الكاشير ونقاط البيع',
                'name_en' => 'Cashier and POS Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة الدش المركزي',
                'name_en' => 'Central Satellite Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة إنذار الحريق',
                'name_en' => 'Fire Alarm Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة استدعاء الممرضات',
                'name_en' => 'Nurse Call Systems',
                'image_url' => null,
            ],
            [
                'name' => 'انظمة الشبكات',
                'name_en' => 'Network Systems',
                'image_url' => null,
            ],
            [
                'name' => 'انظمة السمارت هوم',
                'name_en' => 'Smart Home Systems',
                'image_url' => null,
            ],
            [
                'name' => 'انظمة ادارة الصفوف',
                'name_en' => 'Queue Management Systems',
                'image_url' => null,
            ],
            [
                'name' => 'أنظمة الانذار ضد السرقة',
                'name_en' => 'Anti-Theft Alarm Systems',
                'image_url' => null,
            ],
        ];

        $client = new Client([
            'verify' => false, // Disable SSL verification if needed
            'timeout' => 30,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ],
        ]);

        // Try to fetch images from the website
        $websiteImages = $this->fetchImagesFromWebsite($client);

        foreach ($categories as $categoryData) {
            // Check if category already exists
            $existingCategory = Category::where('name', $categoryData['name'])->first();
            
            if ($existingCategory) {
                $this->command->info("Category '{$categoryData['name']}' already exists. Skipping...");
                continue;
            }

            $imagePath = null;

            // Try to get image from website first, then fallback to provided URL
            $imageUrl = $this->findImageForCategory($categoryData['name'], $websiteImages) 
                ?? $categoryData['image_url'];

            // Download image if URL is available
            if (!empty($imageUrl)) {
                try {
                    $this->command->info("Downloading image for: {$categoryData['name']}");
                    
                    $response = $client->get($imageUrl);
                    $imageContent = $response->getBody()->getContents();
                    
                    // Generate unique filename
                    $extension = $this->getImageExtension($imageUrl, $response->getHeader('Content-Type'));
                    $filename = Str::random(40) . '.' . $extension;
                    $imagePath = 'categories/' . $filename;
                    
                    // Store image
                    Storage::disk('public')->put($imagePath, $imageContent);
                    
                    $this->command->info("Image downloaded and saved: {$imagePath}");
                } catch (GuzzleException $e) {
                    $this->command->warn("Failed to download image for '{$categoryData['name']}': " . $e->getMessage());
                } catch (\Exception $e) {
                    $this->command->warn("Error processing image for '{$categoryData['name']}': " . $e->getMessage());
                }
            } else {
                $this->command->warn("No image URL found for: {$categoryData['name']}");
            }

            // Create category
            Category::create([
                'name' => $categoryData['name'],
                'name_en' => $categoryData['name_en'] ?? null,
                'slug' => Str::slug($categoryData['name'], '-'),
                'image' => $imagePath,
            ]);

            $this->command->info("Category created: {$categoryData['name']}");
        }

        $this->command->info('Categories seeding completed!');
    }

    /**
     * Get image extension from URL or Content-Type header
     */
    private function getImageExtension(string $url, array $contentType = []): string
    {
        // Try to get extension from Content-Type header
        if (!empty($contentType)) {
            $contentTypeString = is_array($contentType) ? $contentType[0] : $contentType;
            $mimeToExt = [
                'image/jpeg' => 'jpg',
                'image/jpg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp',
            ];
            
            if (isset($mimeToExt[$contentTypeString])) {
                return $mimeToExt[$contentTypeString];
            }
        }

        // Try to get extension from URL
        $path = parse_url($url, PHP_URL_PATH);
        if ($path && ($ext = pathinfo($path, PATHINFO_EXTENSION))) {
            return $ext;
        }

        // Default to jpg
        return 'jpg';
    }

    /**
     * Fetch images from the website
     */
    private function fetchImagesFromWebsite(Client $client): array
    {
        $images = [];
        
        try {
            $this->command->info("Fetching images from https://southprofessional.com/");
            $response = $client->get('https://southprofessional.com/');
            $html = $response->getBody()->getContents();
            
            // Extract image URLs from the HTML
            preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $html, $matches);
            
            if (!empty($matches[1])) {
                foreach ($matches[1] as $imgUrl) {
                    // Convert relative URLs to absolute
                    if (strpos($imgUrl, 'http') !== 0) {
                        $imgUrl = 'https://southprofessional.com/' . ltrim($imgUrl, '/');
                    }
                    $images[] = $imgUrl;
                }
            }
            
            $this->command->info("Found " . count($images) . " images on the website");
        } catch (\Exception $e) {
            $this->command->warn("Failed to fetch website images: " . $e->getMessage());
        }
        
        return $images;
    }

    /**
     * Find appropriate image for a category
     */
    private function findImageForCategory(string $categoryName, array $websiteImages): ?string
    {
        // Map category keywords to image search terms
        $keywords = [
            'كاميرات' => ['camera', 'surveillance', 'security'],
            'السنترال' => ['phone', 'communication', 'telephone'],
            'الحضور' => ['attendance', 'time', 'clock'],
            'الدخول' => ['access', 'door', 'lock'],
            'النداء' => ['speaker', 'audio', 'sound'],
            'الانتركم' => ['intercom', 'door', 'bell'],
            'الكاشير' => ['pos', 'cashier', 'register'],
            'الدش' => ['satellite', 'dish', 'antenna'],
            'إنذار الحريق' => ['fire', 'alarm', 'smoke'],
            'الممرضات' => ['nurse', 'hospital', 'medical'],
            'الشبكات' => ['network', 'router', 'switch'],
            'السمارت' => ['smart', 'home', 'automation'],
            'الصفوف' => ['queue', 'ticket', 'waiting'],
            'السرقة' => ['theft', 'alarm', 'security'],
        ];

        // Try to find matching image based on category name
        foreach ($keywords as $arabicKey => $englishKeys) {
            if (strpos($categoryName, $arabicKey) !== false) {
                // Look for images that might match
                foreach ($websiteImages as $imgUrl) {
                    $imgLower = strtolower($imgUrl);
                    foreach ($englishKeys as $key) {
                        if (strpos($imgLower, $key) !== false) {
                            return $imgUrl;
                        }
                    }
                }
            }
        }

        // If no specific match, return first available image
        return !empty($websiteImages) ? $websiteImages[0] : null;
    }
}

