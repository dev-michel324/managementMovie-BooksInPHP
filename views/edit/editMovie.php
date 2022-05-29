<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>

    <style>
        .invalid{
            color: red;
        }
    </style>

    <?php if(!isset($_GET['id'])){ header("Location: /"); } ?>

    <?php include __DIR__ . "/../base/frameworklinks.php"; ?>
</head>
<body>
    <header>
        <?php include __DIR__ . "/../base/header.php"; ?>
    </header>

<div class="container">
<?php
    $id = $_GET['id'];
    $uri = "/coreMovieEdit?id=$id";
    echo '<form id="formMovie" action="' . $uri . '" method="POST">';

    $connection = require __DIR__ . "/../../dbconnection.php";
    $result = $connection->query("SELECT * FROM movies WHERE id = $id");
    $result = $result->fetchArray();
            
        echo '<label for="title">Name</label>';
        echo '<input type="text" id="name" name="name" class="form-control form-control-lg" value="' . $result['name'] . '" required>';
        echo '<div class="invalid" id="name-invalid"></div>';
        echo '<label for="title">Year</label>';
        echo '<input type="number" id="year" name="year" class="form-control form-control-lg" value="' . $result['years'] . '" required>';
        echo '<div class="invalid" id="year-invalid"></div>';
        echo '<label for="title">Author</label>';
        echo '<input type="text" id="director" name="director" class="form-control form-control-lg" value="' . $result['director'] . '" required>';
        echo '<div class="invalid" id="director-invalid"></div>';
        echo '<button onclick="verifyForm(); return false" class="btn btn-success">Save</button>';      
        echo '</form>';
    ?>
</div>
    
<script>
        function verifyForm(){
            const name = document.getElementById("name").value;
            const nameInvalid = document.getElementById("name-invalid");
            if(isEmptyOrSpaces(name)){
                nameInvalid.innerHTML="<p>The name is invalid</p>";
                return;
            }else{
                nameInvalid.innerHTML="";
            }

            var year = document.getElementById("year").value;
            const yearInvalid = document.getElementById("year-invalid");
            if(Number.isInteger(parseInt(year)) && year.length>2){
                yearInvalid.innerHTML="";
            }else{
                yearInvalid.innerHTML="<p>The year is invalid</p>";
                return;
            }

            const director = document.getElementById("director").value;
            const directorInvalid = document.getElementById("director-invalid");
            if(isEmptyOrSpaces(director)){
                directorInvalid.innerHTML="<p>The director is invalid</p>";
                return;
            }else{
                directorInvalid.innerHTML="";
            }

            if(!isEmptyOrSpaces(name) && !isEmptyOrSpaces(director) && Number.isInteger(parseInt(year))){
                document.getElementById("formMovie").submit();
            }
        }

        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }


    </script>

</body>
</html>