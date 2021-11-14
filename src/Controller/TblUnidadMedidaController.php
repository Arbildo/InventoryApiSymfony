<?php

namespace App\Controller;

use App\Entity\TblUnidadMedida;
use App\Form\TblUnidadMedidaType;
use App\Repository\TblUnidadMedidaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/tbl/unidad/medida")
 */
class TblUnidadMedidaController extends AbstractController
{
    const HEADERS = ['Content-Type'=> 'application/json'];

    /**
     * @Route("", name="tbl_unidad_medida_index", methods={"GET"})
     */
    public function index(Request $request, TblUnidadMedidaRepository $tblUnidadMedidaRepository): Response
    {
        parse_str($request->getQueryString(), $array);
        $encoders = [new JsonEncoder()];
        $normalizers = new ObjectNormalizer();
        $normalizers->setIgnoredAttributes(["__initializer__", "__cloner__", "__isInitialized__"]);
        $serializer = new Serializer([$normalizers], $encoders);
        $result = $serializer->serialize($tblUnidadMedidaRepository->findBy($array), 'json');
        return new Response($result, 200,self::HEADERS );

    }

    /**
     * @Route("/new", name="tbl_unidad_medida_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblUnidadMedida = new TblUnidadMedida();
        $form = $this->createForm(TblUnidadMedidaType::class, $tblUnidadMedida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblUnidadMedida);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_unidad_medida_index');
        }

        return $this->render('tbl_unidad_medida/new.html.twig', [
            'tbl_unidad_medida' => $tblUnidadMedida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnidad}", name="tbl_unidad_medida_show", methods={"GET"})
     */
    public function show(TblUnidadMedida $tblUnidadMedida): Response
    {
        return $this->render('tbl_unidad_medida/show.html.twig', [
            'tbl_unidad_medida' => $tblUnidadMedida,
        ]);
    }

    /**
     * @Route("/{idUnidad}/edit", name="tbl_unidad_medida_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblUnidadMedida $tblUnidadMedida): Response
    {
        $form = $this->createForm(TblUnidadMedidaType::class, $tblUnidadMedida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_unidad_medida_index');
        }

        return $this->render('tbl_unidad_medida/edit.html.twig', [
            'tbl_unidad_medida' => $tblUnidadMedida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUnidad}", name="tbl_unidad_medida_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblUnidadMedida $tblUnidadMedida): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblUnidadMedida->getIdUnidad(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblUnidadMedida);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_unidad_medida_index');
    }
}
