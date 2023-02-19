<?php

use App\Core\Router;

use App\Controllers\UsersController;
use App\Controllers\AuthController;
use App\Controllers\BankAccountController;
use App\Controllers\ContactController;
use App\Controllers\ContentController;
use App\Controllers\PartnershipController;
use App\Controllers\PaymentsController;
use App\Controllers\TotalZakatController;
use App\Controllers\ZakatPayController;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;


Router::controller(AuthController::class)->group(function () {
    Router::post('/auth/login', 'login');
    Router::post('/auth/register', 'register');
    Router::delete('/auth/logout', 'logout');
});

Router::controller(ZakatPayController::class, [AuthMiddleware::class])->group(function () {
    Router::post('/zakat-pay', 'store');
});

Router::controller(TotalZakatController::class, [AuthMiddleware::class])->group(function () {
    Router::get('/total-zakat-fitrah', 'totalZakatFitrah');
    Router::get('/total-zakat-maal', 'totalZakatMaal');
    Router::get('/total-zakat-profesi', 'totalZakatProfesi');
});

Router::controller(PaymentsController::class, [AuthMiddleware::class])->group(function () {
    Router::post('/uploads-payment/{id}', 'update');
});

Router::controller(UsersController::class,[AuthMiddleware::class, AdminMiddleware::class])->group(function () {
    Router::get('/users', 'index');
    Router::get('/users/{id}', 'show');
    Router::post('/store', 'store');
    Router::post('/update/{id}', 'update');
    Router::delete('/destroy/{id}', 'destroy');
});

Router::controller(ContentController::class,[AuthMiddleware::class, AdminMiddleware::class])->group(function () {
    Router::get('/contents', 'index');
    Router::get('/contents/{id}', 'show');
    Router::post('/contents-store', 'store');
    Router::post('/contents-update/{id}', 'update');
    Router::delete('/contents-destroy/{id}', 'destroy');
});

Router::controller(ContactController::class, [AuthMiddleware::class, AdminMiddleware::class])->group(function () {
    Router::get('/contacts', 'index');
    Router::get('/contacts/{id}', 'show');
    Router::post('/contacts-store', 'store');
    Router::post('/contacts-update/{id}', 'update');
    Router::delete('/contacts-destroy/{id}', 'destroy');
});

Router::controller(PartnershipController::class, [AuthMiddleware::class, AdminMiddleware::class])->group(function () {
    Router::get('/partnerships', 'index');
    Router::get('/partnerships/{id}', 'show');
    Router::post('/partnerships-store', 'store');
    Router::post('/partnerships-update/{id}', 'update');
    Router::delete('/partnerships-destroy/{id}', 'destroy');
});

Router::controller(BankAccountController::class,[AuthMiddleware::class, AdminMiddleware::class])->group(function () {
    Router::get('/bank-accounts', 'index');
    Router::get('/bank-accounts/{id}', 'show');
    Router::post('/bank-accounts-store', 'store');
    Router::post('/bank-accounts-update/{id}', 'update');
    Router::delete('/bank-accounts-destroy/{id}', 'destroy');
});

Router::run();
