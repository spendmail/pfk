<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     * @return Response
     */
    public function index()
    {
        return $this->redirectToRoute("distributor");
    }

    /**
     * @Route("/orders", name="orders")
     * @return Response
     */
    public function orders(): Response
    {
        return $this->render("order/orders.html.twig", [
            "title" => "Orders",
            "orders" => [],
        ]);
    }
}
