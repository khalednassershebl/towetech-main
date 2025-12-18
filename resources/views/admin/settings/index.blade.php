@extends('layouts.admin-layout')

@section('title', 'الإعدادات')
@section('page-title', 'الإعدادات')

@push('styles')
<style>
    * {
        font-family: '29ltbukra' !important;
    }

    .container {
        max-width: 100% !important;
        width: 100%;
        padding: 0 40px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .page-header h2 {
        color: #333;
        font-size: 28px;
        font-weight: 600;
    }

    /* Tabs Styles */
    .tabs-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        overflow: hidden;
    }

    .tabs-nav {
        display: flex;
        background: #f8fafc;
        border-bottom: 2px solid #e5e7eb;
        overflow-x: auto;
        scrollbar-width: thin;
    }

    .tabs-nav::-webkit-scrollbar {
        height: 6px;
    }

    .tabs-nav::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .tabs-nav::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }

    .tab-button {
        padding: 15px 25px;
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
        color: #6b7280;
        transition: all 0.3s;
        white-space: nowrap;
        font-family: '29ltbukra' !important;
    }

    .tab-button:hover {
        background: #f1f5f9;
        color: #3b82f6;
    }

    .tab-button.active {
        color: #3b82f6;
        border-bottom-color: #3b82f6;
        background: white;
    }

    .tab-content {
        display: none;
        padding: 40px;
        animation: fadeIn 0.3s;
    }

    .tab-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .card h3 {
        color: #374151;
        font-size: 22px;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e5e7eb;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #374151;
        font-weight: 500;
        font-size: 14px;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="url"],
    .form-group textarea,
    .form-group input[type="file"] {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s;
        font-family: '29ltbukra' !important;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #3b82f6;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-group small {
        display: block;
        margin-top: 5px;
        color: #6b7280;
        font-size: 12px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 1px solid #e5e7eb;
        position: sticky;
        bottom: 0;
        background: white;
        z-index: 10;
    }

    .btn-primary {
        padding: 12px 24px;
        background: #3b82f6;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background: #2563eb;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .error-message {
        color: #ef4444;
        font-size: 12px;
        margin-top: 5px;
    }

    .lang-section {
        background: #f9fafb;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .lang-section h4 {
        color: #374151;
        font-size: 18px;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e5e7eb;
    }

    .image-preview {
        margin-top: 10px;
        max-width: 200px;
        max-height: 200px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
    }

    .service-link-item {
        background: #f9fafb;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 15px;
        border: 1px solid #e5e7eb;
    }

    .service-link-item h5 {
        color: #374151;
        font-size: 16px;
        margin-bottom: 15px;
    }

    .btn-remove {
        padding: 8px 16px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn-remove:hover {
        background: #dc2626;
    }

    .btn-add {
        padding: 10px 20px;
        background: #10b981;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn-add:hover {
        background: #059669;
    }

    .row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .row {
            grid-template-columns: 1fr;
        }
        
        .tabs-nav {
            flex-wrap: nowrap;
        }
        
        .tab-button {
            padding: 12px 15px;
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-right: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-header">
        <h2>إعدادات الموقع</h2>
    </div>

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" id="settings-form">
        @csrf
        @method('PUT')

        <!-- Tabs Navigation -->
        <div class="tabs-container">
            <div class="tabs-nav">
                <button type="button" class="tab-button active" data-tab="social-media">
                    📱 وسائل التواصل
                </button>
                <button type="button" class="tab-button" data-tab="service-links">
                    🔗 روابط الخدمات
                </button>
                <button type="button" class="tab-button" data-tab="logos">
                    🖼️ الشعارات
                </button>
                <button type="button" class="tab-button" data-tab="footer-about">
                    📄 نبذة التذييل
                </button>
                <button type="button" class="tab-button" data-tab="seo">
                    🔍 SEO
                </button>
                <button type="button" class="tab-button" data-tab="contact">
                    📞 الاتصال
                </button>
                <button type="button" class="tab-button" data-tab="location">
                    📍 الموقع
                </button>
                <button type="button" class="tab-button" data-tab="legal">
                    ⚖️ روابط قانونية
                </button>
            </div>

            <!-- Tab 1: Social Media -->
            <div class="tab-content active" id="social-media">
                <div class="card">
                    <h3>روابط وسائل التواصل الاجتماعي</h3>
                    <div class="row">
                        <div class="form-group">
                            <label for="social_facebook">فيسبوك</label>
                            <input type="url" id="social_facebook" name="social_facebook" value="{{ old('social_facebook', $socialMedia['facebook']) }}" placeholder="https://facebook.com/yourpage">
                        </div>
                        <div class="form-group">
                            <label for="social_twitter">تويتر</label>
                            <input type="url" id="social_twitter" name="social_twitter" value="{{ old('social_twitter', $socialMedia['twitter']) }}" placeholder="https://twitter.com/yourhandle">
                        </div>
                        <div class="form-group">
                            <label for="social_instagram">إنستغرام</label>
                            <input type="url" id="social_instagram" name="social_instagram" value="{{ old('social_instagram', $socialMedia['instagram']) }}" placeholder="https://instagram.com/yourhandle">
                        </div>
                        <div class="form-group">
                            <label for="social_linkedin">لينكد إن</label>
                            <input type="url" id="social_linkedin" name="social_linkedin" value="{{ old('social_linkedin', $socialMedia['linkedin']) }}" placeholder="https://linkedin.com/company/yourcompany">
                        </div>
                        <div class="form-group">
                            <label for="social_youtube">يوتيوب</label>
                            <input type="url" id="social_youtube" name="social_youtube" value="{{ old('social_youtube', $socialMedia['youtube']) }}" placeholder="https://youtube.com/yourchannel">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Service Links -->
            <div class="tab-content" id="service-links">
                <div class="card">
                    <h3>روابط الخدمات في التذييل</h3>
                    <div id="service-links-container">
                        @if(!empty($serviceLinks) && count($serviceLinks) > 0)
                            @foreach($serviceLinks as $index => $link)
                                <div class="service-link-item" data-index="{{ $index }}">
                                    <h5>رابط خدمة {{ $index + 1 }}</h5>
                                    <div class="form-group">
                                        <label>العنوان (عربي)</label>
                                        <input type="text" name="service_links[{{ $index }}][title_ar]" value="{{ $link['title_ar'] ?? '' }}" placeholder="عنوان الخدمة بالعربية">
                                    </div>
                                    <div class="form-group">
                                        <label>العنوان (إنجليزي)</label>
                                        <input type="text" name="service_links[{{ $index }}][title_en]" value="{{ $link['title_en'] ?? '' }}" placeholder="Service Title in English">
                                    </div>
                                    <div class="form-group">
                                        <label>الرابط</label>
                                        <input type="url" name="service_links[{{ $index }}][link]" value="{{ $link['link'] ?? '' }}" placeholder="https://example.com">
                                    </div>
                                    <button type="button" class="btn-remove" onclick="removeServiceLink(this)">حذف</button>
                                </div>
                            @endforeach
                        @else
                            <div class="service-link-item" data-index="0">
                                <h5>رابط خدمة 1</h5>
                                <div class="form-group">
                                    <label>العنوان (عربي)</label>
                                    <input type="text" name="service_links[0][title_ar]" value="" placeholder="عنوان الخدمة بالعربية">
                                </div>
                                <div class="form-group">
                                    <label>العنوان (إنجليزي)</label>
                                    <input type="text" name="service_links[0][title_en]" value="" placeholder="Service Title in English">
                                </div>
                                <div class="form-group">
                                    <label>الرابط</label>
                                    <input type="url" name="service_links[0][link]" value="" placeholder="https://example.com">
                                </div>
                                <button type="button" class="btn-remove" onclick="removeServiceLink(this)">حذف</button>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn-add" onclick="addServiceLink()">إضافة رابط خدمة</button>
                </div>
            </div>

            <!-- Tab 3: Logos -->
            <div class="tab-content" id="logos">
                <div class="card">
                    <h3>الشعارات والأيقونات</h3>
                    <div class="row">
                        <div class="form-group">
                            <label for="navbar_logo">شعار شريط التنقل</label>
                            <input type="file" id="navbar_logo" name="navbar_logo" accept="image/*">
                            @if(!empty($logos['navbar_logo']))
                                <img src="{{ asset('storage/' . $logos['navbar_logo']) }}" alt="Navbar Logo" class="image-preview">
                            @endif
                            <small>الصورة الموصى بها: PNG أو SVG مع خلفية شفافة</small>
                        </div>
                        <div class="form-group">
                            <label for="footer_logo">شعار التذييل</label>
                            <input type="file" id="footer_logo" name="footer_logo" accept="image/*">
                            @if(!empty($logos['footer_logo']))
                                <img src="{{ asset('storage/' . $logos['footer_logo']) }}" alt="Footer Logo" class="image-preview">
                            @endif
                            <small>الصورة الموصى بها: PNG أو SVG مع خلفية شفافة</small>
                        </div>
                        <div class="form-group">
                            <label for="favicon">أيقونة الموقع (Favicon)</label>
                            <input type="file" id="favicon" name="favicon" accept="image/*">
                            @if(!empty($logos['favicon']))
                                <img src="{{ asset('storage/' . $logos['favicon']) }}" alt="Favicon" class="image-preview">
                            @endif
                            <small>الصورة الموصى بها: ICO أو PNG بحجم 32x32 أو 16x16 بكسل</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 4: Footer About -->
            <div class="tab-content" id="footer-about">
                <div class="card">
                    <h3>نبذة عن الشركة في التذييل</h3>
                    <div class="lang-section">
                        <h4>المحتوى بالعربية</h4>
                        <div class="form-group">
                            <label for="footer_about_ar">النص (عربي)</label>
                            <textarea id="footer_about_ar" name="footer_about_ar" rows="4">{{ old('footer_about_ar', $footerAbout['about_ar']) }}</textarea>
                        </div>
                    </div>
                    <div class="lang-section">
                        <h4>المحتوى بالإنجليزية</h4>
                        <div class="form-group">
                            <label for="footer_about_en">النص (إنجليزي)</label>
                            <textarea id="footer_about_en" name="footer_about_en" rows="4">{{ old('footer_about_en', $footerAbout['about_en']) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 5: SEO -->
            <div class="tab-content" id="seo">
                <div class="card">
                    <h3>إعدادات SEO</h3>
                    <div class="lang-section">
                        <h4>المحتوى بالعربية</h4>
                        <div class="form-group">
                            <label for="seo_meta_title_ar">عنوان الميتا (عربي)</label>
                            <input type="text" id="seo_meta_title_ar" name="seo_meta_title_ar" value="{{ old('seo_meta_title_ar', $seoSettings['meta_title_ar']) }}" placeholder="عنوان الصفحة الرئيسية">
                            <small>عادة ما يكون بين 50-60 حرف</small>
                        </div>
                        <div class="form-group">
                            <label for="seo_meta_description_ar">وصف الميتا (عربي)</label>
                            <textarea id="seo_meta_description_ar" name="seo_meta_description_ar" rows="3">{{ old('seo_meta_description_ar', $seoSettings['meta_description_ar']) }}</textarea>
                            <small>عادة ما يكون بين 150-160 حرف</small>
                        </div>
                        <div class="form-group">
                            <label for="seo_meta_keywords_ar">كلمات مفتاحية (عربي)</label>
                            <input type="text" id="seo_meta_keywords_ar" name="seo_meta_keywords_ar" value="{{ old('seo_meta_keywords_ar', $seoSettings['meta_keywords_ar']) }}" placeholder="كلمة1, كلمة2, كلمة3">
                            <small>افصل الكلمات بفواصل</small>
                        </div>
                    </div>
                    <div class="lang-section">
                        <h4>المحتوى بالإنجليزية</h4>
                        <div class="form-group">
                            <label for="seo_meta_title_en">عنوان الميتا (إنجليزي)</label>
                            <input type="text" id="seo_meta_title_en" name="seo_meta_title_en" value="{{ old('seo_meta_title_en', $seoSettings['meta_title_en']) }}" placeholder="Home Page Title">
                            <small>Usually between 50-60 characters</small>
                        </div>
                        <div class="form-group">
                            <label for="seo_meta_description_en">وصف الميتا (إنجليزي)</label>
                            <textarea id="seo_meta_description_en" name="seo_meta_description_en" rows="3">{{ old('seo_meta_description_en', $seoSettings['meta_description_en']) }}</textarea>
                            <small>Usually between 150-160 characters</small>
                        </div>
                        <div class="form-group">
                            <label for="seo_meta_keywords_en">كلمات مفتاحية (إنجليزي)</label>
                            <input type="text" id="seo_meta_keywords_en" name="seo_meta_keywords_en" value="{{ old('seo_meta_keywords_en', $seoSettings['meta_keywords_en']) }}" placeholder="keyword1, keyword2, keyword3">
                            <small>Separate keywords with commas</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 6: Contact -->
            <div class="tab-content" id="contact">
                <div class="card">
                    <h3>معلومات الاتصال</h3>
                    <div class="row">
                        <div class="form-group">
                            <label for="footer_email">البريد الإلكتروني</label>
                            <input type="email" id="footer_email" name="footer_email" value="{{ old('footer_email', $contactInfo['email']) }}" placeholder="info@example.com">
                        </div>
                        <div class="form-group">
                            <label for="footer_phone">رقم الهاتف</label>
                            <input type="text" id="footer_phone" name="footer_phone" value="{{ old('footer_phone', $contactInfo['phone']) }}" placeholder="+966 50 123 4567">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp_number">رقم واتساب</label>
                            <input type="text" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $contactInfo['whatsapp']) }}" placeholder="+966 50 123 4567">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="contact_us_button_text_ar">نص زر اتصل بنا (عربي)</label>
                            <input type="text" id="contact_us_button_text_ar" name="contact_us_button_text_ar" value="{{ old('contact_us_button_text_ar', $contactInfo['contact_us_button_text_ar']) }}" placeholder="اتصل بنا">
                        </div>
                        <div class="form-group">
                            <label for="contact_us_button_text_en">نص زر اتصل بنا (إنجليزي)</label>
                            <input type="text" id="contact_us_button_text_en" name="contact_us_button_text_en" value="{{ old('contact_us_button_text_en', $contactInfo['contact_us_button_text_en']) }}" placeholder="Contact Us">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 7: Location -->
            <div class="tab-content" id="location">
                <div class="card">
                    <h3>الموقع</h3>
                    <div class="lang-section">
                        <h4>المحتوى بالعربية</h4>
                        <div class="form-group">
                            <label for="footer_location_ar">الموقع (عربي)</label>
                            <textarea id="footer_location_ar" name="footer_location_ar" rows="3">{{ old('footer_location_ar', $location['location_ar']) }}</textarea>
                        </div>
                    </div>
                    <div class="lang-section">
                        <h4>المحتوى بالإنجليزية</h4>
                        <div class="form-group">
                            <label for="footer_location_en">الموقع (إنجليزي)</label>
                            <textarea id="footer_location_en" name="footer_location_en" rows="3">{{ old('footer_location_en', $location['location_en']) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="footer_location_link">رابط الموقع</label>
                        <input type="url" id="footer_location_link" name="footer_location_link" value="{{ old('footer_location_link', $location['location_link']) }}" placeholder="https://www.google.com/maps?q=... أو رابط آخر">
                        <small>يمكنك إدخال رابط Google Maps أو أي رابط آخر للموقع</small>
                    </div>
                </div>
            </div>

            <!-- Tab 8: Legal -->
            <div class="tab-content" id="legal">
                <div class="card">
                    <h3>روابط قانونية</h3>
                    <div class="row">
                        <div class="form-group">
                            <label for="privacy_policy_link">رابط سياسة الخصوصية</label>
                            <input type="url" id="privacy_policy_link" name="privacy_policy_link" value="{{ old('privacy_policy_link', $legalLinks['privacy_policy_link']) }}" placeholder="https://example.com/privacy-policy">
                        </div>
                        <div class="form-group">
                            <label for="terms_conditions_link">رابط الشروط والأحكام</label>
                            <input type="url" id="terms_conditions_link" name="terms_conditions_link" value="{{ old('terms_conditions_link', $legalLinks['terms_conditions_link']) }}" placeholder="https://example.com/terms-conditions">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">حفظ الإعدادات</button>
        </div>
    </form>

    <script>
        // Tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');

                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to clicked button and corresponding content
                    this.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        });

        // Service Links functionality
        let serviceLinkIndex = {{ !empty($serviceLinks) && count($serviceLinks) > 0 ? count($serviceLinks) : 1 }};

        function addServiceLink() {
            const container = document.getElementById('service-links-container');
            const newItem = document.createElement('div');
            newItem.className = 'service-link-item';
            newItem.setAttribute('data-index', serviceLinkIndex);
            newItem.innerHTML = `
                <h5>رابط خدمة ${serviceLinkIndex + 1}</h5>
                <div class="form-group">
                    <label>العنوان (عربي)</label>
                    <input type="text" name="service_links[${serviceLinkIndex}][title_ar]" value="" placeholder="عنوان الخدمة بالعربية">
                </div>
                <div class="form-group">
                    <label>العنوان (إنجليزي)</label>
                    <input type="text" name="service_links[${serviceLinkIndex}][title_en]" value="" placeholder="Service Title in English">
                </div>
                <div class="form-group">
                    <label>الرابط</label>
                    <input type="url" name="service_links[${serviceLinkIndex}][link]" value="" placeholder="https://example.com">
                </div>
                <button type="button" class="btn-remove" onclick="removeServiceLink(this)">حذف</button>
            `;
            container.appendChild(newItem);
            serviceLinkIndex++;
        }

        function removeServiceLink(button) {
            const container = document.getElementById('service-links-container');
            if (container.children.length > 1) {
                button.closest('.service-link-item').remove();
                // Renumber items
                Array.from(container.children).forEach((item, index) => {
                    item.querySelector('h5').textContent = `رابط خدمة ${index + 1}`;
                    const inputs = item.querySelectorAll('input');
                    inputs.forEach(input => {
                        const name = input.name;
                        const newName = name.replace(/service_links\[\d+\]/, `service_links[${index}]`);
                        input.name = newName;
                    });
                });
            } else {
                alert('يجب أن يكون هناك رابط خدمة واحد على الأقل');
            }
        }
    </script>
@endsection
