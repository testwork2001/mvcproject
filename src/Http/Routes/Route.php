<?php

namespace Src\Http\Routes;

use Src\Http\Request\Request;
use Src\Http\Response\Response;
use Src\Http\Routes\RouteHandle;

class Route
{
    protected static array $routes = [];

    public function __construct(public Request $request, public Response $response)
    {
    }

    public static function get(string $url, callable|array|string $action): void
    {
        self::$routes['get'][slach_handle_url($url)] = $action;
    }

    public static function post(string $url,  callable|array|string $action): void
    {
        self::$routes['post'][slach_handle_url($url)] =  $action;
    }

    public function resolve(): void
    {
        // $prams = $this->request->getPrameters();
        $url = $this->request->url();
        $data = $this->request->all();
        $method = $this->request->method();
        $action = self::$routes[$method][$url] ?? null; 
        RouteHandle::errorHandle(self::$routes,$url,$method);
        RouteHandle::action($action, $data);
    }
}
