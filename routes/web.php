<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Language switching route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/', function () {
    // Set locale from session or default to 'ar'
    $locale = session('locale', 'ar');
    app()->setLocale($locale);

    $sliders = \App\Models\Slider::latest()->get();
    $partners = \App\Models\Partner::latest()->get();
    $about = \App\Models\About::first(); // Get the first about record
    $heroSlides = \App\Models\HeroSlide::where('is_active', true)->orderBy('order')->get();
    $services = \App\Models\Service::where('is_active', true)->orderBy('order')->get();
    $servicesHeader = \App\Models\IndexSectionHeader::where('section_type', 'services')->where('is_active', true)->first(); // Get the first active services section header
    $testimonials = \App\Models\Testimonial::where('is_active', true)->orderBy('order')->get();
    $testimonialsHeader = \App\Models\IndexSectionHeader::where('section_type', 'testimonials')->where('is_active', true)->first(); // Get the first active testimonials section header
    $blogs = \App\Models\Blog::where('is_active', true)->orderBy('order')->orderBy('published_at', 'desc')->limit(3)->get();
    $blogHeader = \App\Models\IndexSectionHeader::where('section_type', 'blog')->where('is_active', true)->first(); // Get the first active blog section header

    // Get settings
    $settings = [
        'navbar_logo' => \App\Models\Setting::getValue('navbar_logo'),
        'footer_logo' => \App\Models\Setting::getValue('footer_logo'),
        'favicon' => \App\Models\Setting::getValue('favicon'),
        'social_facebook' => \App\Models\Setting::getValue('social_facebook'),
        'social_twitter' => \App\Models\Setting::getValue('social_twitter'),
        'social_instagram' => \App\Models\Setting::getValue('social_instagram'),
        'social_linkedin' => \App\Models\Setting::getValue('social_linkedin'),
        'social_youtube' => \App\Models\Setting::getValue('social_youtube'),
        'footer_about_ar' => \App\Models\Setting::getValue('footer_about_ar'),
        'footer_about_en' => \App\Models\Setting::getValue('footer_about_en'),
        'footer_service_links' => \App\Models\Setting::getValue('footer_service_links', []),
        'footer_email' => \App\Models\Setting::getValue('footer_email'),
        'footer_phone' => \App\Models\Setting::getValue('footer_phone'),
        'whatsapp_number' => \App\Models\Setting::getValue('whatsapp_number'),
        'footer_location_ar' => \App\Models\Setting::getValue('footer_location_ar'),
        'footer_location_en' => \App\Models\Setting::getValue('footer_location_en'),
        'footer_location_link' => \App\Models\Setting::getValue('footer_location_link'),
        'privacy_policy_link' => \App\Models\Setting::getValue('privacy_policy_link'),
        'terms_conditions_link' => \App\Models\Setting::getValue('terms_conditions_link'),
        'contact_us_button_text_ar' => \App\Models\Setting::getValue('contact_us_button_text_ar', 'اتصل بنا'),
        'contact_us_button_text_en' => \App\Models\Setting::getValue('contact_us_button_text_en', 'Contact Us'),
        'seo_meta_title_ar' => \App\Models\Setting::getValue('seo_meta_title_ar'),
        'seo_meta_title_en' => \App\Models\Setting::getValue('seo_meta_title_en'),
        'seo_meta_description_ar' => \App\Models\Setting::getValue('seo_meta_description_ar'),
        'seo_meta_description_en' => \App\Models\Setting::getValue('seo_meta_description_en'),
        'seo_meta_keywords_ar' => \App\Models\Setting::getValue('seo_meta_keywords_ar'),
        'seo_meta_keywords_en' => \App\Models\Setting::getValue('seo_meta_keywords_en'),
    ];

    return view('welcome', compact('sliders', 'partners', 'about', 'heroSlides', 'services', 'servicesHeader', 'testimonials', 'testimonialsHeader', 'blogs', 'blogHeader', 'settings', 'locale'));
})->name('home');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
});

// Slider Routes
Route::middleware('auth')->group(function () {
    Route::resource('sliders', \App\Http\Controllers\SliderController::class);
    Route::resource('partners', \App\Http\Controllers\PartnerController::class);
    Route::resource('abouts', \App\Http\Controllers\AboutController::class);
    Route::resource('hero-slides', \App\Http\Controllers\HeroSlideController::class);
    Route::resource('services', \App\Http\Controllers\ServiceController::class);
    Route::resource('index-section-headers', \App\Http\Controllers\IndexSectionHeaderController::class);
    Route::resource('testimonials', \App\Http\Controllers\TestimonialController::class);
    Route::resource('blogs', \App\Http\Controllers\BlogController::class);
    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/admin/items/create', [ItemController::class, 'create'])->name('admin.items.create');

Route::middleware('auth')->group(function () {
    // إدارة الأقسام
    Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // حفظ المنتج (POST)
    Route::post('/admin/items', [ItemController::class, 'store'])->name('admin.items.store');

    Route::get('/admin/items/{id}/edit', [ItemController::class, 'edit'])->name('admin.items.edit');

    Route::put('/admin/items/{id}', [ItemController::class, 'update'])->name('admin.items.update');

    Route::delete('/admin/items/{id}', [ItemController::class, 'destroy'])->name('admin.items.destroy');

    // عرض قائمة المنتجات
    Route::get('/admin/items', [ItemController::class, 'show'])->name('admin.items.show');
});


Route::get('/category/{slug}', [ItemController::class, 'view'])
    ->name('categories.show');


Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
