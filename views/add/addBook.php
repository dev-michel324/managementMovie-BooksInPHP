<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>
    <style>
        .invalid{
            color: red;
        }
    </style>

    <?php include __DIR__ . "/../base/frameworklinks.php" ?>

</head>
<body>
    <header>
        <?php include __DIR__ . "/../base/header.php" ?>
    </header>

    <div class="container">

    <form id="formBook" action="/coreBook" method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control form-control-lg" required>
            <div class="invalid" id="title-invalid"></div>

            <label for="title">Year</label>
            <input type="number" id="year" name="year" class="form-control form-control-lg" required>
            <div class="invalid" id="year-invalid"></div>

            <label for="title">Author</label>
            <input type="text" id="author" name="author" class="form-control form-control-lg" required>
            <div class="invalid" id="author-invalid"></div>

            <button onclick="verifyForm(); return false" class="btn btn-success">Save</button>
    </form>
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
                console.log("sending");
                document.getElementById("formBook").submit();
            }
        }

        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }


    </script>
</body>
</html>