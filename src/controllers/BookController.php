<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Book.php';
require_once __DIR__.'/../repository/BookRepository.php';

class BookController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $bookRepository;


    public function __construct()
    {
        parent::__construct();
        $this->bookRepository = new BookRepository();
    }

    public function search()
    {
        if(!$this->isPost()){
            $books = $this->bookRepository->getBooks();
            $this->render('search', ['books' => $books]);
        }

        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->bookRepository->getBookByTitle($decoded['search']));
        }

    }

    public function book($id){
        $book = $this->bookRepository->getBook($id);
        $this->render('book', ['book' => $book]);
    }

    public function dashboard(){
        $books = $this->bookRepository->getBooks();
        $this->render('dashboard', ['books' => $books]);
    }

    public function addBook()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $book = new Book($_POST['title'], $_POST['summary'], $_FILES['file']['name']);
            $this->bookRepository->addBook($book);

            return $this->render('dashboard',['messages' => $this->messages, 'book' => $book]);
        }

        $this->render('add-book');
    }

    private function validate(array $file):bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[]='File is too large';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)){
            $this->messages[]='File type is not supported';
            return false;
        }

        return true;
    }




}