<?php

namespace App\Controllers;

use App\Controllers\Controller;

class ProductsController extends Controller
{
    public function index($request, $response, $args)
    {
        return $this->view->render($response, 'product-lines.twig');
    }

    public function show($request, $response, $args)
    {
        $slug = $args['slug'];

        $parser = new \Mni\FrontYAML\Parser();

        $path = 'resources/content/' . $slug . '.yaml';
        $document = $parser->parse(file_get_contents($path));
        $item = $document->getYAML();
        $content = $document->getContent();


        return $this->view->render($response, 'product-line-details.twig', compact('item', 'content'));
    }
}