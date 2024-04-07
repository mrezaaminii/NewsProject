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
                                        <a href="https://{{$advs->link}}" target="_blank">{{$advs->link}}</a>
                                    </td>
                                    <td>{{ $advs->location }}</td>
                                    <td>{{ $advs->user?->name }}</td>
                                    <td>{{ Helper::convertEnglishToPersian(jdate($advs->created_at)->format('Y-m-d')) }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('articles.edit', $advs->id) }}" class="btn btn-warning" title="ویرایش"><i class="fa fa-pen"></i></a>
                                            <form action="{{ route('advertising.destroy', $advs->id) }}" method="POST">
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
