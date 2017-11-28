<?php

/*
|--------------------------------------------------------------------------
| #WEB
|--------------------------------------------------------------------------
*/



use App\Controllers\HomeController;
use App\Controllers\ProductsController;
use App\Controllers\SiteController;



// #HOME
// =========================================================================

$app->get('/', HomeController::class . ':index')->setName("home");

// Nav Pages
$app->get('/product-lines', ProductsController::class . ':index')->setName("product-lines");
$app->get('/catalog', SiteController::class . ':catalog')->setName("catalog");
$app->get('/sales-reps', SiteController::class . ':salesReps')->setName("sales-reps");
$app->get('/contact-us', SiteController::class . ':contact')->setName("contact");

// Misc Pages
$app->get('/about-us', SiteController::class . ':about')->setName("about");
$app->get('/featured-products', SiteController::class . ':featuredProducts')->setName("featured");
$app->get('/imports', SiteController::class . ':imports')->setName("imports");
$app->get('/standard-products', SiteController::class . ':standardProducts')->setName("standard");
$app->get('/surplus', SiteController::class . ':surplus')->setName("surplus");


$app->get('/models', function($req, $res, $args){
    return $this->view->render($res, '/models.twig');
});



// Different product lines pages
$app->get('/{slug}', ProductsController::class . ':show')->setName("product");

// Email Form post
$app->post('/', HomeController::class . ':post');