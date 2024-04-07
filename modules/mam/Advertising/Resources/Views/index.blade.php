@extends('Panel::layouts.master')

@php
    use App\Helper\Helper;
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'لیست تبلیغات')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{ route('advertising.create') }}" class="arrow-none btn btn-primary text-white"
                           aria-expanded="false">
                            ساخت تبلیغ جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی تبلیغات</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>عکس تبلیغ</th>
                                <th>عنوان تبلیغ</th>
                                <th>مکان</th>
                                <th>لینک</th>
                                <th>کاربر</th>
                                <th>تاریخ ساخت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($advss as $advs)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img style="max-width: 50px" src="{{ asset('storage'.DIRECTORY_SEPARATOR.$advs->imagePath) }}" alt="article-image">
                                    </td>
                                    <td>{{ $advs->title }}</td>
                                    <td>
                                        <a href="{{$advs->link}}">{{$advs->link}}</a>
                                    </td>
                                    <td>{{ $advs->location }}</td>
                                    <td>{{ $advs->user?->name }}</td>
                                    <td>{{ Helper::convertEnglishToPersian(jdate($advs->created_at)->format('Y-m-d')) }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('articles.edit', $advs->id) }}" class="btn btn-warning" title="ویرایش"><i class="fa fa-pen"></i></a>
                                            <button type="button"
                                                    data-url="{{route('articles.change.status',$advs->id)}}"
                                                    onclick="changeStatus(this,{{$advs}})"
                                                    class="btn @if($advs->status === 'active') btn-dark @elseif($advs->status === 'pending') btn-primary @else btn-success @endif ml-1"
                                                    title="تغییر وضعیت">
                                                <i class="@if($advs->status === 'active') fa fa-spinner @elseif($advs->status === 'pending') fa fa-times @else fa fa-check @endif"></i>
                                            </button>
                                            <form action="{{ route('articles.destroy', $advs->id) }}" method="POST">
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
                        {{ $advss->links() }}
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
        function changeStatus(element,article){
        const statusBadge = document.getElementById('statusBadge' + article.id);
            $.ajax({
                url: element.getAttribute('data-url'),
                type:"GET",
                success: (response) => {
                    if(response.status === 'active') {
                        statusBadge.innerText = 'فعال';
                        element.classList.remove('btn-success');
                        element.classList.add('btn-dark');
                        element.firstElementChild.className = "fa fa-spinner"
                    }else if (response.status === 'pending'){
                        statusBadge.innerText = 'در حال پردازش';
                        element.classList.remove('btn-dark');
                        element.classList.add('btn-primary');
                        element.firstElementChild.className = "fa fa-times";
                    }else{
                        statusBadge.innerText = 'غیر فعال';
                        element.classList.remove('btn-primary');
                        element.classList.add('btn-success');
                        element.firstElementChild.className = "fa fa-check"
                    }
                }
            })
        }
    </script>
@endsection
