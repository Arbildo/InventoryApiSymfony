<?php

namespace App\Controller;

use App\Entity\TblUsuario;
use App\Form\TblUsuarioType;
use App\Repository\TblUsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/tbl/usuario")
 */
class TblUsuarioController extends AbstractController
{
    /**
     * @Route("/", name="tbl_usuario_index", methods={"GET"})
     */
    public function index(TblUsuarioRepository $tblUsuarioRepository): Response
    {
        $encoders = [new JsonEncoder()];
        $normalizers = new ObjectNormalizer();
        $normalizers->setIgnoredAttributes(["__initializer__", "__cloner__","__isInitialized__","password"] );
        $serializer = new Serializer([$normalizers], $encoders);
        $result =$serializer->serialize($tblUsuarioRepository->findAll(), 'json');
        $response = new Response();
        $response->setContent($result);
        return $response;

    }

    /**
     * @Route("/new", name="tbl_usuario_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblUsuario = new TblUsuario();
        $form = $this->createForm(TblUsuarioType::class, $tblUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblUsuario);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_usuario_index');
        }

        return $this->render('tbl_usuario/new.html.twig', [
            'tbl_usuario' => $tblUsuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUsuario}", name="tbl_usuario_show", methods={"GET"})
     */
    public function show(TblUsuario $tblUsuario): Response
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $foo =$serializer->serialize($tblUsuario, 'json');
        $response = new Response();
        $response->setContent($foo);

        return $response;
    }

    /**
     * @Route("/{idUsuario}/edit", name="tbl_usuario_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblUsuario $tblUsuario): Response
    {
        $form = $this->createForm(TblUsuarioType::class, $tblUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_usuario_index');
        }

        return $this->render('tbl_usuario/edit.html.twig', [
            'tbl_usuario' => $tblUsuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUsuario}", name="tbl_usuario_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblUsuario $tblUsuario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblUsuario->getIdUsuario(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblUsuario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_usuario_index');
    }
}
