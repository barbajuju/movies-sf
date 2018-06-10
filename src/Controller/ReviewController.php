<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Movie;

class ReviewController extends Controller
{
    /**
     * @Route("/review/{id}/create", name="review_create")
     */
    public function createReview(Request $request, $id)
    {
        //cree une instance de review vide
        $review = new Review();

        //crée le formulaire et lui associe notre instance vide
        $form = $this->createForm(ReviewType::class, $review);

        //renseigne la date actuelle dans notre review
        $review->setDateCreated(new \DateTime());

        //recupérer le film pour l'associer à la review
        $movieRepo = $this->getDoctrine()->getRepository(Movie::class);
        $movie = $movieRepo->find($id);
        $review->setMovie($movie);

        //prend les données du formulaire et les injecte dans le review vide
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();

            //ce message s'affichera sur la page suivante
            $this->addFlash("success", "your review is published");

            return $this->redirectToRoute("movie_detail", ["id" => $id]);
        }

        return $this->render("review/create.html.twig", ["form" => $form->createView()]);
    }
}