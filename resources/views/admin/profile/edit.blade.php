@extends('layouts.admin-layout')

@section('title', 'تعديل الحساب')
@section('page-title', 'تعديل الحساب')

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

    .card {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .card h3 {
        color: #374151;
        font-size: 22px;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e5e7eb;
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
    .form-group input[type="email"],
    .form-group input[type="password"],
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

    .alert {
        padding: 15px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
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
    }

    .image-preview {
        max-width: 200px;
        max-height: 200px;
        border-radius: 8px;
        border: 2px solid #d1d5db;
        padding: 5px;
        background: #f9fafb;
    }

    .current-image {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-top: 10px;
    }

    .current-image img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #d1d5db;
    }

    .current-image-info {
        color: #6b7280;
        font-size: 14px;
    }

    .avatar-placeholder {
        width: 100px;
        height: 100px;
        border-radius: 8px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 36px;
        font-weight: 600;
        border: 2px solid #d1d5db;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="page-header">
        <h2>تعديل الحساب</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-right: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <h3>البيانات الشخصية</h3>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- User Name -->
            <div class="form-group">
                <label for="name">اسم المستخدم <span style="color: #ef4444;">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- User Email -->
            <div class="form-group">
                <label for="email">البريد الإلكتروني <span style="color: #ef4444;">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- User Image -->
            <div class="form-group">
                <label for="image">صورة المستخدم</label>
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                <small>الصيغ المدعومة: JPEG, PNG, JPG, GIF, WEBP. الحد الأقصى للحجم: 2MB</small>
                
                @if($user->image)
                    <div class="current-image">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="صورة المستخدم الحالية">
                        <div class="current-image-info">
                            الصورة الحالية
                        </div>
                    </div>
                @else
                    <div class="current-image">
                        <div class="avatar-placeholder">
                            @php
                                $nameParts = explode(' ', $user->name);
                                $initials = strtoupper(substr($nameParts[0], 0, 1));
                                if (isset($nameParts[1]) && !empty($nameParts[1])) {
                                    $initials .= strtoupper(substr($nameParts[1], 0, 1));
                                } else {
                                    $initials .= strtoupper(substr($nameParts[0], 1, 1) ?? substr($nameParts[0], 0, 1));
                                }
                            @endphp
                            {{ $initials }}
                        </div>
                        <div class="current-image-info">
                            لا توجد صورة حالياً
                        </div>
                    </div>
                @endif

                <div class="image-preview-container" id="imagePreviewContainer" style="display: none;">
                    <label style="display: block; margin-bottom: 8px; color: #374151; font-weight: 500; font-size: 14px;">معاينة الصورة الجديدة:</label>
                    <img id="imagePreview" class="image-preview" src="" alt="معاينة الصورة">
                </div>

                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- User Password -->
            <div class="form-group">
                <label for="password">كلمة المرور الجديدة</label>
                <input type="password" id="password" name="password" autocomplete="new-password">
                <small>اتركها فارغة إذا كنت لا تريد تغيير كلمة المرور. الحد الأدنى: 8 أحرف</small>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div class="form-group">
                <label for="password_confirmation">تأكيد كلمة المرور</label>
                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">حفظ التغييرات</button>
                <a href="{{ route('admin.dashboard') }}" class="btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('imagePreviewContainer').style.display = 'none';
        }
    });
</script>
@endpush
