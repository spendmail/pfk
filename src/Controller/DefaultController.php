<?php


namespace App\Controller;


use App\Exception\AppException;
use App\Service\DistributorServiceInterface;
use App\Service\PharmacyServiceInterface;
use App\Service\ProductServiceInterface;
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
        return $this->redirectToRoute("distributors");
    }

    /**
     * @Route("/distributors", name="distributors")
     * @param DistributorServiceInterface $distributorService
     * @return Response
     */
    public function distributors(DistributorServiceInterface $distributorService): Response
    {
        return $this->render('distributors.html.twig', [
            'title' => 'Distributors',
            'distributors' => $distributorService->getAll(),
        ]);
    }

    /**
     * @Route("/pharmacies", name="pharmacies")
     * @param PharmacyServiceInterface $pharmacyService
     * @return Response
     */
    public function pharmacies(PharmacyServiceInterface $pharmacyService): Response
    {
        return $this->render('pharmacies.html.twig', [
            'title' => 'Pharmacies',
            'pharmacies' => $pharmacyService->getAll(),
        ]);
    }

    /**
     * @Route("/products", name="products")
     * @return Response
     */
    public function products(ProductServiceInterface $productService): Response
    {
        return $this->render('products.html.twig', [
            'title' => 'Products',
            'products' => $productService->getAll(),
        ]);
    }

    /**
     * @Route("/orders", name="orders")
     * @return Response
     */
    public function orders(): Response
    {
        return $this->render("orders.html.twig", [
            "title" => "Orders",
            "orders" => [],
        ]);
    }

    /**
     * @Route("/create-initial-distributors")
     * @param DistributorServiceInterface $distributorService
     * @return Response
     */
    public function createInitialDistributors(DistributorServiceInterface $distributorService)
    {
        try {
            $distributorService->createInitialDistributors();
        } catch (AppException $exception) {
            return new Response($exception->getMessage());
        }

        return new Response('Initial distributors created.');
    }

    /**
     * @Route("/distributors")
     * @param DistributorServiceInterface $distributorService
     * @return Response
     */
    public function getAllDistributors(DistributorServiceInterface $distributorService)
    {
        $distributors = $distributorService->getAll();

        return new Response(serialize($distributors));
    }
}
