<?php

use Illuminate\Support\Facades\Request;

if (! function_exists('setActive')) {
    /**
     * @param $path
     * @param string $active
     *
     * @return string
     */
    function setActive($path, $active = 'is-active')
    {
        return Request::path() == $path ? $active : '';
    }
}

/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function isActiveRoute($route, $output = "is-active")
{
    if (in_array(Route::currentRouteName(), $route)) return $output;
}