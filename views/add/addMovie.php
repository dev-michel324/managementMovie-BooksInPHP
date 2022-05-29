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

    <form id="formMovie" action="/coreMovie" method="POST">
            <label for="title">Name</label>
            <input type="text" id="name" name="name" class="form-control form-control-lg" required>
            <div class="invalid" id="name-invalid"></div>

            <label for="title">Year</label>
            <input type="number" id="year" name="year" class="form-control form-control-lg" required>
            <div class="invalid" id="year-invalid"></div>

            <label for="title">Director</label>
            <input type="text" id="director" name="director" class="form-control form-control-lg" required>
            <div class="invalid" id="director-invalid"></div>

            <button onclick="verifyForm(); return false" class="btn btn-success">Save</button>
    </form>
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