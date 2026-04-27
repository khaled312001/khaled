<?php $__env->startSection('title', isset($category) ? ucfirst($category) . ' Articles | Khaled Ahmed Blog' : 'Web Development Blog — Laravel, React, SEO & Performance | Khaled Ahmed'); ?>
<?php $__env->startSection('description', isset($category) ? 'Read in-depth ' . strtolower($category) . ' articles by Khaled Ahmed — senior full stack web developer. Practical guides on Laravel, React, Node.js, and modern web technologies.' : 'In-depth web development articles from a senior full stack developer. Laravel, React, Node.js, SEO, performance, hiring, and pricing — written for builders, not beginners.'); ?>
<?php $__env->startSection('keywords', 'web development blog, full stack developer blog, Laravel tutorials, React tutorials, web developer Egypt, hire web developer, SEO guide, web performance, Khaled Ahmed'); ?>
<?php $__env->startSection('canonical', isset($category) ? url('/blog/category/' . strtolower($category)) : url('/blogs')); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .blog-hero { padding: 80px 0 40px; background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1e40af 100%); color: #fff; }
    .blog-hero h1 { color: #fff; font-weight: 700; margin-bottom: 12px; }
    .blog-hero p { color: #cbd5e1; max-width: 720px; margin: 0 auto; font-size: 17px; }
    .blog-filter-bar { padding: 16px 0; border-bottom: 1px solid #e5e7eb; margin-bottom: 30px; }
    .blog-filter-bar a { display: inline-block; padding: 6px 14px; margin: 4px 4px; border-radius: 999px; background: #f1f5f9; color: #1e293b; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s; }
    .blog-filter-bar a:hover, .blog-filter-bar a.active { background: var(--main-color); color: #fff; }
    .blog-card { border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; transition: all 0.3s; height: 100%; display: flex; flex-direction: column; background: #fff; }
    .blog-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.08); border-color: var(--main-color); }
    .blog-card .blog-img img { width: 100%; height: 220px; object-fit: cover; }
    .blog-card .blog-body { padding: 24px; flex: 1; display: flex; flex-direction: column; }
    .blog-card .meta { font-size: 13px; color: #64748b; margin-bottom: 10px; }
    .blog-card .meta .cat { color: var(--main-color); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
    .blog-card h3 { font-size: 19px; line-height: 1.4; margin-bottom: 10px; font-weight: 600; }
    .blog-card h3 a { color: #0f172a; text-decoration: none; }
    .blog-card h3 a:hover { color: var(--main-color); }
    .blog-card p { color: #475569; font-size: 14px; line-height: 1.6; margin-bottom: 16px; flex: 1; }
    .blog-card .read-more { color: var(--main-color); font-weight: 600; text-decoration: none; font-size: 14px; }
    .blog-card .read-more i { margin-left: 6px; transition: margin 0.2s; }
    .blog-card .read-more:hover i { margin-left: 12px; }
    .blog-cta { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 50px 40px; border-radius: 16px; text-align: center; margin: 60px 0 40px; }
    .blog-cta h2 { color: #fff; font-size: 28px; margin-bottom: 14px; }
    .blog-cta p { color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 24px; max-width: 580px; margin-left: auto; margin-right: auto; }
    .blog-cta .btn-cta { background: #fff; color: #1e40af; padding: 14px 32px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block; transition: all 0.2s; }
    .blog-cta .btn-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
    @media (max-width: 768px) {
        .blog-hero { padding: 60px 0 30px; }
        .blog-hero h1 { font-size: 26px; }
        .blog-card .blog-img img { height: 180px; }
        .blog-cta { padding: 32px 20px; }
        .blog-cta h2 { font-size: 22px; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "Khaled Ahmed — Web Development Blog",
    "url": "<?php echo e(url('/blogs')); ?>",
    "description": "In-depth web development articles by senior full stack developer Khaled Ahmed.",
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
    "blogPost": [
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
            "@type": "BlogPosting",
            "headline": <?php echo json_encode($post['title'], 15, 512) ?>,
            "description": <?php echo json_encode($post['excerpt'], 15, 512) ?>,
            "url": "<?php echo e(url('/blog/' . $post['slug'])); ?>",
            "datePublished": "<?php echo e($post['date']); ?>",
            "image": "<?php echo e(asset('images/' . $post['image'])); ?>",
            "author": { "@type": "Person", "name": "Khaled Ahmed" }
        }<?php if(!$loop->last): ?>,<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"<?php echo e(url('/')); ?>"},
        {"@type":"ListItem","position":2,"name":"Blog","item":"<?php echo e(url('/blogs')); ?>"}
        <?php if(isset($category)): ?>
        ,{"@type":"ListItem","position":3,"name":"<?php echo e(ucfirst($category)); ?>","item":"<?php echo e(url('/blog/category/' . strtolower($category))); ?>"}
        <?php endif; ?>
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="blog-hero">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <?php if(isset($category)): ?>
                    <h1><?php echo e(ucfirst($category)); ?> Articles</h1>
                    <p>Deep, practical articles on <?php echo e(strtolower($category)); ?> from a working senior full stack web developer with 5+ years of experience and 25+ shipped projects.</p>
                <?php else: ?>
                    <h1><?php echo e(app()->getLocale() === 'ar' ? 'مدوّنه تطوير الويب' : 'Web Development Blog'); ?></h1>
                    <p><?php echo e(app()->getLocale() === 'ar' ? 'مقالات عمليه بدون كلام كثير عن Laravel و React و Node.js و SEO والأداء والتوظيف — مكتوبه بقلم مطوّر فُل ستاك خبير ينشر إنتاجي كل أسبوع.' : 'Practical, no-fluff articles on Laravel, React, Node.js, SEO, performance, and hiring — written by a senior full stack developer who ships in production every week.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="section pt-4">
    <div class="container">
        <div class="blog-filter-bar text-center">
            <a href="<?php echo e(route('blogs')); ?>" class="<?php echo e(!isset($category) ? 'active' : ''); ?>">All Posts</a>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catName => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('blog.category', strtolower($catName))); ?>"
                   class="<?php echo e(isset($category) && strtolower($category) === strtolower($catName) ? 'active' : ''); ?>">
                   <?php echo e($catName); ?> (<?php echo e($count); ?>)
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="row g-4">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <article class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                    <a href="<?php echo e(route('blog.show', $post['slug'])); ?>" class="blog-img">
                        <img src="<?php echo e(asset('images/' . $post['image'])); ?>"
                             alt="<?php echo e($post['title']); ?>"
                             loading="lazy" width="400" height="220" itemprop="image">
                    </a>
                    <div class="blog-body">
                        <div class="meta">
                            <span class="cat"><?php echo e($post['category']); ?></span>
                            &bull; <time datetime="<?php echo e($post['date']); ?>" itemprop="datePublished"><?php echo e(\Carbon\Carbon::parse($post['date'])->format('M d, Y')); ?></time>
                            &bull; <?php echo e($post['read_time']); ?>

                        </div>
                        <h3 itemprop="headline">
                            <a href="<?php echo e(route('blog.show', $post['slug'])); ?>" itemprop="url"><?php echo e($post['title']); ?></a>
                        </h3>
                        <p itemprop="description"><?php echo e($post['excerpt']); ?></p>
                        <a href="<?php echo e(route('blog.show', $post['slug'])); ?>" class="read-more">
                            Read full article <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="blog-cta">
            <h2>Need a Senior Full Stack Developer for Your Project?</h2>
            <p>I help businesses build fast, secure, and scalable web applications. Let's discuss your project — I respond within 24 hours with an honest recommendation.</p>
            <a href="<?php echo e(route('contact')); ?>" class="btn-cta">Get a Free Consultation <i class="fa fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Certificates\khaled\resources\views\pages\blogs.blade.php ENDPATH**/ ?>