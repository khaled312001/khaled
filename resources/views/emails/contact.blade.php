<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 3px solid #e00606;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #e00606;
            margin: 0;
            font-size: 24px;
        }
        .info-section {
            margin-bottom: 25px;
        }
        .info-section label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            min-width: 100px;
        }
        .info-section p {
            margin: 10px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 4px solid #e00606;
        }
        .message-section {
            margin-top: 30px;
        }
        .message-section h2 {
            color: #e00606;
            font-size: 18px;
            margin-bottom: 15px;
        }
        .message-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            border-left: 4px solid #e00606;
            white-space: pre-wrap;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>New Contact Form Message</h1>
        </div>

        <div class="info-section">
            <p><label>Name:</label> {{ $name }}</p>
            <p><label>Email:</label> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
            <p><label>Subject:</label> {{ $subject }}</p>
        </div>

        <div class="message-section">
            <h2>Message:</h2>
            <div class="message-content">{{ $message }}</div>
        </div>

        <div class="footer">
            <p>This email was sent from the contact form on khaledahmed.net</p>
            <p>You can reply directly to this email to respond to {{ $name }}</p>
        </div>
    </div>
</body>
</html>

