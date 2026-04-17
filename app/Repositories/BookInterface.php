<?php
declare(strict_types=1);
namespace App\Repositories;

interface BookInterface
{
    public function addBook(array $data): array;
    public function getBooks(array $filters, int $perPage): array;
    public function getBookById(int $id): ?array;
    public function updateBook(int $id, array $data): ?array;
    public function deleteBook(int $id): bool;
}
