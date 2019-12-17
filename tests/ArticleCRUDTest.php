<?php
namespace App\Tests\CRUD\Blog;
use App\CRUD\Blog\ArticleCRUD;
use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class ArticleCRUDTest extends WebTestCase
{
    /**
     * @var ArticleCRUD
     */
    private $articleCRUD;
    /**
     * @var AuteurCRUD
     */
    private $auteurCRUD;
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;
        $this->articleCRUD = $container->get(ArticleCRUD::class);
        $this->auteurCRUD = $container->get(AuteurCRUD::class);
    }
    /**
     * @throws \Exception
     */
    public function testAddArticleSuccessful()
    {
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];
        $article = new Article();
        $article->setTitle('test title');
        $article->setContent('test content');
        $article->setAuteur($auteur);
        $this->articleCRUD->add($article);
        $articleFromDb = $this->articleCRUD->getOneById($article->getId());
        $this->assertEquals(
            $article->getTitle(),
            $articleFromDb->getTitle()
        );
    }
    /**
     *
     * @throws \Exception
     */
    public function testDeleteArticleSuccessful()
    {
        $auteurs = $this->auteurCRUD->getAll();
        $auteur = $auteurs[0];
        $article = new Article();
        $article->setTitle('test title');
        $article->setContent('test content');
        $article->setAuteur($auteur);
        $this->articleCRUD->add($article);
        $articleFromDb = $this->articleCRUD->getOneById($article->getId());
        $this->articleCRUD->delete($article);
        $this->assertNotEmpty($articleFromDb, $message = "Article supprimé");
    }
    public function testUpdateArticleSuccessful()
    {
        // Get one article
        $articles = $this->articleCRUD->getAll();
        $article = $articles[0];
        // Change article title
        $article->setTitle($article->getTitle() . 'xxxxxx');
        // Update article
        $this->articleCRUD->update($article);
        // Get article updated
        $articleFromDb = $this->articleCRUD->getOneById($article->getId());
        // verifier si ils sont egaux
        $this->assertEquals(
            $article->getTitle(),
            $articleFromDb->getTitle()
        );
    }
}