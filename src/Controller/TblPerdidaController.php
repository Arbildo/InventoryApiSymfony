<?php

namespace App\Controller;

use App\Entity\TblPerdida;
use App\Form\TblPerdidaType;
use App\Repository\TblPerdidaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/perdida")
 */
class TblPerdidaController extends AbstractController
{
    /**
     * @Route("/", name="tbl_perdida_index", methods={"GET"})
     */
    public function index(TblPerdidaRepository $tblPerdidaRepository): Response
    {
        return $this->render('tbl_perdida/index.html.twig', [
            'tbl_perdidas' => $tblPerdidaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_perdida_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblPerdida = new TblPerdida();
        $form = $this->createForm(TblPerdidaType::class, $tblPerdida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblPerdida);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_perdida_index');
        }

        return $this->render('tbl_perdida/new.html.twig', [
            'tbl_perdida' => $tblPerdida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPerdida}", name="tbl_perdida_show", methods={"GET"})
     */
    public function show(TblPerdida $tblPerdida): Response
    {
        return $this->render('tbl_perdida/show.html.twig', [
            'tbl_perdida' => $tblPerdida,
        ]);
    }

    /**
     * @Route("/{idPerdida}/edit", name="tbl_perdida_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblPerdida $tblPerdida): Response
    {
        $form = $this->createForm(TblPerdidaType::class, $tblPerdida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_perdida_index');
        }

        return $this->render('tbl_perdida/edit.html.twig', [
            'tbl_perdida' => $tblPerdida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPerdida}", name="tbl_perdida_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblPerdida $tblPerdida): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblPerdida->getIdPerdida(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblPerdida);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_perdida_index');
    }
}
