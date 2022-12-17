<?php

if (!function_exists('slach_handle_url')) {
    function slach_handle_url(string $url): string
    {
        return  str_starts_with($url, '/') ? $url : "/" . $url;
    }
}

