@extends('Panel::layouts.master')

@php
    use App\Helper\Helper;
@endphp

@section('title', 'لیست دسته بندی ها')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{ route('categories.create') }}" class="arrow-none btn btn-primary text-white"
                           aria-expanded="false">
                            ساخت دسته بندی جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی دسته بندی ها</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>عنوان دسته بندی</th>
                                <th>وضعیت</th>
                                <th>زیر دسته</th>
                                <th>کاربر</th>
                                <th>تاریخ ساخت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <span class="badge badge-primary">
                                                {{ $category->status }}
                                        </span>
                                    </td>
                                    <td>{{ $category->parentCategory->title ?? '' }}</td>
                                    <td>{{ $category->user?->name }}</td>
                                    <td>{{ Helper::convertEnglishToPersian(jdate($category->created_at)->format('Y-m-d')) }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">ویرایش</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-1">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                        {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
