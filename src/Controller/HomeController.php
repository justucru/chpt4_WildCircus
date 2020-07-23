<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="app_index")
     */
    public function homepage() : Response
    {
        return $this->render('homepage.html.twig');
    }

    /**
     * @return Response
     * @Route("/about", name="about")
     */
    public function aboutUs() : Response
    {
        return $this->render('about.html.twig');
    }

    /**
     * @return Response
     * @Route("/contact", name="contact")
     */
    public function contactUs() : Response
    {
        return $this->render('contact.html.twig');
    }
}