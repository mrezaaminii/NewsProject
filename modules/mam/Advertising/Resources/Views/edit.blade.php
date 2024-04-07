@extends('Panel::layouts.master')

@section('title', 'ویرایش مقاله')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش مقاله</h4>
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
                                      action="{{ route('articles.update',$article->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title',$article->title) }}" id="title" name="title"
                                                   placeholder="عنوان مقاله را وارد کنید">
                                            @error('title')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="keywords">کلمات کلیدی (اجباری نیست)</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('keywords') is-invalid @enderror"
                                                   value="{{ old('keywords',$article->keywords) }}" id="keywords" name="keywords"
                                                   placeholder="کلمات کلیدی مقاله را وارد کنید">
                                            @error('keywords')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="time_to_read">زمان برای خوانده شدن</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('time_to_read') is-invalid @enderror"
                                                   value="{{ old('time_to_read',$article->time_to_read) }}" id="time_to_read" name="time_to_read"
                                                   placeholder="زمان خواندن مقاله را وارد کنید">
                                            @error('time_to_read')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="status">وضعیت مقاله</label>
                                        <div class="col-sm-10">
                                            <select name="status"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                @foreach(\mam\Article\Models\Article::$statuses as $status)
                                                    <option value="{{ $status }}" @if(old('status',$article->status) === $status) selected @endif>@lang($status)</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="score">امتیاز مقاله</label>
                                        <div class="col-sm-10">
                                            <select name="score"
                                                    class="form-control @error('status') is-invalid @enderror">
                                                <option value="0" @if(old('score',$article->score) == 0) selected @endif>0</option>
                                                <option value="1" @if(old('score',$article->score) == 1) selected @endif>1</option>
                                                <option value="2" @if(old('score',$article->score) == 2) selected @endif>2</option>
                                                <option value="3" @if(old('score',$article->score) == 3) selected @endif>3</option>
                                                <option value="4" @if(old('score',$article->score) == 4) selected @endif>4</option>
                                                <option value="5" @if(old('score',$article->score) == 5) selected @endif>5</option>
                                                <option value="6" @if(old('score',$article->score) == 6) selected @endif>6</option>
                                                <option value="7" @if(old('score',$article->score) == 7) selected @endif>7</option>
                                                <option value="8" @if(old('score',$article->score) == 8) selected @endif>8</option>
                                                <option value="9" @if(old('score',$article->score) == 9) selected @endif>9</option>
                                                <option value="10" @if(old('score',$article->score) == 10) selected @endif>10</option>
                                            </select>
                                            @error('score')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="type">نوع مقاله</label>
                                        <div class="col-sm-10">
                                            <select name="type"
                                                    class="form-control @error('type') is-invalid @enderror">
                                                @foreach(\mam\Article\Models\Article::$types as $type)
                                                    <option value="{{ $type }}" @if(old('type',$article->type) === $type) selected @endif>@lang($type)</option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="category_id">دسته بندی</label>
                                        <div class="col-sm-10">
                                            <select name="category_id"
                                                    class="form-control @error('category_id') is-invalid @enderror">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if(old('category_id',$article->category_id) == $category->id) selected @endif>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="body">توضیحات مقاله</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="body" id="body" rows="3"
                                                      placeholder="توضیحات مقاله را وارد کنید">{{ old('body',$article->body) }}</textarea>
                                        </div>
                                        @error('body')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="description">توضیحات (اجباری
                                            نیست)</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="description" id="description" rows="3"
                                                      placeholder="توضیحات را وارد کنید">{{ old('description',$article->description) }}</textarea>
                                        </div>
                                        @error('description')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="image">تصویر مقاله</label>
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
