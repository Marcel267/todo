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
    #[Route('/', name: 'redirect')]
    public function test()
    {
        return $this->redirect($this->generateUrl('home', ['category' => 'all']));
    }

    #[Route('/{category}', name: 'home')]
    public function index(ManagerRegistry $doctrine, $category): Response
    {
        $notes = null;

        //check if all or marked category is called
        if ($category === null || $category === 'all') {
            $notes = $doctrine->getRepository(Note::class)->findAll();
            $icon = 'home';
            $title = 'Alle Notizen';
        } elseif ($category === 'marked') {
            $notes = $doctrine->getRepository(Note::class)->findAll();
            $icon = 'star';
            $title = 'Markierte Notizen';
        } else {
            //@ TODO: get all custom notes
            $notes = $doctrine->getRepository(Note::class)->findAll();
            $icon = 'list';
            $title = 'Eigene Liste';
        }

        // $notes = $doctrine->getRepository(Note::class)->findAll();
        // $icon = 'home';
        // $title = 'Alle Notizen';

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'notes' => $notes,
            'icon' => $icon,
            'title' => $title,
            'category' => $category
        ]);
    }


    // #[Route('/all', name: 'all')]
    // public function all(ManagerRegistry $doctrine, $category): Response
    // {
    //     $notes = $doctrine->getRepository(Note::class)->findAll();
    //     $icon = 'home';
    //     $title = 'Alle Notizen';

    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //         'notes' => $notes,
    //         'icon' => $icon,
    //         'title' => $title,
    //         'category' => $category
    //     ]);
    // }



    #[Route('/create', name: 'create')]
    public function create(NoteRepository $noteRepository): JsonResponse
    {

        $note = new Note();
        $note->setContent('Test Notiz');

        $noteRepository->save($note, true);


        return new JsonResponse('Note Created');
    }
}
