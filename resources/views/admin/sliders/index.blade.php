@extends('layouts.admin-layout')

@section('title', 'إدارة السلايدرات')
@section('page-title', 'إدارة السلايدرات')

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

    th, td {
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

    .img-preview {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 6px;
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
</style>
@endpush

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="page-header">
        <h2>قائمة السلايدرات</h2>
        <a href="{{ route('sliders.create') }}" class="btn-primary">إضافة سلايدر جديد</a>
    </div>

    <div class="card">
        @if($sliders->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصورة</th>
                            <th>العنوان (عربي)</th>
                            <th>العنوان (إنجليزي)</th>
                            <th>الوصف (عربي)</th>
                            <th>الرابط</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $index => $slider)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($slider->background_url)
                                        <img src="{{ $slider->background_url }}" alt="Slider" class="img-preview" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                                        <span style="color: #9ca3af; display: none;">خطأ في تحميل الصورة</span>
                                    @else
                                        <span style="color: #9ca3af;">لا توجد صورة</span>
                                    @endif
                                </td>
                                <td>{{ $slider->title_ar }}</td>
                                <td>{{ $slider->title_en }}</td>
                                <td>{{ Str::limit($slider->description_ar ?? 'لا يوجد وصف', 50) }}</td>
                                <td>
                                    @if($slider->link)
                                        <a href="{{ $slider->link }}" target="_blank" style="color: #3b82f6;">عرض الرابط</a>
                                    @else
                                        <span style="color: #9ca3af;">لا يوجد رابط</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn-edit">تعديل</a>
                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا السلايدر؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <p>لا توجد سلايدرات حتى الآن</p>
                <a href="{{ route('sliders.create') }}" class="btn-primary">إضافة سلايدر جديد</a>
            </div>
        @endif
    </div>
@endsection
