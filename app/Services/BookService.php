<?php
declare(strict_types=1);
namespace App\Services;
use App\Repositories\BookInterface;
class BookService
{
    protected BookInterface $bookRepository;
    public function __construct(BookInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function addBook(array $data): array
    {
        return $this->bookRepository->addBook($data);
    }

    public function getBooks(array $filters, int $perPage): array
    {
        return $this->bookRepository->getBooks($filters, $perPage);
    }

    public function getBookById(int $id): ?array
    {
        return $this->bookRepository->getBookById($id);
    }

    public function updateBook(int $id, array $data): ?array
    {
        return $this->bookRepository->updateBook($id, $data);
    }

    public function deleteBook(int $id): bool
    {
        return $this->bookRepository->deleteBook($id);
    }

}
