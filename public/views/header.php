<!DOCTYPE html>
<html lang="en">
<header class="main-header">

        <div class="wrapper">

            <div class="nav-logo">

                <img src="/public/img/logo.svg">

            </div>

            <div class="navigation-bar">
                <div class="search">

                    <i class="fas fa-search" class></i>
                    <a href="http://localhost:8080/search" class="header-button">
                    <p class="navigation-text">search</p>
                    </a>

                </div>


                <div class="browse">
                    <i class="fas fa-th-large"></i>
                    <a href="http://localhost:8080/dashboard" class="header-button">
                    <p class="navigation-text">browse</p>
                    </a>
                </div>

                <div class="list">
                    <i class="fas fa-book"></i>
                    <a href="http://localhost:8080/list" class="header-button">
                    <p class="navigation-text">list</p>
                    </a>
                </div>

                <div class="settings">
                    <i class="fas fa-cog"></i>

                    <a href="http://localhost:8080/settings/<?= $_COOKIE['currentUser'] ?>" class="header-button">
                    <p class="navigation-text">settings</p>
                    </a>
                </div>

            </div>

        </div>
</header>
</html>