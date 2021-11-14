<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auth", name="auth")
 */
class AuthController extends AbstractController
{

    /**
     * @Route("/login/info", name="login_info", methods={"GET"})
     */
    public function login_check(Request $request): Response
    {
        $user = $this->getUser();

        return $this->json([
            'username' => $user->getCorreo(),
            'roles' => $user->getRoles(),
        ]);
    }


//    public function login(Request $request, SerializerInterface $serializer)
//    {
//        $request = $request->getContent();
//        $data = json_decode($request,true);
//        $data['estado'] = self::ACTIVE_USER;
//        $em             = $this->getDoctrine()->getManager();
//        $usuarioRepository    = $em->getRepository(TblUsuario::class);
//        $userInfo = $usuarioRepository->findOneBy($data);
//        $result = $serializer->serialize($userInfo, 'json', self::IGNORED_VALUES);
//        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
//        return $response;
//    }
}
