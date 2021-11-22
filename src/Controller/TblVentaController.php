<?php

namespace App\Controller;

use App\Entity\TblCliente;
use App\Entity\TblProductoDetalle;
use App\Entity\TblUsuario;
use App\Entity\TblVenta;
use App\Entity\TblVentaDetalleProducto;
use App\Entity\TblVentaEstado;
use App\Form\TblProductoDetalleType;
use App\Form\TblVentaDetalleProductoType;
use App\Form\TblVentaType;
use App\Repository\TblVentaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/venta")
 */
class TblVentaController extends AbstractController
{
    const HEADERS = ['Content-Type'=> 'application/json'];
    const FORMAT_DATE = 'Y-m-d H:i:s';
    const IGNORED_ATTRIBUTES =  ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']];

    /**
     * @Route("/", name="tbl_venta_index", methods={"GET"})
     */
    public function index(Request  $request,  SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $em = $this->getDoctrine()->getManager();
        $pedidoRepository = $em->getRepository(TblVenta::class);
        $pedidos = $pedidoRepository->findAll();
//
//        $result = $serializer->serialize($tblVentaRepository->findBy($array), 'json',
//            self::IGNORED_ATTRIBUTES);
        return $this->json($pedidos);
        return new JsonResponse($pedidos, 200);
    }

    /**
     * @Route("/new", name="tbl_venta_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $userId = $this->getUser()->getIdUsuario();
        $clientId = $data['idCliente'];
        $estado = $data['estado'];
        $em = $this->getDoctrine()->getManager();
        $userEntity = $em->getRepository(TblUsuario::class)->find($userId);
        $clientEntity = $em->getRepository(TblCliente::class)->find($clientId);
        $ventaEstadoEntity = $em->getRepository(TblVentaEstado::class)->find($estado);
        $tblVenta = new TblVenta();
        $tblVenta->setIdUsuario($userEntity);
        $tblVenta->setIdCliente($clientEntity);
        $tblVenta->setEstado($ventaEstadoEntity);
        $em->persist($tblVenta);
        $em->flush();
        $idVenta = $tblVenta->getIdVenta();
        $compraDetail = $data['compra'];

        if (is_numeric($idVenta)) {
            $venta = $em->getRepository(TblVenta::class)->find($idVenta);
            foreach ($compraDetail as $compra) {
                $tblDetallePedido = new TblVentaDetalleProducto();
                $detalleProducto = $em->getRepository(TblProductoDetalle::class)->find($compra['idDetalleProducto']);
                $tblDetallePedido->setIdVenta($venta);
                $tblDetallePedido->setIdProductoDetalle($detalleProducto);
                $tblDetallePedido->setCantidad($compra['cantidad']);
                $em->persist($tblDetallePedido);
                $em->flush();
                $idVentaDetalleProducto = $tblDetallePedido->getCantidad();
                $detalleProducto
                    ->setStockActual($detalleProducto->getStockActual()-$idVentaDetalleProducto);
                $em->persist($detalleProducto);
                $em->flush();
            }
        }
        return new JsonResponse($data, 200);
    }
    /**
     * @Route("/fechas", name="tbl_venta_dates", methods={"GET"})
     */
    public function getDates(TblVentaRepository $tblVentaRepository, SerializerInterface $serializer): Response
    {
        $dates = [];
        foreach ($tblVentaRepository->findDates() as $date) {
            $dates[] = date("M Y", $date['fechaPago']->getTimestamp());;
        }
        foreach ($dates as $index => $date) {
            $result[] = $date;
        }
        $format = array_unique($result);
        $result = $serializer->serialize(array_values($format), 'json', self::IGNORED_ATTRIBUTES);
        $response = new Response($result, 200, ['Content-Type' => 'application/json']);
        return $response;
    }


    /**
     * @Route("/{idVenta}", name="tbl_venta_show", methods={"GET"})
     */
    public function show(int $idVenta): Response
    {
        $em = $this->getDoctrine();
        $venta = $em->getRepository(TblVenta::class)->find($idVenta);
        $detallesVenta = $em->getRepository(TblVentaDetalleProducto::class)
            ->findBy(['idVenta' => $idVenta]);
        $cliente = $em->getRepository(TblCliente::class)->find($venta->getIdCliente());
        $usuario = $em->getRepository(TblUsuario::class)->find($venta->getIdUsuario());

        $detallesDeVenta = [];
        foreach ($detallesVenta as $detalle){
            $detallesDeVenta[] = [
                'id' => $detalle->getId(),
                'cantidad' => $detalle->getCantidad(),
                'producto' => $detalle->getIdProductoDetalle()->getIdProducto()->getNombre(),
                'precio' => $detalle->getIdProductoDetalle()->getPrecio()
            ];
        }
        $result = [
            "id" => $venta->getIdVenta(),
            "cliente" => $cliente->getNombre(),
            "usuario" => $usuario->getNombres(),
            "fechaVenta" => $venta->getFechaVenta()->format(self::FORMAT_DATE),
            "fechaPago" => $venta->getFechaPago()->format(self::FORMAT_DATE),
            "estado" => $venta->getEstado()->getEstado(),
            'detalle' => $detallesDeVenta
        ];
        return new JsonResponse($result, 200);
    }

    /**
     * @Route("/{idVenta}/edit", name="tbl_venta_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblVenta $tblVentum): Response
    {
        $form = $this->createForm(TblVentaType::class, $tblVentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_venta_index');
        }

        return $this->render('tbl_venta/edit.html.twig', [
            'tbl_ventum' => $tblVentum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idVenta}", name="tbl_venta_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblVenta $tblVentum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblVentum->getIdVenta(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblVentum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_venta_index');
    }


}
