<?php

namespace App\Controller;

use App\Entity\TblLote;
use App\Form\TblLoteType;
use App\Repository\TblLoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/lote")
 */
class TblLoteController extends AbstractController
{
    /**
     * @Route("/", name="tbl_lote_index", methods={"GET"})
     */
    public function index(TblLoteRepository $tblLoteRepository): Response
    {
        return $this->render('tbl_lote/index.html.twig', [
            'tbl_lotes' => $tblLoteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_lote_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblLote = new TblLote();
        $form = $this->createForm(TblLoteType::class, $tblLote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblLote);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_lote_index');
        }

        return $this->render('tbl_lote/new.html.twig', [
            'tbl_lote' => $tblLote,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLote}", name="tbl_lote_show", methods={"GET"})
     */
    public function show(TblLote $tblLote): Response
    {
        return $this->render('tbl_lote/show.html.twig', [
            'tbl_lote' => $tblLote,
        ]);
    }

    /**
     * @Route("/{idLote}/edit", name="tbl_lote_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblLote $tblLote): Response
    {
        $form = $this->createForm(TblLoteType::class, $tblLote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_lote_index');
        }

        return $this->render('tbl_lote/edit.html.twig', [
            'tbl_lote' => $tblLote,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idLote}", name="tbl_lote_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblLote $tblLote): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblLote->getIdLote(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblLote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_lote_index');
    }
}
