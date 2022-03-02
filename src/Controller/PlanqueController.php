<?php

namespace App\Controller;

use App\Entity\Planque;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanqueController extends AbstractController
{
    private $entityManager;

    /**
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/missions/planque", name="planque")
     */
    public function index(Request $request): Response
    {
        $planques = $this->entityManager->getRepository(Planque::class)->findAll();
        return $this->render('planque/index.html.twig', [
            'planques' => $planques,
        ]);
    }
}
