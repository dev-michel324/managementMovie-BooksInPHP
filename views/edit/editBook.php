<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>

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
        $uri = "/coreBookEdit?id=$id";
        echo "<form id='formBook' action='$uri' method='POST'>";

        $connection = require __DIR__ . "/../../dbconnection.php";
        $result = $connection->query("SELECT * FROM books WHERE book_id = $id");
        $result = $result->fetchArray();
                
        echo '<label for="title">Title</label>';
        echo '<input type="text" id="title" name="title" class="form-control form-control-lg" value="' . $result['title'] . '" required>';
        echo '<div class="invalid" id="title-invalid"></div>';
        echo '<label for="title">Year</label>';
        echo '<input type="number" id="year" name="year" class="form-control form-control-lg" value="' . $result['years'] . '" required>';
        echo '<div class="invalid" id="year-invalid"></div>';
        echo '<label for="title">Author</label>';
        echo '<input type="text" id="author" name="author" class="form-control form-control-lg" value="' . $result['author'] . '" required>';
        echo '<div class="invalid" id="author-invalid"></div>';
        echo '<button onclick="verifyForm(); return false" class="btn btn-success">Save</button>';
        echo '</form>';
    ?>
                
</div>
    
<script>
        function verifyForm(){
            const title = document.getElementById("title").value;
            const titleInvalid = document.getElementById("title-invalid");
            if(isEmptyOrSpaces(title)){
                titleInvalid.innerHTML="<p>The title is invalid</p>";
                return;
            }else{
                titleInvalid.innerHTML="";
            }

            var year = document.getElementById("year").value;
            const yearInvalid = document.getElementById("year-invalid");
            if(Number.isInteger(parseInt(year)) && year.length>2){
                yearInvalid.innerHTML="";
            }else{
                yearInvalid.innerHTML="<p>The year is invalid</p>";
                return;
            }

            const author = document.getElementById("author").value;
            const authorInvalid = document.getElementById("author-invalid");
            if(isEmptyOrSpaces(author)){
                authorInvalid.innerHTML="<p>The author is invalid</p>";
                return;
            }else{
                authorInvalid.innerHTML="";
            }

            if(!isEmptyOrSpaces(title) && !isEmptyOrSpaces(author) && Number.isInteger(parseInt(year))){
                document.getElementById("formBook").submit();
            }
        }

        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }


    </script>

</body>
</html>