<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Book.php';

class BookRepository extends Repository
{

    public function getBook(int $id): ?Book
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM books WHERE id_book = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book == false) {
            return null;
        }

        return new Book(
            $book['title'],
            $book['description'],
            $book['image']


        );
    }

        public function addBook(Book $book) :void{

            $date = new DateTime();
            $stmt = $this->database->connect()->prepare('
                INSERT INTO books (title,description,image)
                VALUES (?, ?, ?)
            ');

            $assignedByID = 1;
            $stmt->execute([
                $book->getTitle(),
                $book->getSummary(),
                $book->getImage(),
            ]);
        }

        public function getBooks(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('SELECT * FROM books');

        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($books as $book){
            $result[] = new Book(
                $book['title'],
                $book['description'],
                $book['image'],
                $book['id_book']
            );
        }

        return $result;
        }


        public function getBookByTitle(string $searchString)
        {
            $searchString = '%'.strtolower($searchString).'%';

            $stmt = $this->database->connect()->prepare('
                SELECT * FROM books WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
            ');
            $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function ShowBook(string $title){

        }
}