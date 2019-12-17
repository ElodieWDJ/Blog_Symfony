<?php

namespace App\Controller;

use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use App\Form\Blog\AuteurFormType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
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
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    /*Signature de la méthode*/
    public function createAuteur(Request $request, AuteurCRUD $auteurCRUD)
    {
        //create empty auteur
        $auteur = new Auteur();

        //create form
        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );

        //Handle form = submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid())
        {
            //persist
            $auteurCRUD->add ($auteur);

            //redirect
            return $this->redirectToRoute('blog_auteur_show_one',['idAuteur'=>$auteur->getId()]);
        }
        //create and return template
        return $this->render('blog/auteurs/create.html.twig',
            [
            'auteurForm' => $form->createView()
            ]);
    }

    /**
     * Afficher un auteur
     * @Route("blog/auteur/show_one_auteur{id_auteur}", name="show_one_auteur")
     * @param $idAuteur
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    public function showOneAuteur($idAuteur, AuteurCRUD $auteurCRUD)
    {
        $auteur = $auteurCRUD->getOneById($idAuteur);
        return $this->render('blog/auteurs/show_one.html.twig');
    }

    /**
     * Afficher tous les auteurs
     * @Route("blog/auteur/show_auteur", name="show_auteur")
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    public function showAuteur( AuteurCRUD $auteurCRUD)
    {
        $auteur = $auteurCRUD->getAll();
        return $this->render('blog/auteurs/show.html.twig');
    }


    /**
     * Modifier l'auteur
     * @Route("blog/auteur/update_auteur/{idAuteur}", name="update_auteur")
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @param $idAuteur
     * @return Response
     */
    public function update(Request $request, AuteurCRUD $auteurCRUD, $idAuteur)
    {
        //create empty auteur
        $auteur = $auteurCRUD->getOneById($idAuteur);
        dump($auteur);
        //create form
        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );
        dump($form);

        //Handle form = submit
        $form->handleRequest($request);

        //treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            //Persist
            $auteurCRUD->update($auteur);

            //redirect
            return $this->redirectToRoute('show_all_auteur', [
                "idAuteur" => $idAuteur
            ]);
        }
        //create and return template
        return $this->render('blog/auteurs/update.html.twig',
            [
                'auteurForm' => $form->createView()
            ]);
    }


    /**
     * Supprimer l'auteur
     * @Route("blog/auteur/delete_auteur", name="delete_auteur")
     * @param $idAuteur
     * @return Response
     */
    public function delete(AuteurCRUD $auteurCRUD, $idAuteur)
    {
        //get auteur
    $auteur = $auteurCRUD->getOnById($idAuteur);

    //delete
    $auteurCRUD->delete($auteur);

    //redirect
    return $this-> redirectToRoute('blog_show_auteur');

}}
