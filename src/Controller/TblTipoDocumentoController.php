<?php

namespace App\Controller;

use App\Entity\TblTipoDocumento;
use App\Form\TblTipoDocumentoType;
use App\Repository\TblTipoDocumentoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/tipo/documento")
 */
class TblTipoDocumentoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_tipo_documento_index", methods={"GET"})
     */
    public function index(TblTipoDocumentoRepository $tblTipoDocumentoRepository): Response
    {
        return $this->render('tbl_tipo_documento/index.html.twig', [
            'tbl_tipo_documentos' => $tblTipoDocumentoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_tipo_documento_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblTipoDocumento = new TblTipoDocumento();
        $form = $this->createForm(TblTipoDocumentoType::class, $tblTipoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblTipoDocumento);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_tipo_documento_index');
        }

        return $this->render('tbl_tipo_documento/new.html.twig', [
            'tbl_tipo_documento' => $tblTipoDocumento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipo}", name="tbl_tipo_documento_show", methods={"GET"})
     */
    public function show(TblTipoDocumento $tblTipoDocumento): Response
    {
        return $this->render('tbl_tipo_documento/show.html.twig', [
            'tbl_tipo_documento' => $tblTipoDocumento,
        ]);
    }

    /**
     * @Route("/{idTipo}/edit", name="tbl_tipo_documento_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblTipoDocumento $tblTipoDocumento): Response
    {
        $form = $this->createForm(TblTipoDocumentoType::class, $tblTipoDocumento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_tipo_documento_index');
        }

        return $this->render('tbl_tipo_documento/edit.html.twig', [
            'tbl_tipo_documento' => $tblTipoDocumento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipo}", name="tbl_tipo_documento_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblTipoDocumento $tblTipoDocumento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblTipoDocumento->getIdTipo(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblTipoDocumento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_tipo_documento_index');
    }
}
