<?php $isAr = app()->getLocale() === 'ar'; ?>

<?php $__env->startSection('title', app()->getLocale() === 'ar' ? 'ابدأ مشروعك — عرض سعر مفصّل خلال 48 ساعه' : 'Start a Project — Get a Scoped Quote in 48 Hours'); ?>
<?php $__env->startSection('description', app()->getLocale() === 'ar' ? 'احك لي المشكله لا المواصفات. تحصل على تقدير مفصّل وجدول زمني وسعر ثابت خلال يومي عمل. القاهره بتوقيت GMT+2.' : 'Tell me the problem, not the spec. You get a scoped estimate, a timeline and a fixed price within two working days. Cairo GMT+2.'); ?>
<?php $__env->startSection('keywords', 'contact web developer, hire Khaled Ahmed, free web development consultation, project quote, تواصل مع مطور ويب, طلب عرض سعر'); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"ContactPage","name":"Contact Khaled Ahmed","url":"https://khaledahmed.net/contact","mainEntity":{"@type":"Person","name":"Khaled Ahmed","email":"khaledahmedhaggagy@gmail.com","telephone":"+201204593124","jobTitle":"Senior Full Stack Web Developer","address":{"@type":"PostalAddress","addressLocality":"Cairo","addressCountry":"EG"}}}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .ct-hero { padding: calc(var(--nav-h) + var(--sp-7)) 0 var(--sp-7); position: relative; overflow: hidden; }
    .ct-hero::before { content:''; position:absolute; inset:0; background: var(--gradient-bg); pointer-events: none; }
    .ct-hero > .container { position: relative; z-index: 1; }
    .ct-hero .lead { color: var(--text-2); font-size: 17.5px; max-width: 720px; }

    .ct-card { padding: 32px; background: linear-gradient(160deg, var(--surface-1) 0%, var(--bg-2) 100%); border: 1px solid var(--border-1); border-radius: var(--r-lg); }
    .ct-info-item { display: flex; gap: 14px; padding: 16px 18px; background: var(--surface-1); border: 1px solid var(--border-1); border-radius: var(--r-md); margin-bottom: 12px; transition: border-color .2s ease, transform .2s ease; }
    .ct-info-item:hover { border-color: var(--border-3); transform: translateY(-2px); }
    .ct-info-item__ico { flex-shrink: 0; width: 44px; height: 44px; border-radius: var(--r-sm); display: grid; place-items: center; background: rgba(96,165,250,0.10); color: var(--brand); font-size: 18px; border: 1px solid rgba(96,165,250,0.20); }
    .ct-info-item .lbl { font-size: 12px; color: var(--text-3); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
    .ct-info-item .val { font-size: 15px; color: var(--text-1); font-weight: 600; }
    .ct-info-item .val a { color: inherit; text-decoration: none; }
    .ct-info-item .val a:hover { color: var(--brand); }

    /* Form */
    .ct-form .form-row { margin-bottom: 16px; }
    .ct-form label { display: block; font-size: 13px; color: var(--text-2); font-weight: 600; margin-bottom: 6px; }
    .ct-form label .req { color: var(--danger); }
    .ct-form .form-input,
    .ct-form .form-select,
    .ct-form .form-textarea {
        width: 100%;
        padding: 12px 14px;
        background: var(--bg-2);
        border: 1px solid var(--border-2);
        border-radius: var(--r-sm);
        color: var(--text-1);
        font-family: var(--font-sans);
        font-size: 14.5px;
        transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
    }
    .ct-form .form-input:focus,
    .ct-form .form-select:focus,
    .ct-form .form-textarea:focus { outline: none; border-color: var(--brand); background: var(--bg-2); box-shadow: 0 0 0 3px rgba(96,165,250,0.20); }
    .ct-form .form-input::placeholder, .ct-form .form-textarea::placeholder { color: var(--text-4); }
    .ct-form .form-textarea { resize: vertical; min-height: 130px; }
    .ct-form .form-select { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%2394a3b8' d='M8 11L3 6h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; padding-inline-end: 36px; }
    html[dir="rtl"] .ct-form .form-select { background-position: left 14px center; padding-inline-end: 14px; padding-inline-start: 36px; }
    .ct-form .form-check { display: flex; align-items: center; gap: 10px; padding: 12px 14px; background: rgba(96,165,250,0.05); border: 1px solid var(--border-1); border-radius: var(--r-sm); cursor: pointer; }
    .ct-form .form-check input { width: 18px; height: 18px; accent-color: var(--brand); cursor: pointer; }
    .ct-form .form-check label { margin: 0; cursor: pointer; color: var(--text-1); font-size: 14px; }
    .ct-alert { padding: 14px 18px; border-radius: var(--r-md); margin-bottom: 20px; font-size: 14.5px; }
    .ct-alert--success { background: rgba(52,211,153,0.10); border: 1px solid rgba(52,211,153,0.30); color: var(--success); }
    .ct-alert--error { background: rgba(248,113,113,0.10); border: 1px solid rgba(248,113,113,0.30); color: var(--danger); }
    .ct-alert ul { margin: 6px 0 0; padding-inline-start: 22px; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="ct-hero">
    <div class="container">
        <div class="d-inline-flex align-items-center gap-2 mb-3" style="font-size:13px;color:var(--text-3);">
            <a href="<?php echo e(route('home')); ?>" style="color:var(--text-2);text-decoration:none;"><?php echo e(__('site.home')); ?></a>
            <i class="fas fa-chevron-<?php echo e($isAr ? 'left' : 'right'); ?>" style="font-size:10px;color:var(--text-4);"></i>
            <span><?php echo e($isAr ? 'تواصل' : 'Contact'); ?></span>
        </div>
        <span class="ks-eyebrow"><span class="ks-dot"></span> <?php echo e($isAr ? 'متاح للرد خلال 24 ساعة' : 'Reply within 24 hours'); ?></span>
        <h1 class="mt-3"><?php echo e($isAr ? 'لنتحدث عن مشروعك' : 'Let us talk about your project'); ?></h1>
        <p class="lead"><?php echo e($isAr ? 'املأ النموذج التالي وسأرد عليك خلال 24 ساعة برأي صريح وعرض مكتوب. لا مكالمات مبيعات، ولا عقود معقدة.' : 'Fill the form below. I will respond within 24 hours with an honest assessment and a written quote. No sales calls, no complex contracts.'); ?></p>
    </div>
</section>

<section class="ks-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="ct-card">
                    <?php if(session('success')): ?>
                        <div class="ct-alert ct-alert--success"><i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="ct-alert ct-alert--error"><i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?></div>
                    <?php endif; ?>
                    <?php if($errors->any()): ?>
                        <div class="ct-alert ct-alert--error"><i class="fas fa-exclamation-circle"></i> <?php echo e($isAr ? 'يوجد أخطاء في النموذج:' : 'There are errors in the form:'); ?>

                            <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($err); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('contact.submit')); ?>" method="POST" class="ct-form" id="advancedContactForm">
                        <?php echo csrf_field(); ?>
                        
                        <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;top:-9999px;opacity:0;height:0;width:0;" aria-hidden="true">

                        <div class="row">
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'الاسم' : 'Name'); ?> <span class="req">*</span></label>
                                <input type="text" class="form-input" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e($isAr ? 'اسمك الكامل' : 'John Smith'); ?>" required minlength="2">
                            </div>
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'البريد الإلكتروني' : 'Email'); ?> <span class="req">*</span></label>
                                <input type="email" class="form-input" name="email" value="<?php echo e(old('email')); ?>" placeholder="you@company.com" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'الهاتف' : 'Phone'); ?></label>
                                <input type="tel" class="form-input" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="+1 555 123 4567">
                            </div>
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'الشركة' : 'Company'); ?></label>
                                <input type="text" class="form-input" name="company" value="<?php echo e(old('company')); ?>" placeholder="<?php echo e($isAr ? 'اسم الشركة' : 'Acme Inc.'); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'نوع المشروع' : 'Project type'); ?> <span class="req">*</span></label>
                                <select class="form-select" name="project_type" required>
                                    <option value=""><?php echo e($isAr ? 'اختر نوع المشروع' : 'Select a type'); ?></option>
                                    <option value="custom-web-app"><?php echo e($isAr ? 'تطبيق ويب مخصص' : 'Custom web application'); ?></option>
                                    <option value="saas-mvp">SaaS MVP</option>
                                    <option value="ecommerce"><?php echo e($isAr ? 'تجارة إلكترونية' : 'E-commerce'); ?></option>
                                    <option value="redesign"><?php echo e($isAr ? 'إعادة تصميم موقع موجود' : 'Website redesign'); ?></option>
                                    <option value="api-integration"><?php echo e($isAr ? 'تكامل API' : 'API / integration'); ?></option>
                                    <option value="maintenance"><?php echo e($isAr ? 'صيانة وتحسين' : 'Maintenance & optimization'); ?></option>
                                    <option value="other"><?php echo e($isAr ? 'أخرى' : 'Other'); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'الميزانية المتوقعة' : 'Budget'); ?></label>
                                <select class="form-select" name="budget">
                                    <option value=""><?php echo e($isAr ? 'اختر نطاق ميزانية' : 'Select a range'); ?></option>
                                    <option value="<5k">&lt; $5,000</option>
                                    <option value="5k-15k">$5,000 — $15,000</option>
                                    <option value="15k-35k">$15,000 — $35,000</option>
                                    <option value="35k+">$35,000+</option>
                                    <option value="not-sure"><?php echo e($isAr ? 'غير متأكد بعد' : 'Not sure yet'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'الجدول الزمني' : 'Timeline'); ?></label>
                                <select class="form-select" name="timeline">
                                    <option value=""><?php echo e($isAr ? 'متى تريد البدء؟' : 'When to start?'); ?></option>
                                    <option value="asap"><?php echo e($isAr ? 'في أقرب وقت' : 'ASAP'); ?></option>
                                    <option value="1-month"><?php echo e($isAr ? 'خلال شهر' : 'Within 1 month'); ?></option>
                                    <option value="3-months"><?php echo e($isAr ? 'خلال 3 شهور' : 'Within 3 months'); ?></option>
                                    <option value="flexible"><?php echo e($isAr ? 'مرن' : 'Flexible'); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 form-row">
                                <label><?php echo e($isAr ? 'كيف عرفت عني؟' : 'How did you hear about me?'); ?></label>
                                <select class="form-select" name="source">
                                    <option value="">—</option>
                                    <option value="google">Google</option>
                                    <option value="linkedin">LinkedIn</option>
                                    <option value="github">GitHub</option>
                                    <option value="referral"><?php echo e($isAr ? 'تزكية' : 'Referral'); ?></option>
                                    <option value="other"><?php echo e($isAr ? 'أخرى' : 'Other'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <label><?php echo e($isAr ? 'موضوع الرسالة' : 'Subject'); ?> <span class="req">*</span></label>
                            <input type="text" class="form-input" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e($isAr ? 'موضوع قصير عن مشروعك' : 'Short subject about your project'); ?>" required minlength="2">
                        </div>

                        <div class="form-row">
                            <label><?php echo e($isAr ? 'تفاصيل المشروع' : 'Project details'); ?> <span class="req">*</span></label>
                            <textarea class="form-textarea" name="message" rows="6" placeholder="<?php echo e($isAr ? 'صف مشروعك بإيجاز، الميزات الأساسية، وأي معلومات مهمة...' : 'Briefly describe your project, core features, and any important context...'); ?>" required minlength="2"><?php echo e(old('message')); ?></textarea>
                        </div>

                        <div class="form-row">
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="nda_required" id="ndaCheck" value="1" <?php echo e(old('nda_required') ? 'checked' : ''); ?>>
                                <span><?php echo e($isAr ? 'أحتاج إلى اتفاقية عدم إفصاح (NDA) قبل المناقشة' : 'I need an NDA signed before discussing details'); ?></span>
                            </label>
                        </div>

                        <button type="submit" class="ks-btn ks-btn--primary" style="width: 100%; justify-content: center; padding: 15px;">
                            <i class="fas fa-paper-plane"></i> <?php echo e($isAr ? 'إرسال الرسالة' : 'Send message'); ?>

                        </button>

                        <p style="text-align: center; color: var(--text-3); font-size: 12.5px; margin: 14px 0 0;">
                            <?php echo e($isAr ? 'سترد عليك في أقل من 24 ساعة. لا مكالمات مبيعات ولا spam.' : 'I reply in under 24 hours. No sales calls, no spam.'); ?>

                        </p>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ks-media ks-fadeup" style="margin-bottom: 20px;">
                    <img src="<?php echo e(asset('images/site/contact-cta.webp')); ?>"
                         alt="<?php echo e($isAr ? 'تواصل مع خالد أحمد عبر البريد أو الواتساب' : 'Get in touch with Khaled Ahmed via email or WhatsApp'); ?>"
                         width="1536" height="1024" loading="lazy" decoding="async">
                </div>
                <h3 style="margin-bottom: 18px;"><?php echo e($isAr ? 'طرق أخرى للتواصل' : 'Other ways to reach me'); ?></h3>
                <div class="ct-info-item">
                    <div class="ct-info-item__ico"><i class="fas fa-envelope"></i></div>
                    <div>
                        <div class="lbl"><?php echo e($isAr ? 'البريد' : 'Email'); ?></div>
                        <div class="val"><a href="mailto:khaledahmedhaggagy@gmail.com">khaledahmedhaggagy@gmail.com</a></div>
                    </div>
                </div>
                <div class="ct-info-item">
                    <div class="ct-info-item__ico"><i class="fas fa-phone-alt"></i></div>
                    <div>
                        <div class="lbl"><?php echo e($isAr ? 'الهاتف' : 'Phone'); ?></div>
                        <div class="val" dir="ltr"><a href="tel:+201204593124">+20 120 459 3124</a></div>
                    </div>
                </div>
                <div class="ct-info-item">
                    <div class="ct-info-item__ico" style="background: rgba(37,211,102,0.10); color: var(--success); border-color: rgba(37,211,102,0.30);"><i class="fab fa-whatsapp"></i></div>
                    <div>
                        <div class="lbl">WhatsApp</div>
                        <div class="val"><a href="https://wa.me/201204593124" target="_blank" rel="noopener"><?php echo e($isAr ? 'راسلني الآن' : 'Message now'); ?></a></div>
                    </div>
                </div>
                <div class="ct-info-item">
                    <div class="ct-info-item__ico"><i class="fab fa-linkedin-in"></i></div>
                    <div>
                        <div class="lbl">LinkedIn</div>
                        <div class="val"><a href="https://linkedin.com/in/khaled-ahmed-82368819b" target="_blank" rel="me noopener">khaled-ahmed</a></div>
                    </div>
                </div>
                <div class="ct-info-item">
                    <div class="ct-info-item__ico"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <div class="lbl"><?php echo e($isAr ? 'الموقع' : 'Location'); ?></div>
                        <div class="val"><?php echo e($isAr ? 'القاهرة، مصر' : 'Cairo, Egypt'); ?> <span style="color: var(--text-3); font-weight: 400; font-size: 13px;">· <?php echo e($isAr ? 'متاح للعمل عن بعد' : 'Available remote'); ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ks-section ks-section--tight" style="background: rgba(255,255,255,0.02);">
    <div class="container">
        <div class="ks-shead ks-fadeup">
            <span class="ks-eyebrow"><i class="fas fa-clock"></i> <?php echo e($isAr ? 'التوقيت' : 'Working hours'); ?></span>
            <h2><?php echo e($isAr ? 'أعمل داخل يوم عملك، لا بعده' : 'I work inside your business day, not after it'); ?></h2>
            <p><?php echo e($isAr ? 'مقرّي القاهره بتوقيت GMT+2. هذا يعني تداخلا كاملا مع يوم العمل الأوروبي والبريطاني، وتداخلا مسائيا حقيقيا مع الساحل الشرقي الأمريكي — لا انتظار أربعا وعشرين ساعه بين كل سؤال ورده.' : 'I am based in Cairo, GMT+2. That is a full working-day overlap with the UK and Europe, and a real afternoon overlap with US Eastern — not a 24-hour wait between every question and its answer.'); ?></p>
        </div>
        <div class="row g-4" style="max-width:1000px;margin:0 auto;">
            <?php $__currentLoopData = [
                ['fas fa-flag', 'United Kingdom · London', 'المملكه المتحده · لندن', 'GMT+0 — 7 hours of overlap every day', 'GMT+0 — سبع ساعات تداخل يوميا'],
                ['fas fa-flag', 'Germany · Netherlands · France', 'ألمانيا · هولندا · فرنسا', 'GMT+1 — 8 hours of overlap every day', 'GMT+1 — ثماني ساعات تداخل يوميا'],
                ['fas fa-flag', 'Saudi Arabia · UAE · Qatar', 'السعوديه · الإمارات · قطر', 'GMT+3/+4 — effectively the same working day', 'GMT+3/+4 — يوم العمل نفسه تقريبا'],
                ['fas fa-flag', 'United States · East Coast', 'الولايات المتحده · الساحل الشرقي', 'GMT-5 — my afternoon is your morning', 'GMT-5 — ظهيرتي هي صباحك'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$ico, $regionEn, $regionAr, $noteEn, $noteAr]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 ks-fadeup">
                    <div class="home-trust-card">
                        <div class="home-trust-card__ico"><i class="<?php echo e($ico); ?>"></i></div>
                        <div>
                            <div class="lbl"><?php echo e($isAr ? $regionAr : $regionEn); ?></div>
                            <div class="val"><?php echo e($isAr ? $noteAr : $noteEn); ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views/pages/contact.blade.php ENDPATH**/ ?>