<?php

use App\View\Markdown\PHPeterMarkdownConverter;
use Illuminate\Support\Facades\Log;
use League\CommonMark\Exception\CommonMarkException;

if (!function_exists('route_is')) {
    function routeIs(...$patterns): bool
    {
        return request()->routeIs($patterns);
    }
}

if (!function_exists('markdown')) {
    function markdown($text): string
    {
        $config = [];

        $converter = new PHPeterMarkdownConverter($config);
        try {
            return (string) $converter->convert($text);
        } catch (CommonMarkException $e) {
            Log::error($e->getMessage());
            return $text;
        }
    }
}