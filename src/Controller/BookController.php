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
    #[Route('/api/books/{id}', name: 'detailBook', methods: ['GET'])]
    public function getDetailBook(int $id, SerializerInterface $serializer, BookRepository $bookRepository): JsonResponse {

        $book = $bookRepository->find($id);
        if ($book) {
            $jsonBook = $serializer->serialize($book, 'json');
            return new JsonResponse($jsonBook, JsonResponse::HTTP_OK, [], true);
        }
        return new JsonResponse(null, JsonResponse::HTTP_NOT_FOUND);
   }
}
