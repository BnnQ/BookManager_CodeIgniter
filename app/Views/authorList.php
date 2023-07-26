<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div id="body" class="container pt-3">
    <div class="row">
        <?php
        helper('html');
        echo anchor('Author/Create', 'Create new', ['class' => 'btn btn-success flex-grow-1'])
        ?>
    </div>
    <div class="row">
        <table class="table flex-grow-1 flex-shrink-0">
            <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    First Name
                </th>
                <th>
                    Surname
                </th>
                <th>
                    Year of Birth
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($authors)) {
                foreach ($authors as $author) {
                    echo "<tr><td>$author->id</td><td>$author->firstname</td><td>$author->surname</td><td>$author->yearOfBirth</td>";
                    $anchorEdit = anchor('Author/Edit/'.$author->id, "<i class='fa-solid fa-pen-to-square'></i>", ['class' => 'btn btn-outline-warning btn-sm rounded-0', 'data-toggle' => 'tooltip', 'title' => 'Edit']);
                    $anchorDelete = anchor('Author/Delete/'.$author->id, "<i class='fa-solid fa-trash-can'></i>", ['class' => 'btn btn-outline-danger btn-sm rounded-0', 'data-toggle' => 'tooltip', 'title' => 'Delete']);
                    echo "<td><ul class='list-inline m-0'><li class='list-inline-item'>$anchorEdit</li><li class='list-inline-item'>$anchorDelete</li></ul></td>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>