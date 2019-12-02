<?php

namespace App\Controller;

use App\Entity\TblProducto;
use App\Entity\TblProductoEstado;
use App\Entity\TblTipoProducto;
use App\Entity\TblUnidadMedida;
use App\Form\TblProductoType;
use App\Repository\TblProductoEstadoRepository;
use App\Repository\TblProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/tbl/producto")
 */
class TblProductoController extends AbstractController
{
    /**
     * @Route("/", name="tbl_producto_index", methods={"GET"})
     */
    public function index(Request $request ,TblProductoRepository $tblProductoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblProductoRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;
    }

    /**
     * @Route("/estados", name="tbl_producto_estado", methods={"GET"})
     */
    public function productSates(Request $request ,TblProductoEstadoRepository $tblProductoEstadoRepository, SerializerInterface $serializer): Response
    {
        parse_str($request->getQueryString(), $array);
        $result = $serializer->serialize($tblProductoEstadoRepository->findBy($array), 'json',
            ['ignored_attributes' => ['__initializer__','__cloner__','__isInitialized__']]);
        $response = new Response($result, 200,['Content-Type'=> 'application/json'] );
        return $response;
    }

    private function generateProductCode($id)
    {
        return "PROD-{$id}";

    }

    /**
     * @Route("/new", name="tbl_producto_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $data            = json_decode($request->getContent(),true);
        $em                 = $this->getDoctrine()->getManager();
        $tipoProducto       = $data['idTipo'];
        $unidadMedida       = $data['idUnidad'];
        $tblProducto        = new TblProducto();
        $tblTipoProducto    = $em->find(TblTipoProducto::class, $tipoProducto);
        $tblUnidadMedida    = $em->find(TblUnidadMedida::class, $unidadMedida);
        $tblProductoEstado    = $em->find(TblProductoEstado::class, 1);

        $tblProducto->setIdTipo($tblTipoProducto);
        $tblProducto->setIdUnidad($tblUnidadMedida);
        $tblProducto->setEstado($tblProductoEstado);

        $form = $this->createForm(TblProductoType::class, $tblProducto);
        $form->submit($data);
        $em->persist($tblProducto);
        $em->flush();
        $code = $this->generateProductCode($tblProducto->getIdProducto());
        $tblProducto->setCodigo($code);
        $em->persist($tblProducto);
        $em->flush();

        $data = $this->serializeProduct($tblProducto);
        $response = new JsonResponse($data, 200);
        return $response;
    }

    /**
     * @Route("/{idProducto}", name="tbl_producto_show", methods={"GET"})
     */
    public function show(TblProducto $tblProducto): Response
    {
        return $this->render('tbl_producto/show.html.twig', [
            'tbl_producto' => $tblProducto,
        ]);
    }

    /**
     * @Route("/{idProducto}/edit", name="tbl_producto_edit", methods={"PUT"})
     */
    public function edit(Request $request, $idProducto): Response
    {
        $product = $this->getDoctrine()->getRepository(TblProducto::class)->find((int)$idProducto);

        if (!$product) {
            throw $this->createNotFoundException(sprintf('Error "%s"', $product));
        }
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $tipoProducto       = $data['tipo'];
        $unidadMedida       = $data['unidad'];
        $estado             = $data['estado'];
        $tblTipoProducto    = $em->find(TblTipoProducto::class, $tipoProducto);
        $tblUnidadMedida    = $em->find(TblUnidadMedida::class, $unidadMedida);
        $tblEstado          = $em->find(TblProductoEstado::class, $estado);

        $product->setIdTipo($tblTipoProducto);
        $product->setIdUnidad($tblUnidadMedida);
        $product->setEstado($tblEstado);

        $form = $this->createForm(TblProductoType::class, $product);
        $form->submit($data, false);
        $em->persist($product);
        $em->flush();
        $data = $this->serializeProduct($product);
        $response = new JsonResponse($data, 200);
        return $response;

    }

    /**
     * @Route("/{idProducto}", name="tbl_producto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TblProducto $tblProducto): Response
    {
        if ($this->isCsrfTokenValid('delete' . $tblProducto->getIdProducto(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tblProducto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tbl_producto_index');
    }


    /**
     * @Route("/{idProducto}/disable", name="tbl_producto_delete", methods={"PUT"})
     */
    public function disable(Request $request, $idProducto): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(TblProducto::class)->find((int)$idProducto);

        if (!$product) {
            throw $this->createNotFoundException(sprintf(
                'Error "%s"',
                $product
            ));
        }
        $state = json_decode($request->getContent(), true)['estado'];
        $em = $this->getDoctrine()->getManager();
        $tblTipoProducto    = $em->find(TblProductoEstado::class, $state);
        $product->setEstado($tblTipoProducto);
        $em->persist($product);
        $em->flush();
        $data = $this->serializeProduct($product);
        $response = new JsonResponse($data, 200);
        return $response;
    }



    private function serializeProduct(TblProducto $producto)
    {
        return [
            'ProductId' => $producto->getIdProducto(),
        ];
    }
}
