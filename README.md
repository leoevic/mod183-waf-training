# Modul 183: WAF Training (insecure PHP application)

> [!WARNING]
> Do not use this app in a real production environment, because it is made to be insecure on purpose.

## Introduction and usage
1. Install all composer dependencies by running `composer install`.
2. To start the development server, run `docker compose up` in the `/docker` subdirectory.
3. To use in "production", copy the contents of the root directory into your webserver root (e.g. `/var/www/html` in Apache2 on Debian/Ubuntu).<br>
Make sure to set the base path of your web server to the `/public` subdirectory. You may need to enable `mod_rewrite` to be able to use the application.

## Security flaws present
- SQL Injection
- XSS
- No form validation