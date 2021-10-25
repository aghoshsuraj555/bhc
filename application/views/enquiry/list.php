<?php
$statusarray = array('Y' => 'Active', 'N' => 'Deactive', 'classY' => 'success', 'classN' => 'warning', 'fY' => 'Yes', 'fN' => 'No');
?>
<section>
    <?php echo $this->session->flashdata('message');
    $return = $this->uri->segment('3');
    ?>
    <div class="form-control mx-auto">
        <div class="table-heading d-flex align-items-center justify-content-between p-2">
            <p class="fs-2">Enquiry</p>
            <a class="btn btn-primary float-end" href="<?php echo base_url('enquiry/add') ?>">Add</a>
        </div>
        <?php echo form_open_multipart('enquiry/lists/', array('id' => 'form')); ?>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover table-responsive-sm">
                <thead>
                    <th scope="col">SL.No</th>
                    <th scope="col">Assigned</th>
                    <th scope="col">Name</th>
                    <th scope="col">ContactNo</th>
                    <th scope="col">WhatsAppNo</th>
                    <th scope="col">Enquiry Status</th>
                    <th scope="col">Enquiry Date</th>
                    <th scope="col">Followup Date</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>
                            <select id="assign_to" name="assign_to" class="form-select search-select">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($users as $user) {
                                ?>
                                    <option value="<?php echo $user['id']; ?>" <?php echo (set_value('assign_to')==$user['id'])?'selected="selected"':''?>><?php echo $user['fname'] . ' ' . $user['lname']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name');?>"></td>
                        <td><input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo set_value('contactno');?>"></td>
                        <td><input type="text" class="form-control" name="whatsappno" id="whatsappno" value="<?php echo set_value('contactno');?>"></td>
                        <td>
                            <select id="enquiry_status" name="enquiry_status" class="form-select search-select">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($enquiry_statuses as $enquiry_status) {
                                ?>
                                    <option value="<?php echo $enquiry_status['id']; ?>" <?php echo (set_value('enquiry_status')==$enquiry_status['id'])?'selected="selected"':''?>><?php echo $enquiry_status['name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="text" class="form-control daterange_picker" name="enquirydate" id="enquirydate" value="<?php echo set_value('enquirydate');?>"></td>
                        <td><input type="text" class="form-control daterange_picker" name="followupdate" id="followupdate" value="<?php echo set_value('enquirydate');?>"></td>
                        <td><input type="submit" class="btn btn-success" value="Search"></td>
                    </tr>
                    <?php
                    $i = 1;
                    if ($enquiries) {
                        foreach ($enquiries as $enquiry) {
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $enquiry['fname'].' '.$enquiry['lname']; ?></td>
                                <td><?php echo $enquiry['name']; ?></td>
                                <td><?php echo $enquiry['contactno']; ?></td>
                                <td><?php echo $enquiry['whatsappno']; ?></td>
                                <td><?php echo $enquiry['enquiry_status']; ?></td>
                                <td><?php echo $enquiry['enquiry_date']; ?></td>
                                <td><?php echo $enquiry['followup_date']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-secondary" href="<?php echo base_url('enquiry/edit/' . $enquiry['id'] . '/' . $return) ?>">Edit</a>
                                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <li><a class="dropdown-item" href="<?php echo base_url('enquiry/edit/' . $enquiry['id'] . '/' . $return) ?>">Edit</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9" class="text-center">No Details Available!!</td>
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

</section>