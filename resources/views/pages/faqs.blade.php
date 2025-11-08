@extends('layouts.app')

@section('title', 'FAQs')

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner text-center">
                    <h1>FAQs</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">
                            FAQs
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// FAQ Section Start //-->
<section class="section" id="faqsection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span>Faqs</span>
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="accordion-item">
                    <div class="accordion-item-header" id="accordionHeadingOne1">
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#accordionItemOne1" aria-expanded="false" aria-controls="accordionItemOne1" class="collapsed">
                            <i class="fas fa-question"></i>
                            <span>How Are The Packages Updated ?</span>
                        </a>
                    </div>
                    <div id="accordionItemOne1" class="collapse" aria-labelledby="accordionHeadingOne1">
                        <div class="accordion-body">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// FAQ Section End //-->
@endsection

