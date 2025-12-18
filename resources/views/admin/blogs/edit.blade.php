@extends('layouts.admin-layout')

@section('title', 'تعديل المقال')
@section('page-title', 'تعديل المقال')

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
    .form-group input[type="date"],
    .form-group input[type="url"],
    .form-group input[type="number"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s;
        font-family: '29ltbukra' !important;
    }

    .form-group input:focus {
        outline: none;
        border-color: #3b82f6;
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
        object-fit: cover;
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

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checkbox-group input[type="checkbox"] {
        width: auto;
        cursor: pointer;
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
        <h2>تعديل المقال</h2>
        <a href="{{ route('blogs.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">صورة المقال</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                @if($blog->image)
                    <div id="image-preview-container" class="image-preview-container">
                        <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">الصورة الحالية:</p>
                        <div class="image-preview-wrapper">
                            <img id="image-preview" src="{{ asset('storage/' . $blog->image) }}" alt="Current image">
                            <div class="image-actions">
                                <button type="button" class="btn-image-action btn-view" onclick="viewImageFullscreen()">عرض</button>
                                <label for="delete_image" class="btn-image-action btn-delete" style="cursor: pointer;">
                                    <input type="checkbox" id="delete_image" name="delete_image" value="1" style="display: none;" onchange="handleDeleteImage(this)">
                                    حذف
                                </label>
                            </div>
                        </div>
                    </div>
                @else
                    <div id="image-preview-container" class="image-preview-container" style="display: none;">
                        <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة الصورة:</p>
                        <div class="image-preview-wrapper">
                            <img id="image-preview" src="" alt="Image preview">
                            <div class="image-actions">
                                <button type="button" class="btn-image-action btn-view" onclick="viewImageFullscreen()">عرض</button>
                                <button type="button" class="btn-image-action btn-delete" onclick="removeImagePreview()">حذف</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="published_at">تاريخ النشر *</label>
                <input type="date" id="published_at" name="published_at" value="{{ old('published_at', $blog->published_at->format('Y-m-d')) }}" required>
                @error('published_at')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">رابط المقال</label>
                <input type="url" id="link" name="link" value="{{ old('link', $blog->link) }}" placeholder="https://example.com/article">
                <small>رابط المقال (اختياري)</small>
                @error('link')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="order">الترتيب</label>
                <input type="number" id="order" name="order" value="{{ old('order', $blog->order) }}" min="0">
                <small>يستخدم لترتيب عرض المقالات (الأقل يظهر أولاً)</small>
                @error('order')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $blog->is_active) ? 'checked' : '' }}>
                    <label for="is_active" style="margin: 0;">نشط</label>
                </div>
                <small>عرض هذا المقال في الموقع</small>
            </div>

            <div class="lang-section">
                <h3>المعلومات بالعربية</h3>
                
                <div class="form-group">
                    <label for="title_ar">عنوان المقال (عربي) *</label>
                    <input type="text" id="title_ar" name="title_ar" value="{{ old('title_ar', $blog->title_ar) }}" required>
                    @error('title_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_ar">الفئة (عربي) *</label>
                    <input type="text" id="category_ar" name="category_ar" value="{{ old('category_ar', $blog->category_ar) }}" required>
                    @error('category_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="lang-section">
                <h3>المعلومات بالإنجليزية</h3>
                
                <div class="form-group">
                    <label for="title_en">عنوان المقال (إنجليزي) *</label>
                    <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $blog->title_en) }}" required>
                    @error('title_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_en">الفئة (إنجليزي) *</label>
                    <input type="text" id="category_en" name="category_en" value="{{ old('category_en', $blog->category_en) }}" required>
                    @error('category_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">تحديث المقال</button>
                <a href="{{ route('blogs.index') }}" class="btn-secondary">إلغاء</a>
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
    function previewImage(input) {
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const fileInput = document.getElementById('image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                if (previewContainer) {
                    previewContainer.style.display = 'block';
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImagePreview() {
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const fileInput = document.getElementById('image');

        if (preview) {
            preview.src = '';
        }
        if (previewContainer) {
            previewContainer.style.display = 'none';
        }
        if (fileInput) {
            fileInput.value = '';
        }
    }

    function handleDeleteImage(checkbox) {
        const previewContainer = document.getElementById('image-preview-container');
        if (checkbox.checked) {
            if (previewContainer) {
                previewContainer.style.opacity = '0.5';
            }
        } else {
            if (previewContainer) {
                previewContainer.style.opacity = '1';
            }
        }
    }

    function viewImageFullscreen() {
        const preview = document.getElementById('image-preview');
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');

        if (preview && preview.src) {
            modalImg.src = preview.src;
            modal.classList.add('active');
        }
    }

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

