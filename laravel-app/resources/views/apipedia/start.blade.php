<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start - Apipedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .start-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .back-btn {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="start-container">
        <a href="{{ route('apipedia.index') }}" class="btn btn-secondary back-btn">← Back to Dashboard</a>
        
        <h2 class="text-center mb-4">Enter Your Credentials</h2>
        <p class="text-center text-muted">Please provide your App Key and Auth Key to start using Apipedia services</p>
        
        <form action="{{ route('apipedia.choose-method') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="app_key" class="form-label">App Key</label>
                <input type="text" class="form-control" id="app_key" name="app_key" required>
                <div class="form-text">Your application key provided by Apipedia</div>
            </div>
            
            <div class="mb-3">
                <label for="auth_key" class="form-label">Auth Key</label>
                <input type="password" class="form-control" id="auth_key" name="auth_key" required>
                <div class="form-text">Your authentication key provided by Apipedia</div>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Next: Choose Method</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>