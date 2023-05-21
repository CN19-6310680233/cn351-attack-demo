<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <title>Update</title>
</head>

<body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">        
        <form action="update_process.php" method="POST">
            <label class='form-label' for="name">Name: </label>
            <input class="form-control " type="text" name="name" id="name" value="<?= $person['name'] ?>"><br>
            <label class='form-label' for="surname">Surname: </label>
            <input class="form-control " type="text" name="surname" id="surname" value="<?= $person['surname'] ?>"><br>
            <label class='form-label' for="email">Email: </label>
            <input class="form-control " type="text" name="email" id="email" value="<?= $person['email'] ?>"><br>
            <label class='form-label' for="phone">Phone: </label>
            <input class="form-control " type="text" name="phone" id="phone" value="<?= $person['phone'] ?>"><br>
            <input type="hidden" name="id" value="<?= $person['id'] ?>">
            <input class="btn btn-primary" type="submit">
            <input class="btn btn-warning" type="reset">
            <a class="btn btn-danger" role='button' href="index.php">View Tables</a>
        </form>
    </div>
</body>

</html>