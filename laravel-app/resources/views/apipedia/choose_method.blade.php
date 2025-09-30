<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Method - Apipedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .method-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .method-card {
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .method-card:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
        .method-card.active {
            background-color: #e7f4ff;
            border-left: 4px solid #0d6efd;
        }
        .back-btn {
            margin-bottom: 20px;
        }
        .method-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color: #e9ecef;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="method-container">
        <a href="{{ route('apipedia.start') }}" class="btn btn-secondary back-btn">← Back</a>
        
        <h2 class="mb-4">Choose API Method</h2>
        <p class="text-muted">Select the method you want to execute with Apipedia API</p>
        
        <form id="methodForm" action="{{ route('apipedia.choose-method') }}" method="POST">
            @csrf
            <input type="hidden" name="app_key" value="{{ session('app_key') }}">
            <input type="hidden" name="auth_key" value="{{ session('auth_key') }}">
            
            <div class="row">
                <div class="col-md-6">
                    <h5>WhatsApp</h5>
                    <div class="method-card card" onclick="selectMethod(this, 'whatsapp')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-success">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div>
                                <h6 class="card-title">WhatsApp Message</h6>
                                <p class="card-text text-muted">Send text, media and files</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'bulkV1')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-success">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Bulk V1</h6>
                                <p class="card-text text-muted">Send same message to multiple recipients</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'bulkV2')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-success">
                                <i class="bi bi-person-vcard"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Bulk V2</h6>
                                <p class="card-text text-muted">Send different messages to multiple recipients</p>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mt-4">Telegram</h5>
                    <div class="method-card card" onclick="selectMethod(this, 'telegramSendMessage')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-info">
                                <i class="bi bi-telegram"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Send Message</h6>
                                <p class="card-text text-muted">Send text messages to Telegram</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'telegramSendImage')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-info">
                                <i class="bi bi-image"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Send Image</h6>
                                <p class="card-text text-muted">Send images to Telegram</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'telegramSendLocation')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-info">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Send Location</h6>
                                <p class="card-text text-muted">Send location coordinates to Telegram</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5>SMS</h5>
                    <div class="method-card card" onclick="selectMethod(this, 'smsRegular')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-warning">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Regular SMS</h6>
                                <p class="card-text text-muted">Send standard SMS messages</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'smsVIP')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-warning">
                                <i class="bi bi-star"></i>
                            </div>
                            <div>
                                <h6 class="card-title">VIP SMS</h6>
                                <p class="card-text text-muted">Send priority VIP messages</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'smsOTP')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-warning">
                                <i class="bi bi-key"></i>
                            </div>
                            <div>
                                <h6 class="card-title">OTP SMS</h6>
                                <p class="card-text text-muted">Send One-Time Password messages</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'smsVVIP')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-warning">
                                <i class="bi bi-brightness-high"></i>
                            </div>
                            <div>
                                <h6 class="card-title">VVIP SMS</h6>
                                <p class="card-text text-muted">Send critical high-priority messages</p>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mt-4">AI & Other</h5>
                    <div class="method-card card" onclick="selectMethod(this, 'aiChat')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-danger">
                                <i class="bi bi-robot"></i>
                            </div>
                            <div>
                                <h6 class="card-title">AI Chat</h6>
                                <p class="card-text text-muted">AI-powered conversation</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'getProfile')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-secondary">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Get Profile</h6>
                                <p class="card-text text-muted">Retrieve profile information</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-card card" onclick="selectMethod(this, 'updatePresence')">
                        <div class="card-body d-flex">
                            <div class="method-icon text-secondary">
                                <i class="bi bi-circle"></i>
                            </div>
                            <div>
                                <h6 class="card-title">Update Presence</h6>
                                <p class="card-text text-muted">Update presence status</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <input type="hidden" id="selectedMethod" name="method" value="">
            
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg" id="nextButton" disabled>Next: Enter Details</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectMethod(element, methodName) {
            // Remove active class from all cards
            document.querySelectorAll('.method-card').forEach(card => {
                card.classList.remove('active');
            });
            
            // Add active class to clicked card
            element.classList.add('active');
            
            // Set the hidden input value
            document.getElementById('selectedMethod').value = methodName;
            
            // Enable the next button
            document.getElementById('nextButton').disabled = false;
        }
    </script>
</body>
</html>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectMethod(element, methodName) {
            // Remove active class from all cards
            document.querySelectorAll('.method-card').forEach(card => {
                card.classList.remove('active');
            });
            
            // Add active class to clicked card
            element.classList.add('active');
            
            // Set the hidden input value
            document.getElementById('selectedMethod').value = methodName;
            
            // Enable the next button
            document.getElementById('nextButton').disabled = false;
        }
    </script>
</body>
</html>