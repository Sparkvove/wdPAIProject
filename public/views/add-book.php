<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/104e78d280.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">
    <link rel="stylesheet" type="text/css" href="public/css/books.css">
    <title>Upload</title>
</head>
<body>
    <div class ="base-container">

        <header class="main-header">

             <div class="wrapper">

                <div class="nav-logo">

                     <img src="public/img/logo.svg">

                </div>

                <div class="navigation-bar">
                    <div class="search">
                        <i class="fas fa-search"></i>
                        <p class="navigation-text">search</p>
                    </div>


                    <div class="browse">
                        <i class="fas fa-th-large"></i>
                        <p class="navigation-text">browse</p>
                    </div>

                    <div class="list">
                        <i class="fas fa-book"></i>
                        <p class="navigation-text">list</p>
                    </div>

                    <div class="settings">
                        <i class="fas fa-cog"></i>
                        <p class="navigation-text">settings</p>
                    </div>
                    
                </div> 

            </div>

        </header>
        
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