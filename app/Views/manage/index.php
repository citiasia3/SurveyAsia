<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">

    <div class="row mb-4">
        <div class="col">
            <h5>Groups</h5>
            <div class="table">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Description</th>
                            <!-- <th>User List</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($groups as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value->name ?></td>
                                <td><?php echo $value->description ?></td>
                                <!-- <td><a href="<?php echo base_url('/group/' . $value->id . '/users') ?>" class="btn btn-sm btn-secondary">show</a></td> -->
                                <td>
                                    <!-- Example split danger button -->
                                    <div class="btn-group">
                                        <a href="<?php echo base_url('/group/' . $value->id . '/users') ?>" class="btn btn-secondary btn-sm ">Show</a>
                                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split btn-sm " data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editGroup" data-bs-whatever="<?= $value->id ?>" data-name="<?= $value->name ?>" data-description="<?= $value->description ?>">Edit</a></li>
                                            <li> <a href="/manage/delete/<?= $value->id ?>" class="dropdown-item">Delete</a></li>

                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGroup">
                Add Group
            </button>
            <!-- Modal Add Group -->
            <div class="modal fade" id="addGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/manage/save" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Group Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="group_name">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="description">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Edit Group -->
            <div class="modal fade" id="editGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Group</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/manage/update" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Group Name</label>
                                    <input type="hidden" class="form-control" name="id" id="idGroupName">

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="group_name" id="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
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
<script src="/assets/js/manage.js"></script>
<?= $this->endSection(); ?>