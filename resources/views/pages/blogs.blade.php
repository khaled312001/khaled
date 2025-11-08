@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1>Blogs</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">
                            Blogs
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Blog Section Start //-->
<section class="section pb-minus-76" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-heading-left">
                    <span>Blog</span>
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <a href="#">
                            <img src="{{ asset('images/1710768229-blog-img-1.jpg') }}" alt="Blog image" class="img-fluid">
                        </a>
                    </div>
                    <div class="blog-body">
                        <div class="blog-meta">
                            <a href="#">
                                <span><i class="far fa-user"></i> Super-Admin User </span>
                            </a>
                            <a href="#">
                                <span><i class="far fa-bookmark"></i>Creative</span>
                            </a>
                        </div>
                        <h5>
                            <a href="#">How To Create A Design Brief</a>
                        </h5>
                        <p>It is a long established fact that a reader will be distracted [..]</p>
                        <a href="#" class="blog-link">
                            Read More
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Blog Section End //-->
@endsection

