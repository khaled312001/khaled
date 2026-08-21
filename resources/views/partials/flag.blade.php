{{-- One country flag. Pan-Arab is not a country and has no flag, so it gets a globe.
     Never render country_flag directly: it is an emoji, and the regional-indicator
     pairs behind it have no glyph on Windows — they show as bare letters. --}}
@if(!empty($p['country_code']) && $p['country_code'] !== 'arab')<span class="fi fi-{{ $p['country_code'] }}" aria-hidden="true"></span>@else<i class="fas fa-globe" aria-hidden="true"></i>@endif
