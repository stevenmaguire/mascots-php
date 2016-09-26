<?php

if (!function_exists('isCurrentRoute'))
{
    function isCurrentRoute($routeName = null)
    {
        return Route::currentRouteName() == $routeName;
    }
}
