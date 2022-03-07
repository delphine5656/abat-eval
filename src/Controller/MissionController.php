<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Mission;
use App\Form\SearchType;
use App\Repository\MissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class MissionController extends AbstractController
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
     * @Route("/missions", name="missions")
     */
    public function index(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator): Response
    {
        $missions = $this->entityManager->getRepository(Mission::class)->findAll();

        //pagination
        $dql   = "SELECT a FROM AcmeMainBundle:Article a";
        $query = $em->createQuery($dql);

        $missions = $paginator->paginate(
            $missions, /* query NOT result */
            $request->query->getInt('page', 1),  12);

        //recherche dynamique des missions
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

      $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $search = $form->getData();
            $missions = $this->entityManager->getRepository(Mission::class)->findWithSearch($search);

            //mise en place de la pagination
            $missions = $paginator->paginate(
                $missions, /* query NOT result */
                $request->query->getInt('page', 1),  12);
        }

        return $this->render('mission/index.html.twig', [
            'missions' => $missions,
            'formView' => $form->createView(),



        ]);
    }

    /**
     * @Route("gestion/mission/{slug}", name="mission")
     */
    public function show($slug): Response
    {

        $mission = $this->entityManager->getRepository(Mission::class)->findOneBy(['slug' => $slug]);
        if(!$mission){
            return $this->redirectToRoute('missions');
        }

        return $this->render('mission/show.html.twig', [
            'mission' => $mission,
        ]);
    }
}

