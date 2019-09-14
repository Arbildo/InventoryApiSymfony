<?php

namespace App\Controller;

use App\Entity\TblTalla;
use App\Form\TblTallaType;
use App\Repository\TblTallaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tbl/talla")
 */
class TblTallaController extends AbstractController
{
    /**
     * @Route("/", name="tbl_talla_index", methods={"GET"})
     */
    public function index(TblTallaRepository $tblTallaRepository): Response
    {
        return $this->render('tbl_talla/index.html.twig', [
            'tbl_tallas' => $tblTallaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tbl_talla_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tblTalla = new TblTalla();
        $form = $this->createForm(TblTallaType::class, $tblTalla);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tblTalla);
            $entityManager->flush();

            return $this->redirectToRoute('tbl_talla_index');
        }

        return $this->render('tbl_talla/new.html.twig', [
            'tbl_talla' => $tblTalla,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTalla}", name="tbl_talla_show", methods={"GET"})
     */
    public function show(TblTalla $tblTalla): Response
    {
        return $this->render('tbl_talla/show.html.twig', [
            'tbl_talla' => $tblTalla,
        ]);
    }

    /**
     * @Route("/{idTalla}/edit", name="tbl_talla_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblTalla $tblTalla): Response
    {
        $form = $this->createForm(TblTallaType::class, $tblTalla);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_talla_index');
        }

        return $this->render('tbl_talla/edit.html.twig', [
            'tbl_talla' => $tblTalla,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idTalla}", name="tbl_talla_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblTalla $tblTalla): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblTalla->getIdTalla(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblTalla);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_talla_index');
    }
}
