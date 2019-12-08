<?php

namespace App\Controller;

use App\Entity\TblPerdida;
use App\Entity\TblPerdidaEstado;
use App\Entity\TblProductoDetalle;
use App\Form\TblPerdidaType;
use App\Repository\TblPerdidaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @Route("/tbl/reporte-perdida")
 */
class TblReportePerdidaController extends AbstractController
{
    const PENDIENTE_STATE = 1;
    const IGNORED_ATTRIBUTES = ['ignored_attributes' => ['__initializer__', '__cloner__', '__isInitialized__']];


    /**
     * @Route("/", name="tbl_perdidas_by_date", methods={"GET"})
     */
    public function byDate(Request $request, TblPerdidaRepository $tblPerdidaRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $date                           = $array['fecha'];
        $dt                             = new \DateTime($date);
        $date                           = $dt->format("Y-m-d H:i:s");
        $result = $serializer->serialize($tblPerdidaRepository->findByMonthYearUnixTime($date), 'json',self::IGNORED_ATTRIBUTES);
        $response = new Response($result, 200, ['Content-Type' => 'application/json']);
        return $response;
    }

}
