@extends('Home::layouts.master')

@section('title','صفحه اصلی')

@section('content')
    <main class="position-relative">
        @include('Home::portions.post-carausel',['vip_posts' => $homeRepository])
        <div class="container">
            <!--Ads-->
            @include('Home::portions.home-ads',['ads' => $advs_top])
            <!--Content-->
            <div class="row">
                <!-- sidebar-left -->
                @include('Home::portions.sidebar-right',['active_category' => $homeRepository])
                <!-- main content -->
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row">
                        @include('Home::portions.news-posts',['home_repo' => $homeRepository])
                        @include('Home::portions.sidebar-left',['active_category' => $homeRepository])
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
