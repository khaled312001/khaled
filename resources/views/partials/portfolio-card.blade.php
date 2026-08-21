{{-- Portfolio card.

     The whole card links to the case study on this site, not out to the client's
     domain. Every card used to be an outbound link, which meant the 39 case-study
     pages had no internal links pointing at them at all — uncrawlable in practice,
     and every click was a click off the site. The live site is still one tap away,
     as a separate link in the footer row.

     The screenshot frame shows the top of the page and pans through the whole
     capture on hover or when the card scrolls into view. The pan distance comes
     from ScreenshotService, which knows each image's real aspect ratio, so no
     layout measurement happens in the browser. --}}
@php
    $isAr      = app()->getLocale() === 'ar';
    $khOffline = !empty($project['offline']);
    $khCase    = route('portfolio.show', $project['slug']);
    $khShot    = \App\Services\ScreenshotService::get($project['slug']);
@endphp
<div class="col-lg-4 col-md-6">
    <div class="pf-card ks-fadeup{{ $khOffline ? ' pf-card--offline' : '' }}">
        <a class="pf-card__hit" href="{{ $khCase }}" aria-label="{{ $isAr ? 'دراسة حالة: ' : 'Case study: ' }}{{ $project['title'] }}"></a>

        @if($khShot)
            <figure class="pf-shot" style="--shift:{{ $khShot['shift'] }};--dur:{{ $khShot['dur'] }}">
                <img src="{{ asset($khShot['src']) }}"
                     width="{{ $khShot['w'] }}" height="{{ $khShot['h'] }}"
                     loading="lazy" decoding="async"
                     alt="{{ $isAr
                        ? 'لقطة شاشة للصفحة الرئيسية لموقع ' . $project['title'] . ' — ' . $project['category'] . ' من تطوير خالد أحمد بـ ' . implode(' و', array_slice($project['tech'], 0, 3))
                        : $project['title'] . ' homepage screenshot — ' . $project['category'] . ' site built by Khaled Ahmed with ' . implode(', ', array_slice($project['tech'], 0, 3)) }}">
            </figure>
        @else
            <div class="pf-shot pf-shot--none" aria-hidden="true"><i class="fas fa-link-slash"></i></div>
        @endif

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
            <span class="pf-card__visit">{{ $isAr ? 'دراسة الحالة' : 'Read case study' }} <i class="fas fa-arrow-{{ $isAr ? 'left' : 'right' }}"></i></span>
            @if($khOffline)
                <span class="pf-card__role">{{ $isAr ? 'الموقع متوقف' : 'Site offline' }}</span>
            @else
                <a class="pf-card__ext" href="{{ $project['url'] }}" target="_blank" rel="noopener nofollow"
                   aria-label="{{ $isAr ? 'زيارة موقع ' : 'Visit the live site for ' }}{{ $project['title'] }}">
                    {{ $isAr ? 'الموقع' : 'Live site' }} <i class="fas fa-external-link-alt"></i>
                </a>
            @endif
        </div>
    </div>
</div>
