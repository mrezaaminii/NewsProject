@extends('Panel::layouts.master')

@php
    use App\Helper\Helper;
@endphp

@section('title', 'لیست نظرات')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">لیست تمامی نظرات</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>عنوان نظر</th>
                                <th>وضعیت</th>
                                <th>برای</th>
                                <th>تعداد پاسخ ها</th>
                                <th>کاربر</th>
                                <th>تاریخ ساخت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ \Illuminate\Support\Str::limit($comment->body,10) }}</td>
                                    <td>
                                        <span id="statusBadge{{$comment->id}}" class="badge badge-primary">
                                            @lang($comment->status)
                                        </span>
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($comment->parent?->body,10) }}</td>
                                    <td>{{ $comment->children->count() }}</td>
                                    <td>{{ $comment->user?->name }}</td>
                                    <td>{{ Helper::convertEnglishToPersian(jdate($comment->created_at)->format('Y-m-d')) }}</td>
                                    <td>
                                        <div class="row">
                                            <button type="button"
                                                    data-url="{{route('comments.change.status',$comment->id)}}"
                                                    onclick="changeStatus(this,{{$comment}})"
                                                    class="btn @if($comment->status === 'active') btn-dark @else btn-success @endif ml-1"
                                                    title="تغییر وضعیت">
                                                <i class="@if($comment->status === 'active') fa fa-times @else fa fa-check @endif"></i>
                                            </button>
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
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
                        {{ $comments->links() }}
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
            console.log(category)
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
