<?php

namespace Src\Http\Routes;

class RouteHandle
{
    public static function action(callable|array|string|null $action, array $data )
    {
        if (is_callable($action)) {
            call_user_func_array($action, [$data]);
        } elseif (is_array($action)) {
            call_user_func_array([new $action[0], $action[1]], [$data]);
        } elseif (is_string($action)) {
            $action = explode("@", $action);
            call_user_func_array([new $action[0], $action[1]], [$data]);
        } else {
            false;
        }
    }

    public static function errorHandle(array $routesMap,  string  $requestURL, string $requestMethod)
    {
        $findRoute = false;
        $methodSupport = false;
        foreach ($routesMap as $routeMethod => $routes) {
            if (array_key_exists($requestURL, $routes)) {
                $findRoute = true;
                if ($routeMethod  != $requestMethod) {
                    $methodSupport = true;
                }
            }
        }
        if($findRoute === false){
            dd(404); // abort(404)
        }

        if($methodSupport){
            dd(405); // abort()
        }
    }
}
