<?php


namespace Yaliilyaya\Symfony6AdminLte\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package Yaliilyaya\Symfony6AdminLte\Controller
 */
class DefaultController extends AbstractController
{
    #[Route("/")]
    public function index(): Response
    {
        return $this->render('@DataAdmin/mainPage.html.twig', []);
    }

    #[Route("/icons", name: "icons")]
    public function icons(): Response
    {
        return $this->render('@DataAdmin/main/icons.html.twig', []);
    }

    #[Route("/schema/list", name: "schema.list")]
    public function schemaList(): Response
    {
        return $this->render('@DataAdmin/schema/list.html.twig', []);
    }
}