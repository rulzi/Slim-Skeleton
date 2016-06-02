<?php
//Routes
use App\Controller\HomeController;
use App\Controller\AuthController;

$app->get('/', HomeController::class.':indexAction')->setName('home');
$app->get('/welcome', HomeController::class.':welcomeAction')->setName('welcome')
->add(new \App\Middleware\UserAuthMiddleware($container));

$app->get('/register', AuthController::class.':registerPageAction')->setName('registerPage');
$app->post('/register', AuthController::class.':registerSaveAction')->setName('registerSave');

$app->get('/login', AuthController::class.':loginPageAction')->setName('loginPage');
$app->post('/login', AuthController::class.':loginAction')->setName('login');

$app->get('/logout', AuthController::class.':logoutAction')->setName('logout');
