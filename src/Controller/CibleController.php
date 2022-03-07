<?php

namespace App\Controller;

use App\Entity\Cible;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
    public function index(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator): Response
    {
        $cibles = $this->entityManager->getRepository(Cible::class)->findAll();

        //pagination
        $dql   = "SELECT a FROM AcmeMainBundle:Article a";
        $query = $em->createQuery($dql);

        $cibles = $paginator->paginate(
            $cibles, /* query NOT result */
            $request->query->getInt('page', 1),  12);

        return $this->render('cible/index.html.twig', [
            'cibles' => $cibles,
        ]);
    }
}
