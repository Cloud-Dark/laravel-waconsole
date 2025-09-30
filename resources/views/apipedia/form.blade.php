<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Details - Apipedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .back-btn {
            margin-bottom: 20px;
        }
        .method-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .result-container {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="form-container">
        <a href="{{ route('apipedia.start') }}" class="btn btn-secondary back-btn">← Back</a>
        
        <div class="method-header">
            <h3>Method: <span id="methodNameDisplay">{{ ucfirst(str_replace('telegram', 'Telegram ', str_replace('sms', 'SMS ', str_replace('ai', 'AI ', $method ?? 'Unknown')))) }}</span></h3>
            <p class="text-muted">Fill in the required parameters for this method</p>
        </div>
        
        <form id="apiForm">
            @csrf
            <input type="hidden" name="method" value="{{ $method }}">
            <input type="hidden" name="app_key" value="{{ session('app_key') }}">
            <input type="hidden" name="auth_key" value="{{ session('auth_key') }}">
            
            <div id="dynamicFields">
                <!-- Fields will be dynamically populated based on the selected method -->
                @if($method == 'whatsapp')
                    <div class="mb-3">
                        <label for="to" class="form-label">To (Phone Number)</label>
                        <input type="text" class="form-control" id="to" name="to" required>
                        <div class="form-text">Recipient phone number in international format (e.g., 628123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        <div class="form-text">The message content to send</div>
                    </div>
                    <div class="mb-3">
                        <label for="media" class="form-label">Media URL (optional)</label>
                        <input type="url" class="form-control" id="media" name="media">
                        <div class="form-text">URL to an image, document, or other media to send with the message</div>
                    </div>
                @elseif($method == 'bulkV1')
                    <div class="mb-3">
                        <label for="numbers" class="form-label">Phone Numbers</label>
                        <input type="text" class="form-control" id="numbers" name="numbers" required>
                        <div class="form-text">Comma-separated list of recipient phone numbers (e.g., 628123456789,628987654321)</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        <div class="form-text">The same message content to send to all recipients</div>
                    </div>
                @elseif($method == 'bulkV2')
                    <div class="mb-3">
                        <label for="numbers" class="form-label">Phone Numbers</label>
                        <input type="text" class="form-control" id="numbers" name="numbers" required>
                        <div class="form-text">Comma-separated list of recipient phone numbers (e.g., 628123456789,628987654321)</div>
                    </div>
                    <div class="mb-3">
                        <label for="messages" class="form-label">Messages</label>
                        <textarea class="form-control" id="messages" name="messages" rows="3" required></textarea>
                        <div class="form-text">Pipe-separated list of messages (e.g., Message for John|Message for Jane)</div>
                    </div>
                @elseif($method == 'telegramSendMessage')
                    <div class="mb-3">
                        <label for="receiver" class="form-label">Receiver</label>
                        <input type="text" class="form-control" id="receiver" name="receiver" required>
                        <div class="form-text">Telegram username, chat ID, or channel (e.g., @username, -123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Message Body</label>
                        <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                        <div class="form-text">The message content to send</div>
                    </div>
                @elseif($method == 'telegramSendImage')
                    <div class="mb-3">
                        <label for="receiver" class="form-label">Receiver</label>
                        <input type="text" class="form-control" id="receiver" name="receiver" required>
                        <div class="form-text">Telegram username, chat ID, or channel (e.g., @username, -123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image URL</label>
                        <input type="url" class="form-control" id="image_url" name="image_url" required>
                        <div class="form-text">URL of the image to send</div>
                    </div>
                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption (optional)</label>
                        <textarea class="form-control" id="caption" name="caption" rows="2"></textarea>
                        <div class="form-text">Caption to accompany the image</div>
                    </div>
                @elseif($method == 'telegramSendLocation')
                    <div class="mb-3">
                        <label for="receiver" class="form-label">Receiver</label>
                        <input type="text" class="form-control" id="receiver" name="receiver" required>
                        <div class="form-text">Telegram username, chat ID, or channel (e.g., @username, -123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" class="form-control" id="latitude" name="latitude" step="any" required>
                        <div class="form-text">Latitude coordinate</div>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" class="form-control" id="longitude" name="longitude" step="any" required>
                        <div class="form-text">Longitude coordinate</div>
                    </div>
                @elseif($method == 'telegramSendButtons')
                    <div class="mb-3">
                        <label for="receiver" class="form-label">Receiver</label>
                        <input type="text" class="form-control" id="receiver" name="receiver" required>
                        <div class="form-text">Telegram username, chat ID, or channel (e.g., @username, -123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Message Body</label>
                        <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                        <div class="form-text">The message content to send with the buttons</div>
                    </div>
                    <div class="mb-3">
                        <label for="buttons_data" class="form-label">Buttons Data (JSON)</label>
                        <textarea class="form-control" id="buttons_data" name="buttons_data" rows="5" placeholder='[ [{"text": "Button 1", "url": "https://example.com"}, {"text": "Button 2", "callback_data": "action"}] ]' required></textarea>
                        <div class="form-text">JSON format for button structure. Example: [{"text": "Visit Website", "url": "https://example.com"}, {"text": "Contact", "callback_data": "contact"}]</div>
                    </div>
                @elseif($method == 'telegramSendDocument')
                    <div class="mb-3">
                        <label for="receiver" class="form-label">Receiver</label>
                        <input type="text" class="form-control" id="receiver" name="receiver" required>
                        <div class="form-text">Telegram username, chat ID, or channel (e.g., @username, -123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="document_url" class="form-label">Document URL</label>
                        <input type="url" class="form-control" id="document_url" name="document_url" required>
                        <div class="form-text">URL of the document to send</div>
                    </div>
                    <div class="mb-3">
                        <label for="caption" class="form-label">Caption (optional)</label>
                        <textarea class="form-control" id="caption" name="caption" rows="2"></textarea>
                        <div class="form-text">Caption to accompany the document</div>
                    </div>
                    <div class="mb-3">
                        <label for="filename" class="form-label">Filename (optional)</label>
                        <input type="text" class="form-control" id="filename" name="filename">
                        <div class="form-text">Custom filename for the document</div>
                    </div>
                @elseif($method == 'smsRegular')
                    <div class="mb-3">
                        <label for="to" class="form-label">To (Phone Number)</label>
                        <input type="text" class="form-control" id="to" name="to" required>
                        <div class="form-text">Recipient phone number in international format (e.g., 628123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="msg" class="form-label">Message</label>
                        <textarea class="form-control" id="msg" name="msg" rows="3" required></textarea>
                        <div class="form-text">The SMS message content</div>
                    </div>
                @elseif($method == 'smsVIP')
                    <div class="mb-3">
                        <label for="to" class="form-label">To (Phone Number)</label>
                        <input type="text" class="form-control" id="to" name="to" required>
                        <div class="form-text">Recipient phone number in international format (e.g., 628123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="msg" class="form-label">Message</label>
                        <textarea class="form-control" id="msg" name="msg" rows="3" required></textarea>
                        <div class="form-text">The VIP SMS message content</div>
                    </div>
                @elseif($method == 'smsOTP')
                    <div class="mb-3">
                        <label for="to" class="form-label">To (Phone Number)</label>
                        <input type="text" class="form-control" id="to" name="to" required>
                        <div class="form-text">Recipient phone number in international format (e.g., 628123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="msg" class="form-label">Message</label>
                        <textarea class="form-control" id="msg" name="msg" rows="3" required></textarea>
                        <div class="form-text">The OTP SMS message content</div>
                    </div>
                @elseif($method == 'smsVVIP')
                    <div class="mb-3">
                        <label for="to" class="form-label">To (Phone Number)</label>
                        <input type="text" class="form-control" id="to" name="to" required>
                        <div class="form-text">Recipient phone number in international format (e.g., 628123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="msg" class="form-label">Message</label>
                        <textarea class="form-control" id="msg" name="msg" rows="3" required></textarea>
                        <div class="form-text">The VVIP SMS message content</div>
                    </div>
                @elseif($method == 'aiChat')
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        <div class="form-text">The input message for the AI</div>
                    </div>
                    <div class="mb-3">
                        <label for="agent_id" class="form-label">Agent ID</label>
                        <input type="text" class="form-control" id="agent_id" name="agent_id" required>
                        <div class="form-text">The ID of the AI agent to use</div>
                    </div>
                    <div class="mb-3">
                        <label for="format" class="form-label">Format (optional)</label>
                        <input type="text" class="form-control" id="format" name="format" value="text">
                        <div class="form-text">Response format (text, json, etc.)</div>
                    </div>
                @elseif($method == 'getProfile')
                    <!-- No parameters needed for getProfile -->
                    <div class="alert alert-info">No additional parameters required for this method.</div>
                @elseif($method == 'updatePresence')
                    <div class="mb-3">
                        <label for="receiver" class="form-label">Receiver</label>
                        <input type="text" class="form-control" id="receiver" name="receiver" required>
                        <div class="form-text">Recipient phone number in international format (e.g., 628123456789)</div>
                    </div>
                    <div class="mb-3">
                        <label for="presence" class="form-label">Presence</label>
                        <select class="form-control" id="presence" name="presence" required>
                            <option value="composing">Composing</option>
                            <option value="recording">Recording</option>
                            <option value="paused">Paused</option>
                        </select>
                        <div class="form-text">The presence status to set</div>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (optional)</label>
                        <input type="number" class="form-control" id="duration" name="duration" placeholder="Duration in milliseconds">
                        <div class="form-text">Duration for which to show the presence status</div>
                    </div>
                @elseif($method == 'getMessageStatusAll')
                    <div class="mb-3">
                        <label for="message_id" class="form-label">Message ID</label>
                        <input type="text" class="form-control" id="message_id" name="message_id" required>
                        <div class="form-text">The ID of the message to check status for</div>
                    </div>
                @elseif($method == 'getLastStatus')
                    <div class="mb-3">
                        <label for="message_id" class="form-label">Message ID</label>
                        <input type="text" class="form-control" id="message_id" name="message_id" required>
                        <div class="form-text">The ID of the message to check status for</div>
                    </div>
                @elseif($method == 'getLastReceiptStatus')
                    <div class="mb-3">
                        <label for="message_id" class="form-label">Message ID</label>
                        <input type="text" class="form-control" id="message_id" name="message_id" required>
                        <div class="form-text">The ID of the message to check receipt status for</div>
                    </div>
                @else
                    <div class="alert alert-warning">Unknown method selected.</div>
                @endif
            </div>
            
            <div class="d-grid">
                <button type="button" class="btn btn-success btn-lg" onclick="sendRequest()">Send Request</button>
            </div>
        </form>
        
        <div id="resultContainer" class="result-container">
            <h5>API Response:</h5>
            <pre id="resultContent"></pre>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        async function sendRequest() {
            const form = document.getElementById('apiForm');
            const formData = new FormData(form);
            const resultContainer = document.getElementById('resultContainer');
            const resultContent = document.getElementById('resultContent');
            
            try {
                const response = await fetch('{{ route('apipedia.execute-method') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                const result = await response.json();
                
                // Display the result
                resultContent.textContent = JSON.stringify(result, null, 2);
                resultContainer.style.display = 'block';
                
                // Scroll to results
                resultContainer.scrollIntoView({ behavior: 'smooth' });
            } catch (error) {
                resultContent.textContent = 'Error: ' + error.message;
                resultContainer.style.display = 'block';
            }
        }
    </script>
</body>
</html>