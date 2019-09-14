<?php

namespace App\Controller;

use App\Entity\TblDetalleNotaCredito;
use App\Form\TblDetalleNotaCreditoType;
use App\Repository\TblDetalleNotaCreditoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/detalle/nota/credito")
 */
class TblDetalleNotaCreditoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_detalle_nota_credito_index", methods={"GET"})
     */
    public function index(TblDetalleNotaCreditoRepository $tblDetalleNotaCreditoRepository): Response
    {
        return $this->render('tbl_detalle_nota_credito/index.html.twig', [
            'tbl_detalle_nota_creditos' => $tblDetalleNotaCreditoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_detalle_nota_credito_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblDetalleNotaCredito = new TblDetalleNotaCredito();
        $form = $this->createForm(TblDetalleNotaCreditoType::class, $tblDetalleNotaCredito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblDetalleNotaCredito);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_detalle_nota_credito_index');
        }

        return $this->render('tbl_detalle_nota_credito/new.html.twig', [
            'tbl_detalle_nota_credito' => $tblDetalleNotaCredito,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleNota}", name="tbl_detalle_nota_credito_show", methods={"GET"})
     */
    public function show(TblDetalleNotaCredito $tblDetalleNotaCredito): Response
    {
        return $this->render('tbl_detalle_nota_credito/show.html.twig', [
            'tbl_detalle_nota_credito' => $tblDetalleNotaCredito,
        ]);
    }

    /**
     * @Route("/{idDetalleNota}/edit", name="tbl_detalle_nota_credito_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblDetalleNotaCredito $tblDetalleNotaCredito): Response
    {
        $form = $this->createForm(TblDetalleNotaCreditoType::class, $tblDetalleNotaCredito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_detalle_nota_credito_index');
        }

        return $this->render('tbl_detalle_nota_credito/edit.html.twig', [
            'tbl_detalle_nota_credito' => $tblDetalleNotaCredito,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleNota}", name="tbl_detalle_nota_credito_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblDetalleNotaCredito $tblDetalleNotaCredito): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblDetalleNotaCredito->getIdDetalleNota(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblDetalleNotaCredito);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_detalle_nota_credito_index');
    }
}
