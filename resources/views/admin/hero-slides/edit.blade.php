@extends('layouts.admin-layout')

@section('title', 'تعديل شريحة البطل')
@section('page-title', 'تعديل شريحة البطل')

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
    .form-group input[type="url"],
    .form-group input[type="file"],
    .form-group input[type="number"],
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

    /* Tabs Styles */
    .tabs-container {
        margin-bottom: 30px;
    }

    .tabs {
        display: flex;
        gap: 10px;
        border-bottom: 2px solid #e5e7eb;
        margin-bottom: 30px;
    }

    .tab-button {
        padding: 12px 24px;
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        font-size: 16px;
        font-weight: 500;
        color: #6b7280;
        cursor: pointer;
        transition: all 0.3s;
        position: relative;
        top: 2px;
    }

    .tab-button:hover {
        color: #3b82f6;
    }

    .tab-button.active {
        color: #3b82f6;
        border-bottom-color: #3b82f6;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
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

    /* Image Preview Styles */
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
        max-width: 400px;
        max-height: 300px;
        border-radius: 8px;
        border: 2px solid #d1d5db;
        object-fit: contain;
        display: block;
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

    .btn-view {
        background: #3b82f6;
        color: white;
    }

    .btn-view:hover {
        background: #2563eb;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checkbox-group input[type="checkbox"] {
        width: auto;
        cursor: pointer;
    }

    .image-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        cursor: pointer;
    }

    .image-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image-modal img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
    }

    .image-modal-close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }

    .image-modal-close:hover {
        color: #fff;
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
        <h2>تعديل شريحة البطل</h2>
        <a href="{{ route('hero-slides.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('hero-slides.update', $heroSlide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="background_image">صورة الخلفية</label>
                @if($heroSlide->background_image)
                    <div id="existing-image-container" class="image-preview-container">
                        <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">الصورة الحالية:</p>
                        <div class="image-preview-wrapper">
                            <img src="{{ asset('storage/' . $heroSlide->background_image) }}" alt="Current image" id="existing-image-preview">
                            <div class="image-actions">
                                <button type="button" class="btn-image-action btn-view" onclick="viewExistingImageFullscreen()">عرض</button>
                                <label for="background_image" class="btn-image-action" style="background: #10b981; color: white; cursor: pointer;">استبدال</label>
                                <button type="button" class="btn-image-action btn-delete" onclick="deleteExistingImage()">حذف</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="delete_image" id="delete_image" value="0">
                @endif
                <input type="file" id="background_image" name="background_image" accept="image/*" onchange="previewNewImage(this)" style="margin-top: 10px;">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                @error('background_image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div id="new-image-preview-container" class="image-preview-container" style="display: none;">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة الصورة الجديدة:</p>
                    <div class="image-preview-wrapper">
                        <img id="new-image-preview" src="" alt="New image preview">
                        <div class="image-actions">
                            <button type="button" class="btn-image-action btn-view" onclick="viewNewImageFullscreen()">عرض</button>
                            <button type="button" class="btn-image-action btn-delete" onclick="removeNewImagePreview()">حذف</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="link">الرابط</label>
                <input type="text" id="link" name="link" value="{{ old('link', $heroSlide->link) }}" placeholder="https://example.com أو /services">
                <small>رابط اختياري للانتقال عند النقر على الشريحة</small>
                @error('link')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="order">الترتيب</label>
                <input type="number" id="order" name="order" value="{{ old('order', $heroSlide->order) }}" min="0">
                <small>الترتيب الذي ستظهر به الشريحة (الأقل يظهر أولاً)</small>
                @error('order')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $heroSlide->is_active) ? 'checked' : '' }}>
                    <label for="is_active" style="margin: 0; cursor: pointer;">تفعيل الشريحة</label>
                </div>
                <small>إذا لم يتم تفعيل الشريحة، لن تظهر في الموقع</small>
            </div>

            <div class="tabs-container">
                <div class="tabs">
                    <button type="button" class="tab-button active" onclick="switchTab('arabic')">
                        🇸🇦 المحتوى بالعربية
                    </button>
                    <button type="button" class="tab-button" onclick="switchTab('english')">
                        🇬🇧 المحتوى بالإنجليزية
                    </button>
                </div>

                <div id="tab-arabic" class="tab-content active">
                    <div class="lang-section">
                        <h3>المحتوى بالعربية</h3>
                        
                        <div class="form-group">
                            <label for="title_ar">العنوان الرئيسي (عربي) *</label>
                            <input type="text" id="title_ar" name="title_ar" value="{{ old('title_ar', $heroSlide->title_ar) }}" required>
                            @error('title_ar')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subtitle_ar">العنوان الفرعي (عربي)</label>
                            <textarea id="subtitle_ar" name="subtitle_ar" rows="4">{{ old('subtitle_ar', $heroSlide->subtitle_ar) }}</textarea>
                            @error('subtitle_ar')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div id="tab-english" class="tab-content">
                    <div class="lang-section">
                        <h3>المحتوى بالإنجليزية</h3>
                        
                        <div class="form-group">
                            <label for="title_en">العنوان الرئيسي (إنجليزي) *</label>
                            <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $heroSlide->title_en) }}" required>
                            @error('title_en')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subtitle_en">العنوان الفرعي (إنجليزي)</label>
                            <textarea id="subtitle_en" name="subtitle_en" rows="4">{{ old('subtitle_en', $heroSlide->subtitle_en) }}</textarea>
                            @error('subtitle_en')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">تحديث الشريحة</button>
                <a href="{{ route('hero-slides.index') }}" class="btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>

    <!-- Image Modal -->
    <div id="image-modal" class="image-modal">
        <span class="image-modal-close">&times;</span>
        <img id="modal-image" src="" alt="Fullscreen preview">
    </div>
@endsection

@push('scripts')
<script>
    function switchTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('active');
        });
        
        // Show selected tab content
        document.getElementById('tab-' + tabName).classList.add('active');
        
        // Add active class to clicked button
        event.target.classList.add('active');
    }

    function previewNewImage(input) {
        const previewContainer = document.getElementById('new-image-preview-container');
        const preview = document.getElementById('new-image-preview');

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

    function removeNewImagePreview() {
        const previewContainer = document.getElementById('new-image-preview-container');
        const preview = document.getElementById('new-image-preview');
        const fileInput = document.getElementById('background_image');

        preview.src = '';
        previewContainer.style.display = 'none';
        fileInput.value = '';
    }

    function deleteExistingImage() {
        if (confirm('هل أنت متأكد من حذف الصورة الحالية؟')) {
            document.getElementById('delete_image').value = '1';
            document.getElementById('existing-image-container').style.display = 'none';
        }
    }

    function viewExistingImageFullscreen() {
        const existingImg = document.getElementById('existing-image-preview');
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');

        if (existingImg && existingImg.src) {
            modalImg.src = existingImg.src;
            modal.classList.add('active');
        }
    }

    function viewNewImageFullscreen() {
        const newImg = document.getElementById('new-image-preview');
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');

        if (newImg && newImg.src) {
            modalImg.src = newImg.src;
            modal.classList.add('active');
        }
    }

    // Close modal when clicking on it
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('image-modal');
        const closeBtn = document.querySelector('.image-modal-close');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal || e.target === closeBtn) {
                    modal.classList.remove('active');
                }
            });
        }
    });
</script>
@endpush

