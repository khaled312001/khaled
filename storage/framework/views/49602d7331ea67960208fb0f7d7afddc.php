<?php $__env->startSection('title', $post['meta_title'] ?? $post['title']); ?>
<?php $__env->startSection('description', $post['meta_description'] ?? $post['excerpt']); ?>
<?php $__env->startSection('keywords', implode(', ', $post['tags']) . ', Khaled Ahmed, web developer, full stack'); ?>
<?php $__env->startSection('canonical', url('/blog/' . $post['slug'])); ?>
<?php $__env->startSection('og_type', 'article'); ?>
<?php $__env->startSection('og_title', $post['title']); ?>
<?php $__env->startSection('og_description', $post['excerpt']); ?>
<?php $__env->startSection('og_image', asset('images/' . $post['image'])); ?>
<?php $__env->startSection('twitter_title', $post['title']); ?>
<?php $__env->startSection('twitter_description', $post['excerpt']); ?>
<?php $__env->startSection('twitter_image', asset('images/' . $post['image'])); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .article-hero { padding: 100px 0 40px; background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%); color: #fff; }
    .article-hero .breadcrumbs { font-size: 14px; color: #cbd5e1; margin-bottom: 16px; }
    .article-hero .breadcrumbs a { color: #93c5fd; text-decoration: none; }
    .article-hero .breadcrumbs a:hover { color: #fff; }
    .article-hero .cat-badge { display: inline-block; background: rgba(255,255,255,0.15); color: #fff; padding: 6px 14px; border-radius: 999px; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 14px; }
    .article-hero h1 { color: #fff; font-weight: 700; font-size: 36px; line-height: 1.25; max-width: 900px; margin-bottom: 18px; }
    .article-hero .article-meta { color: #cbd5e1; font-size: 14px; }
    .article-hero .article-meta span { margin-right: 18px; }
    .article-hero .article-meta i { margin-right: 6px; color: #93c5fd; }
    .article-body { padding: 50px 0; }
    .article-body img.featured { width: 100%; max-height: 500px; object-fit: cover; border-radius: 12px; margin-bottom: 40px; }
    .article-content { font-size: 17px; line-height: 1.8; color: #1e293b; }
    .article-content .lead { font-size: 19px; color: #334155; margin-bottom: 30px; padding: 18px 22px; background: #f8fafc; border-left: 4px solid var(--main-color); border-radius: 4px; }
    .article-content h2 { margin-top: 40px; margin-bottom: 18px; font-size: 26px; font-weight: 700; color: #0f172a; }
    .article-content h3 { margin-top: 30px; margin-bottom: 14px; font-size: 21px; font-weight: 600; color: #0f172a; }
    .article-content p { margin-bottom: 18px; }
    .article-content ul, .article-content ol { margin-bottom: 22px; padding-left: 24px; }
    .article-content li { margin-bottom: 8px; }
    .article-content code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 0.92em; color: #be185d; }
    .article-content a { color: var(--main-color); font-weight: 600; }
    .article-content a:hover { text-decoration: underline; }
    .article-tags { padding: 24px 0; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; margin: 40px 0 30px; }
    .article-tags .tag { display: inline-block; background: #f1f5f9; color: #1e293b; padding: 6px 14px; border-radius: 999px; font-size: 13px; margin-right: 8px; margin-bottom: 6px; text-decoration: none; }
    .article-tags .tag:hover { background: var(--main-color); color: #fff; }
    .author-box { display: flex; gap: 20px; align-items: center; padding: 30px; background: #f8fafc; border-radius: 12px; margin: 30px 0; }
    .author-box img { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; }
    .author-box h4 { margin: 0 0 6px; font-size: 18px; }
    .author-box p { margin: 0; color: #64748b; font-size: 14px; }
    .author-box .author-cta { margin-top: 10px; }
    .author-box .author-cta a { color: var(--main-color); font-weight: 600; text-decoration: none; font-size: 14px; }
    .article-cta { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 50px 40px; border-radius: 16px; text-align: center; margin: 50px 0 40px; }
    .article-cta h2 { color: #fff; font-size: 26px; margin-bottom: 14px; }
    .article-cta p { color: rgba(255,255,255,0.92); margin-bottom: 24px; max-width: 580px; margin-left: auto; margin-right: auto; }
    .article-cta .btn-cta { background: #fff; color: #1e40af; padding: 14px 32px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.2s; }
    .article-cta .btn-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
    .related-posts { padding: 40px 0; background: #f8fafc; }
    .related-posts h2 { font-size: 28px; font-weight: 700; margin-bottom: 30px; text-align: center; }
    .related-card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: all 0.2s; }
    .related-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .related-card img { width: 100%; height: 180px; object-fit: cover; }
    .related-card .body { padding: 20px; }
    .related-card h3 { font-size: 17px; line-height: 1.4; margin: 0 0 10px; }
    .related-card h3 a { color: #0f172a; text-decoration: none; }
    .related-card h3 a:hover { color: var(--main-color); }
    .related-card .cat { font-size: 12px; color: var(--main-color); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
    @media (max-width: 768px) {
        .article-hero { padding: 80px 0 28px; }
        .article-hero h1 { font-size: 25px; line-height: 1.3; }
        .article-content { font-size: 16px; }
        .article-content h2 { font-size: 22px; }
        .article-content h3 { font-size: 18px; }
        .author-box { flex-direction: column; text-align: center; }
        .article-cta { padding: 32px 20px; }
        .article-cta h2 { font-size: 21px; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": <?php echo json_encode($post['title'], 15, 512) ?>,
    "description": <?php echo json_encode($post['excerpt'], 15, 512) ?>,
    "image": "<?php echo e(asset('images/' . $post['image'])); ?>",
    "url": "<?php echo e(url('/blog/' . $post['slug'])); ?>",
    "datePublished": "<?php echo e($post['date']); ?>",
    "dateModified": "<?php echo e($post['date']); ?>",
    "author": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "url": "https://khaledahmed.net",
        "jobTitle": "Senior Full Stack Web Developer",
        "sameAs": [
            "https://linkedin.com/in/khaled-ahmed-82368819b",
            "https://github.com/khaled312001"
        ]
    },
    "publisher": {
        "@type": "Person",
        "name": "Khaled Ahmed",
        "logo": { "@type": "ImageObject", "url": "<?php echo e(asset('images/logo.png')); ?>" }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo e(url('/blog/' . $post['slug'])); ?>"
    },
    "keywords": <?php echo json_encode(implode(', ', $post['tags'])) ?>
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"<?php echo e(url('/')); ?>"},
        {"@type":"ListItem","position":2,"name":"Blog","item":"<?php echo e(url('/blogs')); ?>"},
        {"@type":"ListItem","position":3,"name":<?php echo json_encode($post['title'], 15, 512) ?>,"item":"<?php echo e(url('/blog/' . $post['slug'])); ?>"}
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<article itemscope itemtype="https://schema.org/BlogPosting">
    <header class="article-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                        &raquo; <a href="<?php echo e(route('blogs')); ?>">Blog</a>
                        &raquo; <span><?php echo e($post['title']); ?></span>
                    </nav>
                    <span class="cat-badge"><?php echo e($post['category']); ?></span>
                    <h1 itemprop="headline"><?php echo e($post['title']); ?></h1>
                    <div class="article-meta">
                        <span><i class="far fa-user"></i> Khaled Ahmed</span>
                        <span><i class="far fa-calendar"></i> <time datetime="<?php echo e($post['date']); ?>" itemprop="datePublished"><?php echo e(\Carbon\Carbon::parse($post['date'])->format('F d, Y')); ?></time></span>
                        <span><i class="far fa-clock"></i> <?php echo e($post['read_time']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="article-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <img src="<?php echo e(asset('images/' . $post['image'])); ?>"
                         alt="<?php echo e($post['title']); ?>"
                         class="featured" itemprop="image"
                         width="1000" height="500">

                    <div class="article-content" itemprop="articleBody">
                        <?php echo $post['content']; ?>

                    </div>

                    <div class="article-tags">
                        <strong>Tags:</strong>
                        <?php $__currentLoopData = $post['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('blogs')); ?>?tag=<?php echo e(urlencode($tag)); ?>" class="tag" rel="tag"><?php echo e($tag); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="author-box">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Khaled Ahmed" loading="lazy" width="80" height="80">
                        <div>
                            <h4>About Khaled Ahmed</h4>
                            <p>Senior Full Stack Web Developer based in Egypt with 5+ years of experience and 25+ shipped projects across 7 countries. Founder of Barmagly. Specialized in Laravel, React, Node.js, and modern web technologies.</p>
                            <div class="author-cta">
                                <a href="<?php echo e(route('contact')); ?>">Hire Khaled <i class="fa fa-arrow-right"></i></a>
                                &nbsp;&nbsp;
                                <a href="<?php echo e(route('services')); ?>">View Services <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="article-cta">
                        <h2>Ready to Start Your Project?</h2>
                        <p>If this article was helpful, imagine what we could do together. Get a free 30-minute consultation and an honest recommendation for your project — no sales pitch.</p>
                        <a href="<?php echo e(route('contact')); ?>" class="btn-cta">Book Free Consultation <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(count($related)): ?>
    <section class="related-posts">
        <div class="container">
            <h2>Related Articles</h2>
            <div class="row g-4 justify-content-center">
                <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <article class="related-card">
                        <a href="<?php echo e(route('blog.show', $rel['slug'])); ?>">
                            <img src="<?php echo e(asset('images/' . $rel['image'])); ?>" alt="<?php echo e($rel['title']); ?>" loading="lazy" width="400" height="180">
                        </a>
                        <div class="body">
                            <span class="cat"><?php echo e($rel['category']); ?></span>
                            <h3><a href="<?php echo e(route('blog.show', $rel['slug'])); ?>"><?php echo e($rel['title']); ?></a></h3>
                        </div>
                    </article>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\blog-detail.blade.php ENDPATH**/ ?>