<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Entity\Book;

use Symfony\Component\Serializer\SerializerInterface;


class BookController extends AbstractController
{
    #[Route('/api/books', name: 'book', methods: ['GET'])]
    public function getBookList(BookRepository $bookRepository): JsonResponse
    {
        $bookList = $bookRepository->findAll();

        return new JsonResponse([
            'books' => $bookList,
        ]);
    }
}
