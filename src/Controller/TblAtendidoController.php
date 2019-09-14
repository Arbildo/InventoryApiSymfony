<?php

namespace App\Controller;

use App\Entity\TblAtendido;
use App\Form\TblAtendidoType;
use App\Repository\TblAtendidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/atendido")
 */
class TblAtendidoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_atendido_index", methods={"GET"})
     */
    public function index(TblAtendidoRepository $tblAtendidoRepository): Response
    {
        return $this->render('tbl_atendido/index.html.twig', [
            'tbl_atendidos' => $tblAtendidoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_atendido_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblAtendido = new TblAtendido();
        $form = $this->createForm(TblAtendidoType::class, $tblAtendido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblAtendido);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_atendido_index');
        }

        return $this->render('tbl_atendido/new.html.twig', [
            'tbl_atendido' => $tblAtendido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idAtendido}", name="tbl_atendido_show", methods={"GET"})
     */
    public function show(TblAtendido $tblAtendido): Response
    {
        return $this->render('tbl_atendido/show.html.twig', [
            'tbl_atendido' => $tblAtendido,
        ]);
    }

    /**
     * @Route("/{idAtendido}/edit", name="tbl_atendido_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblAtendido $tblAtendido): Response
    {
        $form = $this->createForm(TblAtendidoType::class, $tblAtendido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_atendido_index');
        }

        return $this->render('tbl_atendido/edit.html.twig', [
            'tbl_atendido' => $tblAtendido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idAtendido}", name="tbl_atendido_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblAtendido $tblAtendido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblAtendido->getIdAtendido(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblAtendido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_atendido_index');
    }
}
