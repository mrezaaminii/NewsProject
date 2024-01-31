@extends('Panel::layouts.master')

@section('title', 'ساخت مقام جدید')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ساخت مقام جدید</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('categories.store') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title') }}" id="title" name="title"
                                                   placeholder="عنوان مقام را وارد کنید">
                                            @error('title')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <label class="col-form-label">
                                        دسترسی ها
                                    </label>
                                    @foreach($permissions as $permission)
                                    <div class="form-group">
                                        <div class="">
                                            <input type="checkbox" name="permissions[]" id="permission{{$loop->iteration}}" class="checkbox checkbox-primary">
                                            <label for="permission{{$loop->iteration}}">@lang($permission->name)</label>
                                        </div>
                                    </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-outline-success">ذخیره</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
