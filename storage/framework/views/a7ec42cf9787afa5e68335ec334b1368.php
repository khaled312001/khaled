<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project Brief — <?php echo e($subject); ?></title>
    <style>
        body { font-family: -apple-system, Segoe UI, Roboto, Arial, sans-serif; line-height: 1.6; color: #1e293b; max-width: 680px; margin: 0 auto; padding: 20px; background-color: #f1f5f9; }
        .email-container { background-color: #ffffff; border-radius: 12px; padding: 0; box-shadow: 0 4px 12px rgba(0,0,0,0.06); overflow: hidden; }
        .header { background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%); color: #fff; padding: 28px 32px; }
        .header h1 { margin: 0 0 4px; font-size: 22px; }
        .header p { margin: 0; opacity: 0.9; font-size: 14px; }
        .body-content { padding: 28px 32px; }
        .field-grid { display: table; width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .field-row { display: table-row; }
        .field-label { display: table-cell; padding: 10px 12px; font-size: 12px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; width: 35%; vertical-align: top; border-bottom: 1px solid #f1f5f9; }
        .field-value { display: table-cell; padding: 10px 12px; font-size: 14px; color: #0f172a; vertical-align: top; border-bottom: 1px solid #f1f5f9; }
        .field-value a { color: #2563eb; text-decoration: none; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; background: #dbeafe; color: #1e40af; }
        .badge.warn { background: #fef3c7; color: #92400e; }
        .message-block { background: #f8fafc; border-left: 4px solid #2563eb; border-radius: 6px; padding: 16px 18px; margin-top: 8px; white-space: pre-wrap; word-wrap: break-word; font-size: 14.5px; line-height: 1.7; color: #0f172a; }
        h2 { font-size: 15px; color: #1e293b; margin: 24px 0 8px; padding-bottom: 6px; border-bottom: 1px solid #e2e8f0; }
        .actions { margin-top: 24px; padding-top: 20px; border-top: 1px solid #e2e8f0; }
        .actions a { display: inline-block; padding: 10px 18px; background: #2563eb; color: #fff !important; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 14px; margin-right: 8px; }
        .actions a.secondary { background: #25d366; }
        .footer { padding: 18px 32px; font-size: 12px; color: #94a3b8; text-align: center; background: #f8fafc; border-top: 1px solid #e2e8f0; }
        .meta { margin-top: 16px; font-size: 11.5px; color: #94a3b8; }
        .meta span { margin-right: 14px; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>📬 New Project Brief</h1>
            <p>Subject: <?php echo e($subject); ?></p>
        </div>

        <div class="body-content">
            <h2>Contact Information</h2>
            <div class="field-grid">
                <div class="field-row">
                    <div class="field-label">Name</div>
                    <div class="field-value"><strong><?php echo e($name); ?></strong></div>
                </div>
                <div class="field-row">
                    <div class="field-label">Email</div>
                    <div class="field-value"><a href="mailto:<?php echo e($email); ?>"><?php echo e($email); ?></a></div>
                </div>
                <?php if(!empty($details['phone'])): ?>
                <div class="field-row">
                    <div class="field-label">Phone / WhatsApp</div>
                    <div class="field-value">
                        <a href="tel:<?php echo e($details['phone']); ?>"><?php echo e($details['phone']); ?></a>
                        &nbsp;·&nbsp;
                        <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $details['phone'])); ?>" target="_blank">WhatsApp</a>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(!empty($details['company'])): ?>
                <div class="field-row">
                    <div class="field-label">Company</div>
                    <div class="field-value"><?php echo e($details['company']); ?></div>
                </div>
                <?php endif; ?>
            </div>

            <?php if(!empty($details['project_type']) || !empty($details['budget']) || !empty($details['timeline'])): ?>
            <h2>Project Details</h2>
            <div class="field-grid">
                <?php if(!empty($details['project_type'])): ?>
                <div class="field-row">
                    <div class="field-label">Project Type</div>
                    <div class="field-value"><span class="badge"><?php echo e($details['project_type']); ?></span></div>
                </div>
                <?php endif; ?>
                <?php if(!empty($details['budget'])): ?>
                <div class="field-row">
                    <div class="field-label">Budget</div>
                    <div class="field-value"><strong><?php echo e($details['budget']); ?></strong></div>
                </div>
                <?php endif; ?>
                <?php if(!empty($details['timeline'])): ?>
                <div class="field-row">
                    <div class="field-label">Timeline</div>
                    <div class="field-value"><?php echo e($details['timeline']); ?></div>
                </div>
                <?php endif; ?>
                <?php if(!empty($details['nda_required'])): ?>
                <div class="field-row">
                    <div class="field-label">NDA</div>
                    <div class="field-value"><span class="badge warn">⚠ NDA requested before details</span></div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <h2>Message</h2>
            <div class="message-block"><?php echo e($body); ?></div>

            <div class="actions">
                <a href="mailto:<?php echo e($email); ?>?subject=Re: <?php echo e($subject); ?>">Reply to <?php echo e($name); ?></a>
                <?php if(!empty($details['phone'])): ?>
                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $details['phone'])); ?>" class="secondary">WhatsApp</a>
                <?php endif; ?>
            </div>

            <div class="meta">
                <?php if(!empty($details['source'])): ?><span>📡 Source: <strong><?php echo e($details['source']); ?></strong></span><?php endif; ?>
                <?php if(!empty($details['submitted_at'])): ?><span>🕒 <?php echo e($details['submitted_at']); ?></span><?php endif; ?>
                <?php if(!empty($details['ip'])): ?><span>🌐 IP: <?php echo e($details['ip']); ?></span><?php endif; ?>
            </div>
        </div>

        <div class="footer">
            Sent from the contact form on <a href="https://khaledahmed.net" style="color:#64748b">khaledahmed.net</a>
        </div>
    </div>
</body>
</html>
<?php /**PATH F:\Certificates\khaled\resources\views\emails\contact.blade.php ENDPATH**/ ?>