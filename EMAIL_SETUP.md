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
   
   **مهم جداً:** إذا كان App Password يحتوي على مسافات، يجب وضعه بين علامات اقتباس:
   
   ```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=khaledahmedhaggagy@gmail.com
   MAIL_PASSWORD="zymc sbxc tflo rhug"
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=khaledahmedhaggagy@gmail.com
   MAIL_FROM_NAME="Khaled Ahmed"
   ```
   
   **أو** يمكنك إزالة المسافات:
   ```
   MAIL_PASSWORD=zymcsbxctflorhug
   ```

4. **مسح الكاش**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

## ملاحظات مهمة:
- App Password من Gmail عادة ما يكون 16 حرف مع مسافات (مثل: "zymc sbxc tflo rhug")
- **يجب وضع App Password بين علامات اقتباس في ملف .env إذا كان يحتوي على مسافات**
- أو يمكنك إزالة المسافات يدوياً (zymcsbxctflorhug)
- لا تستخدم كلمة المرور العادية
- تأكد من أن MAIL_FROM_ADDRESS = MAIL_USERNAME
- بعد تحديث .env، قم بمسح الكاش: `php artisan config:clear`

