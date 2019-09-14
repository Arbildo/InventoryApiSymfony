<?php

namespace App\Controller;

use App\Entity\TblUnidadTransporte;
use App\Form\TblUnidadTransporteType;
use App\Repository\TblUnidadTransporteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/unidad/transporte")
 */
class TblUnidadTransporteController extends AbstractController
{
    /**
     * @Route("/", name="tbl_unidad_transporte_index", methods={"GET"})
     */
    public function index(TblUnidadTransporteRepository $tblUnidadTransporteRepository): Response
    {
        return $this->render('tbl_unidad_transporte/index.html.twig', [
            'tbl_unidad_transportes' => $tblUnidadTransporteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_unidad_transporte_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblUnidadTransporte = new TblUnidadTransporte();
        $form = $this->createForm(TblUnidadTransporteType::class, $tblUnidadTransporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblUnidadTransporte);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_unidad_transporte_index');
        }

        return $this->render('tbl_unidad_transporte/new.html.twig', [
            'tbl_unidad_transporte' => $tblUnidadTransporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnidad}", name="tbl_unidad_transporte_show", methods={"GET"})
     */
    public function show(TblUnidadTransporte $tblUnidadTransporte): Response
    {
        return $this->render('tbl_unidad_transporte/show.html.twig', [
            'tbl_unidad_transporte' => $tblUnidadTransporte,
        ]);
    }

    /**
     * @Route("/{idUnidad}/edit", name="tbl_unidad_transporte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblUnidadTransporte $tblUnidadTransporte): Response
    {
        $form = $this->createForm(TblUnidadTransporteType::class, $tblUnidadTransporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_unidad_transporte_index');
        }

        return $this->render('tbl_unidad_transporte/edit.html.twig', [
            'tbl_unidad_transporte' => $tblUnidadTransporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnidad}", name="tbl_unidad_transporte_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblUnidadTransporte $tblUnidadTransporte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblUnidadTransporte->getIdUnidad(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblUnidadTransporte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_unidad_transporte_index');
    }
}
