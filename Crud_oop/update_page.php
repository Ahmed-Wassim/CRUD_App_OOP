<?php include('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $usersObj->displayRecord($id);
}

if (isset($_POST['update_data'])) {
    $user = $usersObj->updateRecord($_POST);
}
?>


<form action="" method="POST">
    <div class="form-group">
        <label for="fname">Name</label>
        <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>">
    </div>
    <div class="form-group">
        <label for="lname">email</label>
        <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?= $user['age']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_data" value="UPDATE">
</form>




<?php include('footer.php'); ?>