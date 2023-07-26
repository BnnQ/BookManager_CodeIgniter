<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div id="body" class="container pt-3">
    <div class="row">
        <?php
        helper('html');
        echo anchor('Book/Create', 'Create new', ['class' => 'btn btn-success flex-grow-1'])
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
                    Title
                </th>
                <th>
                    Price
                </th>
                <th>
                    AuthorId
                </th>
                <th>
                    Year of Publish
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($books)) {
                foreach ($books as $book) {
                    echo "<tr><td>$book->id</td><td>$book->title</td><td>$book->price</td><td>$book->authorId</td><td>$book->yearOfPublish</td>";
                    $anchorEdit = anchor('Book/Edit/'.$book->id, "<i class='fa-solid fa-pen-to-square'></i>", ['class' => 'btn btn-outline-warning btn-sm rounded-0', 'data-toggle' => 'tooltip', 'title' => 'Edit']);
                    $anchorDelete = anchor('Book/Delete/'.$book->id, "<i class='fa-solid fa-trash-can'></i>", ['class' => 'btn btn-outline-danger btn-sm rounded-0', 'data-toggle' => 'tooltip', 'title' => 'Delete']);
                    echo "<td><ul class='list-inline m-0'><li class='list-inline-item'>$anchorEdit</li><li class='list-inline-item'>$anchorDelete</li></ul></td>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>