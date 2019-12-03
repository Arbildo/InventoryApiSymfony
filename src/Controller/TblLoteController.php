<?php

namespace App\Controller;

use App\Entity\TblLote;
use App\Entity\TblLoteEstado;
use App\Form\TblLoteType;
use App\Repository\TblLoteEstadoRepository;
use App\Repository\TblLoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/lote")
 */
class TblLoteController extends AbstractController
{
    /**
     * @Route("/", name="tbl_lote_index", methods={"GET"})
     */
    public function index(Request $request, TblLoteRepository $tblLoteRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblLoteRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response();
        $response->setContent($result);
        return $response;
    }
    /**
     * @Route("/estados", name="tbl_lote_estado", methods={"GET"})
     */
    public function loteStates(Request $request ,TblLoteEstadoRepository $tblProductoEstadoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblProductoEstadoRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;
    }
    /**
     * @Route("/new", name="tbl_lote_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $data            = json_decode($request->getContent(),true);
        $em                 = $this->getDoctrine()->getManager();
        $tblLote        = new TblLote();

        $form = $this->createForm(TblLoteType::class, $tblLote);
        $form->submit($data);
        $em->persist($tblLote);
        $em->flush();

        $data = $this->serializeLote($tblLote);
        $response = new JsonResponse($data, 200);
        return $response;
    }

    /**
     * @Route("/{idLote}", name="tbl_lote_show", methods={"GET"})
     */
    public function show(TblLote $tblLote): Response
    {
        return $this->render('tbl_lote/show.html.twig', [
            'tbl_lote' => $tblLote,
        ]);
    }

    /**
     * @Route("/{idLote}/edit", name="tbl_lote_edit", methods={"PUT"})
     * @throws \Exception
     */
    public function edit(Request $request, TblLote $tblLote): Response
    {
        $request    = json_decode($request->getContent(), true);
        $em         = $this->getDoctrine()->getManager();
        $estado     = $request['estado'];
        $newDate = $request['fechaVencimiento'];
        $fechaVencimiento = new \DateTime($newDate);
        $state      = $em->find(TblLoteEstado::class, $estado);
        $tblLote->setEstado($state);
        $tblLote->setFechaVencimiento($fechaVencimiento);
        $form = $this->createForm(TblLoteType::class, $tblLote);
        $form->submit($request);
        $em->persist($tblLote);
        $em->flush();
        $response = new JsonResponse(['LoteId' => $tblLote->getIdLote()], 200);
        return $response;
    }

    /**
     * @Route("/{idLote}", name="tbl_lote_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblLote $tblLote): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblLote->getIdLote(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblLote);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_lote_index');
    }

    private function serializeLote(TblLote $tblLote)
    {
        return ['idLote' => $tblLote->getIdLote()];
    }
}
