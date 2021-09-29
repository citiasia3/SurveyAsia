<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <form class="row g-3" action="<?php route_to('survey/join') ?>" method="POST">
        <div class="col-md-6">
            <label for="inputFirstName" class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" id="inputFirstName">
        </div>
        <div class="col-md-6">
            <label for="inputLastName" class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" id="inputLastName">
        </div>
        <div class="col-12">
            <label for="inputAlamat" class="form-label">Address</label>
            <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="1234 Main St">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Join Now</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>