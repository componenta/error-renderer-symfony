<?php

declare(strict_types=1);

namespace Componenta\Error\Renderer;

use Componenta\Error\ErrorContextInterface;
use Componenta\Error\Renderer\ErrorRendererInterface;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Throwable;

/**
 * Symfony-based HTML error renderer
 *
 * Renders exceptions using Symfony's HtmlErrorRenderer with
 * beautiful debug pages including stack traces and code snippets.
 */
readonly class SymfonyRenderer implements ErrorRendererInterface
{
    /**
     * Create Symfony renderer
     *
     * @param bool $debug Show detailed debug information
     * @param string $charset Character encoding
     * @param string|null $fileLinkFormat IDE file link format (e.g., 'phpstorm://open?file=%f&line=%l')
     */
    public function __construct(
        private bool $debug = false,
        private string $charset = 'UTF-8',
        private ?string $fileLinkFormat = null,
    ) {
    }

    /**
     * Render exception as HTML
     *
     * @param Throwable $exception Exception to render
     * @param ErrorContextInterface $context Context information
     * @return string Rendered HTML output
     */
    public function render(Throwable $exception, ErrorContextInterface $context): string
    {
        $renderer = new HtmlErrorRenderer(
            $this->debug,
            $this->charset,
            $this->fileLinkFormat,
        );

        return $renderer->render($exception)->getAsString();
    }

    /**
     * Check if renderer supports the exception
     *
     * @param Throwable $exception Exception to check
     * @param ErrorContextInterface $context Context information
     * @return bool Always returns true
     */
    public function supports(Throwable $exception, ErrorContextInterface $context): bool
    {
        return true;
    }
}
