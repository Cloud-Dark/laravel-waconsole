<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Apipedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .apipedia-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }
        .feature-card {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
        }
        .back-btn {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="apipedia-container">
        <a href="{{ route('apipedia.index') }}" class="btn btn-secondary back-btn">← Back to Dashboard</a>
        
        <h1 class="mb-4">About Apipedia</h1>
        
        <div class="alert alert-primary">
            <h3>What is Apipedia?</h3>
            <p>Apipedia is a comprehensive API platform that provides seamless integration for multiple communication channels including WhatsApp, Telegram, SMS, and AI Chat services.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-whatsapp text-success"></i> WhatsApp Integration</h3>
            <p>Send text messages, media, and files through WhatsApp with our API. Support for both individual and bulk messaging with delivery tracking.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-telegram text-info"></i> Telegram Integration</h3>
            <p>Integrate with Telegram to send messages, images, documents, interactive buttons, and location information to your contacts and channels.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-envelope text-warning"></i> SMS Services</h3>
            <p>Send regular, VIP, OTP, and VVIP SMS messages through our reliable SMS gateway with multiple delivery options.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-robot text-danger"></i> AI Chat Integration</h3>
            <p>Integrate intelligent conversational AI to create automated responses and interactions across multiple platforms.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-link text-primary"></i> Chainable API</h3>
            <p>Our fluent interface allows you to chain API calls, enabling cross-platform messaging from a single interaction.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-graph-up text-success"></i> Message Tracking</h3>
            <p>Monitor message statuses, delivery receipts, and other metrics to ensure your communications are delivered successfully.</p>
        </div>

        <div class="text-center mt-4">
            <a href="https://apipedia.id" target="_blank" class="btn btn-primary">Visit Official Website</a>
            <a href="{{ route('apipedia.documentation') }}" class="btn btn-info">View Documentation</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>