<?php

namespace App\Controller;

use App\Entity\Planque;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
    public function index(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator): Response
    {
        $planques = $this->entityManager->getRepository(Planque::class)->findAll();

        //pagination
        $dql   = "SELECT a FROM AcmeMainBundle:Article a";
        $query = $em->createQuery($dql);

        $planques = $paginator->paginate(
            $planques, /* query NOT result */
            $request->query->getInt('page', 1),  12);

        return $this->render('planque/index.html.twig', [
            'planques' => $planques,
        ]);
    }
}
