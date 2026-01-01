<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display the settings edit form.
     */
    public function index()
    {
        // Get all settings grouped by section
        $settings = Setting::all()->groupBy('group');
        
        // Get or initialize default settings
        $socialMedia = [
            'facebook' => Setting::getValue('social_facebook', ''),
            'twitter' => Setting::getValue('social_twitter', ''),
            'instagram' => Setting::getValue('social_instagram', ''),
            'linkedin' => Setting::getValue('social_linkedin', ''),
            'youtube' => Setting::getValue('social_youtube', ''),
        ];

        $serviceLinks = Setting::getValue('footer_service_links', []);

        $logos = [
            'navbar_logo' => Setting::getValue('navbar_logo', ''),
            'footer_logo' => Setting::getValue('footer_logo', ''),
            'favicon' => Setting::getValue('favicon', ''),
        ];

        $footerAbout = [
            'about_ar' => Setting::getValue('footer_about_ar', ''),
            'about_en' => Setting::getValue('footer_about_en', ''),
        ];

        $seoSettings = [
            'meta_title_ar' => Setting::getValue('seo_meta_title_ar', ''),
            'meta_title_en' => Setting::getValue('seo_meta_title_en', ''),
            'meta_description_ar' => Setting::getValue('seo_meta_description_ar', ''),
            'meta_description_en' => Setting::getValue('seo_meta_description_en', ''),
            'meta_keywords_ar' => Setting::getValue('seo_meta_keywords_ar', ''),
            'meta_keywords_en' => Setting::getValue('seo_meta_keywords_en', ''),
        ];

        $contactInfo = [
            'email' => Setting::getValue('footer_email', ''),
            'phone' => Setting::getValue('footer_phone', ''),
            'whatsapp' => Setting::getValue('whatsapp_number', ''),
            'contact_us_button_text_ar' => Setting::getValue('contact_us_button_text_ar', 'اتصل بنا'),
            'contact_us_button_text_en' => Setting::getValue('contact_us_button_text_en', 'Contact Us'),
        ];

        $location = [
            'location_ar' => Setting::getValue('footer_location_ar', ''),
            'location_en' => Setting::getValue('footer_location_en', ''),
            'location_link' => Setting::getValue('footer_location_link', ''),
        ];

        $legalLinks = [
            'privacy_policy_link' => Setting::getValue('privacy_policy_link', ''),
            'terms_conditions_link' => Setting::getValue('terms_conditions_link', ''),
        ];

        return view('admin.settings.index', compact(
            'socialMedia',
            'serviceLinks',
            'logos',
            'footerAbout',
            'seoSettings',
            'contactInfo',
            'location',
            'legalLinks'
        ));
    }

    /**
     * Update all settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'social_facebook' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',
            'service_links' => 'nullable|array',
            'service_links.*.title_ar' => 'nullable|string|max:255',
            'service_links.*.title_en' => 'nullable|string|max:255',
            'service_links.*.link' => 'nullable|url|max:255',
            'navbar_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:20480',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:20480',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,ico|max:20480',
            'footer_about_ar' => 'nullable|string',
            'footer_about_en' => 'nullable|string',
            'seo_meta_title_ar' => 'nullable|string|max:255',
            'seo_meta_title_en' => 'nullable|string|max:255',
            'seo_meta_description_ar' => 'nullable|string|max:500',
            'seo_meta_description_en' => 'nullable|string|max:500',
            'seo_meta_keywords_ar' => 'nullable|string|max:255',
            'seo_meta_keywords_en' => 'nullable|string|max:255',
            'footer_email' => 'nullable|email|max:255',
            'footer_phone' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'contact_us_button_text_ar' => 'nullable|string|max:255',
            'contact_us_button_text_en' => 'nullable|string|max:255',
            'footer_location_ar' => 'nullable|string',
            'footer_location_en' => 'nullable|string',
            'footer_location_link' => 'nullable|url|max:500',
            'privacy_policy_link' => 'nullable|url|max:255',
            'terms_conditions_link' => 'nullable|url|max:255',
        ]);

        // Social Media Settings
        Setting::setValue('social_facebook', $request->input('social_facebook', ''), 'text', 'social_media', 'فيسبوك', 'Facebook');
        Setting::setValue('social_twitter', $request->input('social_twitter', ''), 'text', 'social_media', 'تويتر', 'Twitter');
        Setting::setValue('social_instagram', $request->input('social_instagram', ''), 'text', 'social_media', 'إنستغرام', 'Instagram');
        Setting::setValue('social_linkedin', $request->input('social_linkedin', ''), 'text', 'social_media', 'لينكد إن', 'LinkedIn');
        Setting::setValue('social_youtube', $request->input('social_youtube', ''), 'text', 'social_media', 'يوتيوب', 'YouTube');

        // Service Links in Footer
        $serviceLinks = [];
        if ($request->has('service_links')) {
            foreach ($request->input('service_links') as $link) {
                if (!empty($link['title_ar']) || !empty($link['title_en']) || !empty($link['link'])) {
                    $serviceLinks[] = [
                        'title_ar' => $link['title_ar'] ?? '',
                        'title_en' => $link['title_en'] ?? '',
                        'link' => $link['link'] ?? '',
                    ];
                }
            }
        }
        Setting::setValue('footer_service_links', $serviceLinks, 'json', 'footer', 'روابط الخدمات في التذييل', 'Service Links in Footer');

        // Logos
        if ($request->hasFile('navbar_logo')) {
            try {
                $oldLogo = Setting::getValue('navbar_logo');
                if ($oldLogo) {
                    Storage::disk('public')->delete($oldLogo);
                }
                $path = $request->file('navbar_logo')->store('settings', 'public');
                Setting::setValue('navbar_logo', $path, 'file', 'logos', 'شعار شريط التنقل', 'Navbar Logo');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['navbar_logo' => 'حدث خطأ أثناء رفع شعار شريط التنقل: ' . $e->getMessage()]);
            }
        }

        if ($request->hasFile('footer_logo')) {
            try {
                $oldLogo = Setting::getValue('footer_logo');
                if ($oldLogo) {
                    Storage::disk('public')->delete($oldLogo);
                }
                $path = $request->file('footer_logo')->store('settings', 'public');
                Setting::setValue('footer_logo', $path, 'file', 'logos', 'شعار التذييل', 'Footer Logo');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['footer_logo' => 'حدث خطأ أثناء رفع شعار التذييل: ' . $e->getMessage()]);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                $oldFavicon = Setting::getValue('favicon');
                if ($oldFavicon) {
                    Storage::disk('public')->delete($oldFavicon);
                }
                $path = $request->file('favicon')->store('settings', 'public');
                Setting::setValue('favicon', $path, 'file', 'logos', 'أيقونة الموقع', 'Favicon');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['favicon' => 'حدث خطأ أثناء رفع الأيقونة: ' . $e->getMessage()]);
            }
        }

        // Footer About
        Setting::setValue('footer_about_ar', $request->input('footer_about_ar', ''), 'text', 'footer', 'نبذة عن الشركة (عربي)', 'About Company (Arabic)');
        Setting::setValue('footer_about_en', $request->input('footer_about_en', ''), 'text', 'footer', 'نبذة عن الشركة (إنجليزي)', 'About Company (English)');

        // SEO Settings
        Setting::setValue('seo_meta_title_ar', $request->input('seo_meta_title_ar', ''), 'text', 'seo', 'عنوان الميتا (عربي)', 'Meta Title (Arabic)');
        Setting::setValue('seo_meta_title_en', $request->input('seo_meta_title_en', ''), 'text', 'seo', 'عنوان الميتا (إنجليزي)', 'Meta Title (English)');
        Setting::setValue('seo_meta_description_ar', $request->input('seo_meta_description_ar', ''), 'text', 'seo', 'وصف الميتا (عربي)', 'Meta Description (Arabic)');
        Setting::setValue('seo_meta_description_en', $request->input('seo_meta_description_en', ''), 'text', 'seo', 'وصف الميتا (إنجليزي)', 'Meta Description (English)');
        Setting::setValue('seo_meta_keywords_ar', $request->input('seo_meta_keywords_ar', ''), 'text', 'seo', 'كلمات مفتاحية (عربي)', 'Meta Keywords (Arabic)');
        Setting::setValue('seo_meta_keywords_en', $request->input('seo_meta_keywords_en', ''), 'text', 'seo', 'كلمات مفتاحية (إنجليزي)', 'Meta Keywords (English)');

        // Contact Info
        Setting::setValue('footer_email', $request->input('footer_email', ''), 'text', 'contact', 'البريد الإلكتروني', 'Email');
        Setting::setValue('footer_phone', $request->input('footer_phone', ''), 'text', 'contact', 'رقم الهاتف', 'Phone');
        Setting::setValue('whatsapp_number', $request->input('whatsapp_number', ''), 'text', 'contact', 'رقم واتساب', 'WhatsApp Number');
        Setting::setValue('contact_us_button_text_ar', $request->input('contact_us_button_text_ar', 'اتصل بنا'), 'text', 'contact', 'نص زر اتصل بنا (عربي)', 'Contact Us Button Text (Arabic)');
        Setting::setValue('contact_us_button_text_en', $request->input('contact_us_button_text_en', 'Contact Us'), 'text', 'contact', 'نص زر اتصل بنا (إنجليزي)', 'Contact Us Button Text (English)');

        // Location
        Setting::setValue('footer_location_ar', $request->input('footer_location_ar', ''), 'text', 'footer', 'الموقع (عربي)', 'Location (Arabic)');
        Setting::setValue('footer_location_en', $request->input('footer_location_en', ''), 'text', 'footer', 'الموقع (إنجليزي)', 'Location (English)');
        Setting::setValue('footer_location_link', $request->input('footer_location_link', ''), 'text', 'footer', 'رابط الموقع', 'Location Link');

        // Legal Links
        Setting::setValue('privacy_policy_link', $request->input('privacy_policy_link', ''), 'text', 'legal', 'رابط سياسة الخصوصية', 'Privacy Policy Link');
        Setting::setValue('terms_conditions_link', $request->input('terms_conditions_link', ''), 'text', 'legal', 'رابط الشروط والأحكام', 'Terms & Conditions Link');

        return redirect()->route('settings.index')->with('success', 'تم تحديث الإعدادات بنجاح');
    }
}
