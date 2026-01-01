@extends('layouts.admin-layout')

@section('title', 'عرض المنتجات')
@section('page-title', 'عرض المنتجات')

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

    .btn-primary {
        padding: 12px 24px;
        background: #3b82f6;
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

    .btn-primary:hover {
        background: #2563eb;
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

    .btn-edit {
        padding: 6px 12px;
        background: #10b981;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-left: 5px;
    }

    .btn-edit:hover {
        background: #059669;
    }

    .btn-delete {
        padding: 6px 12px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 14px;
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

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6b7280;
    }

    .empty-state p {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .text-truncate {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }

    .badge-active {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-inactive {
        background: #fee2e2;
        color: #991b1b;
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
    <h2>قائمة المنتجات</h2>
    <a href="{{ route('admin.items.create') }}" class="btn-primary">إضافة منتج جديد</a>
</div>

<div class="card">
    @if($items->count() > 0)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المنتج</th>
                    <th>الفئة</th>
                    <th>
                        الحالة
                    </th>
                    <th>
                        الترتيب
                    </th>
                    <th>صورة المنتج</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="text-truncate">{{ $item->name }}</td>
                    <td>
                        @if($item->category)
                        <span class="badge badge-active">{{ $item->category->name }}</span>
                        @else
                        <span class="badge badge-inactive">غير محدد</span>
                        @endif
                    </td>
                    <td>
                        @if($item->active)
                        <span class="badge badge-active">نشط</span>
                        @else
                        <span class="badge badge-inactive">غير نشط</span>
                        @endif
                    </td>
                    <td>
                        {{ $item->order }}
                    </td>
                    <td>
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="80">
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.items.edit', $item->id) }}" class="btn-edit">تعديل</a>
                        <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('هل أنت متأكد من حذف المنتج؟')">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="empty-state">
        <p>لا توجد منتجات حتى الآن.</p>
        <a href="{{ route('admin.items.create') }}" class="btn-primary">إضافة منتج جديد</a>
    </div>
    @endif
</div>
@endsection