<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apipedia Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .documentation-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
        .method-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }
        .back-btn {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="documentation-container">
        <a href="{{ route('apipedia.index') }}" class="btn btn-secondary back-btn">← Back to Dashboard</a>
        
        <h1 class="mb-4">Apipedia PHP SDK Documentation</h1>
        
        <div class="alert alert-info">
            <h3>Introduction</h3>
            <p>A comprehensive PHP SDK for the Apipedia API, providing seamless integration for WhatsApp, Telegram, SMS, AI Chat, and more messaging services.</p>
        </div>

        <div class="method-section">
            <h3>Installation</h3>
            <pre>composer require apipedia/php-sdk</pre>
        </div>

        <div class="method-section">
            <h3>Initialization</h3>
            <pre>
&lt;?php
require_once 'vendor/autoload.php';

use Apipedia\Apipedia;

// Initialize with your credentials
$apipedia = new Apipedia('your_app_key', 'your_auth_key');

// Or use the helper function
$apipedia = apipedia('your_app_key', 'your_auth_key');
            </pre>
        </div>

        <div class="method-section">
            <h3>WhatsApp Messaging</h3>
            <h5>Send Text Message</h5>
            <pre>$apipedia->whatsapp('628123456789', 'Hello World!');</pre>
            
            <h5>Send Message with Media</h5>
            <pre>
// With image URL
$apipedia->whatsapp('628123456789', 'Check this image!', 'https://example.com/image.jpg');

// With local file
$apipedia->whatsapp('628123456789', 'Here is a document', '/path/to/document.pdf');
            </pre>
        </div>

        <div class="method-section">
            <h3>Bulk Messaging</h3>
            <h5>Bulk V1 - Same Message to Multiple Recipients</h5>
            <pre>
$phoneNumbers = ['628123456789', '628987654321', '628555666777'];
$apipedia->bulkV1($phoneNumbers, 'Important announcement for everyone!');
            </pre>
            
            <h5>Bulk V2 - Different Messages to Multiple Recipients</h5>
            <pre>
$phoneNumbers = ['628123456789', '628987654321'];
$messages = ['Hello John!', 'Hello Jane!'];
$apipedia->bulkV2($phoneNumbers, $messages);
            </pre>
        </div>

        <div class="method-section">
            <h3>Telegram Integration</h3>
            <h5>Send Text Message</h5>
            <pre>$apipedia->telegramSendMessage('@yourchannel', 'Hello Telegram!');</pre>
            
            <h5>Send Image</h5>
            <pre>
$apipedia->telegramSendImage(
    '@yourchannel',
    'https://example.com/image.jpg',
    'Image caption here'
);
            </pre>
            
            <h5>Send Location</h5>
            <pre>$apipedia->telegramSendLocation('@yourchannel', -6.2088, 106.8456);</pre>
            
            <h5>Send Interactive Buttons</h5>
            <pre>
$buttons = [
    [
        ['text' => 'Visit Website', 'url' => 'https://example.com'],
        ['text' => 'Contact Support', 'callback_data' => 'support']
    ],
    [
        ['text' => 'More Info', 'callback_data' => 'info']
    ]
];

$apipedia->telegramSendButtons('@yourchannel', 'Choose an option:', $buttons);
            </pre>
        </div>

        <div class="method-section">
            <h3>SMS Services</h3>
            <h5>Regular SMS</h5>
            <pre>$apipedia->smsRegular('628123456789', 'Your regular SMS message');</pre>
            
            <h5>VIP SMS</h5>
            <pre>$apipedia->smsVIP('628123456789', 'Priority VIP message');</pre>
            
            <h5>OTP SMS</h5>
            <pre>$apipedia->smsOTP('628123456789', "Your OTP code is: {$otpCode}");</pre>
            
            <h5>VVIP SMS</h5>
            <pre>$apipedia->smsVVIP('628123456789', 'Critical VVIP message');</pre>
        </div>

        <div class="method-section">
            <h3>AI Chat Integration</h3>
            <pre>
$response = $apipedia->aiChat(
    'What is the weather like today?',
    'weather_agent',
    'text'
);

echo $response->getResult()['response'];
            </pre>
        </div>

        <div class="method-section">
            <h3>Chainable API - Cross-Platform Messaging</h3>
            <pre>
// AI generates content and sends to WhatsApp
$apipedia
    ->aiChat('Generate a daily motivation quote', 'motivation_agent')
    ->toWhatsApp('628123456789', '🌟 Daily Motivation: ');

// AI processes data and sends to multiple platforms
$apipedia
    ->aiChat('Summarize today\'s sales report', 'analytics_agent')
    ->toWhatsApp('628123456789', '📊 Sales Update: ')
    ->toTelegram('@salesteam', '📈 Team Update: ')
    ->toSMS('628987654321', 'SALES: ');
            </pre>
        </div>

        <div class="method-section">
            <h3>Message Status and Tracking</h3>
            <h5>Get Profile Information</h5>
            <pre>$profile = $apipedia->getProfile();</pre>
            
            <h5>Update Presence Status</h5>
            <pre>$apipedia->updatePresence('628123456789', 'typing', 5000);</pre>
            
            <h5>Check Message Status</h5>
            <pre>
// Get all message statuses
$result = $apipedia->getMessageStatusAll('message_id_here');

// Get last status
$result = $apipedia->getLastStatus('message_id_here');

// Get last receipt status
$result = $apipedia->getLastReceiptStatus('message_id_here');
            </pre>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>