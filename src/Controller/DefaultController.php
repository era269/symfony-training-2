<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\CalculatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    public function index(Request $request, CalculatorInterface $calculator)
    {//http://localhost:8080/?a=1&b=3
        $data = [
            'result' => $calculator->calculate(
                (int)$request->get('a'),
                (int)$request->get('b')
            )
        ];

//        $response = new JsonResponse($data);


        return $this->json($data);
    }
}
