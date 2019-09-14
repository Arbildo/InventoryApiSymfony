<?php

namespace App\Controller;

use App\Entity\TblOrdenCompra;
use App\Form\TblOrdenCompraType;
use App\Repository\TblOrdenCompraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/orden/compra")
 */
class TblOrdenCompraController extends AbstractController
{
    /**
     * @Route("/", name="tbl_orden_compra_index", methods={"GET"})
     */
    public function index(TblOrdenCompraRepository $tblOrdenCompraRepository): Response
    {
        return $this->render('tbl_orden_compra/index.html.twig', [
            'tbl_orden_compras' => $tblOrdenCompraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_orden_compra_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblOrdenCompra = new TblOrdenCompra();
        $form = $this->createForm(TblOrdenCompraType::class, $tblOrdenCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblOrdenCompra);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_orden_compra_index');
        }

        return $this->render('tbl_orden_compra/new.html.twig', [
            'tbl_orden_compra' => $tblOrdenCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOrdenCompra}", name="tbl_orden_compra_show", methods={"GET"})
     */
    public function show(TblOrdenCompra $tblOrdenCompra): Response
    {
        return $this->render('tbl_orden_compra/show.html.twig', [
            'tbl_orden_compra' => $tblOrdenCompra,
        ]);
    }

    /**
     * @Route("/{idOrdenCompra}/edit", name="tbl_orden_compra_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblOrdenCompra $tblOrdenCompra): Response
    {
        $form = $this->createForm(TblOrdenCompraType::class, $tblOrdenCompra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_orden_compra_index');
        }

        return $this->render('tbl_orden_compra/edit.html.twig', [
            'tbl_orden_compra' => $tblOrdenCompra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idOrdenCompra}", name="tbl_orden_compra_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblOrdenCompra $tblOrdenCompra): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblOrdenCompra->getIdOrdenCompra(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblOrdenCompra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_orden_compra_index');
    }
}
