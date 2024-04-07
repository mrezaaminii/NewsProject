@extends('Panel::layouts.master')

@section('title', 'ویرایش تبلیغ '.$advertising->title)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش تبلیغ جدید</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('advertising.update',$advertising->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title',$advertising->title) }}" id="title" name="title"
                                                   placeholder="عنوان تبلیغ را وارد کنید">
                                            @error('title')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="keywords">لینک (اجباری نیست)</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('link') is-invalid @enderror"
                                                   value="{{ old('link',$advertising->link) }}" id="link" name="link"
                                                   placeholder="لینک تبلیغ را وارد کنید">
                                            @error('link')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="type">مکان تبلیغ</label>
                                        <div class="col-sm-10">
                                            <select name="location"
                                                    class="form-control @error('location') is-invalid @enderror">
                                                @foreach(\mam\Advertising\Models\Advertising::$locations as $location)
                                                    <option value="{{ $location }}" @if(old('location',$advertising->location) === $location) selected @endif>@lang($location)</option>
                                                @endforeach
                                            </select>
                                            @error('location')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="image">تصویر تبلیغ</label>
                                        <div class="col-sm-10">
                                            <input type="file"
                                                   class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                            @error('image')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
