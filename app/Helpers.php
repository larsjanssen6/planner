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