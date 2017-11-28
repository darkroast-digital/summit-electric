<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SiteController extends Controller
{
    public function catalog($request, $response, $args)
    {
        return $this->view->render($response, 'catalog.twig');
    }

    public function salesReps($request, $response, $args)
    {
        return $this->view->render($response, 'sales-reps.twig');
    }

    public function contact($request, $response, $args)
    {
        return $this->view->render($response, 'contact.twig');
    }

    public function about($request, $response, $args)
    {
        return $this->view->render($response, 'about-us.twig');
    }

    public function featuredProducts($request, $response, $args)
    {
        return $this->view->render($response, 'featured-products.twig');
    }

    public function imports($request, $response, $args)
    {
        return $this->view->render($response, 'imports.twig');
    }

    public function standardProducts($request, $response, $args)
    {
        return $this->view->render($response, 'standard-products.twig');
    }

    public function surplus($request, $response, $args)
    {
        return $this->view->render($response, 'surplus.twig');
    }
}