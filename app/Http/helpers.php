<?php

use Illuminate\Support\Facades\Route;

function get_current($routeName, $className = 'active') {
    return Route::currentRouteName() == $routeName ? $className : '';
}
