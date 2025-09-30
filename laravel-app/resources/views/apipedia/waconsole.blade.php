<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WA Console</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .waconsole-container {
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
        .whatsapp-icon {
            font-size: 3rem;
            color: #25D366;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="waconsole-container">
        <a href="{{ route('apipedia.index') }}" class="btn btn-secondary back-btn">← Back to Dashboard</a>
        
        <div class="text-center mb-4">
            <div class="whatsapp-icon">
                <i class="bi bi-whatsapp"></i>
            </div>
            <h1>WhatsApp Console</h1>
            <p class="lead">Manage and interact with WhatsApp messaging through Apipedia API</p>
        </div>
        
        <div class="alert alert-success">
            <h3>WhatsApp Console Features</h3>
            <p>The WA Console provides a comprehensive interface for managing WhatsApp communications through the Apipedia platform.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-chat-dots text-success"></i> Message Management</h3>
            <p>Send individual or bulk WhatsApp messages with text, images, documents, and other media formats. Track delivery status and message receipts.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-person-lines text-info"></i> Contact Management</h3>
            <p>Manage your contact lists and segment your audience for targeted messaging campaigns through the console.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-graph-up text-primary"></i> Analytics & Reporting</h3>
            <p>Track message delivery rates, open rates, and other engagement metrics to measure the effectiveness of your communication campaigns.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-shield-lock text-warning"></i> Security & Compliance</h3>
            <p>Ensure your WhatsApp communications comply with platform policies and maintain security standards for your data and conversations.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-robot text-danger"></i> Automation Tools</h3>
            <p>Set up automated responses and workflows to engage with contacts at scale based on triggers and conditions.</p>
        </div>

        <div class="feature-card">
            <h3><i class="bi bi-gear text-secondary"></i> Configuration & Settings</h3>
            <p>Customize your WhatsApp communication settings, including message templates, business information, and webhook configurations.</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('apipedia.start') }}" class="btn btn-success btn-lg">Start Using WA Console</a>
            <a href="https://waconsole.apipedia.id" target="_blank" class="btn btn-outline-primary">Open WA Console</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>