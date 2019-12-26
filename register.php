<?php require_once 'views/inc/header.php';?>


<?php

  

    if(isset($_POST['submit'])){
        $validator =  new Validator($_POST);

        $errors = $validator->vaidate();

        if(empty($errors)){
           $validator->register();
            
        }

    }

?>

<div class="container">

    <div class="ml-6">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

            <div class="form-group col-sm-6 ">
                <label for="first">Name:</label>
                <input class="form-control" type="text" name="name">
                <?php echo $errors['name'] ?? '' ?>
            </div>

            <div class="form-group col-sm-6 ">
                <label for="last">Username:</label>
                <input class="form-control" type="text" name="username">
                <?php echo $errors['username'] ?? ''?>
            </div>

            <div class="form-group col-sm-6">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email">
                <?php echo $errors['email'] ?? ''?>
            </div>

            <div class="form-group col-sm-6 ">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password">
                <?php echo $errors['password'] ?? ''?>
            </div>

            <div class="form-group col-sm-6">
                <input class="btn btn-outline-primary btn-lg" type="submit" name="submit" value="Create">
            </div>







        </form>
    </div>
</div>



<?php require_once 'views/inc/footer.php';?>