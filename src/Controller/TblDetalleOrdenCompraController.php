<?php

namespace App\Controller;

use App\Entity\TblDetalleOrdenCompra;
use App\Form\TblDetalleOrdenCompraType;
use App\Repository\TblDetalleOrdenCompraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/detalle/orden/compra")
 */
class TblDetalleOrdenCompraController extends AbstractController
{
    /**
     * @Route("/", name="tbl_detalle_orden_compra_index", methods={"GET"})
     */
    public function index(TblDetalleOrdenCompraRepository $tblDetalleOrdenCompraRepository): Response
    {
        return $this->render('tbl_detalle_orden_compra/index.html.twig', [
            'tbl_detalle_orden_compras' => $tblDetalleOrdenCompraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_detalle_orden_compra_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblDetalleOrdenCompra = new TblDetalleOrdenCompra();
        $form = $this->createForm(TblDetalleOrdenCompraType::class, $tblDetalleOrdenCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblDetalleOrdenCompra);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_detalle_orden_compra_index');
        }

        return $this->render('tbl_detalle_orden_compra/new.html.twig', [
            'tbl_detalle_orden_compra' => $tblDetalleOrdenCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalle}", name="tbl_detalle_orden_compra_show", methods={"GET"})
     */
    public function show(TblDetalleOrdenCompra $tblDetalleOrdenCompra): Response
    {
        return $this->render('tbl_detalle_orden_compra/show.html.twig', [
            'tbl_detalle_orden_compra' => $tblDetalleOrdenCompra,
        ]);
    }

    /**
     * @Route("/{idDetalle}/edit", name="tbl_detalle_orden_compra_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblDetalleOrdenCompra $tblDetalleOrdenCompra): Response
    {
        $form = $this->createForm(TblDetalleOrdenCompraType::class, $tblDetalleOrdenCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_detalle_orden_compra_index');
        }

        return $this->render('tbl_detalle_orden_compra/edit.html.twig', [
            'tbl_detalle_orden_compra' => $tblDetalleOrdenCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalle}", name="tbl_detalle_orden_compra_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblDetalleOrdenCompra $tblDetalleOrdenCompra): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblDetalleOrdenCompra->getIdDetalle(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblDetalleOrdenCompra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_detalle_orden_compra_index');
    }
}
