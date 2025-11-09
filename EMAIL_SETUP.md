# إعداد البريد الإلكتروني (Email Setup)

## المشكلة الحالية
Gmail لا يسمح باستخدام كلمة المرور العادية لإرسال البريد من التطبيقات. يجب استخدام **App Password**.

## الحل: إنشاء App Password من Gmail

### الخطوات:

1. **تفعيل التحقق بخطوتين (2-Step Verification)**
   - اذهب إلى: https://myaccount.google.com/security
   - فعّل "2-Step Verification" إذا لم تكن مفعلة

2. **إنشاء App Password**
   - اذهب إلى: https://myaccount.google.com/apppasswords
   - اختر "Mail" و "Other (Custom name)"
   - اكتب اسم للتطبيق (مثلاً: "Laravel Website")
   - اضغط "Generate"
   - انسخ كلمة المرور المولدة (16 حرف بدون مسافات)

3. **تحديث ملف .env**
   ```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=khaledahmedhaggagy@gmail.com
   MAIL_PASSWORD=xxxx xxxx xxxx xxxx  (استخدم App Password هنا)
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=khaledahmedhaggagy@gmail.com
   MAIL_FROM_NAME="Khaled Ahmed"
   ```

4. **مسح الكاش**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

## ملاحظات مهمة:
- App Password هو 16 حرف بدون مسافات
- لا تستخدم كلمة المرور العادية
- تأكد من أن MAIL_FROM_ADDRESS = MAIL_USERNAME

