<?php

namespace App\Controller;

use App\Service\Calculation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class HomeController extends AbstractController
{
    /**
     * @Route("/calc", name="home", methods={"POST"})
     * @param Request $request
     * @param Calculation $calculation
     * @return Response
     */
    public function index(Request $request, Calculation $calculation): Response
    {

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $requestContentType = $request->headers->get('content-type');

        if ($request->getMethod() === 'POST' && $requestContentType === 'application/json') {
            $json = json_decode($request->getContent());

            $rollers = $calculation->calculateAllDataFofAllRollers($json->length);

<<<<<<< HEAD
            $rollers = $calculation->getOnlyRollersWithCorrectLeghtGaps($rollers);
=======

            $rollers = $calculation->getOnlyRollersWithCorrectLengthGaps($rollers);
>>>>>>> tests

            $correctRoller = $calculation->getBestSingleRoller($rollers);


        } else {
            $rollers = 'dupa';
        }

        $rollers2 = $serializer->serialize([
            'rollers'=>$rollers,
            'chosenRollerID'=>$correctRoller->getID(),
            'chosenRollerTeethNo'=>$correctRoller->getTeethNo(),
            'chosenRollerUFactor'=>$correctRoller->getUFactor(),
            'chosenRollerCalculatedGap'=>$correctRoller->getLengthGap(),
            'chosenRollerCircuit'=>$calculation->getBestSingleRollerCircuit($correctRoller->getTeethNo()),
            ], 'json');



        $response = new Response(
            $rollers2,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        $response->send();

    }

    /**
     * @Route(path="/home", methods={"GET"})
     * @return Response
     */

    public function homePage()
    {

        return $this->render('home/index.html.twig', [
            'title' => 'Title'
        ]);

    }


}


