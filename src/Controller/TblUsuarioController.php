<?php

namespace App\Controller;

use App\Entity\TblCargo;
use App\Entity\TblUsuario;
use App\Form\TblUsuarioType;
use App\Repository\TblUsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
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
     * @Route("/new", name="tbl_usuario_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $data           = json_decode($request->getContent(),true);
        $em             = $this->getDoctrine()->getManager();
        $cargoId        = $data['cargo'];
        $tblTipoCargo    = $em->find(TblCargo::class, $cargoId);

        $tblUsuario        = new TblUsuario();

        $tblUsuario->setCargo($tblTipoCargo);

        $form = $this->createForm(TblUsuarioType::class, $tblUsuario);

        $form->submit($data);
        $em->persist($tblUsuario);
        $em->flush();
        $data = $this->serializeUser($tblUsuario);
        $response = new JsonResponse($data, 200);
        return $response;
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
     * @Route("/{idUsuario}/edit", name="tbl_usuario_edit", methods={"PUT"})
     */
    public function edit(Request $request, $idUsuario): Response
    {
        $user = $this->getDoctrine()->getRepository(TblUsuario::class)->find((int)$idUsuario);
        if (!$user) {
            throw $this->createNotFoundException(sprintf('Error "%s"', $user));
        }
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $cargoId       = $data['cargo'];
        $tblTipoCargo    = $em->find(TblCargo::class, $cargoId);
        $user->setCargo($tblTipoCargo);
        $form = $this->createForm(TblUsuarioType::class, $user);
        $form->submit($data);
        $em->persist($user);
        $em->flush();
        $data = $this->serializeUser($user);
        $response = new JsonResponse($data, 200);
        return $response;

    }

//    /**
//     * @Route("/{idUsuario}", name="tbl_usuario_delete", methods={"DELETE"})
//     */
//    public function delete(Request $request, TblUsuario $tblUsuario): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$tblUsuario->getIdUsuario(), $request->request->get('_token'))) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->remove($tblUsuario);
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('tbl_usuario_index');
//    }


    /**
     * @Route("/{idUsuario}/disable", name="tbl_usuario_disable", methods={"PUT"})
     */
    public function disable(Request $request, $idUsuario): Response
    {
        $user = $this->getDoctrine()
            ->getRepository(TblUsuario::class)->find((int)$idUsuario);
        if (!$user) {
            throw $this->createNotFoundException(sprintf(
                'Error "%s"',
                $user
            ));
        }
        $state = json_decode($request->getContent(), true)['estado'];
        $em = $this->getDoctrine()->getManager();
        $user->setEstado($state);
        $em->persist($user);
        $em->flush();
        $data = $this->serializeUser($user);
        $response = new JsonResponse($data, 200);
        return $response;
    }

    private function serializeUser(TblUsuario $usuario)
    {
        return [
            'UserID' => $usuario->getIdUsuario(),
        ];
    }
}


