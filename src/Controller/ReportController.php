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
class ReportController extends AbstractController
{

    const ATENDIDO = 2;
    /**
     * @Route("/exactitud/lote/{idLote}", name="exactitud_por_lote", methods={"GET"})
     */
    public function InventoryPresitionByLote(TblLote $tblLote, Request $request, SerializerInterface $serializer): Response
    {
        $lote = $tblLote;
        $idLote = $tblLote->getIdLote();
        $em             = $this->getDoctrine()->getManager();
        $productoDetalle    = $em->getRepository(TblProductoDetalle::class);
        $productDetailListByLote = $productoDetalle->findBy(['idLote' => $idLote]);
        $productLosingRepository    = $em->getRepository(TblPerdida::class);
        $result = $this->processData($productLosingRepository, $productDetailListByLote ,  $lote);

        $result = $serializer->serialize($result, 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;

    }

    private function processData($productLosingRepository, $productsDetail, $lote)
    {
        $detail = [];
        foreach ($productsDetail as $productDetail) {
            $productLose = $productLosingRepository->findBy(['idDetalleProducto' => $productDetail->getidProductoDetalle(), 'estado' => self::ATENDIDO]);
            if (empty($productLose)) {
                $detail[] = [
                    'idProductoDetalle' => $productDetail->getidProductoDetalle(),
                    'stockInicial' => $productDetail->getStockInicial(),
                    'producto' => $productDetail->getidProducto()->getNombre(),
                    'Losing' => [],
                    'Total' => [],
                ];
            } else {
                $losingProcessed = $this->processLosing($productLose);
                $detail[] = [
                    'idProductoDetalle' => $productDetail->getidProductoDetalle(),
                    'stockInicial' => $productDetail->getStockInicial(),
                    'producto' => $productDetail->getidProducto()->getNombre(),
                    'Losing' => $losingProcessed['losing'],
                    'Total' => $losingProcessed['total'],
                ];
            }
        }

        $data = [
            'lote' => $lote,
            'details' => $detail,
        ];
        return $data;
    }

    private function processLosing($losing)
    {
        $total = 0;
        $losingData = [];
        foreach ($losing as $lose) {
            $losingData['losing'][] = [
                'codigo' => $lose->getCodigo(),
                'fecha' => $lose->getFecha(),
                'descripcion' => $lose->getDescripcion(),
                'cantidad' =>$lose->getCantidad(),
            ];
            $total = $total + $lose->getCantidad();
        }
        $losingData['total'] = $total;
        return $losingData;
    }
}
