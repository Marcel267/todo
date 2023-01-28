<?php

namespace App\Controller;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $notes = $doctrine->getRepository(Note::class)->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'notes' => $notes
        ]);
    }

    #[Route('/create', name: 'app_create')]
    public function create(NoteRepository $noteRepository): JsonResponse
    {

        $note = new Note();
        $note->setContent('Test Notiz');

        $noteRepository->save($note, true);


        return new JsonResponse('Note Created');
    }
}
