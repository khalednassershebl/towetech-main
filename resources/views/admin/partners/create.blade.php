@extends('layouts.admin-layout')

@section('title', 'إضافة شريك جديد')
@section('page-title', 'إضافة شريك جديد')

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
        <h2>إضافة شريك جديد</h2>
        <a href="{{ route('partners.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="logo">لوجو الشريك *</label>
                <input type="file" id="logo" name="logo" accept="image/*" onchange="previewImage(this)" required>
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                @error('logo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div id="image-preview-container" class="image-preview-container" style="display: none;">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة اللوجو:</p>
                    <div class="image-preview-wrapper">
                        <img id="image-preview" src="" alt="Logo preview">
                        <div class="image-actions">
                            <button type="button" class="btn-image-action btn-view" onclick="viewImageFullscreen()">عرض</button>
                            <button type="button" class="btn-image-action btn-delete" onclick="removeImagePreview()">حذف</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lang-section">
                <h3>اسم الشريك بالعربية</h3>
                
                <div class="form-group">
                    <label for="name_ar">اسم الشريك (عربي) *</label>
                    <input type="text" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required>
                    @error('name_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="lang-section">
                <h3>اسم الشريك بالإنجليزية</h3>
                
                <div class="form-group">
                    <label for="name_en">اسم الشريك (إنجليزي) *</label>
                    <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}" required>
                    @error('name_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ الشريك</button>
                <a href="{{ route('partners.index') }}" class="btn-secondary">إلغاء</a>
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
        const fileInput = document.getElementById('logo');

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

    function removeImagePreview() {
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const fileInput = document.getElementById('logo');

        preview.src = '';
        previewContainer.style.display = 'none';
        fileInput.value = '';
    }

    function viewImageFullscreen() {
        const preview = document.getElementById('image-preview');
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');

        if (preview.src) {
            modalImg.src = preview.src;
            modal.classList.add('active');
        }
    }

    // Close modal when clicking on it
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('image-modal');
        if (modal) {
            modal.addEventListener('click', function() {
                modal.classList.remove('active');
            });
        }
    });
</script>
@endpush

