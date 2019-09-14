<?php

namespace App\Controller;

use App\Entity\TblUsuario;
use App\Form\TblUsuarioType;
use App\Repository\TblUsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        return $this->render('tbl_usuario/index.html.twig', [
            'tbl_usuarios' => $tblUsuarioRepository->findAll(),
        ]);
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
        return $this->render('tbl_usuario/show.html.twig', [
            'tbl_usuario' => $tblUsuario,
        ]);
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
