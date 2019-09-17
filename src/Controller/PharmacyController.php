<?php


namespace App\Controller;


use App\Entity\Pharmacy;
use App\Form\PharmacyType;
use App\Service\PharmacyServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PharmacyController extends AbstractController
{
    /**
     * @Route("/pharmacy", name="pharmacy")
     * @param PharmacyServiceInterface $pharmacyService
     * @return Response
     */
    public function pharmacies(PharmacyServiceInterface $pharmacyService): Response
    {
        return $this->render('pharmacy/pharmacies.html.twig', [
            'title' => 'Pharmacies',
            'pharmacies' => $pharmacyService->getAll(),
        ]);
    }

    /**
     * @Route("/pharmacy/add/", name="pharmacy-add")
     * @param Request $request
     * @return Response
     */
    public function productAdd(Request $request): Response
    {
        $pharmacy = new Pharmacy();
        $form = $this->createForm(PharmacyType::class, $pharmacy);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pharmacy = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($pharmacy);
            $em->flush();

            return $this->redirectToRoute('pharmacy');
        }

        return $this->render('pharmacy/pharmacy-add.html.twig', [
            'title' => 'Add pharmacy form',
            'form' => $form->createView(),
        ]);
    }
}
