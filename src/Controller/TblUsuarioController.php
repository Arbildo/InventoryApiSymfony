<?php

namespace App\Controller;

use App\Entity\TblCargo;
use App\Entity\TblUsuario;
use App\Entity\TblUsuarioEstado;
use App\Form\TblUsuarioType;
use App\Repository\TblUsuarioEstadoRepository;
use App\Repository\TblUsuarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Tests\DependencyInjection\Fixtures\UserProvider\DummyProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/usuario")
 */
class TblUsuarioController extends AbstractController
{
    const HEADERS = ['Content-Type'=> 'application/json'];

    /**
     * @Route("/", name="tbl_usuario_index", methods={"GET"})
     */
    public function index(Request $request, TblUsuarioRepository $tblUsuarioRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblUsuarioRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;
    }

    /**
     * @Route("/estado", name="tbl_usuario_estado", methods={"GET"})
     */
    public function userStates(Request $request, TblUsuarioEstadoRepository $tblUsuarioEstadoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblUsuarioEstadoRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;
    }

    /**
     * @Route("/new", name="tbl_usuario_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $data                   = json_decode($request->getContent(),true);
        $tblUsuario             = new TblUsuario();
        $em                     = $this->getDoctrine()->getManager();
        $cargoId                = $data['idCargo'];
        $estado                 = $data['estado'];
        $tblTipoCargo           = $em->find(TblCargo::class, $cargoId);
        $tblUsuarioEstado       = $em->find(TblUsuarioEstado::class, $estado);
        $tblUsuario->setCargo($tblTipoCargo);
        $tblUsuario->setEstado($tblUsuarioEstado);
        $form = $this->createForm(TblUsuarioType::class, $tblUsuario);
        $form->submit($data, false);
        $em->persist($tblUsuario);
        $em->flush();
        $code = $this->generateClientCode($tblUsuario->getIdUsuario());
        $tblUsuario->setCodigo($code);
        $em->persist($tblUsuario);
        $em->flush();
        $data = $this->serializeUser($tblUsuario);
        $response = new JsonResponse($data, 200);
        return $response;
    }

    /**
     * @Route("/{idUsuario}", name="tbl_usuario_show", methods={"GET"})
     */
    public function show(TblUsuario $tblUsuario, SerializerInterface $serializer): Response
    {
        $ignoredAttributes = ['__initializer__', '__cloner__', '__isInitialized__','password', 'usuario'];
        $result = $serializer->serialize($tblUsuario, 'json',['ignored_attributes' => $ignoredAttributes]);
        $response = new Response($result, 200, self::HEADERS);

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
        $data           = json_decode($request->getContent(), true);
        $em             = $this->getDoctrine()->getManager();
        $cargoId        = $data['idCargo'];
        $estado         = $data['estado'];
        $tblTipoCargo       = $em->find(TblCargo::class, $cargoId);
        $tblUsuarioEstado   = $em->find(TblUsuarioEstado::class, $estado);
        $user->setCargo($tblTipoCargo);
        $user->setEstado($tblUsuarioEstado);
        $form = $this->createForm(TblUsuarioType::class, $user);
        $form->submit($data, false);
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

    private function generateClientCode($clientCode)
    {
        return "CLI-{$clientCode}";

    }
}


