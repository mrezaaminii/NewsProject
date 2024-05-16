@extends('Panel::layouts.master')

@section('title', 'پنل کاربری')

@section('content')
    <div class="container-fluid">
        @include('Panel::sections.counter')
        @include('Panel::sections.latest-authors')
        @include('Panel::sections.latest-articles')
    </div>
@endsection
