<!-- data.view.php -->
<div class="container text-center mt-3">
    <div class="row">
        <div class="col-auto">
            <div class="d-grid gap-2">
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
                            <a class='text-decoration-none' href="">Del</a>
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
                                <a href='delete_process.php?id=<?= $person['id'] ?>' onclick="ConfirmDelete()">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            <td>
                                <a href='update.php?id=<?= $person['id'] ?>'>
                                    <i class="bi bi-pencil-square"></i>
                                </a>
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