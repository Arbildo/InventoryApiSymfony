<?php

namespace App\Controller;

use App\Entity\TblUsuario;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/auth", name="auth")
 */
class AuthController extends AbstractController
{
    const IGNORED_VALUES = ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__', 'usuario', 'password']];
    const ACTIVE_USER = 1;

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, SerializerInterface $serializer)
    {
        $request = $request->getContent();
        $data = json_decode($request,true);
        $data['estado'] = self::ACTIVE_USER;
        $em             = $this->getDoctrine()->getManager();
        $usuarioRepository    = $em->getRepository(TblUsuario::class);
        $userInfo = $usuarioRepository->findOneBy($data);
        $result = $serializer->serialize($userInfo, 'json', self::IGNORED_VALUES);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;
    }
}
