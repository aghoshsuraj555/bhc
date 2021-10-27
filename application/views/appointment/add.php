<?php 
$patient_id = $this->uri->segment(3);
echo form_open('appointment/add/'.$patient_id, array('id' => 'form')); ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <label for="assign_to" class="form-label">Assigned to</label>
            <select id="assign_to" name="assign_to" class="form-select">
                <option value="">Choose...</option>
                <?php
                foreach ($users as $user) {
                ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['fname'] . '-' . $user['lname']; ?></option>
                <?php } ?>
            </select>
            <?php echo form_error('assign_to', '<label class="error">', '</label>'); ?>
        </div>
        <div class="col-md-6">
            <label for="appointmentdate" class="form-label">Appointment Date</label>
            <input type="text" class="form-control disable datepicker required req-field" name="appointmentdate" id="appointmentdate">
            <?php echo form_error('appointmentdate', '<label class="error">', '</label>'); ?>
        </div>
        <div class="col-md-6">
            <label for="enquiry-date" class="form-label">Appointment Time</label>
            <input type="text" class="form-control disable timepicker required req-field" name="appointmenttime" id="appointmenttime">
        </div>
        <div class="col-md-6">
            <label for="service" class="form-label">Service</label>
            <select id="service" name="service" class="form-select">
                <option value="">Choose...</option>
                <?php
                foreach ($services as $service) {
                ?>
                    <option value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?></option>
                <?php } ?>
            </select>
            <?php echo form_error('service', '<label class="error">', '</label>'); ?>
        </div>
        <div class="col-md-6">
            <label for="enquiry-date" class="form-label">Message</label>
            <textarea type="text" class="form-control disable required req-field" name="message" id="message"></textarea>
            <?php echo form_error('message', '<label class="error">', '</label>'); ?>
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
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary addAjaxPopup">Submit</button>
</div>
<?php echo form_close(); ?>
<script>
    $(document).ready(function() {
        $('.timepicker').timepicker({});
        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
</script>
