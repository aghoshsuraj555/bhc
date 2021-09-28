<div class="container-fluid d-md-flex mb-4">
    <?php echo form_open('enquiry/edit/'.$enquiry->id, array('id' => 'form')); ?>
    <div class="row col-12">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <h5 class="card-header fw-bold">Contact Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="patient-name" class="form-label">Name</label>
                            <input type="text" class="form-control required" id="name" name="name" value="<?php echo $enquiry->name;?>" placeholder="Name">
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $enquiry->email_id;?>" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <label for="contact-number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control required" id="contactno" name="contactno" value="<?php echo $enquiry->contactno;?>" placeholder="Contact Number">
                        </div>
                        <div class="col-md-6">
                            <label for="whatsapp-number" class="form-label">WhatsApp Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control required" id="whatsappno" name="whatsappno" value="<?php echo $enquiry->whatsappno;?>" placeholder="WhatsApp Number" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select id="nationality" name="nationality" class="form-select search-select">
                                <option value="">Choose...</option>
                                <?php foreach ($nationality as $nationalityval) {
                                ?>
                                    <option value="<?php echo $nationalityval['id']; ?>"<?php echo ($nationalityval['id']==$enquiry->nationality_id)?'selected':'';?>><?php echo $nationalityval['name']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <h5 class="card-header fw-bold">Enquiry Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="enquirydate" class="form-label">Enquiry Date</label>
                            <input type="text" class="form-control disable datepicker required" name="enquirydate"  id="enquirydate" value="<?php echo ($enquiry->enquiry_date)?date('d-m-Y',strtotime($enquiry->enquiry_date)):'';?>">
                        </div>
                        <div class="col-md-6">
                            <label for="source" class="form-label">Source</label>
                            <select id="source" name="source" class="form-select">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($sources as $source) {
                                ?>
                                    <option value="<?php echo $source['id']; ?>"<?php echo ($source['id']==$enquiry->source_id)?'selected':'';?>><?php echo $source['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="enquiry_status" class="form-label">Enquiry Status</label>
                            <select id="enquiry_status" name="enquiry_status" class="form-select required">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($enquiry_statuses as $enquiry_status) {
                                ?>
                                    <option value="<?php echo $enquiry_status['id']; ?>"<?php echo ($enquiry_status['id']==$enquiry->enquiry_status_id)?'selected':'';?>><?php echo $enquiry_status['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="assign_to" class="form-label">Assigned to</label>
                            <select id="assign_to" name="assign_to" class="form-select">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($users as $user) {
                                ?>
                                    <option value="<?php echo $user['id']; ?>"<?php echo ($user['id']==$enquiry->user_id)?'selected':'';?>><?php echo $user['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" id="remarks"><?php echo $enquiry->remarks;?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-end pe-5 my-4">
            <input class="btn button" type="submit" value="Submit">
        </div>
    </div>
    <?php echo form_close(); ?>
</div>