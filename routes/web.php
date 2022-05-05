<?php

use Illuminate\Support\Facades\Route;

Route::get('/{params}', config('laravel-components.route.controller'))->where('params', '.*');