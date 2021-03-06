<?php

namespace App\Controller;

use App\Entity\Board;
use App\Form\BoardType;
use App\Repository\BoardRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/board')]
class BoardController extends AbstractController
{
    #[Route('/current', name: 'app_board_current', methods: ['GET'])]
    public function current(EntityManagerInterface $entityManager): Response
    {
        $boards = $entityManager
            ->getRepository(Board::class)
            ->findBy(['finished' => 0], array('totalScore' => 'DESC', 'updatedAt' => 'DESC'));

        return $this->render('board/current.html.twig', [
            'boards' => $boards,
        ]);
    }

    #[Route('/', name: 'app_board_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $boards = $entityManager
            ->getRepository(Board::class)
            ->findAll();
      
        return $this->render('board/index.html.twig', [
            'boards' => $boards,
        ]);
    }

    #[Route('/new', name: 'app_board_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $board = new Board();
        $form = $this->createForm(BoardType::class, $board);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Get current time & set created and updated time
            $board->setUpdatedAt(new \DateTime());
            $board->setCreatedAt(new \DateTime());

            //Initialization
            $board->setHomeScore(0);
            $board->setAwayScore(0);
            $board->setFinished(0);
            $board->setTotalScore(0);

            $entityManager->persist($board);
            $entityManager->flush();

            return $this->redirectToRoute('app_board_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('board/new.html.twig', [
            'board' => $board,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/details', name: 'board_details', methods: ['GET'])]
    public function show(Board $board): Response
    {
        return $this->render('board/show.html.twig', [
            'board' => $board,
        ]);
    }

    #[Route('/{id}/edit', name: 'board_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Board $board, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BoardType::class, $board);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $totalScore = $board->getHomeScore() + $board->getAwayScore();
            $board->setTotalScore($totalScore);
            $entityManager->flush();

            return $this->redirectToRoute('app_board_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('board/edit.html.twig', [
            'board' => $board,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'board_delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, Board $board, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($board);
        $entityManager->flush();


        return $this->redirectToRoute('app_board_index', [], Response::HTTP_SEE_OTHER);
    }
}
