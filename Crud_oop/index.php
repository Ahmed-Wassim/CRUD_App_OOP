    <?php include('header.php'); ?>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $usersObj->deleteRecord($id);
    }
    ?>

    <?php
    if (isset($_GET['msg1']) == 'insert') :
    ?>
        <div class="alert alert-success" role="alert">
            Your data has been added successfully
        </div>
    <?php endif; ?>

    <?php
    if (isset($_GET['msg2']) == 'update') :
    ?>
        <div class="alert alert-success" role="alert">
            You have successfully updated the data
        </div>
    <?php endif; ?>

    <?php
    if (isset($_GET['msg3']) == 'delete') :
    ?>
        <div class="alert alert-danger" role="alert">
            You have Deleted The Student!
        </div>
    <?php endif; ?>

    <div class="container mt-5 pl-0 pr-0">
        <h2 class="float-left">ALL STUDENTS</h2>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD STUDENT</button>
    </div>
    <table class="table  table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = $usersObj->selectData();
            foreach ($users as $user) :
            ?>
                <tr>

                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['age'] ?></td>
                    <td><a href="update_page.php?id=<?= $user['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="index.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['send'])) {
            $usersObj->insertData($_POST);
        }
    }
    ?>

    <!-- Modal -->
    <form action="" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="fname">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" name="age" class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="send" value="ADD">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php include('footer.php'); ?>