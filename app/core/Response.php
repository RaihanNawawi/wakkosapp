<?php
class Response {
    public static function notFound(): void
    {
        http_response_code(404);
        require_once APP_ROOT . '/views/errors/404.php';
        exit;
    }
}
