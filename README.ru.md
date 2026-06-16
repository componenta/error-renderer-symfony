# Componenta Error Renderer Symfony

Интеграция рендерера Symfony для `componenta/error-handler`. Пакет адаптирует `symfony/error-handler` к `ErrorRendererInterface`.

## Установка

```bash
composer require componenta/error-renderer-symfony
```

## Основной API

```php
use Componenta\Error\Renderer\SymfonyRenderer;

$renderer = new SymfonyRenderer();
$html = $renderer->render($exception, $context);
```

`SymfonyRenderer` поддерживает любую переданную пару исключения и контекста. Выбирайте его явно или добавляйте в составной рендерер, если приложению нужны HTML-страницы Symfony.

## Граница пакета

Пакет только рендерит вывод ошибки. Он не решает, нужно ли логировать исключение, и не отправляет HTTP-ответы.

## Связанные пакеты

- [`componenta/error-handler`](../error-handler/README.ru.md) определяет `ErrorRendererInterface`.
- [`componenta/error-handler-app`](../error-handler-app/README.ru.md) настраивает рендереры приложения и слушатели ошибок.
