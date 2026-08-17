{{-- Portfolio card — text-only (no images per design choice) --}}
@php
    $isAr = app()->getLocale() === 'ar';
    // A project whose site has gone down stays in the portfolio as proof of work, but the
    // card must not send anyone to a dead URL — so it renders as a div, not a link.
    $khOffline = !empty($project['offline']);
    $khTag = $khOffline ? 'div' : 'a';
@endphp
<div class="col-lg-4 col-md-6">
    <{{ $khTag }} @if(!$khOffline) href="{{ $project['url'] }}" target="_blank" rel="noopener" @endif class="pf-card ks-fadeup{{ $khOffline ? ' pf-card--offline' : '' }}">
        <div class="pf-card__top">
            <span class="pf-card__cat">{{ $project['category'] }}</span>
            @if($khOffline)
                <span class="pf-card__off"><i class="fas fa-circle-minus"></i> {{ $isAr ? 'غير متاح حاليا' : 'Currently offline' }}</span>
            @elseif(!empty($project['featured']))
                <span class="pf-card__feat"><i class="fas fa-star"></i> {{ $isAr ? 'مميّز' : 'Featured' }}</span>
            @endif
        </div>
        <h3 class="pf-card__title">{{ $project['title'] }}</h3>
        <p class="pf-card__sum">{{ $project['summary'] }}</p>
        @if(!empty($project['tech']))
            <div class="pf-card__tech">
                @foreach(array_slice($project['tech'], 0, 5) as $t)<span>{{ $t }}</span>@endforeach
            </div>
        @endif
        <div class="pf-card__foot">
            <span class="pf-card__role">{{ $project['role'] }}</span>
            @if($khOffline)
                <span class="pf-card__visit pf-card__visit--off">{{ $isAr ? 'الموقع متوقف حاليا' : 'Site is offline' }}</span>
            @else
                <span class="pf-card__visit">{{ $isAr ? 'زر الموقع' : 'Visit site' }} <i class="fas fa-external-link-alt"></i></span>
            @endif
        </div>
    </{{ $khTag }}>
</div>
