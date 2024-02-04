@extends('Panel::layouts.master')

@php
    use App\Helper\Helper;
@endphp

@section('title', 'لیست مقاله ها')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{ route('categories.create') }}" class="arrow-none btn btn-primary text-white"
                           aria-expanded="false">
                            ساخت مقاله جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی مقاله ها</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>عکس مقاله</th>
                                <th>عنوان مقاله</th>
                                <th>وضعیت</th>
                                <th>نوع</th>
                                <th>زمان خواندن</th>
                                <th>امتیاز</th>
                                <th>دسته بندی</th>
                                <th>کاربر</th>
                                <th>تاریخ ساخت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img style="max-width: 20px" src="{{ asset($article->imagePath) }}" alt="article-image">
                                    </td>
                                    <td>{{ $article->title }}</td>
                                    <td>
                                        <span id="statusBadge{{$article->id}}" class="badge badge-primary">
                                            @lang($article->status)
                                        </span>
                                    </td>
                                    <td>{{ $article->type }}</td>
                                    <td>{{ $article->time_to_read }}</td>
                                    <td>{{ $article->score }}</td>
                                    <td>{{ $article->category?->title }}</td>
                                    <td>{{ $article->user?->name }}</td>
                                    <td>{{ Helper::convertEnglishToPersian(jdate($article->created_at)->format('Y-m-d')) }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning" title="ویرایش"><i class="fa fa-pen"></i></a>
                                            <button type="button"
                                                    data-url="{{route('articles.change.status',$article->id)}}"
                                                    onclick="changeStatus(this,{{$article}})"
                                                    class="btn @if($article->status === 'active') btn-dark @else btn-success @endif ml-1"
                                                    title="تغییر وضعیت">
                                                <i class="@if($article->status === 'active') fa fa-times @else fa fa-check @endif"></i>
                                            </button>
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
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
                        {{ $articles->links() }}
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
