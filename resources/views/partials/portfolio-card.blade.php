{{-- Single project card — used by both grouped-by-country and flat-grid layouts in pages.portfolios --}}
<div class="col-lg-4 col-md-6">
    <article class="project-card" tabindex="0">
        <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="project-img" aria-label="Visit {{ $project['title'] }}">
            <img src="{{ asset('images/' . $project['image']) }}"
                 alt="{{ $project['title'] }}"
                 loading="lazy" decoding="async"
                 onerror="this.classList.add('img-failed'); this.removeAttribute('alt'); this.parentElement.classList.add('has-failed-img');"
                 data-title="{{ $project['title'] }}"
                 data-cat="{{ $project['category'] }}">
            <span class="img-fallback" aria-hidden="true">
                <span class="img-fallback-title">{{ $project['title'] }}</span>
                <span class="img-fallback-cat">{{ $project['category'] }}</span>
            </span>
            <span class="preview-mask"></span>
            @if(!empty($project['featured']))
                <span class="featured-badge"><i class="fa fa-star" style="font-size:10px;"></i> {{ app()->getLocale() === 'ar' ? 'مميّز' : 'Featured' }}</span>
            @endif
            <span class="scroll-hint"><i class="fas fa-arrow-down"></i> {{ app()->getLocale() === 'ar' ? 'مرّر لتصفّح' : 'Hover to scroll' }}</span>
        </a>
        <div class="project-body">
            <div class="cat">{{ $project['category'] }}</div>
            <h3>{{ $project['title'] }}</h3>
            <p class="summary">{{ $project['summary'] }}</p>
            <div class="tech-stack">
                @foreach($project['tech'] as $t)
                    <span>{{ $t }}</span>
                @endforeach
            </div>
            <div class="actions">
                <a href="{{ $project['url'] }}" target="_blank" rel="noopener" class="visit">
                    {{ app()->getLocale() === 'ar' ? 'زر الموقع المباشر' : 'Visit Live Site' }} <i class="fa fa-external-link-alt" style="font-size:11px;"></i>
                </a>
                <span class="role">{{ $project['role'] }}</span>
            </div>
        </div>
    </article>
</div>
