<?php

namespace App\Controller;

use App\Entity\TblPedido;
use App\Form\TblPedidoType;
use App\Repository\TblPedidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/pedido")
 */
class TblPedidoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_pedido_index", methods={"GET"})
     */
    public function index(TblPedidoRepository $tblPedidoRepository): Response
    {
        return $this->render('tbl_pedido/index.html.twig', [
            'tbl_pedidos' => $tblPedidoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_pedido_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblPedido = new TblPedido();
        $form = $this->createForm(TblPedidoType::class, $tblPedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblPedido);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_pedido_index');
        }

        return $this->render('tbl_pedido/new.html.twig', [
            'tbl_pedido' => $tblPedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPedido}", name="tbl_pedido_show", methods={"GET"})
     */
    public function show(TblPedido $tblPedido): Response
    {
        return $this->render('tbl_pedido/show.html.twig', [
            'tbl_pedido' => $tblPedido,
        ]);
    }

    /**
     * @Route("/{idPedido}/edit", name="tbl_pedido_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblPedido $tblPedido): Response
    {
        $form = $this->createForm(TblPedidoType::class, $tblPedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_pedido_index');
        }

        return $this->render('tbl_pedido/edit.html.twig', [
            'tbl_pedido' => $tblPedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPedido}", name="tbl_pedido_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblPedido $tblPedido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblPedido->getIdPedido(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblPedido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_pedido_index');
    }
}
