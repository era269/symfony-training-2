<?php
declare(strict_types=1);

namespace App\Controller;


use App\Service\CalculatorAwareInterface;
use App\Service\CalculatorInterface;
use App\Service\Events\Event;
use App\Service\Events\EventDispatcher;
use App\Service\Handler\HandlerInterface;
use App\Service\NumberType;
use App\Service\StringType;
use App\Service\Traits\CalculatorAwareTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController implements CalculatorAwareInterface
{
    use CalculatorAwareTrait;

    public function index(Request $request, HandlerInterface $handlerManager, \App\Service\HandlerAutowired\HandlerInterface $handlerAutowired)
    {//http://localhost:8080/?a=1&b=3
        $result = $this->getCalculator()->calculate(
            (int)$request->get('a'),
            (int)$request->get('b')
        );
        $number = new NumberType($result);
        $string = new StringType((string)$result);
        $data = [
            'result' => [
                $handlerManager($number),
                $handlerManager($string),
                ],
            'result_autowired' => [
                $handlerAutowired($number),
                $handlerAutowired($string),
                ],
        ];

        return $this->json($data);
    }

    public function listener(EventDispatcher $eventDispatcher)
    {
        $eventNumber = new Event(new NumberType(123));
        $eventString = new Event(new StringType('some_string'));

        $eventDispatcher->dispatch($eventNumber);
        $eventDispatcher->dispatch($eventString);

        return $this->json([$eventString, $eventNumber]);
    }
}
