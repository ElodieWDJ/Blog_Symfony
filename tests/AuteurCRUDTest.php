<?php
namespace App\Tests\CRUD\Blog;
use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class AuteurCRUDTest extends WebTestCase
{
    private $auteurCRUD;
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;
        $this->auteurCRUD = $container->get(AuteurCRUD::class);
    }
    public function testAddAuteurSuccessful()
    {
        //Creation d'un nouvel auteur
        $auteur = new Auteur();
        $auteur->setFirstName('Jambe');
        $auteur->setLastName('Debois');
        //Add Auteur
        $this->auteurCRUD->add($auteur);
        //Get auteur Add
        $auteurFromDb = $this->auteurCRUD->getOneById($auteur->getId());
        // veirfication d'egalité
        $this->assertEquals( $auteur->setFirstName(), $auteurFromDb->setFirstName());
    }
    public function testUpdateSuccessful()
    {
        //Get one auteur
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];
        // Change firstName auteur
        $auteur->setFirstName($auteur->getFirstName() . 'Plancton');
        // Update auteur
        $this->auteurCRUD->update($auteur);
        // Get auteur update
        $auteurFromDb = $this->auteurCRUD->getOneById($auteur->getId());
        // verification
        $this->assertEquals( $auteur->getFirstName(), $auteurFromDb->getFirstName());
    }
    public function testDeleteSuccessful()
    {
        // Get One auteur
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];
        // delete auteur
        $this->auteurCRUD->delete($auteur);
        // get auteur delete
        $auteurFormDb = $this->auteurCRUD->getOneById($auteur->getId());
        // verification
        $this->assertNoEmpty($auteurFormDb, $message = 'Auteur surpprimer');
    }
}