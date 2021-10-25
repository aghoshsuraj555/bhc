<?php
$statusarray = array('Y' => 'Active', 'N' => 'Deactive', 'classY' => 'success', 'classN' => 'warning', 'fY' => 'Yes', 'fN' => 'No');
?>
<section>
    <?php echo $this->session->flashdata('message');
    $patient_id = $this->uri->segment('3');
    ?>
    <div class="form-control mx-auto">
        <div class="table-heading d-flex align-items-center justify-content-between p-2">
            <p class="fs-2">Appointments</p>
            <button class="btn button-color btn-primary float-end ajaxPopup" url="<?php echo base_url('appointment/add/'.$patient_id);?>" data-bs-toggle="modal" data-bs-target="#addModal" data-bs-whatever="@mdo">Add</button>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover table-responsive-sm">
                <thead>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Service</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    if ($appointments) {
                        foreach ($appointments as $appointment) {
                    ?>
                            <tr>
                                <td><?php echo $appointment['fname'].' '.$appointment['lname']; ?></td>
                                <td><?php echo $appointment['name']; ?></td>
                                <td><?php echo date('d-m-Y',strtotime($appointment['appointment_date'])); ?></td>
                                <td><?php echo date('h:i a',strtotime($appointment['appointment_time'])); ?></td>
                                <td><?php echo $appointment['message']; ?></td>
                                <td><span class="btn branch-btn btn-<?php echo $statusarray['class'.$appointment['status']];  ?> btn-xs"><?php echo $statusarray[$appointment['status']]; ?></span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn branch-btn btn-secondary get-details" data-bs-toggle="modal" url="<?php echo base_url('appointment/edit/' . $appointment['appointment_id']) ?>" data-bs-target="#editModal" data-bs-whatever="@mdo">Edit</button>
                                        <button type="button" class="btn branch-btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <li><a class="dropdown-item get-details" href="javascript:void(0)" data-bs-toggle="modal" url="<?php echo base_url('appointment/edit/' . $appointment['appointment_id']) ?>" data-bs-target="#editModal" data-bs-whatever="@mdo">Edit</a></li>
                                            <li><a class="dropdown-item deleteModal" href="javascript:void(0)" data-bs-toggle="modal" url="<?php echo base_url('appointment/delete/' . $appointment['appointment_id']) ?>" data-bs-target="#deleteModal" data-bs-whatever="@mdo">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">No Details Available!!</td>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="ajaxPopform">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="get-details">

                </div>
            </div>
        </div>
    </div>
</section>
