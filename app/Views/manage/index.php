<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">

    <div class="row mb-4">
        <div class="col">
            <h5>Groups</h5>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Description</th>
                            <th>User List</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($groups as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value->name ?></td>
                                <td><?php echo $value->description ?></td>
                                <td><a href="<?php echo base_url('/group/' . $value->id . '/users') ?>" class="btn btn-sm btn-secondary">show</a></td>
                                <td><a href="" class="btn btn-sm btn-warning">add user</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="" class="btn btn-primary mt-3">Add group</a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <h5>Permissions</h5>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Permission Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                            <!-- <th>User List</th>
                         -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($permissions as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['description'] ?></td>
                                <td><a href="" class="btn btn-sm btn-secondary">check</a></td>
                                <!--
                                <td><a href="" class="btn btn-sm btn-warning">add user</a></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="" class="btn btn-primary mt-3">Add permissions</a>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>