<?php

namespace App\Controller;

use App\Entity\TblPerdida;
use App\Form\TblPerdidaType;
use App\Repository\TblPerdidaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @Route("/tbl/perdida")
 */
class TblPerdidaController extends AbstractController
{
    /**
     * @Route("/", name="tbl_perdida_index", methods={"GET"})
     */
    public function index(Request $request, TblPerdidaRepository $tblPerdidaRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblPerdidaRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;
    }

    /**
     * @Route("/new", name="tbl_perdida_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $data               = json_decode($request->getContent(),true);
        $em                 = $this->getDoctrine()->getManager();
        $tblPerdida        = new TblPerdida();

        $form = $this->createForm(TblPerdidaType::class, $tblPerdida);
        $form->submit($data);
        $em->persist($tblPerdida);
        $em->flush();

        $code = $this->generateProductLoseCode($tblPerdida->getIdPerdida());
        $tblPerdida->setCodigo($code);
        $em->persist($tblPerdida);
        $em->flush();

        $data = $this->serializeProductLose($tblPerdida);
        $response = new JsonResponse($data, 200);
        return $response;
    }

    /**
     * @Route("/{idPerdida}", name="tbl_perdida_show", methods={"GET"})
     */
    public function show(TblPerdida $tblPerdida): Response
    {
        return $this->render('tbl_perdida/show.html.twig', [
            'tbl_perdida' => $tblPerdida,
        ]);
    }

    private function generateDateInput()
    {
        $creationDate = new \DateTime();
        $creationDate->format( 'Y-m-d');

        return $creationDate;
    }
    /**
     * @Route("/{idPerdida}/edit", name="tbl_perdida_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TblPerdida $tblPerdida): Response
    {
        $form = $this->createForm(TblPerdidaType::class, $tblPerdida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tbl_perdida_index');
        }

        return $this->render('tbl_perdida/edit.html.twig', [
            'tbl_perdida' => $tblPerdida,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idPerdida}", name="tbl_perdida_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblPerdida $tblPerdida): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tblPerdida->getIdPerdida(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblPerdida);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_perdida_index');
    }

    private function serializeProductLose(TblPerdida $tblPerdida)
    {
        return ['IdPerdida' => $tblPerdida->getIdPerdida()];
    }

    private function generateProductLoseCode($id)
    {
        return "REPORT-{$id}";
    }
}
