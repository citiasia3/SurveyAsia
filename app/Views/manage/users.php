<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">

    <div class="row mb-4">
        <div class="col">
            <h5><?php echo $title ?></h5>
            <p>Group Name : <?php echo $group->name; ?><br>Description : <?php echo $group->description; ?></p>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $value) : ?>
                            <?php if ($value['user_id'] == null) : ?>
                                <tr>
                                    <td class="text-center" colspan="4">no data</td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <td><?php echo $value['username'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td><?php if ($value['active'] == 1) : echo 'Yes';
                                        else : echo 'No';
                                        endif; ?></td>
                                    <td><a href="" class="btn btn-sm btn-danger">remove user</a></td>
                                </tr>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="" class="btn btn-primary mt-3">Add user</a>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>