<?php

declare(strict_types=1);

namespace App\Core;

class Request
{
    protected array $data = [];
    protected array $get = [];
    protected array $post = [];
    protected array $server = [];

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;

        $this->data = array_merge($this->get, $this->post);
    }

    public function __get($name): mixed
    {
        return $this->data[$name] ?? null;
    }

    public function __isset($name): bool
    {
        return array_key_exists($name, $this->data);
    }

    /** Devuelve solo parámetros de la query string (GET) */
    public function query(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) return $this->get;
        return $this->get[$key] ?? $default;
    }

    /** Devuelve solo parámetros enviados por POST */
    public function post(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) return $this->post;
        return $this->post[$key] ?? $default;
    }

    /** Devuelve GET + POST (POST tiene prioridad) */
    public function input(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) return $this->data;
        return $this->data[$key] ?? $default;
    }

    /** Devuelve variables del servidor */
    public function server(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) return $this->server;
        return $this->server[$key] ?? $default;
    }

    /** Devuelve la URL solicitada, incluyendo el path y query string. */
    public function url(): string
    {
        return $this->server['REQUEST_URI'] ?? '/';
    }

    /** Devuelve solo el path relativo (sin query string) */
    public function path(): string
    {
        return parse_url($this->server['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
    }

    // NUEVO EN P5_9 → helper global para enviar JSON desde controladores API
    function json(array|object|null $data, int $response_code = 200): void
    {
        http_response_code($response_code);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
