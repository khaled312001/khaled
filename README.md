# Laravel Website Conversion

تم تحويل الموقع من HTML ثابت إلى Laravel بنجاح.

## الميزات

- ✅ تحويل جميع صفحات HTML إلى Blade Templates
- ✅ نقل جميع الأصول (CSS, JS, Images, Fonts) إلى public/
- ✅ إنشاء Routes و Controllers لجميع الصفحات
- ✅ إنشاء Layout رئيسي مع Header و Footer
- ✅ حفظ نفس التصميم والصور

## الصفحات المتاحة

- `/` - الصفحة الرئيسية (Home)
- `/about` - صفحة من نحن
- `/services` - صفحة الخدمات
- `/blogs` - صفحة المدونة
- `/contact` - صفحة التواصل
- `/faqs` - الأسئلة الشائعة
- `/gallery` - معرض الصور
- `/teams` - فريق العمل
- `/portfolios` - المحفظة
- `/plans` - الخطط
- `/careers` - الوظائف

## التثبيت

1. قم بتثبيت Composer dependencies:
```bash
composer install
```

2. انسخ ملف `.env.example` إلى `.env`:
```bash
cp .env.example .env
```

3. قم بتوليد مفتاح التطبيق:
```bash
php artisan key:generate
```

4. قم بتشغيل الخادم المحلي:
```bash
php artisan serve
```

## البنية

```
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   └── PageController.php
│   └── Providers/
├── public/
│   ├── css/       (جميع ملفات CSS)
│   ├── js/        (جميع ملفات JavaScript)
│   ├── images/    (جميع الصور)
│   └── fonts/     (جميع الخطوط)
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php (Layout الرئيسي)
│       ├── partials/
│       │   ├── header.blade.php
│       │   └── footer.blade.php
│       ├── pages/
│       │   └── (جميع صفحات الموقع)
│       └── errors/
│           └── 404.blade.php
└── routes/
    └── web.php
```

## الملاحظات

- جميع الصور والملفات الثابتة موجودة في مجلد `public/`
- تم استخدام `asset()` helper في جميع المسارات
- نفس التصميم والصور تم الحفاظ عليها
- جميع الصفحات تستخدم نفس Layout الرئيسي

