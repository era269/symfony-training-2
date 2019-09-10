<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\CalculatorInterface;
use App\Service\Handler\HandlerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    public function index(Request $request, CalculatorInterface $calculator, HandlerInterface $handlerManager, \App\Service\HandlerAutowired\HandlerInterface $handlerAutowired)
    {//http://localhost:8080/?a=1&b=3
        $result = $calculator->calculate(
            (int)$request->get('a'),
            (int)$request->get('b')
        );
        $data = [
            'result' => [
                $handlerManager($result),
//                ($handlerManager->createNumber2Handler())($result),
                $handlerManager('??' . $result),
                ],
            'result_autowired' => [
                $handlerManager($result),
//                ($handlerManager->createNumber2Handler())($result),
                $handlerManager('??' . $result),
                ],
        ];

//        $response = new JsonResponse($data);


        return $this->json($data);
    }
}
