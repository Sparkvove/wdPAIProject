<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/104e78d280.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/header.css">
    <link rel="stylesheet" type="text/css" href="public/css/books.css">
    <title>Advanced Search</title>
</head>
<!--- TO DO: CREATE NON COPY HEADER FUNCTION --->

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

        <form class="form-search" role="search">
            <input type="search" id="query" name="q"
             placeholder="Searchpublic."
             aria-label="Search through site content">
            <button class="button-search"><i class="fa fa-search"></i></button>
          </form>

        <section class="Full-size-spliter">
            Advanced search
        </section>

        <section class="Advanced-Search-Box">
            <section class="Advanced-Search-Wrapper-Left">
            <form class="dropdown-list" action="#">
                <label for="Author">Author</label>
                <select autocomplete="off" name="Authors" id="lang">
                <option disabled selected value>Authors </option>
                <option value="Author1">Author1</option>
                <option value="Author2">Author2</option>
                <option value="Author3">Author3</option>
                <option value="Author4">Author4</option>
                <option value="Author5">Author5</option>
                </select>
            </form>
            <form class="dropdown-list" action="#">
                <label for="Status">Status</label>
                <select autocomplete="off" name="Status" id="lang">
                <option disabled selected value>Status </option>
                <option value="On-Going">On-Going</option>
                <option value="Completed">Completed</option>
                <option value="Dropped">Dropped</option>
                <option value="Hiatus">Hiatus</option>
                </select>
            </form>
            <form class="dropdown-list" action="#">
                <label for="Rating">Rating</label>
                <select autocomplete="off" name="Rating" id="lang">
                <option disabled selected value>Rating </option>
                <option value="5">5</option>
                <option value="4,5">4,5</option>
                <option value="4">4</option>
                <option value="3,5">3,5</option>
                <option value="3">3</option>
                <option value="2,5">2,5</option>
                <option value="2">2</option>
                </select>
            </form>
            </section>
            <section class="Advanced-Search-Wrapper-Right">
                <p class="Tags">Tags</p>
                <button class="Button-Tags"><i class="fa fa-plus"></i>Include</button>
                <button class="Button-Tags"><i class="fa fa-minus"></i>Exclude</button>
            </section>
        </section>
        
        <section class="Full-size-spliter">
            Results  
        </section>

        <section class="Results">
            <section class="books">
                <div id="Eragon">
                    <img src="public/img/uploads/Eragon.png">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600 </i>
                        </div>
                    </div>
                </div>
            </section>
        </section>


    </div>
</body>
</html>