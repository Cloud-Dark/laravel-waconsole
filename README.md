# Laravel WA Console with Apipedia Integration

A comprehensive Laravel application that integrates with the Apipedia API for WhatsApp, Telegram, SMS, AI Chat, and other messaging services.

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

## Usage

### 1. Start the Development Server

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`

### 2. Application Flow

1. **Dashboard**: The main page with 4 buttons:
   - **Start**: Begin sending messages through Apipedia API
   - **Documentation**: View detailed documentation for Apipedia API
   - **Apipedia**: Learn more about Apipedia services
   - **WA Console**: Access WhatsApp console features

2. **Credentials**: Enter your App Key and Auth Key provided by Apipedia

3. **Method Selection**: Choose the API method you want to execute:
   - WhatsApp messaging methods
   - Telegram integration methods
   - SMS services
   - AI Chat and other methods

4. **Parameter Input**: Enter the required parameters based on the selected method

5. **Send Request**: Execute the API call and view the JSON response

### 3. Supported Methods

#### WhatsApp Methods
- `whatsapp`: Send text, media and files
- `bulkV1`: Send same message to multiple recipients
- `bulkV2`: Send different messages to multiple recipients

#### Telegram Methods
- `telegramSendMessage`: Send text messages to Telegram
- `telegramSendImage`: Send images to Telegram
- `telegramSendLocation`: Send location coordinates to Telegram
- `telegramSendButtons`: Send interactive buttons
- `telegramSendDocument`: Send documents

#### SMS Methods
- `smsRegular`: Send regular SMS
- `smsVIP`: Send VIP priority SMS
- `smsOTP`: Send OTP SMS
- `smsVVIP`: Send high-priority VVIP SMS

#### AI & Other Methods
- `aiChat`: AI-powered conversation
- `getProfile`: Retrieve profile information
- `updatePresence`: Update presence status
- `getMessageStatusAll`: Get all message statuses
- `getLastStatus`: Get last message status
- `getLastReceiptStatus`: Get last receipt status

## Configuration

### Environment Variables

The application uses the following environment variables:

- `APP_KEY`: Laravel application key (generated automatically)
- Other standard Laravel environment variables

## API Credentials

To use the Apipedia API, you need to obtain:
- **App Key**: Your application identifier
- **Auth Key**: Your authentication token

Contact Apipedia support or visit their portal to get these credentials.

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