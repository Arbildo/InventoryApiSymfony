<?php

namespace App\Controller;

use App\Entity\TblDetalleComprobanteVenta;
use App\Form\TblDetalleComprobanteVentaType;
use App\Repository\TblDetalleComprobanteVentaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/detalle/comprobante/venta")
 */
class TblDetalleComprobanteVentaController extends AbstractController
{
    /**
     * @Route("/", name="tbl_detalle_comprobante_venta_index", methods={"GET"})
     */
    public function index(TblDetalleComprobanteVentaRepository $tblDetalleComprobanteVentaRepository): Response
    {
        return $this->render('tbl_detalle_comprobante_venta/index.html.twig', [
            'tbl_detalle_comprobante_ventas' => $tblDetalleComprobanteVentaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_detalle_comprobante_venta_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblDetalleComprobanteVentum = new TblDetalleComprobanteVenta();
        $form = $this->createForm(TblDetalleComprobanteVentaType::class, $tblDetalleComprobanteVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblDetalleComprobanteVentum);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_detalle_comprobante_venta_index');
        }

        return $this->render('tbl_detalle_comprobante_venta/new.html.twig', [
            'tbl_detalle_comprobante_ventum' => $tblDetalleComprobanteVentum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleComprobanteVenta}", name="tbl_detalle_comprobante_venta_show", methods={"GET"})
     */
    public function show(TblDetalleComprobanteVenta $tblDetalleComprobanteVentum): Response
    {
        return $this->render('tbl_detalle_comprobante_venta/show.html.twig', [
            'tbl_detalle_comprobante_ventum' => $tblDetalleComprobanteVentum,
        ]);
    }

    /**
     * @Route("/{idDetalleComprobanteVenta}/edit", name="tbl_detalle_comprobante_venta_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblDetalleComprobanteVenta $tblDetalleComprobanteVentum): Response
    {
        $form = $this->createForm(TblDetalleComprobanteVentaType::class, $tblDetalleComprobanteVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_detalle_comprobante_venta_index');
        }

        return $this->render('tbl_detalle_comprobante_venta/edit.html.twig', [
            'tbl_detalle_comprobante_ventum' => $tblDetalleComprobanteVentum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleComprobanteVenta}", name="tbl_detalle_comprobante_venta_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblDetalleComprobanteVenta $tblDetalleComprobanteVentum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblDetalleComprobanteVentum->getIdDetalleComprobanteVenta(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblDetalleComprobanteVentum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_detalle_comprobante_venta_index');
    }
}
