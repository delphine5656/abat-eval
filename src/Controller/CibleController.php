<?php

namespace App\Controller;

use App\Entity\Cible;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CibleController extends AbstractController
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
     * @Route("/missions/cible", name="cible")
     */
    public function index(Request $request): Response
    {
        $cibles = $this->entityManager->getRepository(Cible::class)->findAll();
        return $this->render('cible/index.html.twig', [
            'cibles' => $cibles,
        ]);
    }
}
