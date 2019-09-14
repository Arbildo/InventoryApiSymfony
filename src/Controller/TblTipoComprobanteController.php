<?php

namespace App\Controller;

use App\Entity\TblTipoComprobante;
use App\Form\TblTipoComprobanteType;
use App\Repository\TblTipoComprobanteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/tipo/comprobante")
 */
class TblTipoComprobanteController extends AbstractController
{
    /**
     * @Route("/", name="tbl_tipo_comprobante_index", methods={"GET"})
     */
    public function index(TblTipoComprobanteRepository $tblTipoComprobanteRepository): Response
    {
        return $this->render('tbl_tipo_comprobante/index.html.twig', [
            'tbl_tipo_comprobantes' => $tblTipoComprobanteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_tipo_comprobante_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblTipoComprobante = new TblTipoComprobante();
        $form = $this->createForm(TblTipoComprobanteType::class, $tblTipoComprobante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblTipoComprobante);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_tipo_comprobante_index');
        }

        return $this->render('tbl_tipo_comprobante/new.html.twig', [
            'tbl_tipo_comprobante' => $tblTipoComprobante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipoComprobante}", name="tbl_tipo_comprobante_show", methods={"GET"})
     */
    public function show(TblTipoComprobante $tblTipoComprobante): Response
    {
        return $this->render('tbl_tipo_comprobante/show.html.twig', [
            'tbl_tipo_comprobante' => $tblTipoComprobante,
        ]);
    }

    /**
     * @Route("/{idTipoComprobante}/edit", name="tbl_tipo_comprobante_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblTipoComprobante $tblTipoComprobante): Response
    {
        $form = $this->createForm(TblTipoComprobanteType::class, $tblTipoComprobante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_tipo_comprobante_index');
        }

        return $this->render('tbl_tipo_comprobante/edit.html.twig', [
            'tbl_tipo_comprobante' => $tblTipoComprobante,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipoComprobante}", name="tbl_tipo_comprobante_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblTipoComprobante $tblTipoComprobante): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblTipoComprobante->getIdTipoComprobante(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblTipoComprobante);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_tipo_comprobante_index');
    }
}
