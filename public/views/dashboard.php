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
    <title>Dashboard</title>
</head>
<body>
    <div class ="base-container">

            <?php include('header.php')?>
        
       <main>
           <section class ="splitter">
               Recomended
        </section>

           <section class="books">
               <?php foreach ($books as $book): ?>
                   <div id=<?= $book->getId(); ?>>
                       <img src="/public/uploads/<?= $book->getImage(); ?>">
                       <div>
                           <a href="http://localhost:8080/book/<?= $book->getId(); ?>"
                           <h2><?= $book->getTitle(); ?></h2>
                           </a>
                           <p><?= $book->getSummary(); ?></p>
                           <div class="social-section">
                               <i class="fas fa-heart"> 600 </i>
                           </div>
                       </div>
                   </div>
               <?php endforeach; ?>
           </section>

       </main>
    </div>


</body>
</html>