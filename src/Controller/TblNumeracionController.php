<?php

namespace App\Controller;

use App\Entity\TblNumeracion;
use App\Form\TblNumeracionType;
use App\Repository\TblNumeracionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/numeracion")
 */
class TblNumeracionController extends AbstractController
{
    /**
     * @Route("/", name="tbl_numeracion_index", methods={"GET"})
     */
    public function index(TblNumeracionRepository $tblNumeracionRepository): Response
    {
        return $this->render('tbl_numeracion/index.html.twig', [
            'tbl_numeracions' => $tblNumeracionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_numeracion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblNumeracion = new TblNumeracion();
        $form = $this->createForm(TblNumeracionType::class, $tblNumeracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblNumeracion);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_numeracion_index');
        }

        return $this->render('tbl_numeracion/new.html.twig', [
            'tbl_numeracion' => $tblNumeracion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idNumeracion}", name="tbl_numeracion_show", methods={"GET"})
     */
    public function show(TblNumeracion $tblNumeracion): Response
    {
        return $this->render('tbl_numeracion/show.html.twig', [
            'tbl_numeracion' => $tblNumeracion,
        ]);
    }

    /**
     * @Route("/{idNumeracion}/edit", name="tbl_numeracion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblNumeracion $tblNumeracion): Response
    {
        $form = $this->createForm(TblNumeracionType::class, $tblNumeracion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_numeracion_index');
        }

        return $this->render('tbl_numeracion/edit.html.twig', [
            'tbl_numeracion' => $tblNumeracion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idNumeracion}", name="tbl_numeracion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblNumeracion $tblNumeracion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblNumeracion->getIdNumeracion(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblNumeracion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_numeracion_index');
    }
}
