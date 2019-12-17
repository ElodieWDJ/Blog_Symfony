<?php
namespace App\CRUD\Blog;
use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

class AuteurCRUD
{
    /**
     * @var EntityManagerInterface
     */
    private $em;


    /**
     * @var \App\Repository\Blog\ArticleRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private $repo;


    /**
     * AuteurCrud constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
        $this->repo = $em->getRepository('App:Article');
    }


    /**
     * @param Auteur $auteur
     */

    private function persist(Auteur $auteur)
    {
        $this->em->persist($auteur);
        $this->em->flush();
    }
    public function add(Auteur $auteur): void
    {
        $this->persist($auteur);

    }


    /**
     * @param Auteur $auteur
     */
    public function update(Auteur $auteur): void
    {
        $this->persist($auteur);
    }


    /**
     * @param Auteur $auteur
     */
    public function delete(Auteur $auteur): void
    {

        $this->em->remove($auteur);
        $this->em->flush();
    }

    /**
     * @return Auteur []|array
     */
    public function getAll(): array
    {
        return $this->repo->findAll();
    }


    /**
     * @param int $id
     * @return Auteur
     */
    public function getOneById(int $id): Auteur
    {
       return $this->repo->find($id);
    }
}