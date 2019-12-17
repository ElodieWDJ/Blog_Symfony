<?php

namespace App\Controller;


use App\CRUD\Blog\ArticleCRUD;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Article
 * @package App\Controller
 */

/*Création de la classe article*/
class ArticleController extends AbstractController
{
    /**
     * @Route("/blog/article/create_article", name="create_article")
     * @param Request $request
     * @return Response
     */
    /*Signature de la méthode*/
    public function createArticle(Request $request)
        /*variable requiest de type objet requiest*/
    {
        /*corps de la méthode
        $response = new Response();instensiation de l'objet Response à partir de la class Response
        $response->setContent("Creation de l'article");/*Accède à la méthode de la class Response qui s'appelle setContent
        return $response;*/

        return $this->render('blog/articles/create.html.twig',
            ["monId" => "2ygvybyb"]
        );
    }

  /**
   * Afficher tous les articles
   * @Route("/blog/article/show_article", name="show_article")
   * @param ArticleCRUD $articleCRUD
   * @return Response
   */
    public function showAllArticle (ArticleCRUD $articleCRUD)
    {
        $articles = $articleCRUD->getAll();
        return $this->render('blog/articles/show.html.twig',[ 'articles'=> $articles]);

    }


    /**
     *  * Afficher un article
     * @Route("blog/article/show_one_article{id_article}", name="show_one_article")
     * @param $idArticle
     * @param ArticleCRUD $articleCRUD
     * @return Response
     */
    public function showOneArticle($idArticle,ArticleCRUD $articleCRUD)
    {
        $article = $articleCRUD->getOneById($idArticle);
        return $this->render('blog/articles/show_one.html.twig');
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
        return $this->render('blog/articles/update.html.twig');
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
        return $this->render('blog/articles/delate.html.twig');
    }
}
