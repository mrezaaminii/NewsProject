@extends('Panel::layouts.master')

@section('title', 'ویرایش مقام'.$role->name)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش مقام</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('roles.update',$role->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="name">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name',$role->name) }}" id="name" name="name"
                                                   placeholder="عنوان مقام را وارد کنید">
                                            @error('name')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <label class="col-form-label">
                                        دسترسی ها
                                    </label>
                                    @foreach($permissions as $key => $permission)
                                        <div class="form-group">
                                            <div class="">
                                                <input type="checkbox" name="permissions[]" id="permission{{$loop->iteration}}" class="checkbox checkbox-primary" value="{{$permission->name}}"
                                                @if($role->hasPermissionTo($permission)) checked @endif>
                                                <label for="permission{{$loop->iteration}}">@lang($permission->name)</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('permissions.'.$key)
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
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
