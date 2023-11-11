<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrdersController extends AbstractController
{
    #[Route('/orders', name: 'app_orders')]
    public function index(Request $request, OrderRepository $orderRepository): Response
    {
        $queryBuilder = $orderRepository->getOrdersQueryBuilder();
        $pagerfanta = new Pagerfanta(
            new QueryAdapter($queryBuilder),
        );
        $pagerfanta->setCurrentPage($request->query->get('page', 1));

        return $this->render('orders/index.html.twig', [
            'pager' => $pagerfanta,
        ]);
    }
}
