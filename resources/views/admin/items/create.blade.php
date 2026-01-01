@extends('layouts.admin-layout')

@section('title', 'إضافة منتج')
@section('page-title', 'إضافة منتج')

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
    .form-group select,
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
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #3b82f6;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 1px solid #e5e7eb;
    }

    .form-group small {
        display: block;
        margin-top: 5px;
        color: #6b7280;
        font-size: 12px;
    }


    .form-group input[type="number"] {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s;
        font-family: '29ltbukra' !important;
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

    .checkbox-group {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        flex-direction: row-reverse;
        padding: 12px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #f9fafb;
        transition: border-color 0.2s ease, background 0.2s ease;
    }

    .checkbox-group:hover {
        border-color: #cbd5e1;
        background: #f3f4f6;
    }

    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        margin: 0;
        accent-color: #3b82f6;
        cursor: pointer;
        flex: 0 0 auto;
    }

    .checkbox-group input[type="checkbox"]:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        border-radius: 4px;
    }

    .checkbox-group label {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        cursor: pointer;
    }

    

    .btn-image-action {
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
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
        align-items: center;
        justify-content: center;
    }

    .image-modal.active {
        display: flex;
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

    /* Upload box */
    #image-upload-box {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 2px dashed #d1d5db;
        padding: 20px;
        border-radius: 12px;
        cursor: pointer;
        transition: border-color 0.3s, background 0.3s;
        text-align: center;
        background: #fafafa;
    }

    #image-upload-box:hover {
        border-color: #3b82f6;
        background: #e0f2fe;
    }
</style>
@endpush

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="border-left: 5px solid #28a745; background-color: #e6ffed; color: #155724; font-weight: 500;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-left: 5px solid #dc3545; background-color: #ffe6e6; color: #721c24; font-weight: 500;">
    <ul style="margin: 0; padding-right: 20px;">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif



<div class="page-header">
    <h2>إضافة منتج</h2>
    <a href="{{ route('admin.items.show') }}" class="btn-secondary">العودة للقائمة</a>
</div>

<div class="card">
    <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">اسم المنتج *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name_en">اسم المنتج بالإنجليزية</label>
            <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}" required>
            @error('name_en')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="order">الترتيب</label>
            <input type="number" id="order" name="order" value="{{ old('order', 0) }}" min="0">
            <small>الترتيب الذي ستظهر به الشريحة (الأقل يظهر أولاً)</small>
            @error('order')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="category_id">الفئة *</label>

            <div style="display: flex; gap: 10px;">
                <select id="category_id" name="category_id" required style="flex: 1;">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>

                <button type="button" class="btn-secondary" onclick="openCategoryModal()">
                    + إضافة فئة
                </button>
            </div>

            @error('category_id')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload & Preview -->
        <div class="form-group">
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="image" style="font-weight: 600; display: block; margin-bottom: 0.5rem;">صورة المنتج</label>
                <input type="file" id="image" name="image" accept="image/*" style="display: block; margin-bottom: 0.5rem;">

                <div id="image-preview-container" class="image-preview-container" style="display:none;">
                    <p style="margin-bottom:10px; color:#374151; font-weight:500;">معاينة الصورة:</p>
                    <div class="image-preview-wrapper">
                        <img id="preview-img" src="" alt="Preview">
                        <button type="button" class="btn-secondary" style="margin-top:10px;" onclick="removeImagePreview()">إلغاء اختيار الصورة</button>
                    </div>
                </div>

                @error('image')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="active" name="active" value="1" {{ old('active', true) ? 'checked' : '' }}>
                    <label for="active">تفعيل الشريحة</label>
                    
                </div>
                @error('active')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ</button>
                <a href="{{ route('admin.items.show') }}" class="btn-secondary">إلغاء</a>
            </div>
    </form>
</div>
@endsection

<div id="categoryModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.5); z-index:1000;">
    <div style="background:#fff; width:400px; margin:10% auto; padding:30px; border-radius:10px; overflow-y:auto; max-height:80vh;">
        <h3 style="margin-bottom:20px;">إضافة فئة جديدة</h3>

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>اسم الفئة *</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>اسم الفئة بالإنجليزية</label>
                <input type="text" name="name_en" required>
            </div>
            <!-- Image Upload & Preview for Category -->
            <div class="form-group">
                <label>صورة الفئة (اختياري)</label>
                <input type="file" id="category-image" name="image" accept="image/*" style="display: block; margin-top: 5px;">

                <div id="category-image-preview-container" class="image-preview-container" style="display:none;">
                    <p style="margin-bottom:10px; color:#374151; font-weight:500;">معاينة الصورة:</p>
                    <div class="image-preview-wrapper">
                        <img id="category-preview-img" src="" alt="Preview">
                        <button type="button" class="btn-secondary" style="margin-top:10px;" onclick="removeCategoryImagePreview()">إلغاء اختيار الصورة</button>
                    </div>
                </div>

                @error('image')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ</button>
                <button type="button" class="btn-secondary" onclick="closeCategoryModal()">إلغاء</button>
            </div>
        </form>
    </div>
</div>


<script>
    function openCategoryModal() {
        document.getElementById('categoryModal').style.display = 'block';
    }

    function closeCategoryModal() {
        document.getElementById('categoryModal').style.display = 'none';
    }

    function openCategoryModal() {
        document.getElementById('categoryModal').style.display = 'block';
    }

    function closeCategoryModal() {
        document.getElementById('categoryModal').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const previewImg = document.getElementById('preview-img');
        const previewContainer = document.getElementById('image-preview-container');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                removeImagePreview();
            }
        });

        window.removeImagePreview = function() {
            previewImg.src = '';
            previewContainer.style.display = 'none';
            imageInput.value = '';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Image preview for category
        const categoryImageInput = document.getElementById('category-image');
        const categoryPreviewImg = document.getElementById('category-preview-img');
        const categoryPreviewContainer = document.getElementById('category-image-preview-container');

        categoryImageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    categoryPreviewImg.src = e.target.result;
                    categoryPreviewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                removeCategoryImagePreview();
            }
        });

        window.removeCategoryImagePreview = function() {
            categoryPreviewImg.src = '';
            categoryPreviewContainer.style.display = 'none';
            categoryImageInput.value = '';
        }
    });
</script>