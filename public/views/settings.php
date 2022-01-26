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
    <title>Settings</title>
</head>
<body>
    <div class ="base-container">

        <?php include('header.php')?>
        
       <main>

           <?php

           if ($user->getId()==$_COOKIE['currentUser'] && $isAdmin)
           {
               echo "
            <a href='http://localhost:8080/addBook/{$user->getId()}'>
            <p>add book</p>
            </a>";
           }
           ?>




           <a href='http://localhost:8080/logout'>
               <p>Log out</p>
           </a>
       </main>
    </div>


</body>
</html>