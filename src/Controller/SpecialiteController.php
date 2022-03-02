<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Entity\Speciality;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecialiteController extends AbstractController
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
     * @Route("/missions/specialite", name="specialite")
     */
    public function index(Request $request): Response
    {
        $specialites = $this->entityManager->getRepository(Speciality::class)->findAll();
        $missions = $this->entityManager->getRepository(Mission::class)->findAll();
        return $this->render('specialite/index.html.twig', [
            'specialites' => $specialites,
            'missions' => $missions,
        ]);
    }
}
