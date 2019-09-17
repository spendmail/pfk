<?php


namespace App\Controller;


use App\Entity\Distributor;
use App\Form\PharmacyType;
use App\Service\DistributorServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DistributorController extends AbstractController
{
    /**
     * @Route("/distributor", name="distributor")
     * @param DistributorServiceInterface $distributorService
     * @return Response
     */
    public function distributors(DistributorServiceInterface $distributorService): Response
    {
        return $this->render('distributor/distributors.html.twig', [
            'title' => 'Distributors',
            'distributors' => $distributorService->getAll(),
        ]);
    }

    /**
     * @Route("/distributor/add/", name="distributor-add")
     * @param Request $request
     * @return Response
     */
    public function distributorAdd(Request $request): Response
    {
        $distributor = new Distributor();
        $form = $this->createForm(PharmacyType::class, $distributor);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $distributor = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($distributor);
            $em->flush();

            return $this->redirectToRoute('distributor');
        }

        return $this->render('distributor/distributor-add.html.twig', [
            'title' => 'Add distributor form',
            'form' => $form->createView(),
        ]);
    }

//    /**
//     * @Route("/create-initial-distributors")
//     * @param DistributorServiceInterface $distributorService
//     * @return Response
//     */
//    public function createInitialDistributors(DistributorServiceInterface $distributorService)
//    {
//        try {
//            $distributorService->createInitialDistributors();
//        } catch (AppException $exception) {
//            return new Response($exception->getMessage());
//        }
//
//        return new Response('Initial distributors created.');
//    }
}
