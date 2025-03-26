<?php

use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'commandes' => CommandeController::class
]);
