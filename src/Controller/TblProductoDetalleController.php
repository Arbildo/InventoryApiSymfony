<?php

namespace App\Controller;

use App\Entity\TblLote;
use App\Entity\TblProductoDetalle;
use App\Form\TblProductoDetalleType;
use App\Repository\TblProductoDetalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/productos/detalle")
 */
class TblProductoDetalleController extends AbstractController
{
    /**
     * @Route("/", name="tbl_producto_detalle_index", methods={"GET"})
     */
    public function index(Request $request, TblProductoDetalleRepository $tblProductoDetalleRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblProductoDetalleRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response();
        $response->setContent($result);
        return $response;

    }

    /**
     * @Route("/new", name="tbl_producto_detalle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $data            = json_decode($request->getContent(),true);
        $em                 = $this->getDoctrine()->getManager();
        $tblProductoDetalle        = new TblProductoDetalle();

        $form = $this->createForm(TblProductoDetalleType::class, $tblProductoDetalle);
        $form->submit($data);
        $em->persist($tblProductoDetalle);
        $em->flush();

        $data = $this->serializeProductDetail($tblProductoDetalle);
        $response = new JsonResponse($data, 200);
        return $response;
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

    private function serializeProductDetail(TblProductoDetalle $tblProductoDetalle)
    {
        return [
            'ProductDetailId' => $tblProductoDetalle->getIdProductoDetalle(),
        ];

    }
}
