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
 * @Route("/tbl/reporte-pedido")
 */
class TblReportePedidoController extends AbstractController
{
    private $newArray;

    const IGNORED_ATTRIBUTES = ['ignored_attributes' => ['__initializer__', '__cloner__', '__isInitialized__']];


    /**
     * @Route("/", name="tbl_pedido_by_date", methods={"GET"})
     */
    public function byDate(Request $request, TblPedidoRepository $tblPedidoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $date                           = $array['fechaPedido'];
        $dt                             = new \DateTime($date);
        $date                           = $dt->format("Y-m-d H:i:s");
        $pedidos                        = $tblPedidoRepository->findByMonthYearUnixTime($date);
        $em                             = $this->getDoctrine()->getManager();
        $tblPedidoDetalleRepository     =   $em->getRepository(TblDetallePedido::class);
        foreach ($pedidos as $pedido){
            $orders= $tblPedidoDetalleRepository->findBy(['idPedido' => $pedido->getIdPedido()]);
            foreach ($orders as $order){
                $this->newArray[] = $order;
            }
        }
        $result = $serializer->serialize($this->newArray, 'json',self::IGNORED_ATTRIBUTES);
        $response = new Response($result, 200, ['Content-Type' => 'application/json']);
            return $response;
    }
}
