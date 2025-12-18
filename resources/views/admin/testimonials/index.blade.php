@extends('layouts.admin-layout')

@section('title', 'إدارة آراء العملاء')
@section('page-title', 'إدارة آراء العملاء')

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
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
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

    .rating {
        color: #fbbf24;
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-active {
        background: #d1fae5;
        color: #065f46;
    }

    .status-inactive {
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
        <h2>قائمة آراء العملاء</h2>
        <a href="{{ route('testimonials.create') }}" class="btn-primary">إضافة رأي جديد</a>
    </div>

    <div class="card">
        @if($testimonials->count() > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الصورة</th>
                            <th>الاسم (عربي)</th>
                            <th>المنصب (عربي)</th>
                            <th>التقييم</th>
                            <th>الحالة</th>
                            <th>الترتيب</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $index => $testimonial)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name_ar }}" class="img-preview">
                                    @else
                                        <span style="color: #9ca3af;">لا توجد صورة</span>
                                    @endif
                                </td>
                                <td>{{ $testimonial->name_ar }}</td>
                                <td>{{ $testimonial->position_ar }}</td>
                                <td>
                                    <span class="rating">
                                        @for($i = 0; $i < $testimonial->rating; $i++)
                                            ★
                                        @endfor
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge {{ $testimonial->is_active ? 'status-active' : 'status-inactive' }}">
                                        {{ $testimonial->is_active ? 'نشط' : 'غير نشط' }}
                                    </span>
                                </td>
                                <td>{{ $testimonial->order }}</td>
                                <td>
                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn-edit">تعديل</a>
                                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا الرأي؟');">
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
                <p>لا توجد آراء عملاء حتى الآن</p>
                <a href="{{ route('testimonials.create') }}" class="btn-primary">إضافة رأي جديد</a>
            </div>
        @endif
    </div>
@endsection

