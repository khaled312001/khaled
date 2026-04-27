@extends('layouts.app')

@section('title', 'Contact Khaled Ahmed — Free 30-Min Consultation | Web Developer')
@section('description', 'Hire Khaled Ahmed — senior full stack web developer. Free 30-minute consultation, 24-hour response. Email khaledahmedhaggagy@gmail.com or call +20 120 459 3124. Based in Cairo, working worldwide.')
@section('keywords', 'contact web developer, hire full stack developer, web developer consultation, Khaled Ahmed contact, Laravel developer hire, freelance web developer Egypt, web development quote')
@section('canonical', 'https://khaledahmed.net/contact')
@section('og_image', asset('images/logo.png'))
@section('og_image_alt', 'Contact Khaled Ahmed - Full-Stack Developer')

@push('styles')
<style>
    .form-label-modern { display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px; letter-spacing: 0.2px; }
    .form-label-modern .req { color: #dc2626; margin-left: 2px; }
    .form-label-modern .optional { color: #94a3b8; font-weight: 400; font-size: 12px; }
    .form-control-modern { width: 100%; padding: 12px 16px 12px 44px; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #fff; color: #0f172a; font-size: 15px; transition: border-color 0.15s, box-shadow 0.15s; appearance: none; -webkit-appearance: none; }
    .form-control-modern:focus { border-color: var(--main-color); outline: none; box-shadow: 0 0 0 3px rgba(37,99,235,0.12); }
    .form-control-modern:hover:not(:focus) { border-color: #cbd5e1; }
    select.form-control-modern { padding-right: 40px; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%2364748b' d='M6 8L0 0h12z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 16px center; }
    textarea.form-control-modern { padding-top: 14px; resize: vertical; min-height: 130px; }
    .form-group-modern { position: relative; }
    .form-group-modern .form-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 14px; pointer-events: none; }
    .form-group-modern .form-icon-textarea { top: 18px; transform: none; }
    .form-hint { display: block; margin-top: 6px; font-size: 12.5px; color: #64748b; }
    .form-check-modern { display: flex; align-items: flex-start; gap: 10px; padding: 12px 14px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; }
    .form-check-modern .form-check-input { margin-top: 3px; cursor: pointer; }
    .form-check-modern .form-check-label { font-size: 14px; color: #334155; cursor: pointer; }
    .btn-enhanced { padding: 14px 32px !important; font-size: 15px !important; font-weight: 700 !important; border-radius: 10px !important; }
    @media (max-width: 768px) {
        .form-control-modern { font-size: 16px; /* prevent iOS zoom */ padding: 11px 14px 11px 40px; }
        .form-group-modern .form-icon { left: 14px; }
    }
</style>
@endpush

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "url": "{{ url('/contact') }}",
    "name": "Contact Khaled Ahmed — Senior Full Stack Web Developer",
    "mainEntity": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "telephone": "+20-1204593124",
        "email": "khaledahmedhaggagy@gmail.com",
        "url": "https://khaledahmed.net",
        "address": {"@type":"PostalAddress","addressLocality":"Cairo","addressCountry":"EG"},
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ]
    }
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"{{ url('/') }}"},
        {"@type":"ListItem","position":2,"name":"Contact","item":"{{ url('/contact') }}"}
    ]
}
</script>
@endsection

@section('content')
<!--// Breadcrumb Section Start //-->
<section class="breadcrumb-section section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb-inner">
                    <h1>{{ __('site.page_contact_h1') }}</h1>
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
                        </li>
                        <li class="active">
                            {{ __('site.page_contact_h1') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Breadcrumb Section End //-->

<!--// Contact Section Start //-->
<section class="section contact-section-enhanced">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="section-heading-left wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.1s">
                    <span class="section-badge"><i class="fas fa-comments"></i> {{ __('site.contact') }}</span>
                    <h2 class="section-title-h2">{{ __('site.contact_h2') }}</h2>
                    <p class="mt-3">{{ __('site.contact_subtitle') }}</p>
                </div>
                <div class="contact-info-enhanced">
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="body">
                            <h5>{{ __('site.location') }}</h5>
                            <p>{{ __('site.location_value') }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="body">
                            <h5>{{ __('site.email') }}</h5>
                            <p><a href="mailto:khaledahmedhaggagy@gmail.com">khaledahmedhaggagy@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.4s">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="body">
                            <h5>{{ __('site.phone_whatsapp') }}</h5>
                            <p>
                                <a href="tel:+201204593124">+20 120 459 3124</a> /
                                <a href="tel:+201010254819">+20 101 025 4819</a>
                            </p>
                        </div>
                    </div>
                    <div class="contact-info-item wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="body">
                            <h5>{{ __('site.response_time_label') }}</h5>
                            <p>{{ __('site.response_time_value') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-enhanced wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
                    <h4 class="form-title">{{ app()->getLocale() === 'ar' ? 'أرسل رسالة' : 'Send a Message' }}</h4>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form-modern" id="advancedContactForm">
                        @csrf

                        {{-- Honeypot (hidden from humans, bots fill it) --}}
                        <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px;opacity:0;height:0;width:0;" aria-hidden="true">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.full_name') }} <span class="req">*</span></label>
                                <div class="form-group-modern">
                                    <input type="text" class="form-control-modern" name="name" value="{{ old('name') }}" placeholder="John Smith" required minlength="2">
                                    <i class="fas fa-user form-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.your_email') }} <span class="req">*</span></label>
                                <div class="form-group-modern">
                                    <input type="email" class="form-control-modern" name="email" value="{{ old('email') }}" placeholder="you@company.com" required>
                                    <i class="fas fa-envelope form-icon"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.phone_optional') }} <span class="optional">{{ __('site.optional') }}</span></label>
                                <div class="form-group-modern">
                                    <input type="tel" class="form-control-modern" name="phone" value="{{ old('phone') }}" placeholder="+1 555 123 4567">
                                    <i class="fas fa-phone form-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.company_optional') }} <span class="optional">{{ __('site.optional') }}</span></label>
                                <div class="form-group-modern">
                                    <input type="text" class="form-control-modern" name="company" value="{{ old('company') }}" placeholder="Acme Inc.">
                                    <i class="fas fa-building form-icon"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.project_type') }} <span class="req">*</span></label>
                                <div class="form-group-modern">
                                    <select class="form-control-modern" name="project_type" required>
                                        <option value="" disabled {{ old('project_type') ? '' : 'selected' }}>{{ __('site.select_project_type') }}</option>
                                        <option value="Custom Web Application" {{ old('project_type') === 'Custom Web Application' ? 'selected' : '' }}>{{ __('site.pt_custom') }}</option>
                                        <option value="E-commerce / Online Store" {{ old('project_type') === 'E-commerce / Online Store' ? 'selected' : '' }}>{{ __('site.pt_ecom') }}</option>
                                        <option value="SaaS Platform" {{ old('project_type') === 'SaaS Platform' ? 'selected' : '' }}>{{ __('site.pt_saas') }}</option>
                                        <option value="Marketing / Business Website" {{ old('project_type') === 'Marketing / Business Website' ? 'selected' : '' }}>{{ __('site.pt_marketing') }}</option>
                                        <option value="Laravel Project" {{ old('project_type') === 'Laravel Project' ? 'selected' : '' }}>{{ __('site.pt_laravel') }}</option>
                                        <option value="React / Next.js Project" {{ old('project_type') === 'React / Next.js Project' ? 'selected' : '' }}>{{ __('site.pt_react') }}</option>
                                        <option value="API / Backend" {{ old('project_type') === 'API / Backend' ? 'selected' : '' }}>{{ __('site.pt_api') }}</option>
                                        <option value="Fix / Maintain Existing Site" {{ old('project_type') === 'Fix / Maintain Existing Site' ? 'selected' : '' }}>{{ __('site.pt_fix') }}</option>
                                        <option value="SEO / Performance Optimization" {{ old('project_type') === 'SEO / Performance Optimization' ? 'selected' : '' }}>{{ __('site.pt_seo') }}</option>
                                        <option value="Hosting / DevOps Help" {{ old('project_type') === 'Hosting / DevOps Help' ? 'selected' : '' }}>{{ __('site.pt_hosting') }}</option>
                                        <option value="Programming Training" {{ old('project_type') === 'Programming Training' ? 'selected' : '' }}>{{ __('site.pt_training') }}</option>
                                        <option value="Other / Not sure yet" {{ old('project_type') === 'Other / Not sure yet' ? 'selected' : '' }}>{{ __('site.pt_other') }}</option>
                                    </select>
                                    <i class="fas fa-briefcase form-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.estimated_budget') }} <span class="optional">{{ __('site.optional') }}</span></label>
                                <div class="form-group-modern">
                                    <select class="form-control-modern" name="budget">
                                        <option value="" {{ old('budget') ? '' : 'selected' }}>{{ __('site.prefer_not_say') }}</option>
                                        <option value="Under $500" {{ old('budget') === 'Under $500' ? 'selected' : '' }}>Under $500</option>
                                        <option value="$500 – $2,000" {{ old('budget') === '$500 – $2,000' ? 'selected' : '' }}>$500 – $2,000</option>
                                        <option value="$2,000 – $5,000" {{ old('budget') === '$2,000 – $5,000' ? 'selected' : '' }}>$2,000 – $5,000</option>
                                        <option value="$5,000 – $15,000" {{ old('budget') === '$5,000 – $15,000' ? 'selected' : '' }}>$5,000 – $15,000</option>
                                        <option value="$15,000 – $50,000" {{ old('budget') === '$15,000 – $50,000' ? 'selected' : '' }}>$15,000 – $50,000</option>
                                        <option value="$50,000+" {{ old('budget') === '$50,000+' ? 'selected' : '' }}>$50,000+</option>
                                    </select>
                                    <i class="fas fa-dollar-sign form-icon"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.timeline') }} <span class="optional">{{ __('site.optional') }}</span></label>
                                <div class="form-group-modern">
                                    <select class="form-control-modern" name="timeline">
                                        <option value="" {{ old('timeline') ? '' : 'selected' }}>{{ __('site.flexible_timeline') }}</option>
                                        <option value="ASAP / Urgent" {{ old('timeline') === 'ASAP / Urgent' ? 'selected' : '' }}>{{ __('site.tl_asap') }}</option>
                                        <option value="Within 2 weeks" {{ old('timeline') === 'Within 2 weeks' ? 'selected' : '' }}>{{ __('site.tl_2w') }}</option>
                                        <option value="1 – 2 months" {{ old('timeline') === '1 – 2 months' ? 'selected' : '' }}>{{ __('site.tl_1m') }}</option>
                                        <option value="2 – 6 months" {{ old('timeline') === '2 – 6 months' ? 'selected' : '' }}>{{ __('site.tl_2m') }}</option>
                                        <option value="Just exploring" {{ old('timeline') === 'Just exploring' ? 'selected' : '' }}>{{ __('site.tl_explore') }}</option>
                                    </select>
                                    <i class="fas fa-clock form-icon"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label-modern">{{ __('site.how_did_you_hear') }} <span class="optional">{{ __('site.optional') }}</span></label>
                                <div class="form-group-modern">
                                    <select class="form-control-modern" name="source">
                                        <option value="" {{ old('source') ? '' : 'selected' }}>{{ __('site.select_one') }}</option>
                                        <option value="Google Search" {{ old('source') === 'Google Search' ? 'selected' : '' }}>{{ __('site.src_google') }}</option>
                                        <option value="LinkedIn" {{ old('source') === 'LinkedIn' ? 'selected' : '' }}>{{ __('site.src_linkedin') }}</option>
                                        <option value="GitHub" {{ old('source') === 'GitHub' ? 'selected' : '' }}>{{ __('site.src_github') }}</option>
                                        <option value="Referral" {{ old('source') === 'Referral' ? 'selected' : '' }}>{{ __('site.src_referral') }}</option>
                                        <option value="Blog Article" {{ old('source') === 'Blog Article' ? 'selected' : '' }}>{{ __('site.src_blog') }}</option>
                                        <option value="Other" {{ old('source') === 'Other' ? 'selected' : '' }}>{{ __('site.src_other') }}</option>
                                    </select>
                                    <i class="fas fa-bullhorn form-icon"></i>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label-modern">{{ __('site.subject') }} <span class="req">*</span></label>
                                <div class="form-group-modern">
                                    <input type="text" class="form-control-modern" name="subject" value="{{ old('subject') }}" required>
                                    <i class="fas fa-tag form-icon"></i>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label-modern">{{ __('site.tell_about_project') }} <span class="req">*</span></label>
                                <div class="form-group-modern">
                                    <textarea class="form-control-modern" name="message" rows="5" required>{{ old('message') }}</textarea>
                                    <i class="fas fa-comment form-icon form-icon-textarea"></i>
                                </div>
                                <small class="form-hint">{{ __('site.message_hint') }}</small>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check-modern">
                                    <input class="form-check-input" type="checkbox" name="nda_required" id="ndaCheck" value="1" {{ old('nda_required') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ndaCheck">
                                        {{ __('site.nda_request') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12 d-flex flex-wrap gap-3 align-items-center">
                                <button type="submit" class="primary-btn btn-enhanced">
                                    <span class="text">{{ __('site.send_brief') }}</span>
                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                </button>
                                <small class="text-muted">
                                    <i class="fas fa-shield-alt me-1"></i>
                                    {{ __('site.reply_within_24') }}
                                </small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// Contact Section End //-->
@endsection

