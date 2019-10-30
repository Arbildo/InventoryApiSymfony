<?php

namespace App\Controller;

use App\Entity\TblDetallePedido;
use App\Entity\TblLote;
use App\Entity\TblPerdida;
use App\Entity\TblProductoDetalle;
use App\Entity\TblUsuario;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/inventory", name="reports")
 */
class IndicadorRotacionController extends AbstractController
{

    const ATENDIDO = 2;
    /**
     * @Route("/rotacion/lote/{idLote}", name="exactitud_por_lote", methods={"GET"})
     */
    public function InventoryRotationByLote(TblLote $tblLote, Request $request, SerializerInterface $serializer): Response
    {
        $lote = $tblLote;
        $idLote = $tblLote->getIdLote();
        $em             = $this->getDoctrine()->getManager();
        $productoDetalle    = $em->getRepository(TblProductoDetalle::class);
        $productDetailListByLote = $productoDetalle->findBy(['idLote' => $idLote]);
        $productDetaildOrder    = $em->getRepository(TblDetallePedido::class);
        $result = $this->processData($productDetaildOrder, $productDetailListByLote ,  $lote);

        $result = $serializer->serialize($result, 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;

    }

    private function processData($productDetaildOrder, $productsDetail, $lote)
    {
        $detail = [];
        foreach ($productsDetail as $productDetail) {
            $productOrderDetails = $productDetaildOrder->findBy(['idProductoDetalle' => $productDetail->getidProductoDetalle()]);
            if (empty($productOrderDetails)) {
                $detail[] = [
                    'idProductoDetalle' => $productDetail->getidProductoDetalle(),
                    'stockInicial' => $productDetail->getStockInicial(),
                    'producto' => $productDetail->getidProducto()->getNombre(),
                    'detalles' => [],
                    'total' => 0,
                    'rotacion' => '100.00 %',
                ];
            } else {
                $ordersProcessed = $this->processOrderDetails($productOrderDetails);
                $detail[] = [
                    'idProductoDetalle' => $productDetail->getidProductoDetalle(),
                    'stockInicial' => $productDetail->getStockInicial(),
                    'producto' => $productDetail->getidProducto()->getNombre(),
                    'detalles' => $ordersProcessed['details'],
                    'total' => $ordersProcessed['total'],
                    'rotacion' => $this->getInventoryRotation($productDetail->getStockInicial(), $ordersProcessed['total'])
                ];
            }
        }

        $data = [
            'lote' => $lote,
            'details' => $detail,
        ];
        return $data;
    }
    private function getInventoryRotation($stockInicial, $cantidadPerdidas)
    {
        $porcentaje = round(($cantidadPerdidas/$stockInicial) * 100,2);
        return "{$porcentaje} %";
    }
    private function processOrderDetails($productOrderDetails)
    {
        $total = 0;
        $oderData = [];
        foreach ($productOrderDetails as $orderDetail) {
            $oderData['details'][] = [
                'idDetallePedido' => $orderDetail->getidDetallePedido(),
                'cantidad' =>$orderDetail->getCantidad(),
                'precio' =>$orderDetail->getPrecio(),
            ];
            $total = $total + $orderDetail->getCantidad();
        }
        $oderData['total'] = $total;
        return $oderData;
    }
}
