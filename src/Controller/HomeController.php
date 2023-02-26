<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Note;
use App\Repository\CategoryRepository;
use App\Repository\NoteRepository;
use DateTime;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/{category?}', name: 'home', defaults: ['category' => 'tasks'])]
    public function index(ManagerRegistry $doctrine, $category, NoteRepository $noteRepository): Response
    {
        $notes = null;

        //check if all or marked category is called
        switch ($category) {
            case 'tasks':
                $notes = $doctrine->getRepository(Note::class)->findAll();
                $icon = 'home';
                $title = 'Aufgaben';
                break;
            case 'marked':
                $notes = $noteRepository->findAllMarked();
                $icon = 'star';
                $title = 'Markierte Notizen';
                break;
            default:
                //@ TODO: get all custom notes
                $notes = $doctrine->getRepository(Note::class)->findAll();
                $icon = 'list';
                $title = $category;
                break;
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



    #[Route('/test/create', name: 'create')]
    public function create(NoteRepository $noteRepository, CategoryRepository $categoryRepository): Response
    {
        // $category = new Category();
        // $category->setName('Eigene Liste');

        // $categoryRepository->save($category, true);

        // $note = new Note();
        // $note->setContent('Eigene Notiz');
        // $note->setCategory($category);

        // $noteRepository->save($note, true);

        // $noteRepository->findOneBy(['id' => 7])->setMarkedDate(new DateTime());


        return new Response('OK');
    }
}
