@extends('layouts.app')

@section('title', 'Careers')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1>{{ __('site.page_careers_h1') }}</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
                        </li>
                        <li class="active">
                            {{ __('site.page_careers_h1') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Careers Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Join Our Team</h2>
            </div>
        </div>
    </div>
</section>
<!--// Careers Section End //-->
@endsection

