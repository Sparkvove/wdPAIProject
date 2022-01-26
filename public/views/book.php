<?php

if (!isset($_COOKIE['currentUser']))
{
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/104e78d280.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/public/css/books.css">
    <title>Book</title>
</head>
<body>
    <div class ="base-container">

        <?php include('header.php')?>
        
       <main>
           <div class="book-info-bg">
            <div class="Book-info-fg">
                   <div class="Book-Cover">
                       <img src="/public/uploads/<?= $book->getImage(); ?>">
                    </div>
                   <div class="Book-Info-text">

                    <p class="text-white">
                        <?= $book->getTitle(); ?>
                        <br>
                        Book Author
                    </p>
                    <button>Add To List</button>
                    <div class="Book-Stats">
                        <p class="text-white">Pages</p>
                        <p class="text-white">Rating</p>
                        <p class="text-white">Status</p>
                    </div>
                   
                </div>
                   </div>

           </div>



        <section class="Full-size-spliter">
            Summary
        </section>
        <p class="Book-Info">
            <?= $book->getSummary(); ?>
        </p>
       </main>

</body>
</html>