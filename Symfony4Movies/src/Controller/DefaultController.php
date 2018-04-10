<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Component\HttpFoundation\Response as ResponseHttp;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/{offset}", name="home", defaults={"offset":0})
     *
     */
    public function home($offset)
    {
        $user   = "toto";
        $repo   = $this->getDoctrine()->getRepository(Movie::class);
        $movie  = $repo->findBy([], ["title" => "DESC", "year" => "DESC"], 50, $offset);

        return $this->Render("default/home.html.twig", ["movies" => $movie]);
    }

    /**
     * @Route("/about/us", name="about_us")
     */
    public function aboutUs()
    {
        return $this->Render("default/about.html.twig");
    }
}
