# InertiaJS Error Page

[![Latest Version on Packagist](https://img.shields.io/packagist/v/arielmejiadev/inertiajs-error-page.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/inertiajs-error-page)
[![Total Downloads](https://img.shields.io/packagist/dt/arielmejiadev/inertiajs-error-page.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/inertiajs-error-page)

It adds a vue component to load error pages with the beautiful Illustrations of Laravel 5.7 using TailwindCSS.

## Installation

You can install the package via composer:

```bash
composer require arielmejiadev/inertiajs-error-page
```

## Publish files

```php
php artisan vendor:publish --tag=inertiajs-errors
```


## Usage

Go to "app/Exceptions/Handler.php" and override the render method and add another custom method:

``` php
public function render($request, Throwable $exception)
{
    $response = parent::render($request, $exception);

    if ($this->thereAreErrorsInProduction($response)) {

        return \Inertia\Inertia::render('Errors/Error', [
            'status' => $response->status(),
            'message' => $exception->getMessage(),
            'home' => config('app.url'),
        ])->toResponse($request)->setStatusCode($response->status());
    }

    return $response;
}

public function thereAreErrorsInProduction($response)
{
    return \Illuminate\Support\Facades\App::environment('production') && in_array($response->status(), [500, 503, 404, 403, 401, 419, 429]);
}
```

## Test error pages locally

In your env file change:

```dotenv
APP_ENV=production
```

* Remember

If you are using Inertia Stack you need to compile your assets
```
npm run watch
```

You can test different code responses, the easiest way is to search a route that does not exists in your project :) to get a 404.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email arielmejiadev@gmail.com instead of using the issue tracker.

## Credits

- [Ariel Mejia Dev](https://github.com/arielmejiadev)
- [Steve Schoger](https://github.com/sschoger)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
