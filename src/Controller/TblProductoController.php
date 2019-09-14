<?php

namespace App\Controller;

use App\Entity\TblProducto;
use App\Form\TblProductoType;
use App\Repository\TblProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/producto")
 */
class TblProductoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_producto_index", methods={"GET"})
     */
    public function index(TblProductoRepository $tblProductoRepository): Response
    {
        return $this->render('tbl_producto/index.html.twig', [
            'tbl_productos' => $tblProductoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_producto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblProducto = new TblProducto();
        $form = $this->createForm(TblProductoType::class, $tblProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblProducto);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_producto_index');
        }

        return $this->render('tbl_producto/new.html.twig', [
            'tbl_producto' => $tblProducto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProducto}", name="tbl_producto_show", methods={"GET"})
     */
    public function show(TblProducto $tblProducto): Response
    {
        return $this->render('tbl_producto/show.html.twig', [
            'tbl_producto' => $tblProducto,
        ]);
    }

    /**
     * @Route("/{idProducto}/edit", name="tbl_producto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblProducto $tblProducto): Response
    {
        $form = $this->createForm(TblProductoType::class, $tblProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_producto_index');
        }

        return $this->render('tbl_producto/edit.html.twig', [
            'tbl_producto' => $tblProducto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProducto}", name="tbl_producto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblProducto $tblProducto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblProducto->getIdProducto(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblProducto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_producto_index');
    }
}
