<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'index')]
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $postRepository->findAll()
        ]);
    }
    #[Route('/post/{id}', methods: ['GET', 'HEAD'])]
    public function show(int $id, PostRepository $postRepository): Response
    {
        return $this->render('post/detail.html.twig', [
            'post' => $postRepository->find($id)
        ]);
    }
}
