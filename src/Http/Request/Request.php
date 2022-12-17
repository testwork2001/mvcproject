<?php

namespace Src\Http\Request;

class Request
{
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function url(): string
    {
        $url = $_SERVER['REQUEST_URI'];
        return str_contains($url, '?')  ? explode("?", $url)[0] : $url;
    }

    public function all(): array
    {
        return  $_REQUEST;
    }

    public function getPrameters(): array
    {
        $prams = [];
        $query = $_SERVER['QUERY_STRING'] ?? NULL;
        $pattern = "/^[a-zA-Z0-9=&-_]+$/";
        if (!is_null($query)) {
            if (preg_match($pattern, $query)) {
                $queryArray = explode('&', $query);
                foreach ($queryArray as $item) {
                    if (!empty($item)) {
                        $item = explode('=', $item);
                        $prams[$item[0]] = $item[1] ?? null;
                    }
                }
            }
        }
        return $prams;
    }
}
