<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client([
            'verify' => false,
            'timeout' => 30,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.5',
            ],
        ]);

        // Get all categories
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->warn('No categories found. Please run CategorySeeder first.');
            return;
        }

        // Products for each category - will search Amazon for real images
        $products = [
            // Surveillance Camera Systems - أنظمة كاميرات المراقبة
            'أنظمة كاميرات المراقبة' => [
                [
                    'name' => 'كاميرا مراقبة IP خارجية 4MP',
                    'name_en' => '4MP Outdoor IP Surveillance Camera',
                    'search_term' => '4MP outdoor IP camera surveillance',
                ],
                [
                    'name' => 'كاميرا مراقبة لاسلكية HD',
                    'name_en' => 'HD Wireless Surveillance Camera',
                    'search_term' => 'HD wireless security camera',
                ],
                [
                    'name' => 'نظام DVR 8 قنوات مع كاميرات',
                    'name_en' => '8 Channel DVR System with Cameras',
                    'search_term' => '8 channel DVR security camera system',
                ],
                [
                    'name' => 'كاميرا مراقبة داخلية 360 درجة',
                    'name_en' => '360 Degree Indoor Surveillance Camera',
                    'search_term' => '360 degree indoor security camera',
                ],
                [
                    'name' => 'كاميرا مراقبة ليلية بالأشعة تحت الحمراء',
                    'name_en' => 'Night Vision Infrared Surveillance Camera',
                    'search_term' => 'night vision infrared security camera',
                ],
            ],

            // Central and Communication Systems - أنظمة السنترال والاتصالات
            'أنظمة السنترال والاتصالات' => [
                [
                    'name' => 'نظام سنترال IP 16 خط',
                    'name_en' => '16 Line IP PBX System',
                    'search_term' => 'IP PBX phone system 16 lines',
                ],
                [
                    'name' => 'هاتف IP للمكاتب',
                    'name_en' => 'IP Office Phone',
                    'search_term' => 'IP office phone business',
                ],
                [
                    'name' => 'نظام اتصالات VoIP',
                    'name_en' => 'VoIP Communication System',
                    'search_term' => 'VoIP phone system business',
                ],
                [
                    'name' => 'سنترال هجين 8 خطوط',
                    'name_en' => 'Hybrid PBX 8 Lines',
                    'search_term' => 'hybrid PBX system 8 lines',
                ],
                [
                    'name' => 'هاتف لاسلكي DECT',
                    'name_en' => 'DECT Wireless Phone',
                    'search_term' => 'DECT wireless office phone',
                ],
            ],

            // Attendance Systems - أنظمة الحضور والانصراف
            'أنظمة الحضور والانصراف' => [
                [
                    'name' => 'جهاز بصمة إصبع للحضور والانصراف',
                    'name_en' => 'Fingerprint Attendance System',
                    'search_term' => 'fingerprint attendance time clock',
                ],
                [
                    'name' => 'نظام حضور وانصراف بالكارت',
                    'name_en' => 'Card-Based Attendance System',
                    'search_term' => 'card attendance system RFID',
                ],
                [
                    'name' => 'جهاز بصمة وجه للحضور',
                    'name_en' => 'Facial Recognition Attendance Device',
                    'search_term' => 'facial recognition attendance device',
                ],
                [
                    'name' => 'نظام حضور وانصراف متعدد المستخدمين',
                    'name_en' => 'Multi-User Attendance System',
                    'search_term' => 'multi user attendance system',
                ],
                [
                    'name' => 'جهاز بصمة مع شاشة لمس',
                    'name_en' => 'Touchscreen Fingerprint Device',
                    'search_term' => 'touchscreen fingerprint attendance',
                ],
            ],

            // Access Control Systems - أنظمة الدخول والخروج
            'أنظمة الدخول والخروج' => [
                [
                    'name' => 'قفل باب إلكتروني بالكارت',
                    'name_en' => 'Electronic Card Door Lock',
                    'search_term' => 'electronic card door lock',
                ],
                [
                    'name' => 'قارئ كارت RFID للوصول',
                    'name_en' => 'RFID Card Reader for Access Control',
                    'search_term' => 'RFID card reader access control',
                ],
                [
                    'name' => 'قفل باب ببصمة الإصبع',
                    'name_en' => 'Fingerprint Door Lock',
                    'search_term' => 'fingerprint door lock smart',
                ],
                [
                    'name' => 'نظام تحكم في الوصول متعدد الأبواب',
                    'name_en' => 'Multi-Door Access Control System',
                    'search_term' => 'multi door access control system',
                ],
                [
                    'name' => 'قفل باب ذكي بالبلوتوث',
                    'name_en' => 'Smart Bluetooth Door Lock',
                    'search_term' => 'smart bluetooth door lock',
                ],
            ],

            // Public Address Systems - أنظمة النداء الصوتي
            'أنظمة النداء الصوتي' => [
                [
                    'name' => 'مكبر صوت للنداء العام 100 وات',
                    'name_en' => '100W Public Address Speaker',
                    'search_term' => '100W public address speaker',
                ],
                [
                    'name' => 'نظام ميكروفون لاسلكي',
                    'name_en' => 'Wireless Microphone System',
                    'search_term' => 'wireless microphone system',
                ],
                [
                    'name' => 'مضخم صوت للأنظمة الصوتية',
                    'name_en' => 'Audio Amplifier for PA Systems',
                    'search_term' => 'audio amplifier PA system',
                ],
                [
                    'name' => 'مكبر صوت مضاد للماء',
                    'name_en' => 'Waterproof PA Speaker',
                    'search_term' => 'waterproof PA speaker outdoor',
                ],
                [
                    'name' => 'نظام نداء صوتي متعدد المناطق',
                    'name_en' => 'Multi-Zone Public Address System',
                    'search_term' => 'multi zone public address system',
                ],
            ],

            // Video and Audio Intercom Systems - انظمة الانتركم المرئي والصوتي
            'انظمة الانتركم المرئي والصوتي' => [
                [
                    'name' => 'نظام انتركم فيديو للمنازل',
                    'name_en' => 'Video Intercom System for Homes',
                    'search_term' => 'video intercom system home',
                ],
                [
                    'name' => 'لوحة انتركم خارجية مقاومة للطقس',
                    'name_en' => 'Weatherproof Outdoor Intercom Panel',
                    'search_term' => 'weatherproof outdoor intercom',
                ],
                [
                    'name' => 'شاشة انتركم داخلية 7 بوصة',
                    'name_en' => '7 Inch Indoor Intercom Screen',
                    'search_term' => 'indoor intercom screen 7 inch',
                ],
                [
                    'name' => 'نظام انتركم لاسلكي',
                    'name_en' => 'Wireless Intercom System',
                    'search_term' => 'wireless intercom system',
                ],
                [
                    'name' => 'انتركم بصري مع فتح الباب عن بعد',
                    'name_en' => 'Video Intercom with Remote Door Opening',
                    'search_term' => 'video intercom remote door opening',
                ],
            ],

            // Cashier and POS Systems - أنظمة الكاشير ونقاط البيع
            'أنظمة الكاشير ونقاط البيع' => [
                [
                    'name' => 'نظام نقاط البيع POS مع شاشة لمس',
                    'name_en' => 'POS System with Touchscreen',
                    'search_term' => 'POS system touchscreen',
                ],
                [
                    'name' => 'قارئ باركود لاسلكي',
                    'name_en' => 'Wireless Barcode Scanner',
                    'search_term' => 'wireless barcode scanner',
                ],
                [
                    'name' => 'طابعة إيصالات حرارية',
                    'name_en' => 'Thermal Receipt Printer',
                    'search_term' => 'thermal receipt printer',
                ],
                [
                    'name' => 'درج نقدي إلكتروني',
                    'name_en' => 'Electronic Cash Drawer',
                    'search_term' => 'electronic cash drawer',
                ],
                [
                    'name' => 'نظام كاشير كامل للمحلات',
                    'name_en' => 'Complete Cashier System for Stores',
                    'search_term' => 'complete POS cashier system',
                ],
            ],

            // Central Satellite Systems - أنظمة الدش المركزي
            'أنظمة الدش المركزي' => [
                [
                    'name' => 'طبق استقبال قمر صناعي 90 سم',
                    'name_en' => '90cm Satellite Dish',
                    'search_term' => '90cm satellite dish',
                ],
                [
                    'name' => 'مضخم إشارة قمر صناعي',
                    'name_en' => 'Satellite Signal Amplifier',
                    'search_term' => 'satellite signal amplifier',
                ],
                [
                    'name' => 'موزع إشارة قمر صناعي 8 منافذ',
                    'name_en' => '8 Port Satellite Signal Splitter',
                    'search_term' => 'satellite signal splitter 8 port',
                ],
                [
                    'name' => 'محول LNB للقمر الصناعي',
                    'name_en' => 'Satellite LNB Converter',
                    'search_term' => 'satellite LNB converter',
                ],
                [
                    'name' => 'نظام استقبال قمر صناعي مركزي',
                    'name_en' => 'Central Satellite Reception System',
                    'search_term' => 'central satellite system',
                ],
            ],

            // Fire Alarm Systems - أنظمة إنذار الحريق
            'أنظمة إنذار الحريق' => [
                [
                    'name' => 'كاشف دخان ذكي',
                    'name_en' => 'Smart Smoke Detector',
                    'search_term' => 'smart smoke detector',
                ],
                [
                    'name' => 'لوحة تحكم إنذار حريق',
                    'name_en' => 'Fire Alarm Control Panel',
                    'search_term' => 'fire alarm control panel',
                ],
                [
                    'name' => 'صافرة إنذار حريق',
                    'name_en' => 'Fire Alarm Siren',
                    'search_term' => 'fire alarm siren',
                ],
                [
                    'name' => 'كاشف حرارة للحريق',
                    'name_en' => 'Heat Detector for Fire',
                    'search_term' => 'heat detector fire alarm',
                ],
                [
                    'name' => 'نظام إنذار حريق متكامل',
                    'name_en' => 'Integrated Fire Alarm System',
                    'search_term' => 'integrated fire alarm system',
                ],
            ],

            // Nurse Call Systems - أنظمة استدعاء الممرضات
            'أنظمة استدعاء الممرضات' => [
                [
                    'name' => 'زر استدعاء ممرضة لاسلكي',
                    'name_en' => 'Wireless Nurse Call Button',
                    'search_term' => 'wireless nurse call button',
                ],
                [
                    'name' => 'لوحة استدعاء ممرضة للمستشفيات',
                    'name_en' => 'Hospital Nurse Call Panel',
                    'search_term' => 'hospital nurse call system',
                ],
                [
                    'name' => 'نظام استدعاء ممرضة متعدد الغرف',
                    'name_en' => 'Multi-Room Nurse Call System',
                    'search_term' => 'multi room nurse call system',
                ],
                [
                    'name' => 'شاشة عرض استدعاء الممرضات',
                    'name_en' => 'Nurse Call Display Screen',
                    'search_term' => 'nurse call display screen',
                ],
                [
                    'name' => 'نظام استدعاء ممرضة مع GPS',
                    'name_en' => 'GPS-Enabled Nurse Call System',
                    'search_term' => 'GPS nurse call system',
                ],
            ],

            // Network Systems - انظمة الشبكات
            'انظمة الشبكات' => [
                [
                    'name' => 'موجه شبكة WiFi 6',
                    'name_en' => 'WiFi 6 Network Router',
                    'search_term' => 'WiFi 6 router',
                ],
                [
                    'name' => 'محول شبكة 24 منفذ',
                    'name_en' => '24 Port Network Switch',
                    'search_term' => '24 port network switch',
                ],
                [
                    'name' => 'نقطة وصول لاسلكية',
                    'name_en' => 'Wireless Access Point',
                    'search_term' => 'wireless access point',
                ],
                [
                    'name' => 'كابل شبكة Cat6',
                    'name_en' => 'Cat6 Network Cable',
                    'search_term' => 'Cat6 network cable',
                ],
                [
                    'name' => 'جدار حماية شبكة',
                    'name_en' => 'Network Firewall',
                    'search_term' => 'network firewall',
                ],
            ],

            // Smart Home Systems - انظمة السمارت هوم
            'انظمة السمارت هوم' => [
                [
                    'name' => 'محول ذكي للتحكم في الإضاءة',
                    'name_en' => 'Smart Switch for Lighting Control',
                    'search_term' => 'smart light switch',
                ],
                [
                    'name' => 'منظم حرارة ذكي',
                    'name_en' => 'Smart Thermostat',
                    'search_term' => 'smart thermostat',
                ],
                [
                    'name' => 'محور منزل ذكي',
                    'name_en' => 'Smart Home Hub',
                    'search_term' => 'smart home hub',
                ],
                [
                    'name' => 'كاميرا ذكية للمنزل',
                    'name_en' => 'Smart Home Camera',
                    'search_term' => 'smart home camera',
                ],
                [
                    'name' => 'قفل باب ذكي للمنزل',
                    'name_en' => 'Smart Home Door Lock',
                    'search_term' => 'smart door lock',
                ],
            ],

            // Queue Management Systems - انظمة ادارة الصفوف
            'انظمة ادارة الصفوف' => [
                [
                    'name' => 'طابعة تذاكر الانتظار',
                    'name_en' => 'Queue Ticket Printer',
                    'search_term' => 'queue ticket printer',
                ],
                [
                    'name' => 'شاشة عرض الصفوف',
                    'name_en' => 'Queue Display Screen',
                    'search_term' => 'queue display screen',
                ],
                [
                    'name' => 'نظام إدارة صفوف رقمي',
                    'name_en' => 'Digital Queue Management System',
                    'search_term' => 'digital queue management system',
                ],
                [
                    'name' => 'لوحة استدعاء للعملاء',
                    'name_en' => 'Customer Call Panel',
                    'search_term' => 'customer call panel queue',
                ],
                [
                    'name' => 'نظام إدارة صفوف متكامل',
                    'name_en' => 'Integrated Queue Management System',
                    'search_term' => 'integrated queue management',
                ],
            ],

            // Anti-Theft Alarm Systems - أنظمة الانذار ضد السرقة
            'أنظمة الانذار ضد السرقة' => [
                [
                    'name' => 'جهاز إنذار ضد السرقة لاسلكي',
                    'name_en' => 'Wireless Anti-Theft Alarm',
                    'search_term' => 'wireless anti theft alarm',
                ],
                [
                    'name' => 'كاشف حركة للأمان',
                    'name_en' => 'Motion Detector for Security',
                    'search_term' => 'motion detector security',
                ],
                [
                    'name' => 'نظام إنذار للمنازل',
                    'name_en' => 'Home Alarm System',
                    'search_term' => 'home alarm system',
                ],
                [
                    'name' => 'كاشف كسر النوافذ',
                    'name_en' => 'Window Break Detector',
                    'search_term' => 'window break detector',
                ],
                [
                    'name' => 'لوحة تحكم إنذار أمان',
                    'name_en' => 'Security Alarm Control Panel',
                    'search_term' => 'security alarm control panel',
                ],
            ],
        ];

        $order = 1;

        foreach ($categories as $category) {
            $categoryName = $category->name;
            
            if (!isset($products[$categoryName])) {
                $this->command->warn("No products defined for category: {$categoryName}");
                continue;
            }

            $categoryProducts = $products[$categoryName];

            foreach ($categoryProducts as $productData) {
                // Check if product already exists
                $existingItem = Item::where('name', $productData['name'])
                    ->where('category_id', $category->id)
                    ->first();

                if ($existingItem) {
                    $this->command->info("Product '{$productData['name']}' already exists. Skipping...");
                    continue;
                }

                $imagePath = null;
                $imageUrl = $productData['image_url'] ?? null;

                // If no direct image URL provided, search Amazon for the product
                if (empty($imageUrl)) {
                    $searchTerm = $productData['search_term'] ?? $productData['name_en'] ?? '';
                    if (!empty($searchTerm)) {
                        $this->command->info("Searching Amazon for: {$searchTerm}");
                        $imageUrl = $this->searchAmazonProductImage($client, $searchTerm);
                        if ($imageUrl) {
                            $this->command->info("Found Amazon image: {$imageUrl}");
                        }
                    }
                }

                // Download image from Amazon
                if (!empty($imageUrl)) {
                    try {
                        $this->command->info("Downloading image for: {$productData['name']}");
                        
                        $response = $client->get($imageUrl);
                        $imageContent = $response->getBody()->getContents();
                        
                        // Generate unique filename
                        $extension = $this->getImageExtension($imageUrl, $response->getHeader('Content-Type'));
                        $filename = Str::random(40) . '.' . $extension;
                        $imagePath = 'items/' . $filename;
                        
                        // Store image
                        Storage::disk('public')->put($imagePath, $imageContent);
                        
                        $this->command->info("Image downloaded and saved: {$imagePath}");
                    } catch (GuzzleException $e) {
                        $this->command->warn("Failed to download image for '{$productData['name']}': " . $e->getMessage());
                    } catch (\Exception $e) {
                        $this->command->warn("Error processing image for '{$productData['name']}': " . $e->getMessage());
                    }
                } else {
                    $this->command->warn("No image URL found for: {$productData['name']}");
                }

                // Create item
                Item::create([
                    'name' => $productData['name'],
                    'name_en' => $productData['name_en'] ?? null,
                    'category_id' => $category->id,
                    'image' => $imagePath,
                    'active' => true,
                    'order' => $order++,
                ]);

                $this->command->info("Product created: {$productData['name']}");
            }
        }

        $this->command->info('Items seeding completed!');
    }

    /**
     * Search Amazon for a product and extract its main image URL
     */
    private function searchAmazonProductImage(Client $client, string $searchTerm): ?string
    {
        try {
            // Search Amazon for the product
            $searchUrl = 'https://www.amazon.com/s?k=' . urlencode($searchTerm);
            
            $response = $client->get($searchUrl);
            $html = $response->getBody()->getContents();
            
            // Extract product image URLs from Amazon search results
            // Amazon uses data-src or src attributes with m.media-amazon.com
            $patterns = [
                '/data-src=["\']([^"\']*m\.media-amazon\.com[^"\']*\.jpg[^"\']*)["\']/i',
                '/src=["\']([^"\']*m\.media-amazon\.com[^"\']*\.jpg[^"\']*)["\']/i',
                '/<img[^>]+data-src=["\']([^"\']*images-na\.ssl-images-amazon\.com[^"\']*\.jpg[^"\']*)["\']/i',
            ];
            
            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $html, $matches)) {
                    $imageUrl = $matches[1];
                    // Clean up the URL
                    $imageUrl = html_entity_decode($imageUrl);
                    // Ensure it's a full URL
                    if (strpos($imageUrl, 'http') !== 0) {
                        $imageUrl = 'https:' . $imageUrl;
                    }
                    // Get high resolution version
                    $imageUrl = preg_replace('/\._[A-Z0-9_]+\./', '._AC_SL1500_.', $imageUrl);
                    return $imageUrl;
                }
            }
            
            // Alternative: Try to find product ASIN and construct image URL
            if (preg_match('/data-asin=["\']([A-Z0-9]{10})["\']/', $html, $asinMatch)) {
                $asin = $asinMatch[1];
                // Try to get image from product page
                $productUrl = 'https://www.amazon.com/dp/' . $asin;
                try {
                    $productResponse = $client->get($productUrl);
                    $productHtml = $productResponse->getBody()->getContents();
                    
                    if (preg_match('/id="landingImage"[^>]+src=["\']([^"\']+)["\']/', $productHtml, $imgMatch)) {
                        $imageUrl = html_entity_decode($imgMatch[1]);
                        if (strpos($imageUrl, 'http') !== 0) {
                            $imageUrl = 'https:' . $imageUrl;
                        }
                        return $imageUrl;
                    }
                } catch (\Exception $e) {
                    // Continue to next method
                }
            }
            
        } catch (\Exception $e) {
            $this->command->warn("Failed to search Amazon for '{$searchTerm}': " . $e->getMessage());
        }
        
        return null;
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
}

