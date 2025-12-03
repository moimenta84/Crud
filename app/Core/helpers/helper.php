<?php

declare(strict_types=1);

function render(string $view, array $data = []): string
{
    extract($data);
    ob_start();
    include __DIR__ . "/../../../resources/views/{$view}.php";
    return ob_get_clean();
}

function view(string $view, array $data = [], string $layout = 'layouts/app'): void
{
    // Renderiza primero el contenido de la vista principal
    $content = render($view, $data);
    // El layout recibe las mismas variables + $content
    echo render($layout, array_merge($data, ['content' => $content]));
}

function e(mixed $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): void
{
    header('Location: ' . BASE_URL . $url);
    exit;
}

function d(mixed $var): void
{
    echo "<pre>" . print_r($var, true) . "</pre>";
}

function dd(mixed $var): void
{
    d($var);
    die;
}

function json(array|object|null $data, int $response_code = 200): void
{
    http_response_code($response_code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}


