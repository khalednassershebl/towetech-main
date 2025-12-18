@extends('layouts.admin-layout')

@section('title', 'تعديل محتوى من نحن')
@section('page-title', 'تعديل محتوى من نحن')

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

    .current-image {
        margin-top: 10px;
        padding: 15px;
        background: #f9fafb;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }

    .current-image p {
        margin-bottom: 10px;
        color: #374151;
        font-weight: 500;
    }

    .current-image img {
        max-width: 300px;
        max-height: 200px;
        border-radius: 8px;
        border: 2px solid #d1d5db;
        object-fit: contain;
        display: block;
        background: white;
        padding: 10px;
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

    .image-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-image-action {
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
    }

    .hidden {
        display: none !important;
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
        <h2>تعديل محتوى من نحن</h2>
        <a href="{{ route('abouts.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="lang-section">
                <h3>المحتوى بالعربية</h3>
                
                <div class="form-group">
                    <label for="subtitle_ar">العنوان الفرعي (عربي)</label>
                    <input type="text" id="subtitle_ar" name="subtitle_ar" value="{{ old('subtitle_ar', $about->subtitle_ar) }}">
                    @error('subtitle_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title_ar">العنوان الرئيسي (عربي) *</label>
                    <input type="text" id="title_ar" name="title_ar" value="{{ old('title_ar', $about->title_ar) }}" required>
                    @error('title_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content_ar">المحتوى (عربي) *</label>
                    <textarea id="content_ar" name="content_ar" required>{{ old('content_ar', $about->content_ar) }}</textarea>
                    @error('content_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="experience_description_ar">وصف الخبرة (عربي)</label>
                    <textarea id="experience_description_ar" name="experience_description_ar">{{ old('experience_description_ar', $about->experience_description_ar) }}</textarea>
                    @error('experience_description_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>المميزات (عربي)</label>
                    <div id="features-ar-container">
                        @php
                            $featuresAr = old('features_ar', $about->features_ar ?? []);
                            if (empty($featuresAr)) {
                                $featuresAr = ['حلول متكاملة', 'جودة عالية', 'دعم فني مستمر', 'خبرة واسعة'];
                            }
                        @endphp
                        @foreach($featuresAr as $index => $feature)
                            <div class="feature-item">
                                <input type="text" name="features_ar[]" value="{{ $feature }}">
                                @if($index > 0)
                                    <button type="button" class="btn-remove" onclick="removeFeature(this)">حذف</button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn-add" onclick="addFeature('ar')">إضافة ميزة</button>
                </div>
            </div>

            <div class="lang-section">
                <h3>المحتوى بالإنجليزية</h3>
                
                <div class="form-group">
                    <label for="subtitle_en">العنوان الفرعي (إنجليزي)</label>
                    <input type="text" id="subtitle_en" name="subtitle_en" value="{{ old('subtitle_en', $about->subtitle_en) }}">
                    @error('subtitle_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title_en">العنوان الرئيسي (إنجليزي) *</label>
                    <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $about->title_en) }}" required>
                    @error('title_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content_en">المحتوى (إنجليزي) *</label>
                    <textarea id="content_en" name="content_en" required>{{ old('content_en', $about->content_en) }}</textarea>
                    @error('content_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="experience_description_en">وصف الخبرة (إنجليزي)</label>
                    <textarea id="experience_description_en" name="experience_description_en">{{ old('experience_description_en', $about->experience_description_en) }}</textarea>
                    @error('experience_description_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>المميزات (إنجليزي)</label>
                    <div id="features-en-container">
                        @php
                            $featuresEn = old('features_en', $about->features_en ?? []);
                            if (empty($featuresEn)) {
                                $featuresEn = ['Integrated Solutions', 'High Quality', 'Continuous Technical Support', 'Extensive Experience'];
                            }
                        @endphp
                        @foreach($featuresEn as $index => $feature)
                            <div class="feature-item">
                                <input type="text" name="features_en[]" value="{{ $feature }}">
                                @if($index > 0)
                                    <button type="button" class="btn-remove" onclick="removeFeature(this)">Remove</button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn-add" onclick="addFeature('en')">Add Feature</button>
                </div>
            </div>

            <div class="form-group">
                <label for="experience_years">سنوات الخبرة *</label>
                <input type="number" id="experience_years" name="experience_years" value="{{ old('experience_years', $about->experience_years) }}" min="0" required>
                @error('experience_years')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="experience_image">صورة الخبرة</label>
                <input type="file" id="experience_image" name="experience_image" accept="image/*" onchange="previewNewImage(this, 'experience')">
                <input type="hidden" id="delete_experience_image" name="delete_experience_image" value="0">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                @error('experience_image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                @if($about->experience_image)
                    <div id="current-experience-image" class="current-image">
                        <p>الصورة الحالية:</p>
                        <img src="{{ asset('storage/' . $about->experience_image) }}" alt="Current experience image">
                        <div class="image-actions">
                            <button type="button" class="btn-image-action btn-delete" onclick="deleteCurrentImage('experience')">حذف</button>
                        </div>
                    </div>
                @endif
                <div id="experience-preview-container" class="image-preview-container hidden">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة الصورة الجديدة:</p>
                    <div class="image-preview-wrapper">
                        <img id="experience-preview" src="" alt="Experience image preview">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="image">صورة إضافية</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewNewImage(this, 'main')">
                <input type="hidden" id="delete_image" name="delete_image" value="0">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                @if($about->image)
                    <div id="current-main-image" class="current-image">
                        <p>الصورة الحالية:</p>
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Current main image">
                        <div class="image-actions">
                            <button type="button" class="btn-image-action btn-delete" onclick="deleteCurrentImage('main')">حذف</button>
                        </div>
                    </div>
                @endif
                <div id="main-preview-container" class="image-preview-container hidden">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة الصورة الجديدة:</p>
                    <div class="image-preview-wrapper">
                        <img id="main-preview" src="" alt="Main image preview">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">تحديث المحتوى</button>
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

    function previewNewImage(input, type) {
        const previewContainer = document.getElementById(`${type}-preview-container`);
        const preview = document.getElementById(`${type}-preview`);
        const currentContainer = document.getElementById(`current-${type}-image`);
        const deleteInput = document.getElementById(`delete_${type === 'experience' ? 'experience_' : ''}image`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                if (currentContainer) {
                    currentContainer.style.display = 'none';
                }
                deleteInput.value = '0';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            previewContainer.classList.add('hidden');
        }
    }

    function deleteCurrentImage(type) {
        if (confirm('هل أنت متأكد من حذف الصورة؟')) {
            const currentContainer = document.getElementById(`current-${type}-image`);
            const fileInput = document.getElementById(type === 'experience' ? 'experience_image' : 'image');
            const deleteInput = document.getElementById(`delete_${type === 'experience' ? 'experience_' : ''}image`);
            const previewContainer = document.getElementById(`${type}-preview-container`);

            if (currentContainer) {
                currentContainer.style.display = 'none';
            }
            fileInput.value = '';
            deleteInput.value = '1';
            if (previewContainer) {
                previewContainer.classList.add('hidden');
            }
        }
    }
</script>
@endpush

