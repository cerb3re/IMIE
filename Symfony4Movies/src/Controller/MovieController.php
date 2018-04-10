<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MovieController extends Controller
{
    /**
     * @Route("/movie/{offset}", name="movies", defaults={"offset":0})
     */
    public function index($offset)
    {
        $repo   = $this->getDoctrine()->getRepository(Movie::class);
        $movies = $repo->findBy([], ["title" => "DESC", "year" => "DESC"], 10, $offset);

        return $this->render('movie/index.html.twig', [
            'movie' => $movies,
        ]);
    }

    /**
     * @Route("/movie/about/{offset}", name="movie_about")
     */
    public function movieAbout($offset)
    {
        $repo = $this->getDoctrine()->getRepository(Movie::class);
        $about = $repo->find($offset);

        return $this->render('movie/movies.html.twig', ["about" => $about]);
    }
}
