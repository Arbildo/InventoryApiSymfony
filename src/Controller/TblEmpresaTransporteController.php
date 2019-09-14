<?php

namespace App\Controller;

use App\Entity\TblEmpresaTransporte;
use App\Form\TblEmpresaTransporteType;
use App\Repository\TblEmpresaTransporteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/empresa/transporte")
 */
class TblEmpresaTransporteController extends AbstractController
{
    /**
     * @Route("/", name="tbl_empresa_transporte_index", methods={"GET"})
     */
    public function index(TblEmpresaTransporteRepository $tblEmpresaTransporteRepository): Response
    {
        return $this->render('tbl_empresa_transporte/index.html.twig', [
            'tbl_empresa_transportes' => $tblEmpresaTransporteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_empresa_transporte_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblEmpresaTransporte = new TblEmpresaTransporte();
        $form = $this->createForm(TblEmpresaTransporteType::class, $tblEmpresaTransporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblEmpresaTransporte);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_empresa_transporte_index');
        }

        return $this->render('tbl_empresa_transporte/new.html.twig', [
            'tbl_empresa_transporte' => $tblEmpresaTransporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEmpresa}", name="tbl_empresa_transporte_show", methods={"GET"})
     */
    public function show(TblEmpresaTransporte $tblEmpresaTransporte): Response
    {
        return $this->render('tbl_empresa_transporte/show.html.twig', [
            'tbl_empresa_transporte' => $tblEmpresaTransporte,
        ]);
    }

    /**
     * @Route("/{idEmpresa}/edit", name="tbl_empresa_transporte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblEmpresaTransporte $tblEmpresaTransporte): Response
    {
        $form = $this->createForm(TblEmpresaTransporteType::class, $tblEmpresaTransporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_empresa_transporte_index');
        }

        return $this->render('tbl_empresa_transporte/edit.html.twig', [
            'tbl_empresa_transporte' => $tblEmpresaTransporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEmpresa}", name="tbl_empresa_transporte_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblEmpresaTransporte $tblEmpresaTransporte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblEmpresaTransporte->getIdEmpresa(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblEmpresaTransporte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_empresa_transporte_index');
    }
}
