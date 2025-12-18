@extends('layouts.admin-layout')

@section('title', 'إضافة محتوى من نحن')
@section('page-title', 'إضافة محتوى من نحن')

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

    .btn-secondary {
        padding: 12px 24px;
        background: #6b7280;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background 0.3s;
    }

    .btn-secondary:hover {
        background: #4b5563;
    }

    .card {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
    .form-group input[type="number"],
    .form-group input[type="file"],
    .form-group textarea {
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
        min-height: 120px;
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
        padding: 30px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .lang-section h3 {
        color: #374151;
        font-size: 20px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e5e7eb;
    }

    .feature-item {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
        align-items: center;
    }

    .feature-item input {
        flex: 1;
    }

    .btn-remove {
        padding: 8px 16px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-remove:hover {
        background: #dc2626;
    }

    .btn-add {
        padding: 8px 16px;
        background: #10b981;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        margin-top: 10px;
    }

    .btn-add:hover {
        background: #059669;
    }

    .image-preview-container {
        margin-top: 15px;
        padding: 15px;
        background: #f9fafb;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }

    .image-preview-wrapper {
        position: relative;
        display: inline-block;
        margin-top: 10px;
    }

    .image-preview-wrapper img {
        max-width: 300px;
        max-height: 200px;
        border-radius: 8px;
        border: 2px solid #d1d5db;
        object-fit: contain;
        display: block;
        background: white;
        padding: 10px;
    }
</style>
@endpush

@section('content')
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
        <h2>إضافة محتوى من نحن</h2>
        <a href="{{ route('abouts.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="lang-section">
                <h3>المحتوى بالعربية</h3>
                
                <div class="form-group">
                    <label for="subtitle_ar">العنوان الفرعي (عربي)</label>
                    <input type="text" id="subtitle_ar" name="subtitle_ar" value="{{ old('subtitle_ar', 'عن الشركة') }}">
                    @error('subtitle_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title_ar">العنوان الرئيسي (عربي) *</label>
                    <input type="text" id="title_ar" name="title_ar" value="{{ old('title_ar', 'شركة رائدة في قطاعات البناء وتقنية المعلومات') }}" required>
                    @error('title_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content_ar">المحتوى (عربي) *</label>
                    <textarea id="content_ar" name="content_ar" required>{{ old('content_ar', 'نحن شركة متخصصة في المملكة العربية السعودية تعمل في مجالات المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات. نقدم حلولاً شاملة ومتكاملة تغطي جميع احتياجات المشاريع الكبرى في المملكة. من خلال فريقنا الخبير وأحدث التقنيات، نساهم في بناء البنية التحتية الحديثة وتطوير المشاريع التقنية والاتصالات التي تدعم رؤية المملكة 2030. نلتزم بأعلى معايير الجودة والسلامة في جميع مشاريعنا، ونوفر خدمات متكاملة من التصميم والتنفيذ إلى الصيانة والدعم الفني.') }}</textarea>
                    @error('content_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="experience_description_ar">وصف الخبرة (عربي)</label>
                    <textarea id="experience_description_ar" name="experience_description_ar">{{ old('experience_description_ar', 'عام من الخبرة في تقديم حلول متكاملة في مجالات المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات. خبرة واسعة في تنفيذ المشاريع الكبرى في المملكة العربية السعودية.') }}</textarea>
                    @error('experience_description_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>المميزات (عربي)</label>
                    <div id="features-ar-container">
                        <div class="feature-item">
                            <input type="text" name="features_ar[]" placeholder="ميزة 1" value="{{ old('features_ar.0', 'حلول متكاملة') }}">
                        </div>
                        <div class="feature-item">
                            <input type="text" name="features_ar[]" placeholder="ميزة 2" value="{{ old('features_ar.1', 'جودة عالية') }}">
                        </div>
                        <div class="feature-item">
                            <input type="text" name="features_ar[]" placeholder="ميزة 3" value="{{ old('features_ar.2', 'دعم فني مستمر') }}">
                        </div>
                        <div class="feature-item">
                            <input type="text" name="features_ar[]" placeholder="ميزة 4" value="{{ old('features_ar.3', 'خبرة واسعة') }}">
                        </div>
                    </div>
                    <button type="button" class="btn-add" onclick="addFeature('ar')">إضافة ميزة</button>
                </div>
            </div>

            <div class="lang-section">
                <h3>المحتوى بالإنجليزية</h3>
                
                <div class="form-group">
                    <label for="subtitle_en">العنوان الفرعي (إنجليزي)</label>
                    <input type="text" id="subtitle_en" name="subtitle_en" value="{{ old('subtitle_en', 'About Us') }}">
                    @error('subtitle_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title_en">العنوان الرئيسي (إنجليزي) *</label>
                    <input type="text" id="title_en" name="title_en" value="{{ old('title_en', 'Leading Company in Construction and IT Sectors') }}" required>
                    @error('title_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content_en">المحتوى (إنجليزي) *</label>
                    <textarea id="content_en" name="content_en" required>{{ old('content_en', 'We are a specialized company in Saudi Arabia working in the fields of construction, infrastructure, information technology, low-voltage systems, and communications. We provide comprehensive and integrated solutions covering all the needs of major projects in the Kingdom. Through our expert team and latest technologies, we contribute to building modern infrastructure and developing technical and communication projects that support Vision 2030. We are committed to the highest standards of quality and safety in all our projects, and provide integrated services from design and implementation to maintenance and technical support.') }}</textarea>
                    @error('content_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="experience_description_en">وصف الخبرة (إنجليزي)</label>
                    <textarea id="experience_description_en" name="experience_description_en">{{ old('experience_description_en', 'Years of experience in providing integrated solutions in the fields of construction, infrastructure, information technology, low-voltage systems, and communications. Extensive experience in implementing major projects in Saudi Arabia.') }}</textarea>
                    @error('experience_description_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>المميزات (إنجليزي)</label>
                    <div id="features-en-container">
                        <div class="feature-item">
                            <input type="text" name="features_en[]" placeholder="Feature 1" value="{{ old('features_en.0', 'Integrated Solutions') }}">
                        </div>
                        <div class="feature-item">
                            <input type="text" name="features_en[]" placeholder="Feature 2" value="{{ old('features_en.1', 'High Quality') }}">
                        </div>
                        <div class="feature-item">
                            <input type="text" name="features_en[]" placeholder="Feature 3" value="{{ old('features_en.2', 'Continuous Technical Support') }}">
                        </div>
                        <div class="feature-item">
                            <input type="text" name="features_en[]" placeholder="Feature 4" value="{{ old('features_en.3', 'Extensive Experience') }}">
                        </div>
                    </div>
                    <button type="button" class="btn-add" onclick="addFeature('en')">Add Feature</button>
                </div>
            </div>

            <div class="form-group">
                <label for="experience_years">سنوات الخبرة *</label>
                <input type="number" id="experience_years" name="experience_years" value="{{ old('experience_years', 19) }}" min="0" required>
                @error('experience_years')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="experience_image">صورة الخبرة</label>
                <input type="file" id="experience_image" name="experience_image" accept="image/*" onchange="previewImage(this, 'experience-preview')">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                @error('experience_image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div id="experience-preview-container" class="image-preview-container" style="display: none;">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة الصورة:</p>
                    <div class="image-preview-wrapper">
                        <img id="experience-preview" src="" alt="Experience image preview">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="image">صورة إضافية</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'main-preview')">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div id="main-preview-container" class="image-preview-container" style="display: none;">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة الصورة:</p>
                    <div class="image-preview-wrapper">
                        <img id="main-preview" src="" alt="Main image preview">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ المحتوى</button>
                <a href="{{ route('abouts.index') }}" class="btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    function addFeature(lang) {
        const container = document.getElementById(`features-${lang}-container`);
        const newItem = document.createElement('div');
        newItem.className = 'feature-item';
        newItem.innerHTML = `
            <input type="text" name="features_${lang}[]" placeholder="${lang === 'ar' ? 'ميزة جديدة' : 'New Feature'}">
            <button type="button" class="btn-remove" onclick="removeFeature(this)">${lang === 'ar' ? 'حذف' : 'Remove'}</button>
        `;
        container.appendChild(newItem);
    }

    function removeFeature(button) {
        button.parentElement.remove();
    }

    function previewImage(input, previewId) {
        const previewContainer = document.getElementById(`${previewId}-container`);
        const preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush

