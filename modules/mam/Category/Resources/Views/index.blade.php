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
                                        <span id="statusBadge{{$category->id}}" class="badge badge-primary">
                                            @lang($category->status)
                                        </span>
                                    </td>
                                    <td>{{ $category->getParent() }}</td>
                                    <td>{{ $category->user?->name }}</td>
                                    <td>{{ Helper::convertEnglishToPersian(jdate($category->created_at)->format('Y-m-d')) }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning" title="ویرایش"><i class="fa fa-pen"></i></a>
                                            <button type="button"
                                                    data-url="{{route('categories.change.status',$category->id)}}"
                                                    onclick="changeStatus(this,{{$category}})"
                                                    class="btn @if($category->status === 'active') btn-dark @else btn-success @endif ml-1"
                                                    title="تغییر وضعیت">
                                                <i class="@if($category->status === 'active') fa fa-times @else fa fa-check @endif"></i>
                                            </button>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-1" title="حذف"><i class="fa fa-trash"></i></button>
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

@section('js')
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script>
        function changeStatus(element,category){
        const statusBadge = document.getElementById('statusBadge' + category.id);
            console.log(statusBadge)
            $.ajax({
                url: element.getAttribute('data-url'),
                type:"GET",
                success: (response) => {
                    if(response.status === 'active') {
                        statusBadge.innerText = 'فعال';
                        element.classList.remove('btn-success');
                        element.classList.add('btn-dark');
                        element.firstElementChild.className = "fa fa-times"
                    }else{
                        statusBadge.innerText = 'غیر فعال';
                        element.classList.remove('btn-dark');
                        element.classList.add('btn-success');
                        element.firstElementChild.className = "fa fa-check";
                    }
                }
            })
        }
    </script>
@endsection
