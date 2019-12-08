<?php

namespace App\Controller;

use App\Entity\TblDetallePedido;
use App\Entity\TblPedido;
use App\Entity\TblProductoDetalle;
use App\Form\TblDetallePedidoType;
use App\Form\TblPedidoType;
use App\Form\TblProveedorType;
use App\Repository\TblPedidoRepository;
use App\Repository\TblProductoEstadoRepository;
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
    private $newArray;

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
     * @Route("/dates", name="tbl_pedido_dates", methods={"GET"})
     */
    public function getDates(TblPedidoRepository $tblPedidoRepository, SerializerInterface $serializer): Response
    {
        $dates = [];
        foreach ($tblPedidoRepository->findDates() as $date){
            $dates[] = date("M Y", $date['fechaPedido']->getTimestamp());;
        }

        foreach ($dates as $index => $date){
                $result[] = $date;
        }
        $format = array_unique($result);
        $result = $serializer->serialize($format, 'json',self::IGNORED_ATTRIBUTES );
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
            $tblProductoDetalle = $em->find(TblProductoDetalle::class, $compra['idDetalleProducto']);
            $this->processProductDetail($tblProductoDetalle, $compra);
            $tblDetallePedido->setIdProductoDetalle($tblProductoDetalle);
            $tblDetallePedido->setIdPedido($tblPedido);
            $em->persist($tblDetallePedido);
            $em->flush();
            }
        }
        $response = new JsonResponse($data, 200);
        return $response;

    }

    private function processProductDetail(TblProductoDetalle $productDetail, $compra)
    {
        $stockActual = $productDetail->getStockActual();
        $newStock = $stockActual-$compra['cantidad'];
        $productDetail->setStockActual($newStock);

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
