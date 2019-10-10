<?php

namespace App\Controller;

use App\Entity\TblProductoDetalle;
use App\Form\TblProductoDetalleType;
use App\Repository\TblProductoDetalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/tbl/productos/detalle")
 */
class TblProductoDetalleController extends AbstractController
{
    /**
     * @Route("/", name="tbl_producto_detalle_index", methods={"GET"})
     */
    public function index(Request $request, TblProductoDetalleRepository $tblProductoDetalleRepository): Response
    {              parse_str($request->getQueryString(), $array);
        $encoders = [new JsonEncoder()];
        $normalizers = new ObjectNormalizer();
        $normalizers->setIgnoredAttributes(["__initializer__", "__cloner__", "__isInitialized__"]);
        $serializer = new Serializer([$normalizers], $encoders);
        $result = $serializer->serialize($tblProductoDetalleRepository->findBy($array), 'json');
        $response = new Response();
        $response->setContent($result);

        return $response;

    }

    /**
     * @Route("/new", name="tbl_producto_detalle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblProductoDetalle = new TblProductoDetalle();
        $form = $this->createForm(TblProductoDetalleType::class, $tblProductoDetalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblProductoDetalle);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_producto_detalle_index');
        }

        return $this->render('tbl_producto_detalle/new.html.twig', [
            'tbl_producto_detalle' => $tblProductoDetalle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProductoDetalle}", name="tbl_producto_detalle_show", methods={"GET"})
     */
    public function show(TblProductoDetalle $tblProductoDetalle): Response
    {
        return $this->render('tbl_producto_detalle/show.html.twig', [
            'tbl_producto_detalle' => $tblProductoDetalle,
        ]);
    }

    /**
     * @Route("/{idProductoDetalle}/edit", name="tbl_producto_detalle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblProductoDetalle $tblProductoDetalle): Response
    {
        $form = $this->createForm(TblProductoDetalleType::class, $tblProductoDetalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_producto_detalle_index');
        }

        return $this->render('tbl_producto_detalle/edit.html.twig', [
            'tbl_producto_detalle' => $tblProductoDetalle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProductoDetalle}", name="tbl_producto_detalle_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblProductoDetalle $tblProductoDetalle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblProductoDetalle->getIdProductoDetalle(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblProductoDetalle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_producto_detalle_index');
    }
}
