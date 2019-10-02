<?php

namespace App\Controller;

use App\Entity\TblUsuario;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auth", name="auth")
 */
class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request)
    {
        $request = $request->getContent();
        $data = json_decode($request,true);

        $em             = $this->getDoctrine()->getManager();
        $usuarioRepository    = $em->getRepository(TblUsuario::class);
        $userInfo = $usuarioRepository->findOneBy($data);

        $data = $this->serializeUser($userInfo);

        $token = $this->get('lexik_jwt_authentication.encoder')
            ->encode(['username' => $data]);

        $response = new JsonResponse($token, 200);
        return $response;
    }

    private function serializeUser($data)
    {
        if (empty($data)){
            return ['code '=> 204, 'data' => []];
        }
        return [
            'code' => 200,
            'data'=> [
            'nombres' =>$data->getNombres(),
            'apellidos' =>$data->getApellidos(),
            'usuario' =>$data->getUsuario(),
            'correo' =>$data->getCorreo(),
            'foto' =>$data->getFoto(),
            'cargo' => [
                'id'=>$data->getCargo()->getIdCargo(),
                'nombre'=>$data->getCargo()->getNombre(),
                'estado'=>$data->getCargo()->getEstado(),
                ]
        ]];

    }
}
