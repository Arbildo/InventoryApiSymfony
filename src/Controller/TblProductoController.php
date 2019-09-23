<?php

namespace App\Controller;

use App\Entity\TblProducto;
use App\Form\TblProductoType;
use App\Repository\TblProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/producto")
 */
class TblProductoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_producto_index", methods={"GET"})
     */
    public function index(TblProductoRepository $tblProductoRepository): Response
    {
        $encoders = [new JsonEncoder()];
        $normalizers = new ObjectNormalizer();
        $normalizers->setIgnoredAttributes(["__initializer__", "__cloner__", "__isInitialized__"]);
        $serializer = new Serializer([$normalizers], $encoders);
        $result = $serializer->serialize($tblProductoRepository->findAll(), 'json');
        $response = new Response();
        $response->setContent($result);

        return $response;
    }

    /**
     * @Route("/new", name="tbl_producto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblProducto = new TblProducto();
        $form = $this->createForm(TblProductoType::class, $tblProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblProducto);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_producto_index');
        }

        return $this->render('tbl_producto/new.html.twig', [
            'tbl_producto' => $tblProducto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProducto}", name="tbl_producto_show", methods={"GET"})
     */
    public function show(TblProducto $tblProducto): Response
    {
        return $this->render('tbl_producto/show.html.twig', [
            'tbl_producto' => $tblProducto,
        ]);
    }

    /**
     * @Route("/{idProducto}/edit", name="tbl_producto_edit", methods={"PUT"})
     */
    public function edit(Request $request, $idProducto): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(TblProducto::class)->find((int)$idProducto);


        if (!$product) {
            throw $this->createNotFoundException(sprintf(
                'Error "%s"',
                $product
            ));
        }
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(TblProductoType::class, $product);
        $form->submit($data);
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        $data = $this->serializeProduct($product);
        $response = new JsonResponse($data, 200);
        return $response;

    }

    /**
     * @Route("/{idProducto}", name="tbl_producto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblProducto $tblProducto): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tblProducto->getIdProducto(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblProducto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_producto_index');
    }


    /**
     * @Route("/{idProducto}/downgrade", name="tbl_producto_delete", methods={"PUT"})
     */
    public function downgrade(Request $request, $idProducto): Response
    {

        $product = $this->getDoctrine()
            ->getRepository(TblProducto::class)->find((int)$idProducto);

        if (!$product) {
            throw $this->createNotFoundException(sprintf(
                'Error "%s"',
                $product
            ));
        }
        $state = json_decode($request->getContent(), true)['estado'];
        $em = $this->getDoctrine()->getManager();
        $product->setEstado($state);
        $em->persist($product);
        $em->flush();
        
    }



    private function serializeProduct(TblProducto $producto)
    {
        return [
            'ProductId' => $producto->getIdProducto(),
        ];
    }
}
