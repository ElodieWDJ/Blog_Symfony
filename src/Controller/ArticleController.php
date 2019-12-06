<?php

namespace App\Controller;

use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Article
 * @package App\Controller
 */

/*Création de la classe article*/
class ArticleController extends AbstractController
{
    /**Créer un article
     * @Route("blog/article/create_article", name="create_article")
     * @param Request $request
     * @return Response
     */
    /*Signature de la méthode*/
    public function createArticle(Request $request)/*variable requiest de type objet requiest*/
    {
        /*corps de la méthode*/
        $response = new Response();/*instensiation de l'objet Response à partir de la class Response*/
        $response->setContent("Creation de l'article");/*Accède à la méthode de la class Response qui s'appelle setContent*/
        return $response;
    }

    /**
     * Afficher tous les articles
     * @Route("blog/article/show_article", name="show_article")
     * @param Request $request
     * @return Response
     */
    public function showAllArticle(Request $request)
    {
        $response = new Response();
        $response->setContent("Lecture de l'article");
        return $response;
    }


    /**
     *  * Afficher un article
     * @Route("blog/article/show_one_article{id_article}", name="show_one_article")
     * @param $idArticle
     * @param Request $request
     * @return Response
     */
    public function showOneArticle($idArticle,Request $request)
    {
        $response = new Response();
        $response->setContent("Afficher tous les articles");
        return $response;
    }


    /**
     * Modifier un article
     * @Route("blog/article/update_article{id_article}", name="update_article")
     * @param $idArticle
     * @param Request $request
     * @return Response
     */
    public function updateArticle($idArticle,Request $request)
    {
        $response = new Response();
        $response->setContent("Mise à jour de l'article");
        return $response;
    }


    /**
     * Supprimer article
     * @Route("blog/article/delete_article{id_article}", name="delete_article")
     * @param Request $request
     * @param $idArticle
     * @return Response
     */
    public function deleteArticle($idArticle,Request $request)
    {
        $response = new Response();
        $response->setContent("Supprimer l'article");
        return $response;
    }
}
