<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class appController extends AbstractController
{

    #[Route('/')]
    public function mainApp(): Response
    {
        $body = "<div class='schedule'></div>";
        return $this->render('base.html.twig', [
            'title' => "Newsletter",
            'body' => 'Hello World!'

        ]);
    }
}
