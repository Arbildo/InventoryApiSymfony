<?php

namespace App\Controller;

use App\Entity\TblComprobanteCompra;
use App\Form\TblComprobanteCompraType;
use App\Repository\TblComprobanteCompraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/comprobante/compra")
 */
class TblComprobanteCompraController extends AbstractController
{
    /**
     * @Route("/", name="tbl_comprobante_compra_index", methods={"GET"})
     */
    public function index(TblComprobanteCompraRepository $tblComprobanteCompraRepository): Response
    {
        return $this->render('tbl_comprobante_compra/index.html.twig', [
            'tbl_comprobante_compras' => $tblComprobanteCompraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_comprobante_compra_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblComprobanteCompra = new TblComprobanteCompra();
        $form = $this->createForm(TblComprobanteCompraType::class, $tblComprobanteCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblComprobanteCompra);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_comprobante_compra_index');
        }

        return $this->render('tbl_comprobante_compra/new.html.twig', [
            'tbl_comprobante_compra' => $tblComprobanteCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idComprobante}", name="tbl_comprobante_compra_show", methods={"GET"})
     */
    public function show(TblComprobanteCompra $tblComprobanteCompra): Response
    {
        return $this->render('tbl_comprobante_compra/show.html.twig', [
            'tbl_comprobante_compra' => $tblComprobanteCompra,
        ]);
    }

    /**
     * @Route("/{idComprobante}/edit", name="tbl_comprobante_compra_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblComprobanteCompra $tblComprobanteCompra): Response
    {
        $form = $this->createForm(TblComprobanteCompraType::class, $tblComprobanteCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_comprobante_compra_index');
        }

        return $this->render('tbl_comprobante_compra/edit.html.twig', [
            'tbl_comprobante_compra' => $tblComprobanteCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idComprobante}", name="tbl_comprobante_compra_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblComprobanteCompra $tblComprobanteCompra): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblComprobanteCompra->getIdComprobante(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblComprobanteCompra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_comprobante_compra_index');
    }
}
