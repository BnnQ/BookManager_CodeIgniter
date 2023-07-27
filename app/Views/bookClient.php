<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="container">
        <h2>Books</h2>
        <!-- List of books -->
        <div class="row mt-3">
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($book->title) ?></h5>
                                <p class="card-text"><?= "Price: " . esc($book->price) ?>$</p>
                                <p class="card-text"><?= "Author: " . esc($book->authorName) ?></p>
                                <p class="card-text"><?= "Year of publish: " . esc($book->yearOfPublish) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
        </div>
    </div>

<?= $this->endSection() ?>