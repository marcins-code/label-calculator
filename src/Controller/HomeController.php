<?php

namespace App\Controller;

use App\Entity\Teeth;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/calc", name="home", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): Response
    {

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $requestContentType = $request->headers->get('content-type');


        if ($request->getMethod() === 'POST' && $requestContentType === 'application/json') {
            $json = json_decode($request->getContent());
            $rollers = $em->getRepository(Teeth::class)->findAll();
            foreach ($rollers as $roller) {
                $roller->setUFActor($roller->getTeeth() / $json->width);
                $roller->setCalculatedGap(45.66);
            }

        } else {
            $rollers = 'dupa';
        }


        $rollers2 = $serializer->serialize($rollers, 'json');


        $response = new Response(
            $rollers2,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        $response->send();

    }

    /**
     * @Route(path="/", methods={"GET"})
     */

    public function homePage(EntityManagerInterface $em)
    {

        $rollers = $em->getRepository(Teeth::class)->findAll();

//        dd($rollers);


        $a1 = array(1, 3, 2, 3, 4);

//        dd(array_filter($rollers,function ($v) {
//            return $v->getTeeth()> 100;
//        }));
//


//        dd(array_map($rollers, function (&$v){
//             $v->getTeeth()*2;
//
//             return $v;
//        }));


        return $this->render('home/index.html.twig', [
            'title' => 'Title'
        ]);

    }


}


