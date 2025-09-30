<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apipedia Integration Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .btn-lg {
            padding: 15px 25px;
            font-size: 1.2rem;
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="text-center mb-5">
            <h1 class="display-4">Welcome to Apipedia Integration Dashboard</h1>
            <p class="lead">A comprehensive solution for WhatsApp, Telegram, SMS, AI Chat and more</p>
        </div>

        <div class="text-center mb-5">
            <div class="feature-icon text-primary">
                <i class="bi bi-gear-wide-connected"></i>
            </div>
            <p class="lead">Get started with Apipedia services to integrate multiple communication channels into your application.</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon text-primary">
                            <i class="bi bi-play-btn"></i>
                        </div>
                        <h4 class="card-title">Start</h4>
                        <p class="card-text">Begin sending messages through Apipedia API</p>
                        <a href="{{ route('apipedia.start') }}" class="btn btn-primary btn-lg">Start</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon text-success">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <h4 class="card-title">Documentation</h4>
                        <p class="card-text">View detailed documentation for Apipedia API</p>
                        <a href="{{ route('apipedia.documentation') }}" class="btn btn-success btn-lg">Documentation</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon text-info">
                            <i class="bi bi-globe"></i>
                        </div>
                        <h4 class="card-title">Apipedia</h4>
                        <p class="card-text">Learn more about Apipedia services</p>
                        <a href="{{ route('apipedia.apipedia') }}" class="btn btn-info btn-lg">Apipedia</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="feature-icon text-warning">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <h4 class="card-title">WA Console</h4>
                        <p class="card-text">Access WhatsApp console features</p>
                        <a href="{{ route('apipedia.waconsole') }}" class="btn btn-warning btn-lg">WA Console</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>