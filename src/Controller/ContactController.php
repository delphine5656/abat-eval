<?php

namespace App\Controller;

use App\Entity\Contact;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/missions/contact", name="contact")
     */
    public function index(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator): Response
    {
        $contacts = $this->entityManager->getRepository(Contact::class)->findAll();

        //pagination
        $dql   = "SELECT a FROM AcmeMainBundle:Article a";
        $query = $em->createQuery($dql);

        $contacts = $paginator->paginate(
            $contacts, /* query NOT result */
            $request->query->getInt('page', 1),  12);

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
