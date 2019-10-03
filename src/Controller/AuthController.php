<?php

namespace App\Controller;

use App\Entity\TblUsuario;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auth", name="auth")
 */
class AuthController extends AbstractController
{
    private $jwtEncoder;

    public function __construct(JWTEncoderInterface $JWTEncoder)
    {
        $this->jwtEncoder = $JWTEncoder;
    }

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

        $encoded = $this->jwtEncoder->encode($data);

        $response = new JsonResponse(["token" => $encoded], 200);

        return $response;
    }

    private function serializeUser($data)
    {
        if (empty($data)){
            return ['data' => []];
        }
        return [
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
