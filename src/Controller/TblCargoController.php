<?php

namespace App\Controller;

use App\Entity\TblCargo;
use App\Form\TblCargoType;
use App\Repository\TblCargoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/cargo")
 */
class TblCargoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_cargo_index", methods={"GET"})
     */
    public function index(TblCargoRepository $tblCargoRepository): Response
    {
        return $this->render('tbl_cargo/index.html.twig', [
            'tbl_cargos' => $tblCargoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_cargo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblCargo = new TblCargo();
        $form = $this->createForm(TblCargoType::class, $tblCargo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblCargo);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_cargo_index');
        }

        return $this->render('tbl_cargo/new.html.twig', [
            'tbl_cargo' => $tblCargo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCargo}", name="tbl_cargo_show", methods={"GET"})
     */
    public function show(TblCargo $tblCargo): Response
    {
        return $this->render('tbl_cargo/show.html.twig', [
            'tbl_cargo' => $tblCargo,
        ]);
    }

    /**
     * @Route("/{idCargo}/edit", name="tbl_cargo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblCargo $tblCargo): Response
    {
        $form = $this->createForm(TblCargoType::class, $tblCargo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_cargo_index');
        }

        return $this->render('tbl_cargo/edit.html.twig', [
            'tbl_cargo' => $tblCargo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idCargo}", name="tbl_cargo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblCargo $tblCargo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblCargo->getIdCargo(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblCargo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_cargo_index');
    }
}
