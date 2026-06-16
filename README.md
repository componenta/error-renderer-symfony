# Componenta Error Renderer Symfony

Symfony error renderer integration for `componenta/error-handler`. It adapts `symfony/error-handler` to `ErrorRendererInterface`.

## Installation

```bash
composer require componenta/error-renderer-symfony
```

## Main API

```php
use Componenta\Error\Renderer\SymfonyRenderer;

$renderer = new SymfonyRenderer();
$html = $renderer->render($exception, $context);
```

`SymfonyRenderer` always supports the passed exception/context pair. Select it explicitly or place it in a composite renderer when an application wants Symfony HTML pages.

## Boundary

This package only renders error output. It does not decide whether an exception is reportable and does not emit HTTP responses.

## Related Packages

- [`componenta/error-handler`](../error-handler/README.md) defines `ErrorRendererInterface`.
- [`componenta/error-handler-app`](../error-handler-app/README.md) configures application renderers and error listeners.
