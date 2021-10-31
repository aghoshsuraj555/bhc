<?php
$statusarray = array('Y' => 'Active', 'N' => 'Deactive', 'classY' => 'success', 'classN' => 'warning', 'fY' => 'Yes', 'fN' => 'No');
?>
<section>
    <?php echo $this->session->flashdata('message');
    $return = $this->uri->segment('3');
    ?>
    <div class="form-control mx-auto">
        <div class="table-heading d-flex align-items-center justify-content-between p-2">
            <p class="fs-2">Users</p>
            <a class="btn btn-primary button-primary float-end" href="<?php echo base_url('user/add') ?>">Add</a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover table-responsive-sm">
                <thead>
                    <th scope="col">SL.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">ContactNo</th>
                    <th scope="col">WhatsAppNo</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if ($users) {
                        foreach ($users as $user) {
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $user['fname'].' '.$user['lname']; ?></td>
                                <td><?php echo $user['contactno']; ?></td>
                                <td><?php echo $user['whatsappno']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-secondary" href="<?php echo base_url('user/edit/' . $user['user_id'].'/'. $return) ?>">Edit</a>
                                        <!-- <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <li><a class="dropdown-item" href="<?php echo base_url('user/edit/' . $user['user_id'].'/'.$return) ?>">Edit</a></li>
                                        </ul> -->
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8" class="text-center">No Details Available!!</td>
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
