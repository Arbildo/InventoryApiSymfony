<?php

namespace App\Controller;

use App\Entity\TblDetallePedido;
use App\Form\TblDetallePedidoType;
use App\Repository\TblDetallePedidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/detalle/pedido")
 */
class TblDetallePedidoController extends AbstractController
{
    const IGNORED_ATTRIBUTES = ['ignored_attributes' => ['__initializer__', '__cloner__', '__isInitialized__']];

    /**
     * @Route("/", name="tbl_detalle_pedido_index", methods={"GET"})
     */
    public function index(Request $request, TblDetallePedidoRepository $tblDetallePedidoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblDetallePedidoRepository->findBy($array), 'json',
            self::IGNORED_ATTRIBUTES);
        $response = new Response($result, 200, ['Content-Type' => 'application/json']);
        return $response;
    }

    /**
     * @Route("/outputReport", name="tbl_detalle_pedido_byDate_grouped", methods={"GET"})
     */
    public function byDate(Request $request, TblDetallePedidoRepository $tblDetallePedidoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblDetallePedidoRepository->findBy($array), 'json',
            self::IGNORED_ATTRIBUTES);
        $response = new Response($result, 200, ['Content-Type' => 'application/json']);
        return $response;
    }
    /**
     * @Route("/new", name="tbl_detalle_pedido_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblDetallePedido = new TblDetallePedido();
        $form = $this->createForm(TblDetallePedidoType::class, $tblDetallePedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblDetallePedido);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_detalle_pedido_index');
        }

        return $this->render('tbl_detalle_pedido/new.html.twig', [
            'tbl_detalle_pedido' => $tblDetallePedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetallePedido}", name="tbl_detalle_pedido_show", methods={"GET"})
     */
    public function show(TblDetallePedido $tblDetallePedido): Response
    {
        return $this->render('tbl_detalle_pedido/show.html.twig', [
            'tbl_detalle_pedido' => $tblDetallePedido,
        ]);
    }

    /**
     * @Route("/{idDetallePedido}/edit", name="tbl_detalle_pedido_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblDetallePedido $tblDetallePedido): Response
    {
        $form = $this->createForm(TblDetallePedidoType::class, $tblDetallePedido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_detalle_pedido_index');
        }

        return $this->render('tbl_detalle_pedido/edit.html.twig', [
            'tbl_detalle_pedido' => $tblDetallePedido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetallePedido}", name="tbl_detalle_pedido_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblDetallePedido $tblDetallePedido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblDetallePedido->getIdDetallePedido(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblDetallePedido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_detalle_pedido_index');
    }
}
