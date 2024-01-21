<?php

if (!function_exists('route_is')) {
    function routeIs(...$patterns): bool
    {
        return request()->routeIs($patterns);
    }
}