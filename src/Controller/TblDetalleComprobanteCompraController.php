<?php

namespace App\Controller;

use App\Entity\TblDetalleComprobanteCompra;
use App\Form\TblDetalleComprobanteCompraType;
use App\Repository\TblDetalleComprobanteCompraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/detalle/comprobante/compra")
 */
class TblDetalleComprobanteCompraController extends AbstractController
{
    /**
     * @Route("/", name="tbl_detalle_comprobante_compra_index", methods={"GET"})
     */
    public function index(TblDetalleComprobanteCompraRepository $tblDetalleComprobanteCompraRepository): Response
    {
        return $this->render('tbl_detalle_comprobante_compra/index.html.twig', [
            'tbl_detalle_comprobante_compras' => $tblDetalleComprobanteCompraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_detalle_comprobante_compra_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblDetalleComprobanteCompra = new TblDetalleComprobanteCompra();
        $form = $this->createForm(TblDetalleComprobanteCompraType::class, $tblDetalleComprobanteCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblDetalleComprobanteCompra);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_detalle_comprobante_compra_index');
        }

        return $this->render('tbl_detalle_comprobante_compra/new.html.twig', [
            'tbl_detalle_comprobante_compra' => $tblDetalleComprobanteCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleComprobanteCompra}", name="tbl_detalle_comprobante_compra_show", methods={"GET"})
     */
    public function show(TblDetalleComprobanteCompra $tblDetalleComprobanteCompra): Response
    {
        return $this->render('tbl_detalle_comprobante_compra/show.html.twig', [
            'tbl_detalle_comprobante_compra' => $tblDetalleComprobanteCompra,
        ]);
    }

    /**
     * @Route("/{idDetalleComprobanteCompra}/edit", name="tbl_detalle_comprobante_compra_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblDetalleComprobanteCompra $tblDetalleComprobanteCompra): Response
    {
        $form = $this->createForm(TblDetalleComprobanteCompraType::class, $tblDetalleComprobanteCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_detalle_comprobante_compra_index');
        }

        return $this->render('tbl_detalle_comprobante_compra/edit.html.twig', [
            'tbl_detalle_comprobante_compra' => $tblDetalleComprobanteCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleComprobanteCompra}", name="tbl_detalle_comprobante_compra_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblDetalleComprobanteCompra $tblDetalleComprobanteCompra): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblDetalleComprobanteCompra->getIdDetalleComprobanteCompra(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblDetalleComprobanteCompra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_detalle_comprobante_compra_index');
    }
}
