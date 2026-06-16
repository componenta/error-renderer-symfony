<?php

declare(strict_types=1);

namespace Componenta\Error\Renderer\Symfony\Tests\Renderer;

use Componenta\Error\Context\CliContext;
use Componenta\Error\Renderer\SymfonyRenderer;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use RuntimeException;

#[TestDox('SymfonyRenderer')]
final class SymfonyRendererTest extends TestCase
{
    public function testRenderReturnsHtmlOutput(): void
    {
        $renderer = new SymfonyRenderer(debug: true);
        $exception = new RuntimeException('Symfony renderer test');

        $output = $renderer->render($exception, CliContext::fromArgv());

        self::assertStringContainsString('<!DOCTYPE html>', $output);
        self::assertStringContainsString('Symfony renderer test', $output);
    }
}
