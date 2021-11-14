<?php

namespace App\Controller;

use App\Entity\TblCliente;
use App\Form\TblClienteType;
use App\Repository\TblClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/cliente")
 */
class TblClienteController extends AbstractController
{
    const HEADERS = ['Content-Type'=> 'application/json'];
    /**
     * @Route("/", name="tbl_cliente_index", methods={"GET"})
     */
    public function index(Request $request ,TblClienteRepository $tblClienteRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblClienteRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        return new Response($result, 200,self::HEADERS );
    }

    /**
     * @Route("/doc/{numeroDoc}", name="tbl_cliente_doc", methods={"GET"})
     */
    public function getByDocumentNumber(TblCliente $tblCliente, SerializerInterface $serializer): Response
    {
        $ignoredAttributes = ['__initializer__', '__cloner__', '__isInitialized__'];
        $result = $serializer->serialize([$tblCliente], 'json',['ignored_attributes' => $ignoredAttributes]);
        $response = new Response($result, 200, self::HEADERS);
        return $response;
    }

    /**
     * @Route("/new", name="tbl_cliente_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblCliente = new TblCliente();
        $form = $this->createForm(TblClienteType::class, $tblCliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblCliente);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_cliente_index');
        }

        return $this->render('tbl_cliente/new.html.twig', [
            'tbl_cliente' => $tblCliente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCliente}", name="tbl_cliente_show", methods={"GET"})
     */
    public function show(TblCliente $tblCliente): Response
    {
        return $this->render('tbl_cliente/show.html.twig', [
            'tbl_cliente' => $tblCliente,
        ]);
    }

    /**
     * @Route("/{idCliente}/edit", name="tbl_cliente_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblCliente $tblCliente): Response
    {
        $form = $this->createForm(TblClienteType::class, $tblCliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_cliente_index');
        }

        return $this->render('tbl_cliente/edit.html.twig', [
            'tbl_cliente' => $tblCliente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCliente}", name="tbl_cliente_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblCliente $tblCliente): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblCliente->getIdCliente(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblCliente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_cliente_index');
    }
}
