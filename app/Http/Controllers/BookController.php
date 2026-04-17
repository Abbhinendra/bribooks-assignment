<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
use App\Http\Requests\BookRequest;
use App\Enums\Pagination;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookController extends Controller
{

    protected BookService $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function addBook(BookRequest $request) : JsonResponse
    {
        $data = $request->validated();
        $book = $this->bookService->addBook($data);
        return response()->json($book, 201);
    }

    public function getBooks(Request $request): JsonResponse
    {
        $data = $request->only(['title','author']);
        $book = $this->bookService->getBooks($data, Pagination::MEDIUM->value);
        return response()->json($book, 200);
    }

    public function getBookById(int $id): JsonResponse
    {
        $book = $this->bookService->getBookById($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book, 200);
    }

    public function updateBook(BookRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $book = $this->bookService->updateBook($id, $data);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book, 200);
    }

    public function deleteBook(int $id): JsonResponse
    {
        $this->bookService->deleteBook($id);
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}
