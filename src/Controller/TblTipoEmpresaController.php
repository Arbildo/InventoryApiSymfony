<?php

namespace App\Controller;

use App\Entity\TblTipoEmpresa;
use App\Form\TblTipoEmpresaType;
use App\Repository\TblTipoEmpresaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/tipo/empresa")
 */
class TblTipoEmpresaController extends AbstractController
{
    /**
     * @Route("/", name="tbl_tipo_empresa_index", methods={"GET"})
     */
    public function index(TblTipoEmpresaRepository $tblTipoEmpresaRepository): Response
    {
        return $this->render('tbl_tipo_empresa/index.html.twig', [
            'tbl_tipo_empresas' => $tblTipoEmpresaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_tipo_empresa_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblTipoEmpresa = new TblTipoEmpresa();
        $form = $this->createForm(TblTipoEmpresaType::class, $tblTipoEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblTipoEmpresa);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_tipo_empresa_index');
        }

        return $this->render('tbl_tipo_empresa/new.html.twig', [
            'tbl_tipo_empresa' => $tblTipoEmpresa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipo}", name="tbl_tipo_empresa_show", methods={"GET"})
     */
    public function show(TblTipoEmpresa $tblTipoEmpresa): Response
    {
        return $this->render('tbl_tipo_empresa/show.html.twig', [
            'tbl_tipo_empresa' => $tblTipoEmpresa,
        ]);
    }

    /**
     * @Route("/{idTipo}/edit", name="tbl_tipo_empresa_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblTipoEmpresa $tblTipoEmpresa): Response
    {
        $form = $this->createForm(TblTipoEmpresaType::class, $tblTipoEmpresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_tipo_empresa_index');
        }

        return $this->render('tbl_tipo_empresa/edit.html.twig', [
            'tbl_tipo_empresa' => $tblTipoEmpresa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipo}", name="tbl_tipo_empresa_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblTipoEmpresa $tblTipoEmpresa): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblTipoEmpresa->getIdTipo(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblTipoEmpresa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_tipo_empresa_index');
    }
}
