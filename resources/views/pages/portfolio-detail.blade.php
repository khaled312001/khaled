@extends('layouts.app')

@section('title', $portfolio['title'] ?? 'Portfolio Detail')

@section('content')
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>{{ $portfolio['title'] ?? 'Portfolio' }}</h1>
                    <ul class="breadcrumb-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('portfolios') }}">Portfolio</a></li>
                        <li class="active">{{ $portfolio['title'] ?? 'Portfolio' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="portfolio-single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(isset($portfolio['images']) && count($portfolio['images']) > 0)
                <div class="owl-carousel owl-theme" id="portfolioCarousel">
                    @foreach($portfolio['images'] as $image)
                    <div class="item">
                        <img src="{{ asset('images/projects/' . $image) }}" alt="portfolio image" class="img-fluid">
                    </div>
                    @endforeach
                </div>
                @else
                @if(isset($portfolio['image']))
                <div class="portfolio-single-image">
                    <img src="{{ asset('images/projects/' . $portfolio['image']) }}" alt="portfolio image" class="img-fluid">
                </div>
                @endif
                @endif

                <div class="portfolio-single-inner">
                    <h4>{{ $portfolio['title'] ?? 'Portfolio Item' }}</h4>
                    <div class="author-meta">
                        <a href="#"><span class="far fa-calendar-alt"></span>{{ $portfolio['date'] ?? '2024' }}</a>
                        <a href="#"><span class="far fa-bookmark"></span>{{ $portfolio['category'] ?? 'Category' }}</a>
                    </div>
                    <p>{!! $portfolio['description'] ?? '' !!}</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="widget-sidebar">
                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Project Details</h5>
                        <div class="sidebar-details-list">
                            <ul>
                                <li><h6>Project<span>{{ $portfolio['title'] ?? 'Project' }}</span></h6></li>
                                <li><h6>Category<span>{{ $portfolio['category'] ?? 'Category' }}</span></h6></li>
                                @if(isset($portfolio['client']))
                                <li><h6>Client<span>{{ $portfolio['client'] }}</span></h6></li>
                                @endif
                                @if(isset($portfolio['duration']))
                                <li><h6>Duration<span>{{ $portfolio['duration'] }}</span></h6></li>
                                @endif
                                @if(isset($portfolio['tech']))
                                <li><h6>Tech Stack<span>{{ $portfolio['tech'] }}</span></h6></li>
                                @endif
                                @if(isset($portfolio['link']))
                                <li><h6>Website<span><a href="{{ $portfolio['link'] }}" target="_blank">Visit</a></span></h6></li>
                                @endif
                                @if(isset($portfolio['repo']))
                                <li><h6>Repository<span><a href="{{ $portfolio['repo'] }}" target="_blank">GitHub</a></span></h6></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-widgets">
                        <h5 class="inner-header-title">Copy URL</h5>
                        <ul class="sidebar-share clearfix">
                            <li>
                                <div style="display:none;" id="hiddenURLDiv"></div>
                                <a href="#" onclick="copyPageURL(); return false;"><i class="fa fa-link"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function copyPageURL() {
        var url = window.location.href;
        var tempInput = document.createElement("input");
        tempInput.value = url;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        alert("URL copied to clipboard!");
    }

    jQuery(document).ready(function($) {
        if ($('#portfolioCarousel').length && $('#portfolioCarousel').children().length > 0) {
            $('#portfolioCarousel').owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: false,
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
            });
        }
    });
</script>
@endpush
