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
    <title>Upload</title>
</head>
<body>
<div class ="base-container">

    <?php include('header.php')?>

    <main>
        <section class="addbook-form">
            <h1>Add Book</h1>
            <form action="addBook" method="post" ENCTYPE="multipart/form-data">
                <?php if (isset($messages)){
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <input name="title" type="text" placeholder="title">
                <textarea name="summary" rows="5" placeholder="summary"></textarea>
                <input type="file" name="file">
                <button type="submit">send</button>
            </form>
        </section>
    </main>
</div>


</body>
</html>
