<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">

    <?php include __DIR__ . "/base/frameworklinks.php" ?>

    <script>
        

        function deleteBook(id){
            document.getElementById("modal-title").innerText = "Delete book";
            document.getElementById("modal-body").innerText = "Do you want delete this book?";
            document.getElementById("btn-modal").innerHTML = "<button type='button' class='btn btn-primary' onclick='btnClickedBook("+id+")'>Delete</button>";        
            $(".modal").modal('show');
        }

        function deleteMovie(id){
            document.getElementById("modal-title").innerText = "Delete movie";
            document.getElementById("modal-body").innerText = "Do you want delete this movie?";
            document.getElementById("btn-modal").innerHTML = "<button type='button' class='btn btn-primary' onclick='btnClickedMovie("+id+")'>Delete</button>"; 
            $(".modal").modal('show');
        }

        function btnClickedBook(id){
            window.location.href = "/deleteBook?id="+id+"";
        }

        function btnClickedMovie(id){
            window.location.href = "/deleteMovie?id="+id+"";
        }

        function editBook(id){
            window.location.href = "/editBook?id="+id;
        }

        function editMovie(id){
            window.location.href = "/editMovie?id="+id;
        }
    </script>

</head>
<body>

    <header>
        <?php include __DIR__ . "/base/header.php" ?>
    </header>

    <main>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>

        <div class="container">
            <?php
                
                if(isset($_SESSION['message'])){
                    $message = "";
                    $session = $_SESSION['message'];

                    if($session == "book-success-added"){
                        $message = "Book added.";
                    }else if($session == "book-success-deleted"){
                        $message = "Book deleted.";
                    }else if($session == "book-success-edited"){
                        $message = "Book edited.";
                    }else if($session == "movie-success-added"){
                        $message = "Movie added.";
                    }else if($session == "movie-success-deleted"){
                        $message = "Movie deleted.";
                    }else if($session == "movie-success-edited"){
                        $message = "Movie edited.";
                    }

                    echo "
                            <div class='alert alert-success d-flex align-items-center alert-dismissible fade show' role='alert'>
                                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:''><use xlink:href='#check-circle-fill'/></svg>
                            <div>
                            $message
                            </div>
                        </div>";
                    unset($_SESSION['message']);
            }

            ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Books</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Movies</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  <a href="addBook"><button class="btn btn-primary">Add book</button></a>

        <table class="table table-striped">

            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Year</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>

            <?php
                $connection = require(__DIR__ . "/../dbconnection.php");
                $data = $connection->query("SELECT * FROM books");

                $last_line = 1;

                while($line = $data->fetchArray()){
                    echo "<tr>";
                    echo "<td>". $last_line . "</td>";
                    echo "<td>" . $line['title'] . "</td>";
                    echo "<td>" . $line['years'] . "</td>";
                    echo "<td>" . $line['author'] . "</td>";
                    $id = $line['book_id'];
                    echo "<td><button class='btn btn-success' onclick='editBook($id)'>edit</button><button class='btn btn-danger' onclick='deleteBook($id)'>delete</button></td>";
                    echo "<tr>";
                    $last_line += 1;
                }

                $connection->close();

            ?>
        </table>


  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

  <a href="addMovie"><button class="btn btn-primary">Add movie</button></a>
        <table class="table table-striped">

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Year</th>
                <th>Director</th>
                <th>Actions</th>
            </tr>

            <?php
                $connection = require(__DIR__ . "/../dbconnection.php");
                $data = $connection->query("SELECT * FROM movies");

                $last_line = 1;

                while($line = $data->fetchArray()){
                    echo "<tr>";
                    echo "<td>". $last_line . "</td>";
                    echo "<td>" . $line['name'] . "</td>";
                    echo "<td>" . $line['years'] . "</td>";
                    echo "<td>" . $line['director'] . "</td>";
                    $id = $line['id'];
                    echo "<td><button class='btn btn-success' onclick='editMovie($id)'>edit</button><button class='btn btn-danger' onclick='deleteMovie($id)'>delete</button></td>";
                    echo "<tr>";
                    $last_line += 1;
                }

                $connection->close();

            ?>
        </table>

  </div>
</div>

        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-title"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p id="modal-body"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                  <span id="btn-modal"></span>
                </div>
              </div>
            </div>
          </div>

        </div>
    </main>
    
</body>
</html>