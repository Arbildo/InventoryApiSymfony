<?php

namespace App\Controller;

use App\Entity\TblDetalleAtendido;
use App\Form\TblDetalleAtendidoType;
use App\Repository\TblDetalleAtendidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/detalle/atendido")
 */
class TblDetalleAtendidoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_detalle_atendido_index", methods={"GET"})
     */
    public function index(TblDetalleAtendidoRepository $tblDetalleAtendidoRepository): Response
    {
        return $this->render('tbl_detalle_atendido/index.html.twig', [
            'tbl_detalle_atendidos' => $tblDetalleAtendidoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_detalle_atendido_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblDetalleAtendido = new TblDetalleAtendido();
        $form = $this->createForm(TblDetalleAtendidoType::class, $tblDetalleAtendido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblDetalleAtendido);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_detalle_atendido_index');
        }

        return $this->render('tbl_detalle_atendido/new.html.twig', [
            'tbl_detalle_atendido' => $tblDetalleAtendido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleAtendido}", name="tbl_detalle_atendido_show", methods={"GET"})
     */
    public function show(TblDetalleAtendido $tblDetalleAtendido): Response
    {
        return $this->render('tbl_detalle_atendido/show.html.twig', [
            'tbl_detalle_atendido' => $tblDetalleAtendido,
        ]);
    }

    /**
     * @Route("/{idDetalleAtendido}/edit", name="tbl_detalle_atendido_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblDetalleAtendido $tblDetalleAtendido): Response
    {
        $form = $this->createForm(TblDetalleAtendidoType::class, $tblDetalleAtendido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_detalle_atendido_index');
        }

        return $this->render('tbl_detalle_atendido/edit.html.twig', [
            'tbl_detalle_atendido' => $tblDetalleAtendido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDetalleAtendido}", name="tbl_detalle_atendido_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblDetalleAtendido $tblDetalleAtendido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblDetalleAtendido->getIdDetalleAtendido(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblDetalleAtendido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_detalle_atendido_index');
    }
}
