<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app")
     */
    public function index(): Response
    {
        $response = new Response();
        $date = new \DateTime();
    
        $response->setContent(json_encode([
            'id' => uniqid(),
            'time' => $date->format("Y-m-d")
        ]));
    
        $response->headers->set('Content-Type', 'application/json');
        // Allow all websites
        $response->headers->set('Access-Control-Allow-Origin', '*');
        // Or a predefined website
        //$response->headers->set('Access-Control-Allow-Origin', 'https://jsfiddle.net/');
        // You can set the allowed methods too, if you want
        //$response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, PATCH, OPTIONS');
        
        return $this->render('app/index.html.twig', [$response]);
    }
}
