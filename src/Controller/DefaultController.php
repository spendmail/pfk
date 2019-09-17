<?php


namespace App\Controller;


use App\Exception\AppException;
use App\Service\DistributorServiceInterface;
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
        return $this->render('index.html.twig', [
            'title' => 'Distributors',
            'distributors' => $distributorService->getAll(),
        ]);
    }

    /**
     * @Route("/pharmacies", name="pharmacies")
     */
    public function pharmacies(): Response
    {

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
