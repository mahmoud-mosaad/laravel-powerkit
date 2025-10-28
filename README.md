# PowerKit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mahmoudmosaad/powerkit.svg?style=flat-square)](https://packagist.org/packages/mahmoudmosaad/powerkit)  
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mahmoudmosaad/powerkit/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mahmoudmosaad/powerkit/actions?query=workflow%3Arun-tests+branch%3Amain)  
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mahmoudmosaad/powerkit/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mahmoudmosaad/powerkit/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)  
[![Total Downloads](https://img.shields.io/packagist/dt/mahmoudmosaad/powerkit.svg?style=flat-square)](https://packagist.org/packages/mahmoudmosaad/powerkit)

---

**PowerKit** is a Laravel package designed to **supercharge your projects** with modular utilities and developer tools.  
It provides a foundation for building advanced, reusable Laravel features — including **notifications, payments, exception handling, helpers, workflows, and authentication** — organized as installable modules.

---

## 🚀 Features

- ⚙️ Modular architecture (enable or disable features)
- 🧰 Common utilities: helpers, responses, exception handlers
- 💳 Payments integration layer (Stripe, PayPal, etc.)
- 🔔 Notifications support (Mail, SMS, Push, etc.)
- 🧾 Auto-publishable migrations, configs, and translations
- 🧪 Out-of-the-box testing and CI/CD setup
- 📦 Fully configurable via `config/powerkit.php`

---

## 📦 Installation

Install via Composer:

```
composer require mahmoudmosaad/powerkit
```

Publish and run migrations:

```
php artisan vendor:publish --tag="powerkit-migrations"
php artisan migrate
```

Publish the config file:

```
php artisan vendor:publish --tag="powerkit-config"
```

Example published config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | PowerKit Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the enabled PowerKit features here. You can disable any
    | feature that you don't need in your project.
    |
    */

    'features' => [
        'payments' => true,
        'notifications' => true,
        'exceptions' => true,
        'helpers' => true,
    ],
];
```

Optionally, publish the views:

```
php artisan vendor:publish --tag="powerkit-views"
```

---

## ⚙️ Usage

```php
use MahmoudMosaad\PowerKit\Facades\PowerKit;

// Example: send notification
PowerKit::notify('Welcome to PowerKit!');

// Example: process a payment
PowerKit::payment()->charge($user, 100);

// Example: handle exceptions gracefully
PowerKit::exception()->handle($e);
```

You can extend PowerKit easily by creating your own modules inside:

```
src/Features/{YourFeatureName}/
```

---

## 🧩 Configuration

All configuration lives in:

```
config/powerkit.php
```

Each feature (e.g. Payments, Notifications, Helpers) can have its own  
service provider and manager class under:

```
src/Features/{FeatureName}/Providers/
src/Features/{FeatureName}/{FeatureName}Manager.php
```

---

## 🧪 Testing

Run the tests:

```
composer test
```

PowerKit uses **PestPHP** and **PHPUnit** for consistent and simple testing.

---

## 📜 Changelog

See [CHANGELOG](CHANGELOG.md) for details on recent changes.

---

## 🤝 Contributing

Contributions are welcome!  
Please read [CONTRIBUTING](CONTRIBUTING.md) for details.

---

## 🔒 Security Vulnerabilities

If you discover a security vulnerability, please review our  
[Security Policy](SECURITY.md) for how to report it responsibly.

---

## 👏 Credits

- [Mahmoud Mosaad](https://github.com/mahmoudmosaad)

---

## 📄 License

The MIT License (MIT).  
See [LICENSE](LICENSE.md) for more information.

---

> 💡 **Tip:** PowerKit is designed to be the core of your Laravel ecosystem — start with utilities, then extend it with your own packages for seamless project scalability.
