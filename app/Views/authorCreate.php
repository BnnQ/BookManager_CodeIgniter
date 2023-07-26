<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div id="body" class="container pt-3">
    <div class="row">
        <h1>Create</h1>
        <h4>Author</h4>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST" action="/author/create">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="firstname" class="control-label">First name:</label>
                        <input name='firstname' id='firstname' type='text' class='form-control' required/>
                    </div>
                    <div class="form-group">
                        <label for="surname" class="control-label">Surname:</label>
                        <input name='surname' id='surname' type='text' class='form-control' required/>
                    </div>
                    <div class="form-group">
                        <label for="yearOfBirth" class="control-label">Year of birth:</label>
                        <input name='yearOfBirth' id='yearOfBirth' type='number' class='form-control' required/>
                    </div>
                    <div class="form-group pt-2">
                        <div>
                            <input type="submit" name="submit" value="Create" class="btn btn-primary w-100"/>
                        </div>
                        <div class="pt-1">
                            <?= anchor('Author/', 'Back', ['class' => 'btn btn-secondary w-100']) ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>