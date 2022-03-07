<?php

namespace App\Controller;

use App\Entity\Agent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class AgentController extends AbstractController
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
     * @Route("/missions/agent", name="agent")
     */
    public function index(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator): Response
    {
        $agents = $this->entityManager->getRepository(Agent::class)->findAll();

        //pagination
        $dql   = "SELECT a FROM AcmeMainBundle:Article a";
        $query = $em->createQuery($dql);

        $agents = $paginator->paginate(
            $agents, /* query NOT result */
            $request->query->getInt('page', 1),  12);

        return $this->render('agent/index.html.twig', [
            'agents' => $agents,
        ]);
    }
}
