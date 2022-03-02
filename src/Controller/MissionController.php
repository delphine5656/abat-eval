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
    public function index(Request $request): Response
    {
        $missions = $this->entityManager->getRepository(Mission::class)->findAll();

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

      $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $search = $form->getData();
            $missions = $this->entityManager->getRepository(Mission::class)->findWithSearch($search);

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

