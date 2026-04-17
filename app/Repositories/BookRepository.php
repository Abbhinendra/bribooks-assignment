<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Repositories\BookInterface;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
class BookRepository implements BookInterface
{

    public function addBook(array $data): array
    {   if (isset($data['cover_image'])) {
            $data['cover_image'] = $data['cover_image']->store('covers', 'public');
        }
        $book = Book::create($data);
        return $book->toArray();
    }

    public function getBooks(array $filters, int $perPage): array
    {
        $query = Book::query()->filter($filters);
        $books = $query->orderBy('created_at', 'desc')->paginate($perPage);
        return $books->toArray();
    }

    public function getBookById(int $id): ?array
    {
        $book = Book::find($id);
        return $book ? $book->toArray() : null;
    }


    public function updateBook(int $id, array $data): ?array
    {
        $book = Book::find($id);
        if (!$book) {
            return null;
        }

        if($book->cover_image && isset($data['cover_image'])){
            Storage::disk('public')->delete($book->cover_image);
        }
        if (isset($data['cover_image'])) {
                $data['cover_image'] = $data['cover_image']->store('covers', 'public');
        }
        $book->update($data);
        return $book->toArray();
    }

    public function deleteBook(int $id): bool
    {
        $book = Book::find($id);
        if (!$book) {
            return false;
        }
        return $book->delete();
    }

}
