@extends('Panel::layouts.master')

@section('title', 'لیست کاربران')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{ route('users.create') }}" class="arrow-none btn btn-primary text-white"
                           aria-expanded="false">
                            ساخت کاربر جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی کاربران</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>وضعیت تایید ایمیل</th>
                                <th>تاریخ عضویت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                        <span class="badge badge-{{ $user->cssStatusEmailVerifiedAt() }}">
                                                {{ $user->textStatusEmailVerifiedAt() }}
                                            </span>
                                    </td>
                                    <td>{{ convertEnglishToPersian(jdate($user->created_at)->format('datetime')) }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">ویرایش</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-danger ml-1">حذف</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
