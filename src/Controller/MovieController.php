<?php

namespace App\Controller;

use App\Entity\Review;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Movie;

class MovieController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home(Request $request)
    {
        //récupère la classe qui est responsable d'aller faire des SELECT dans la table movie
        $movieRepo = $this->getDoctrine()->getRepository(Movie::class);

        //récupère l'éventuel paramètre de recherche
        $q = $request->query->get('q');


        //avant de modifier le code pour eviter les 50 requetes sur le home
        //if (empty($q)) {
            //exécute notre requête select
            //récupère les 50 meilleurs films
        //    $movies = $movieRepo->findby([], ["rating" => "DESC"], 50);
       // }
        //on fait la recherche
        //else{
            $movies = $movieRepo->search($q);
        //}
        //passe les films à twig
        return $this->render("movie/home.html.twig", ["movies" => $movies]);

    }


    /**
     * @Route("/movie/{id}", 
     *  name="movie_detail",
     *  requirements={
     *    "id": "\d+"
     *  })
     */
    public function detail($id)
    {
        $movieRepo = $this->getDoctrine()->getRepository(Movie::class);
        $reviewRepo = $this->getDoctrine()->getRepository(Review::class);

        $movie = $movieRepo->find($id);
        $reviews = $reviewRepo->findBy(["movie" => $movie], ["dateCreated" => "DESC"], 20);

        //debugg le dump ou le die permet de suivre une variable
        //dump($movie);
        //die();

        return $this->render("movie/detail.html.twig", ["id" => $id, "movie" => $movie, "reviews" => $reviews, ]);
    }

}
