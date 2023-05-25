<!-- data.view.php -->
<div class="container text-center mt-3">
    <div class="row">
        <div class="col-auto">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-outline-dark">
                    <?php echo $session['username']; ?>
                </button>
                <a class='btn btn-primary' href="insert.php">Add</a>
                <a class='btn btn-danger' href="logout.php">Logout</a>
            </div>
        </div>
        <div class="col">
            <table class="table table-hover">

                <thead class="table bg-body-secondary">
                    <tr style='font-weight:1000;'>
                        <th>
                            <a class='text-decoration-none' href="index.php?sort=id">ID</a>
                        </th>
                        <th>
                            <a class='text-decoration-none' href="index.php?sort=name">Name</a>
                        </th>
                        <th>
                            <a class='text-decoration-none' href="index.php?sort=email">Email</a>
                        </th>
                        <th>
                            <a class='text-decoration-none' href="index.php?sort=phone">Phone</a>
                        </th>
                        <th>
                            <a class='text-decoration-none' href="">Delete</a>
                        </th>
                        <th>
                            <a class='text-decoration-none' href="">Update</a>
                        </th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php if (count($persons) > 0) : ?>
                        <?php foreach ($persons as $person) : ?>
                            <tr>
                                <td><?= $person['id'] ?></td>
                                <td><?= $person['name'] ?> <?= $person['surname'] ?></td>
                                <td><?= $person['email'] ?></td>
                                <td><?= $person['phone'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#P<?= $person['id'] ?>">
                                        Delete
                                    </button>
                                    <div class="modal fade" id="P<?= $person['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Delete <?= $person['name'] ?> <?= $person['surname'] ?>?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" align="left">
                                                    <form action="delete_process.php?id=<?= $person['id'] ?>" method="post">
                                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href='update.php?id=<?= $person['id'] ?>'>
                                    Update
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">No data</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function ConfirmDelete() {
        return confirm("Are you sure?")
    }
</script>