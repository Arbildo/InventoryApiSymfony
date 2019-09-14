<?php

namespace App\Controller;

use App\Entity\TblProveedor;
use App\Form\TblProveedorType;
use App\Repository\TblProveedorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/proveedor")
 */
class TblProveedorController extends AbstractController
{
    /**
     * @Route("/", name="tbl_proveedor_index", methods={"GET"})
     */
    public function index(TblProveedorRepository $tblProveedorRepository): Response
    {
        return $this->render('tbl_proveedor/index.html.twig', [
            'tbl_proveedors' => $tblProveedorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_proveedor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblProveedor = new TblProveedor();
        $form = $this->createForm(TblProveedorType::class, $tblProveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblProveedor);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_proveedor_index');
        }

        return $this->render('tbl_proveedor/new.html.twig', [
            'tbl_proveedor' => $tblProveedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProveedor}", name="tbl_proveedor_show", methods={"GET"})
     */
    public function show(TblProveedor $tblProveedor): Response
    {
        return $this->render('tbl_proveedor/show.html.twig', [
            'tbl_proveedor' => $tblProveedor,
        ]);
    }

    /**
     * @Route("/{idProveedor}/edit", name="tbl_proveedor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblProveedor $tblProveedor): Response
    {
        $form = $this->createForm(TblProveedorType::class, $tblProveedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_proveedor_index');
        }

        return $this->render('tbl_proveedor/edit.html.twig', [
            'tbl_proveedor' => $tblProveedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProveedor}", name="tbl_proveedor_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblProveedor $tblProveedor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblProveedor->getIdProveedor(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblProveedor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_proveedor_index');
    }
}
