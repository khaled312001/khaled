@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1>{{ __('site.page_gallery_h1') }}</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
                        </li>
                        <li class="active">
                            {{ __('site.page_gallery_h1') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Gallery Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    <img src="{{ asset('images/1710766541-portfolio-grid-img-1.jpg') }}" alt="Gallery" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Gallery Section End //-->
@endsection

