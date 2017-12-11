<?php

// // Register global error and exception handlers
// ErrorHandler::register();
// ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());

// Register services.
$app['dao.article'] = function ($app) {
    return new src\stpaul\Domain\SejourDAO($app['db']);
};