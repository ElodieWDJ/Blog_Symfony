<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Test
 * @package App\Controller
 */
class Test extends AbstractController
{
    /**
     * @return Response
     */
    function maPageDeTest($theme)
    {
        $response = new Response();
        $content ="<html><body>Theme = $theme</body></html>";

        $response->setContent($content);

        /*$response->setContent("<html><body>'Hello world'</body></html>");
        $response->setStatusCode(200);
*/
            return $response;
    }

}