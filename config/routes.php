<?php

declare(strict_types=1);

use App\Controller\SiteController;
use Yiisoft\DataResponse\Middleware\FormatDataResponseAsJson;
use Yiisoft\Router\Route;

return [
    Route::get('/')->action([SiteController::class, 'index'])->name('home'),
    Route::post('/convert')
        ->middleware(FormatDataResponseAsJson::class)
        ->action([SiteController::class, 'convert'])
        ->name('convert'),
];
