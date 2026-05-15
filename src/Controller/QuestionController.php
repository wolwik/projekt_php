<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class QuestionController extends AbstractController {
    #[Route(
        '/question',
        name: 'question_list'
    )]

    /*
     * Index
     */
    public function index(QuestionRepository $questionRepository): Response {
        $questions = $questionRepository->findAll();
        return $this->render('question/index.html.twig', [
            'questions' => $questions,
        ]);
    }


    /*
     * View
     */
    #[Route(
        '/question/{id}',
        name: 'question_view',
        requirements: ['id' => '[1-9]\d*'],
        methods: ['GET']
    )]

    public function view(QuestionRepository $questionRepository, int $id): Response {
        $question = $questionRepository->find($id);
        if (null === $question) throw $this->createNotFoundException('Question not found');
        return $this->render('question/view.html.twig', ['id' => $id, 'question' => $question]);
    }

}

