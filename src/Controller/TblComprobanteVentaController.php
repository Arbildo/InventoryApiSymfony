<?php

namespace App\Controller;

use App\Entity\TblComprobanteVenta;
use App\Form\TblComprobanteVentaType;
use App\Repository\TblComprobanteVentaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/comprobante/venta")
 */
class TblComprobanteVentaController extends AbstractController
{
    /**
     * @Route("/", name="tbl_comprobante_venta_index", methods={"GET"})
     */
    public function index(TblComprobanteVentaRepository $tblComprobanteVentaRepository): Response
    {
        return $this->render('tbl_comprobante_venta/index.html.twig', [
            'tbl_comprobante_ventas' => $tblComprobanteVentaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_comprobante_venta_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblComprobanteVentum = new TblComprobanteVenta();
        $form = $this->createForm(TblComprobanteVentaType::class, $tblComprobanteVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblComprobanteVentum);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_comprobante_venta_index');
        }

        return $this->render('tbl_comprobante_venta/new.html.twig', [
            'tbl_comprobante_ventum' => $tblComprobanteVentum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idComprobanteVenta}", name="tbl_comprobante_venta_show", methods={"GET"})
     */
    public function show(TblComprobanteVenta $tblComprobanteVentum): Response
    {
        return $this->render('tbl_comprobante_venta/show.html.twig', [
            'tbl_comprobante_ventum' => $tblComprobanteVentum,
        ]);
    }

    /**
     * @Route("/{idComprobanteVenta}/edit", name="tbl_comprobante_venta_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblComprobanteVenta $tblComprobanteVentum): Response
    {
        $form = $this->createForm(TblComprobanteVentaType::class, $tblComprobanteVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_comprobante_venta_index');
        }

        return $this->render('tbl_comprobante_venta/edit.html.twig', [
            'tbl_comprobante_ventum' => $tblComprobanteVentum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idComprobanteVenta}", name="tbl_comprobante_venta_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblComprobanteVenta $tblComprobanteVentum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblComprobanteVentum->getIdComprobanteVenta(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblComprobanteVentum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_comprobante_venta_index');
    }
}
