@extends('layouts.admin-layout')

@section('title', 'إضافة قسم جديد')
@section('page-title', 'إضافة قسم جديد')

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
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background: #dc2626;
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
        <h2>إضافة قسم جديد</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">اسم القسم (عربي) *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name_en">اسم القسم (إنجليزي)</label>
                <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}">
                @error('name_en')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">صورة القسم</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP (الحد الأقصى: 15MB)</small>
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                <div id="image-preview-container" class="image-preview-container" style="display: none;">
                    <p style="margin-bottom: 10px; color: #374151; font-weight: 500;">معاينة الصورة:</p>
                    <div class="image-preview-wrapper">
                        <img id="image-preview" src="" alt="Image preview">
                        <div class="image-actions">
                            <button type="button" class="btn-image-action btn-delete" onclick="removeImagePreview()">حذف</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ القسم</button>
                <a href="{{ route('admin.categories.index') }}" class="btn-secondary">إلغاء</a>
            </div>
        </form>
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
        const fileInput = document.getElementById('image');

        preview.src = '';
        previewContainer.style.display = 'none';
        fileInput.value = '';
    }
</script>
@endpush

