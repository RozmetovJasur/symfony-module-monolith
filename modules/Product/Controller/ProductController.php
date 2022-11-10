<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 06.09.2022
 * Time: 18:42
 */

namespace Modules\Product\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Modules\Product\Entity\Product;
use Modules\Product\Form\ProductType;
use Modules\Product\Rabbit\ProductProducer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/admin/products", name="products_index")
     */
    public function index(Request $request, PaginatorInterface $paginator, EntityManagerInterface $entityManager)
    {
        $query = $entityManager->getRepository(Product::class)
            ->createQueryBuilder('p');
        $pagination = $paginator->paginate(
            $query,
            $request->request->get('page', 1),
            $request->request->get('size', 20),
        );

        return $this->render('product/index.html.twig', [
            'products' => $pagination,
        ]);
    }

    /**
     * @Route("/admin/products/create", name="product_create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('products_index');

        }
        return $this->render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/products/update/{product}", name="product_update",requirements={"product"="\d+"})
     */
    public function update(
        Request                $request,
        EntityManagerInterface $entityManager,
        Product                $product,
        ProductProducer        $productProducer
    )
    {

        $form = $this->createForm(ProductType::class, $product)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $productProducer->publish(json_encode(['product_id' => $product->getId()]));

            $entityManager->flush();

            return $this->redirectToRoute('products_index');

        }
        return $this->render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/products/delete/{product}", name="product_delete")
     */
    public function delete(EntityManagerInterface $entityManager, Product $product)
    {
        $entityManager->remove($product);
        $entityManager->flush();

        return $this->redirectToRoute('products_index');
    }
}