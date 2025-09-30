# Laravel WA Console with Apipedia Integration

A comprehensive Laravel application that integrates with the Apipedia API for WhatsApp, Telegram, SMS, AI Chat, and other messaging services.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Dashboard Overview](#dashboard-overview)
  - [Getting Started](#getting-started)
  - [API Methods](#api-methods)
    - [WhatsApp Methods](#whatsapp-methods)
    - [Telegram Methods](#telegram-methods)
    - [SMS Methods](#sms-methods)
    - [AI & Other Methods](#ai--other-methods)
- [Examples](#examples)
- [Troubleshooting](#troubleshooting)
- [Project Structure](#project-structure)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [Support](#support)
- [License](#license)

## Features

- 📱 **WhatsApp Messaging**: Send text, media and files
- 👥 **Bulk Messaging**: Send same or different messages to multiple recipients
- 🤖 **Telegram Integration**: Send messages, images, documents, interactive buttons and location information
- 📨 **SMS Services**: Regular, VIP, OTP, and VVIP SMS
- 🧠 **AI Chat Integration**: Intelligent conversational AI
- 🔗 **Chainable API**: Fluent interface for complex workflows
- 📊 **Message Tracking**: Status monitoring and delivery receipts
- 🚀 **Easy to Use**: Simple interface with 4 main buttons for navigation

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- Laravel CLI (optional)

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/Cloud-Dark/laravel-waconsole.git
   cd laravel-waconsole
   ```

2. **Navigate to the Laravel app directory**
   ```bash
   cd laravel-app
   ```

3. **Install dependencies**
   ```bash
   composer install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

## Configuration

### Environment Variables

The application uses standard Laravel environment variables. The key variables include:

- `APP_KEY`: Laravel application key (generated automatically)
- Other standard Laravel configuration variables

## Usage

### Dashboard Overview

The application provides a user-friendly dashboard with 4 main buttons:
1. **Start**: Begin sending messages through Apipedia API
2. **Documentation**: View detailed documentation for Apipedia API
3. **Apipedia**: Learn more about Apipedia services
4. **WA Console**: Access WhatsApp console features

### Getting Started

1. **Start the Development Server**
   ```bash
   cd laravel-app
   php artisan serve
   ```
   
   The application will be available at `http://127.0.0.1:8000`

2. **Access the Dashboard**
   - Navigate to `http://127.0.0.1:8000` in your browser
   - Click the **Start** button to begin

3. **Enter Credentials**
   - Provide your App Key and Auth Key in the input fields
   - Click **Next: Choose Method** to proceed

4. **Choose API Method**
   - Select the API method you want to execute from the method selection page
   - Available methods include WhatsApp, Telegram, SMS, AI Chat, and more
   - Click the method card to select it, then click **Next: Enter Details**

5. **Enter Parameters**
   - Fill in the required parameters for the selected method
   - The form fields will dynamically adjust based on the chosen method

6. **Send Request**
   - Click the **Send Request** button to execute the API call
   - The JSON response will be displayed below the form

### API Methods

#### WhatsApp Methods

**whatsapp**
- Description: Send text, media and files via WhatsApp
- Required Parameters:
  - To (Phone Number): Recipient phone number in international format (e.g., 628123456789)
  - Message: The message content to send
- Optional Parameters:
  - Media URL: URL to an image, document, or other media to send with the message

**bulkV1**
- Description: Send the same message to multiple recipients
- Required Parameters:
  - Phone Numbers: Comma-separated list of recipient phone numbers (e.g., 628123456789,628987654321)
  - Message: The same message content to send to all recipients

**bulkV2**
- Description: Send different messages to multiple recipients
- Required Parameters:
  - Phone Numbers: Comma-separated list of recipient phone numbers (e.g., 628123456789,628987654321)
  - Messages: Pipe-separated list of messages (e.g., Message for John|Message for Jane)

#### Telegram Methods

**telegramSendMessage**
- Description: Send text messages to Telegram
- Required Parameters:
  - Receiver: Telegram username, chat ID, or channel (e.g., @username, -123456789)
  - Message Body: The message content to send

**telegramSendImage**
- Description: Send images to Telegram
- Required Parameters:
  - Receiver: Telegram username, chat ID, or channel (e.g., @username, -123456789)
  - Image URL: URL of the image to send
- Optional Parameters:
  - Caption: Caption to accompany the image

**telegramSendLocation**
- Description: Send location coordinates to Telegram
- Required Parameters:
  - Receiver: Telegram username, chat ID, or channel (e.g., @username, -123456789)
  - Latitude: Latitude coordinate
  - Longitude: Longitude coordinate

**telegramSendButtons**
- Description: Send interactive buttons to Telegram
- Required Parameters:
  - Receiver: Telegram username, chat ID, or channel (e.g., @username, -123456789)
  - Message Body: The message content to send with the buttons
  - Buttons Data (JSON): JSON format for button structure

**telegramSendDocument**
- Description: Send documents to Telegram
- Required Parameters:
  - Receiver: Telegram username, chat ID, or channel (e.g., @username, -123456789)
  - Document URL: URL of the document to send
- Optional Parameters:
  - Caption: Caption to accompany the document
  - Filename: Custom filename for the document

#### SMS Methods

**smsRegular**
- Description: Send regular SMS messages
- Required Parameters:
  - To (Phone Number): Recipient phone number in international format (e.g., 628123456789)
  - Message: The SMS message content

**smsVIP**
- Description: Send VIP priority SMS messages
- Required Parameters:
  - To (Phone Number): Recipient phone number in international format (e.g., 628123456789)
  - Message: The VIP SMS message content

**smsOTP**
- Description: Send One-Time Password SMS messages
- Required Parameters:
  - To (Phone Number): Recipient phone number in international format (e.g., 628123456789)
  - Message: The OTP SMS message content

**smsVVIP**
- Description: Send critical high-priority SMS messages
- Required Parameters:
  - To (Phone Number): Recipient phone number in international format (e.g., 628123456789)
  - Message: The VVIP SMS message content

#### AI & Other Methods

**aiChat**
- Description: AI-powered conversation
- Required Parameters:
  - Message: The input message for the AI
  - Agent ID: The ID of the AI agent to use
- Optional Parameters:
  - Format: Response format (text, json, etc.), defaults to 'text'

**getProfile**
- Description: Retrieve profile information
- No additional parameters required

**updatePresence**
- Description: Update presence status
- Required Parameters:
  - Receiver: Recipient phone number in international format (e.g., 628123456789)
  - Presence: The presence status to set (options: Composing, Recording, Paused)
- Optional Parameters:
  - Duration: Duration for which to show the presence status (in milliseconds)

**getMessageStatusAll**
- Description: Get all message statuses
- Required Parameters:
  - Message ID: The ID of the message to check status for

**getLastStatus**
- Description: Get the last message status
- Required Parameters:
  - Message ID: The ID of the message to check status for

**getLastReceiptStatus**
- Description: Get the last receipt status
- Required Parameters:
  - Message ID: The ID of the message to check receipt status for

## Examples

### WhatsApp Example

1. Select the **whatsapp** method
2. Fill in the following fields:
   - To: 628123456789
   - Message: Hello from Laravel WA Console!
   - Media URL (optional): https://example.com/image.jpg
3. Click **Send Request**

### Telegram Example

1. Select the **telegramSendMessage** method
2. Fill in the following fields:
   - Receiver: @mychannel
   - Message Body: Hello from Telegram!
3. Click **Send Request**

### SMS Example

1. Select the **smsRegular** method
2. Fill in the following fields:
   - To: 628123456789
   - Message: This is a test SMS
3. Click **Send Request**

### AI Chat Example

1. Select the **aiChat** method
2. Fill in the following fields:
   - Message: What is the weather like today?
   - Agent ID: weather_agent
3. Click **Send Request**

## Troubleshooting

### Common Issues

**Issue**: The to field is required.
- **Solution**: Make sure to fill in the required "To" field when using methods that require a recipient.

**Issue**: Cannot read properties of null (reading 'getAttribute').
- **Solution**: This usually indicates a CSRF token issue. Refresh the page and try again.

**Issue**: Method not supported for route.
- **Solution**: Make sure you're accessing the application correctly and following the intended flow.

**Issue**: API Error: Invalid credentials.
- **Solution**: Verify your App Key and Auth Key are correct and properly formatted.

### Error Handling

The application handles various error scenarios:
- Validation errors for required fields
- API communication errors
- Invalid method selection
- Authentication failures

## Project Structure

```
laravel-app/
├── app/
│   └── Http/
│       └── Controllers/
│           └── ApipediaController.php  # Main controller
├── resources/
│   └── views/
│       └── apipedia/                   # All UI views
│           ├── index.blade.php         # Main dashboard
│           ├── documentation.blade.php # Documentation page
│           ├── apipedia.blade.php      # Apipedia info
│           ├── waconsole.blade.php     # WA Console info
│           ├── start.blade.php         # Start page
│           ├── choose_method.blade.php # Method selection
│           └── form.blade.php          # Parameter input form
├── routes/
│   └── web.php                         # Application routes
└── vendor/
    └── apipedia/
        └── php-sdk/                    # Apipedia SDK
```

## Technologies Used

- Laravel 9.52.20
- PHP 8.0+
- Apipedia PHP SDK
- Bootstrap 5
- Bootstrap Icons
- jQuery (via Bootstrap)

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Support

For support with the Apipedia services:
- 📧 Email: support@apipedia.id
- 📚 Documentation: https://docs.apipedia.id
- 🐛 Issues: GitHub Issues

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Thanks to the Laravel team for the excellent framework
- Special thanks to the Apipedia team for their comprehensive API services