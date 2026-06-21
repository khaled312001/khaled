{{-- Portfolio card — text-only (no images per design choice) --}}
@php $isAr = app()->getLocale() === 'ar'; @endphp
<div class="col-lg-4 col-md-6">
    <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="pf-card ks-fadeup">
        <div class="pf-card__top">
            <span class="pf-card__cat">{{ $project['category'] }}</span>
            @if(!empty($project['featured']))
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
            <span class="pf-card__visit">{{ $isAr ? 'زر الموقع' : 'Visit site' }} <i class="fas fa-external-link-alt"></i></span>
        </div>
    </a>
</div>
