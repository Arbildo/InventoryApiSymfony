<?php

namespace App\Controller;

use App\Entity\TblNotaCredito;
use App\Form\TblNotaCreditoType;
use App\Repository\TblNotaCreditoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/nota/credito")
 */
class TblNotaCreditoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_nota_credito_index", methods={"GET"})
     */
    public function index(TblNotaCreditoRepository $tblNotaCreditoRepository): Response
    {
        return $this->render('tbl_nota_credito/index.html.twig', [
            'tbl_nota_creditos' => $tblNotaCreditoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_nota_credito_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblNotaCredito = new TblNotaCredito();
        $form = $this->createForm(TblNotaCreditoType::class, $tblNotaCredito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblNotaCredito);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_nota_credito_index');
        }

        return $this->render('tbl_nota_credito/new.html.twig', [
            'tbl_nota_credito' => $tblNotaCredito,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idNotaCredito}", name="tbl_nota_credito_show", methods={"GET"})
     */
    public function show(TblNotaCredito $tblNotaCredito): Response
    {
        return $this->render('tbl_nota_credito/show.html.twig', [
            'tbl_nota_credito' => $tblNotaCredito,
        ]);
    }

    /**
     * @Route("/{idNotaCredito}/edit", name="tbl_nota_credito_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblNotaCredito $tblNotaCredito): Response
    {
        $form = $this->createForm(TblNotaCreditoType::class, $tblNotaCredito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_nota_credito_index');
        }

        return $this->render('tbl_nota_credito/edit.html.twig', [
            'tbl_nota_credito' => $tblNotaCredito,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idNotaCredito}", name="tbl_nota_credito_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblNotaCredito $tblNotaCredito): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblNotaCredito->getIdNotaCredito(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblNotaCredito);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_nota_credito_index');
    }
}
