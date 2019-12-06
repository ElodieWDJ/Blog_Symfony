<?php

namespace App\Controller;

use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Auteur
 * @package App\Controller
 */

/*Création de la classe auteur*/
class AuteurController extends AbstractController
{
    /**
     * Création de l'auteur
     * @Route("blog/auteur/create_auteur", name="create_auteur")
     * @param Request $request
     * @return Response
     */
    /*Signature de la méthode*/
    public function createAuteur(Request $request)/*variable requiest de type objet requiest*/
    {
        /*corps de la méthode*/
        $response = new Response();/*instensiation de l'objet Response à partir de la class Response*/
        $response->setContent("Creation de l'auteur");/*Accède à la méthode de la class Response qui s'appelle setContent*/
        return $response;
    }

    /**
     * Afficher un auteur
     * @Route("blog/auteur/show_one_auteur{id_auteur}", name="show_one_auteur")
     * @param $idAuteur
     * @param Request $request
     * @return Response
     */
    public function showOneAuteur($idAuteur, Request $request)
    {
        $response = new Response();
        $response->setContent("Afficher un auteur");
        return $response;
    }

    /**
     * Afficher tous les auteurs
     * @Route("blog/auteur/show_auteur{idAuteur}", name="show_auteur")
     * @param Request $request
     * @return Response
     */
    public function showAuteur( Request $request)
    {
        $response = new Response();
        $response->setContent("Afficher tous les auteurs");
        return $response;
    }



    /**
     * Modifier l'auteur
     * @Route("blog/auteur/update_auteur", name="update_auteur")
     * @param Request $request
     * @param $idAuteur
     * @return Response
     */
    public function updateAuteur($idAuteur,Request $request)
    {
        $response = new Response();
        $response->setContent("Mise à jour de l'auteur");
        return $response;
    }
    /**
     * Supprimer l'auteur
     * @Route("blog/auteur/delete_auteur", name="delete_auteur")
     * @param Request $request
     * @param $idAuteur
     * @return Response
     */
    public function deleteAuteur($idAuteur,Request $request)
    {
        $response = new Response();
        $response->setContent("Supprimer l'auteur");
        return $response;
    }
}
