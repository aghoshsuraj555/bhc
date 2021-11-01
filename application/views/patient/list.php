<?php
$statusarray = array('Y' => 'Active', 'N' => 'Deactive', 'classY' => 'success', 'classN' => 'warning', 'fY' => 'Yes', 'fN' => 'No');
?>
<div class="mx-auto">
    <?php echo $this->session->flashdata('message');
    $return = $this->uri->segment('3');
    ?>
    <div class="table-heading d-flex align-items-center justify-content-between p-2">
        <p class="fs-2">Patients</p>
        <a class="btn btn-primary button-primary float-end" href="<?php echo base_url('patient/add') ?>">Add</a>
    </div>
    <?php echo form_open_multipart('patient/lists/'); ?>
    <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover table-responsive-sm">
            <thead>
                <th scope="col">SL.No</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Name</th>
                <th scope="col">ContactNo</th>
                <th scope="col">WhatsAppNo</th>
                <th scope="col">Enquiry Date</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td><input type="text" class="form-control" name="patient_id" id="patient_id" value="<?php echo set_value('patient_id');?>"></td>
                    <td><input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name');?>"></td>
                    <td><input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo set_value('contactno');?>"></td>
                    <td><input type="text" class="form-control" name="whatsappno" id="whatsappno" value="<?php echo set_value('whatsappno');?>"></td>
                    <td><input type="text" class="form-control daterange_picker" name="daterange" id="daterange" value="<?php echo set_value('daterange');?>"></td>
                    <td><div class="d-flex"><input type="submit" class="btn btn-success button-search me-1" value="Search"><a href="<?php echo base_url('patient/lists');?>" class="btn btn-dark">Reset</a></div></td>
                </tr>
                <?php
                $i = 1;
                if ($patients) {
                    foreach ($patients as $patient) {
                ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $patient['patient_id']; ?></td>
                            <td><?php echo $patient['name']; ?></td>
                            <td><?php echo $patient['contactno']; ?></td>
                            <td><?php echo $patient['whatsappno']; ?></td>
                            <td><?php echo ($patient['enquiry_date'] && $patient['enquiry_date'] != '0000-00-00') ? date('d-m-Y', strtotime($patient['enquiry_date'])) : ''; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-secondary" href="<?php echo base_url('patient/edit/' . $patient['id'] . '/' . $return) ?>">Edit</a>
                                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <li><a class="dropdown-item" href="<?php echo base_url('patient/edit/' . $patient['id'] . '/' . $return) ?>">Edit</a></li>
                                    </ul>
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
    <?php echo form_close(); ?>
    <div class="d-flex justify-content-end"><?php echo $this->pagination->create_links(); ?></div>
</div>
