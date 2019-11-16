<?php

namespace App\Controller;

use App\Entity\TblDetallePedido;
use App\Entity\TblPedido;
use App\Entity\TblProductoDetalle;
use App\Form\TblDetallePedidoType;
use App\Form\TblPedidoType;
use App\Form\TblProveedorType;
use App\Repository\TblPedidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/pedido")
 */
class TblPedidoController extends AbstractController
{
    const IGNORED_ATTRIBUTES = ['ignored_attributes' => ['__initializer__', '__cloner__', '__isInitialized__']];
    /**
     * @Route("/", name="tbl_pedido_index", methods={"GET"})
     */
    public function index(Request $request, TblPedidoRepository $tblPedidoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        if (array_key_exists('fechaPedido', $array)){
            $date = explode('-',$array['fechaPedido']);
            $result = $serializer->serialize($tblPedidoRepository->findByMonthYear($date[0], $date[1]), 'json',
                self::IGNORED_ATTRIBUTES);
            $response = new Response($result, 200, ['Content-Type' => 'application/json']);
            return $response;
        }
        $result = $serializer->serialize($tblPedidoRepository->findBy($array), 'json',
            self::IGNORED_ATTRIBUTES);
        $response = new Response($result, 200, ['Content-Type' => 'application/json']);
        return $response;
    }

    /**
     * @Route("/byDate", name="tbl_pedido_by_date", methods={"GET"})
     */
    public function byDate(Request $request, TblPedidoRepository $tblPedidoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $date = explode('-',$array['fechaPedido']);
        $result = $serializer->serialize($tblPedidoRepository->findByMonthYear($date[0], $date[1]), 'json',
            self::IGNORED_ATTRIBUTES);
            $response = new Response($result, 200, ['Content-Type' => 'application/json']);
            return $response;
    }

    /**
     * @Route("/new", name="tbl_pedido_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $data               = json_decode($request->getContent(),true);
        $em                 = $this->getDoctrine()->getManager();
        $compraDetail = $data['compra'];
        unset($data['compra']);
        $tblPedido = new TblPedido();
        $form = $this->createForm(TblPedidoType::class, $tblPedido);
        $form->submit($data);
        $em->persist($tblPedido);
        $em->flush();
        $idPedido= $tblPedido->getIdPedido();
        if (is_numeric($idPedido)){
            foreach ($compraDetail as $compra){
            $tblDetallePedido = new TblDetallePedido();
            $tblDetallePedido->setEstado(1);
            $tblDetallePedido->setPrecio($compra['precio']);
            $tblDetallePedido->setCantidad($compra['cantidad']);
            $tblProductoDetalle    = $em->find(TblProductoDetalle::class, $compra['idDetalleProducto']);
            $tblDetallePedido->setIdProductoDetalle($tblProductoDetalle);
            $tblDetallePedido->setIdPedido($tblPedido);
            $em->persist($tblDetallePedido);
            $em->flush();
            }
        }
        $response = new JsonResponse($data, 200);
        return $response;

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
