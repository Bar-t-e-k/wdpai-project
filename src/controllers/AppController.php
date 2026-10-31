<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AppController
{
    protected function isAuthenticated(): bool
    {
        return ($_SESSION['authenticated'] ?? false) === true;
    }

    protected function requireAuthentication(): void
    {
        if ($this->isAuthenticated()) {
            return;
        }

        $this->redirect('/login');
    }

    protected function redirect(string $location): never
    {
        header('Location: ' . $location);
        exit;
    }

    protected function render(string $template, array $variables = []): void
    {
        $templatePath = dirname(__DIR__, 2) . '/public/views/' . $template . '.html.php';

        if (!is_file($templatePath)) {
            throw new \RuntimeException('View not found: ' . $template);
        }

        extract($variables, EXTR_SKIP);
        require $templatePath;
    }
}