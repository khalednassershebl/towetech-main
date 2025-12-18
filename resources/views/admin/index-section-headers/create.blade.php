@extends('layouts.admin-layout')

@section('title', 'إضافة رأس قسم')
@section('page-title', 'إضافة رأس قسم')

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
    .form-group input[type="checkbox"] {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s;
        font-family: '29ltbukra' !important;
    }

    .form-group input[type="checkbox"] {
        width: auto;
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

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checkbox-group input[type="checkbox"] {
        width: 20px;
        height: 20px;
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
        <h2>إضافة رأس قسم</h2>
        <a href="{{ route('index-section-headers.index') }}" class="btn-secondary">العودة للقائمة</a>
    </div>

    <div class="card">
        <form action="{{ route('index-section-headers.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="section_type">نوع القسم *</label>
                <select id="section_type" name="section_type" required style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; font-family: '29ltbukra' !important;">
                    <option value="services" {{ old('section_type') == 'services' ? 'selected' : '' }}>الخدمات</option>
                    <option value="testimonials" {{ old('section_type') == 'testimonials' ? 'selected' : '' }}>آراء العملاء</option>
                    <option value="blog" {{ old('section_type') == 'blog' ? 'selected' : '' }}>المدونة</option>
                </select>
                <small>اختر نوع القسم الذي سيتم استخدام هذا الرأس له</small>
                @error('section_type')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="lang-section">
                <h3>المحتوى بالعربية</h3>
                
                <div class="form-group">
                    <label for="title_ar">العنوان الرئيسي (عربي) *</label>
                    <input type="text" id="title_ar" name="title_ar" value="{{ old('title_ar') }}" required>
                    @error('title_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subtitle_ar">العنوان الفرعي (عربي)</label>
                    <input type="text" id="subtitle_ar" name="subtitle_ar" value="{{ old('subtitle_ar') }}">
                    @error('subtitle_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description_ar">الوصف (عربي)</label>
                    <textarea id="description_ar" name="description_ar">{{ old('description_ar') }}</textarea>
                    @error('description_ar')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="lang-section">
                <h3>المحتوى بالإنجليزية</h3>
                
                <div class="form-group">
                    <label for="title_en">العنوان الرئيسي (إنجليزي) *</label>
                    <input type="text" id="title_en" name="title_en" value="{{ old('title_en') }}" required>
                    @error('title_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subtitle_en">العنوان الفرعي (إنجليزي)</label>
                    <input type="text" id="subtitle_en" name="subtitle_en" value="{{ old('subtitle_en') }}">
                    @error('subtitle_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description_en">الوصف (إنجليزي)</label>
                    <textarea id="description_en" name="description_en">{{ old('description_en') }}</textarea>
                    @error('description_en')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active">نشط</label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ</button>
                <a href="{{ route('index-section-headers.index') }}" class="btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
@endsection

