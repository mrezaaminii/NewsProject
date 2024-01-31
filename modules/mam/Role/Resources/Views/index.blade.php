@extends('Panel::layouts.master')

@php
    use App\Helper\Helper;
@endphp

@section('title', 'لیست مقام ها')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{ route('roles.create') }}" class="arrow-none btn btn-primary text-white"
                           aria-expanded="false">
                            ساخت مقام جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی مقام ها</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>عنوان مقام</th>
                                <th>دسترسی مقام</th>
                                <th>تاریخ ساخت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                        <span id="statusBadge{{$role->id}}" class="badge badge-primary">
                                            @lang($permission->name)
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>{{ Helper::convertEnglishToPersian(jdate($role->created_at)->format('Y-m-d')) }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning" title="ویرایش"><i class="fa fa-pen"></i></a>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
                        {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
