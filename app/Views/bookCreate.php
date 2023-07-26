<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div id="body" class="container pt-3">
    <div class="row">
        <h1>Create</h1>
        <h4>Book</h4>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST" action="/book/create">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="title" class="control-label">Title:</label>
                        <input name='title' id='title' type='text' class='form-control' required/>
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label">Price:</label>
                        <input name='price' id='price' type='number' class='form-control' required/>
                    </div>
                    <div class="form-group">
                        <label for="authorId" class="control-label">Author:</label>
                        <select id="authorId" name="authorId" class="form-select" required>
                            <option value="" disabled selected>-- Choose an author --</option>
                            <?php
                            if (!empty($authors)) {
                                foreach ($authors as $author) {
                                    echo "<option value='$author->id'>$author</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="yearOfPublish" class="control-label">Year of publish:</label>
                        <input name='yearOfPublish' id='yearOfPublish' type='number' class='form-control' required/>
                    </div>
                    <div class="form-group pt-2">
                        <div>
                            <input type="submit" name="submit" value="Create" class="btn btn-primary w-100"/>
                        </div>
                        <div class="pt-1">
                            <?= anchor('Book/', 'Back', ['class' => 'btn btn-secondary w-100']) ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>