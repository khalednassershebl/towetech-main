@extends('layouts.admin-layout')

@section('title', 'إدارة الأقسام')
@section('page-title', 'إدارة الأقسام')

@push('styles')
<style>
    * {
        font-family: '29ltbukra' !important;
    }

    .container {
        max-width: 100%;
        width: 100%;
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
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #f8fafc;
    }

    th,
    td {
        padding: 15px;
        text-align: right;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    th {
        font-weight: 600;
        color: #374151;
        font-size: 14px;
    }

    td {
        color: #6b7280;
        font-size: 14px;
    }

    tr:hover {
        background: #f9fafb;
    }

    .btn-primary {
        padding: 8px 14px;
        background: #3b82f6;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background 0.3s;
    }

    .btn-primary:hover {
        background: #2563eb;
    }

    .btn-delete {
        padding: 8px 14px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #dc2626;
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

    .form-control {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        font-size: 14px;
    }

    .actions {
        display: flex;
        gap: 8px;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: wrap;
    }

    .thumb {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        background: #fff;
    }
</style>
@endpush

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="page-header">
    <h2>قائمة الأقسام</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn-primary">إضافة قسم جديد</a>
</div>

<div class="card">
    @if($categories->count() > 0)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الاسم (EN)</th>
                    <th>الصورة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->name_en ?? '-' }}</td>
                    <td>
                        @if($category->image)
                        <img class="thumb" src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                        @else
                        <span style="color: #9ca3af;">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-primary">تعديل</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا القسم؟');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div style="padding: 30px; text-align:center; color:#6b7280;">لا توجد أقسام حتى الآن</div>
    @endif
</div>
@endsection
