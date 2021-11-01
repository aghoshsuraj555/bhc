<?php
$statusarray = array('Y'=>'Active','N'=>'Deactive','classY'=>'success','classN'=>'warning','fY'=>'Yes','fN'=>'No');
?>
<section>
    <?php echo $this->session->flashdata('message');
    $return = $this->uri->segment('3');
    ?>
    <div class="form-control mx-auto">
        <div class="table-heading d-flex align-items-center justify-content-between p-2">
            <p class="fs-2">Services</p>
            <button class="btn btn-primary button-primary float-end" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-whatever="@mdo">Add</button>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover table-responsive-sm">
                <thead>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    if ($services) {
                        foreach ($services as $service) {
                    ?>
                            <tr>
                                <td><?php echo $service['name']; ?></td>
                                <td><span class="btn btn-<?php echo $statusarray['class'.$service['status']];  ?> btn-xs"><?php echo $statusarray[$service['status']]; ?></span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary get-details" data-bs-toggle="modal" url="<?php echo base_url('service/edit/' . $service['id']) ?>" data-bs-target="#editModal" data-bs-whatever="@mdo">Edit</button>
                                        <!-- <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <li><a class="dropdown-item get-details" href="javascript:void(0)" data-bs-toggle="modal" url="<?php echo base_url('service/edit/' . $service['id'] . '/' . $return) ?>" data-bs-target="#editModal" data-bs-whatever="@mdo">Edit</a></li>
                                            <li><a class="dropdown-item deleteModal" href="javascript:void(0)" data-bs-toggle="modal" url="<?php echo base_url('service/delete/' . $service['id'] . '/' . $return) ?>" data-bs-target="#deleteModal" data-bs-whatever="@mdo">Delete</a></li>
                                        </ul> -->
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3" class="text-center">No Details Available!!</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end"><?php echo $this->pagination->create_links(); ?></div>
    </div>

</section>
<section class="section-pop-up mx-auto">
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo form_open('service/add', array('id' => 'form')); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label align-items-center">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="active" value="Y" checked>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="N">
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary button-primary">Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Source</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="get-details">

                </div>
            </div>
        </div>
    </div>
</section>
