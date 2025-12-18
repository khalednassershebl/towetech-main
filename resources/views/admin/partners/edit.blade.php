@extends('layouts.admin-layout')

@section('title', 'تعديل الشريك')
@section('page-title', 'تعديل الشريك')

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

    .image-preview-wrapper img,
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

    .btn-replace {
        background: #10b981;
        color: white;
    }

    .btn-replace:hover {
        background: #059669;
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
        <h2>تعديل الشريك</h2>
        <a href="{{ route('partners.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="logo">لوجو الشريك</label>
                <input type="file" id="logo" name="logo" accept="image/*" onchange="previewNewImage(this)">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 2MB)</small>
                <input type="hidden" id="delete_image" name="delete_image" value="0">
                @if($partner->logo)
                    <div id="current-image-container" class="current-image">
                        <p>اللوجو الحالي:</p>
                        <div class="image-preview-wrapper">
                            <img id="current-image" src="{{ asset('storage/' . $partner->logo) }}" alt="Current logo">
                            <div class="image-actions">
                                <button type="button" class="btn-image-action btn-view" onclick="viewCurrentImageFullscreen()">عرض</button>
                                <button type="button" class="btn-image-action btn-replace" onclick="triggerFileInput()">استبدال</button>
                                <button type="button" class="btn-image-action btn-delete" onclick="deleteCurrentImage()">حذف</button>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="image-preview-container" class="image-preview-container hidden">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة اللوجو الجديد:</p>
                    <div class="image-preview-wrapper">
                        <img id="image-preview" src="" alt="Logo preview">
                        <div class="image-actions">
                            <button type="button" class="btn-image-action btn-view" onclick="viewNewImageFullscreen()">عرض</button>
                            <button type="button" class="btn-image-action btn-delete" onclick="removeNewImagePreview()">إلغاء</button>
                        </div>
                    </div>
                </div>
                @error('logo')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="lang-section">
                <h3>اسم الشريك بالعربية</h3>
                
                <div class="form-group">
                    <label for="name_ar">اسم الشريك (عربي) *</label>
                    <input type="text" id="name_ar" name="name_ar" value="{{ old('name_ar', $partner->name_ar) }}" required>
                    @error('name_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="lang-section">
                <h3>اسم الشريك بالإنجليزية</h3>
                
                <div class="form-group">
                    <label for="name_en">اسم الشريك (إنجليزي) *</label>
                    <input type="text" id="name_en" name="name_en" value="{{ old('name_en', $partner->name_en) }}" required>
                    @error('name_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">تحديث الشريك</button>
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
    const currentImageUrl = @if($partner->logo) "{{ asset('storage/' . $partner->logo) }}" @else null @endif;

    function previewNewImage(input) {
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const fileInput = document.getElementById('logo');
        const deleteInput = document.getElementById('delete_image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                // If replacing, hide current image
                const currentContainer = document.getElementById('current-image-container');
                if (currentContainer) {
                    currentContainer.style.display = 'none';
                }
                deleteInput.value = '0'; // Reset delete flag when new image is selected
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            previewContainer.classList.add('hidden');
        }
    }

    function removeNewImagePreview() {
        const previewContainer = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const fileInput = document.getElementById('logo');
        const currentContainer = document.getElementById('current-image-container');

        preview.src = '';
        previewContainer.classList.add('hidden');
        fileInput.value = '';
        
        // Show current image again if it exists
        if (currentContainer) {
            currentContainer.style.display = 'block';
        }
    }

    function deleteCurrentImage() {
        if (confirm('هل أنت متأكد من حذف اللوجو؟')) {
            const currentContainer = document.getElementById('current-image-container');
            const fileInput = document.getElementById('logo');
            const deleteInput = document.getElementById('delete_image');
            const previewContainer = document.getElementById('image-preview-container');

            if (currentContainer) {
                currentContainer.style.display = 'none';
            }
            fileInput.value = '';
            deleteInput.value = '1'; // Set flag to delete image
            if (previewContainer) {
                previewContainer.classList.add('hidden');
            }
        }
    }

    function triggerFileInput() {
        document.getElementById('logo').click();
    }

    function viewCurrentImageFullscreen() {
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');

        if (currentImageUrl) {
            modalImg.src = currentImageUrl;
            modal.classList.add('active');
        }
    }

    function viewNewImageFullscreen() {
        const preview = document.getElementById('image-preview');
        const modal = document.getElementById('image-modal');
        const modalImg = document.getElementById('modal-image');

        if (preview.src) {
            modalImg.src = preview.src;
            modal.classList.add('active');
        }
    }

    // Close modal when clicking on it or the close button
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

