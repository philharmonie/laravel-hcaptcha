# Laravel hCaptcha Package

This package provides an easy-to-integrate hCaptcha validation rule for Laravel applications, enabling you to protect your forms from bots and spam efficiently. It uses Laravel's built-in HTTP client and validation features to simplify the implementation of hCaptcha.

## Features

-   Easy integration with any Laravel form.
-   Custom validation rule for hCaptcha.
-   Configurable through Laravel's standard configuration methods.

## Installation

### Via Composer

You can install the package via Composer by running the following command:

```bash
composer require philharmonie/hcaptcha
```

If you are using a private repository or a local version of the package, ensure you have configured your `composer.json` appropriately to recognize the package location.

### Publishing Configuration

After installation, publish the configuration file to your application:

```bash
php artisan vendor:publish --provider="Philharmonie\LaravelHcaptcha\LaravelHcaptchaServiceProvider" --tag="hcaptcha-config"
```

This will copy the default configuration file to your application's config directory.

### Environment Configuration

Add the following entries to your `.env` file to configure your hCaptcha keys:

```
HCAPTCHA_SITE_KEY=your_site_key_here
HCAPTCHA_SECRET_KEY=your_secret_key_here
```

Replace `your_site_key_here` and `your_secret_key_here` with your actual hCaptcha site and secret keys, respectively.

## Usage

To use the hCaptcha rule, include it in your form request validation rules like this:

```php
$request->validate([
    'h-captcha-response' => new ValidateHCaptcha(),
]);
```

Add the hcaptcha script to your `<header>` and optionally provide a [language identifier](https://docs.hcaptcha.com/languages):

```
@hcaptchascript(de)
```

Simply include the hCaptcha widget as follows:

```blade
<form method="POST" action="{{ route('your.route') }}">
    @csrf

     <!-- This will display the hCaptcha -->
    @hcaptcha

    <button type="submit">Submit</button>
</form>
```

## Contributing

Contributions are welcome, especially from those who also use this package in their own applications. To contribute:

1. Fork the repository.
2. Create a new branch for each feature or improvement.
3. Send a pull request from each feature branch to the main branch.

## Support

If you encounter any problems or have any suggestions, please open an issue on the GitHub repository page.

## License

The Laravel hCaptcha package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
