<?php

namespace App\Controller;

use App\Entity\TblTipoProducto;
use App\Form\TblTipoProductoType;
use App\Repository\TblTipoProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/tbl/tipo/producto")
 */
class TblTipoProductoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_tipo_producto_index", methods={"GET"})
     */
    public function index(Request $request, TblTipoProductoRepository $tblTipoProductoRepository): Response
    {
        parse_str($request->getQueryString(), $array);
        $encoders = [new JsonEncoder()];
        $normalizers = new ObjectNormalizer();
        $normalizers->setIgnoredAttributes(["__initializer__", "__cloner__", "__isInitialized__"]);
        $serializer = new Serializer([$normalizers], $encoders);
        $result = $serializer->serialize($tblTipoProductoRepository->findBy($array), 'json');
        $response = new Response();
        $response->setContent($result);

        return $response;
    }
    /**
     * @Route("/new", name="tbl_tipo_producto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblTipoProducto = new TblTipoProducto();
        $form = $this->createForm(TblTipoProductoType::class, $tblTipoProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblTipoProducto);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_tipo_producto_index');
        }

        return $this->render('tbl_tipo_producto/new.html.twig', [
            'tbl_tipo_producto' => $tblTipoProducto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipo}", name="tbl_tipo_producto_show", methods={"GET"})
     */
    public function show(TblTipoProducto $tblTipoProducto): Response
    {
        return $this->render('tbl_tipo_producto/show.html.twig', [
            'tbl_tipo_producto' => $tblTipoProducto,
        ]);
    }

    /**
     * @Route("/{idTipo}/edit", name="tbl_tipo_producto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblTipoProducto $tblTipoProducto): Response
    {
        $form = $this->createForm(TblTipoProductoType::class, $tblTipoProducto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_tipo_producto_index');
        }

        return $this->render('tbl_tipo_producto/edit.html.twig', [
            'tbl_tipo_producto' => $tblTipoProducto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTipo}", name="tbl_tipo_producto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblTipoProducto $tblTipoProducto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblTipoProducto->getIdTipo(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblTipoProducto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_tipo_producto_index');
    }
}
