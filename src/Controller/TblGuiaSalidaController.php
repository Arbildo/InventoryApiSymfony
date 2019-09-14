<?php

namespace App\Controller;

use App\Entity\TblGuiaSalida;
use App\Form\TblGuiaSalidaType;
use App\Repository\TblGuiaSalidaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/guia/salida")
 */
class TblGuiaSalidaController extends AbstractController
{
    /**
     * @Route("/", name="tbl_guia_salida_index", methods={"GET"})
     */
    public function index(TblGuiaSalidaRepository $tblGuiaSalidaRepository): Response
    {
        return $this->render('tbl_guia_salida/index.html.twig', [
            'tbl_guia_salidas' => $tblGuiaSalidaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_guia_salida_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblGuiaSalida = new TblGuiaSalida();
        $form = $this->createForm(TblGuiaSalidaType::class, $tblGuiaSalida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblGuiaSalida);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_guia_salida_index');
        }

        return $this->render('tbl_guia_salida/new.html.twig', [
            'tbl_guia_salida' => $tblGuiaSalida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idGuiaSalida}", name="tbl_guia_salida_show", methods={"GET"})
     */
    public function show(TblGuiaSalida $tblGuiaSalida): Response
    {
        return $this->render('tbl_guia_salida/show.html.twig', [
            'tbl_guia_salida' => $tblGuiaSalida,
        ]);
    }

    /**
     * @Route("/{idGuiaSalida}/edit", name="tbl_guia_salida_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblGuiaSalida $tblGuiaSalida): Response
    {
        $form = $this->createForm(TblGuiaSalidaType::class, $tblGuiaSalida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_guia_salida_index');
        }

        return $this->render('tbl_guia_salida/edit.html.twig', [
            'tbl_guia_salida' => $tblGuiaSalida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idGuiaSalida}", name="tbl_guia_salida_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblGuiaSalida $tblGuiaSalida): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblGuiaSalida->getIdGuiaSalida(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblGuiaSalida);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_guia_salida_index');
    }
}
