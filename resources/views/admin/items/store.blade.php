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
    .form-group textarea,
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
    .form-group textarea:focus,
    .form-group select:focus {
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
    <h2>إضافة منتج</h2>
    <a href="{{ route('admin.items.index') }}" class="btn-secondary">العودة للقائمة</a>
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
            <label for="category_id">الفئة *</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">صورة المنتج</label>
            <input type="file" id="image" name="image">
            @error('image')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="checkbox-group">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active">نشط</label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">حفظ</button>
            <a href="{{ route('admin.items.index') }}" class="btn-secondary">إلغاء</a>
        </div>
    </form>
</div>
@endsection