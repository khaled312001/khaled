@extends('layouts.app')

@section('title', 'Plans')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1>Plans</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">
                            Plans
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Plans Section Start //-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Plans</h2>
            </div>
        </div>
    </div>
</section>
<!--// Plans Section End //-->
@endsection

