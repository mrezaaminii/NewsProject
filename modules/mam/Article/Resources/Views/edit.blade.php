@extends('Panel::layouts.master')

@section('title', 'ویرایش دسته بندی')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش دسته بندی</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                @if (count($errors) > 0)
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('categories.update',$category->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title',$category->title) }}" id="title" name="title"
                                                   placeholder="عنوان دسته بندی را وارد کنید">
                                            @error('title')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="keyword">کلمات کلیدی (اجباری نیست)</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('keyword') is-invalid @enderror"
                                                   value="{{ old('keyword',$category->keyword) }}" id="keyword" name="keyword"
                                                   placeholder="کلمات کلیدی دسته بندی را وارد کنید">
                                            @error('keyword')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="keyword">وضعیت</label>
                                        <div class="col-sm-10">
                                            <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                @foreach(\mam\Category\Model\Category::$statuses as $status)
                                                    <option @if($status === $category->status) selected @endif value="{{ $status }}">@lang($status)</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="keyword">زیر دسته</label>
                                        <div class="col-sm-10">
                                            <select name="parent_id"
                                                    class="form-control @error('parent_id') is-invalid @enderror">
                                                @foreach($categories as $key => $cat)
                                                    <option @if($key === $category->parent_id) selected @endif value="{{ $key }}">{{ $cat }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="description">توضیحات (اجباری
                                            نیست)</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="description" id="description" rows="3"
                                                      placeholder="توضیحات دسته بندی را وارد کنید">{{ old('description',$category->description) }}</textarea>
                                        </div>
                                    </div>
                                    @error('description')
                                    <br>
                                    <div class="alert alert-danger">{{ $message }}</div>
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
