<?php


namespace App\Controller;


use App\Entity\Product;
use App\Form\ProductType;
use App\Service\ProductServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     * @param ProductServiceInterface $productService
     * @return Response
     */
    public function products(ProductServiceInterface $productService): Response
    {
        return $this->render('product/products.html.twig', [
            'title' => 'Products',
            'products' => $productService->getAll(),
        ]);
    }

    /**
     * @Route("/product/add/", name="product-add")
     * @param Request $request
     * @return Response
     */
    public function productAdd(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product');
        }

        return $this->render('product/product-add.html.twig', [
            'title' => 'Add product form',
            'form' => $form->createView(),
        ]);
    }
}
