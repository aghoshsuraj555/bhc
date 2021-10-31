<?php
$priorities = array('High', 'Medium', 'Low');
$nris = array('Yes', 'No');
$methods = array('Y', 'N');
?>
<div class="container-fluid d-md-flex mb-4">
    <?php echo form_open_multipart('patient/edit/'.$patient->id, array('id' => 'form')); ?>
    <div class="row col-12">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <h5 class="card-header fw-bold">Contact Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="patientId" class="form-label">Patient ID<span class="text-danger">*</span></label>
                            <input type="text" class="form-control required req-field" name="patientid" id="patientid" value="<?php echo $patient->patient_id; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Patient Name</label>
                            <input type="text" class="form-control required req-field" name="name" id="name" placeholder="Name" value="<?php echo $patient->name; ?>">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $patient->email_id; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="contactno" class="form-label">Contact Number</label>
                            <input type="text" class="form-control required req-field" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $patient->contactno; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="whatsappno" class="form-label">WhatsApp Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control required req-field" id="whatsappno" name="whatsappno" placeholder="WhatsApp Number" value="<?php echo $patient->whatsappno; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="text" class="form-control disable datepicker" id="dob" name="dob" value="<?php echo ($patient->dob) ? date('d-m-Y', strtotime($patient->dob)) : ''; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label align-items-center">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="Male" <?php if ($patient->gender == 'Male') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="Female" <?php if ($patient->gender == 'Female') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="patient-address" class="form-label">Address</label>
                            <textarea name="address" name="address" id="address" class="form-control"><?php echo $patient->address; ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control required req-field" name="city" id="city" placeholder="City" value="<?php echo $patient->city; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="state" class="form-label">State/Province</label>
                            <input type="text" class="form-control required req-field" id="state" name="state" placeholder="State" value="<?php echo $patient->state; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php echo $patient->pincode; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="nri" class="form-label">NRI</label>
                            <select id="nri" name="nri" class="form-select required req-field">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($nris as $nri) {
                                ?>
                                    <option value="<?php echo $nri; ?>" <?php echo ($nri == $patient->nri) ? 'selected' : ''; ?>><?php echo $nri; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select id="nationality" name="nationality" class="form-select search-select">
                                <option value="">Choose...</option>
                                <?php foreach ($nationality as $nationalityval) {
                                ?>
                                    <option value="<?php echo $nationalityval['id']; ?>" <?php echo ($nationalityval['id'] == $patient->nationality_id) ? 'selected' : ''; ?>><?php echo $nationalityval['name']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="profession" class="form-label">Profession</label>
                            <input type="text" class="form-control" id="profession" placeholder="Profession" value="<?php echo $patient->profession; ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Patient Image</label>
                            <input type="file" class="form-control" id="image" id="image">
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
                            <label for="enquiry-date" class="form-label">Enquiry Date</label>
                            <input type="text" class="form-control disable datepicker required req-field" name="enquirydate" id="enquirydate" value="<?php echo ($patient->enquiry_date) ? date('d-m-Y', strtotime($patient->enquiry_date)) : ''; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="source" class="form-label">Source</label>
                            <select id="source" name="source" class="form-select required req-field">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($sources as $source) {
                                ?>
                                    <option value="<?php echo $source['id']; ?>" <?php echo ($source['id'] == $patient->source_id) ? 'selected' : ''; ?>><?php echo $source['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="graft-plan" class="form-label">Graft Plan</label>
                            <input type="text" class="form-control" id="graftplan" name="graftplan" placeholder="Graft Plan" value="<?php echo $patient->graft_plan; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="method" class="form-label">Method</label>
                            <select id="method" name="method" class="form-select">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($methods as $method) {
                                ?>
                                    <option value="<?php echo $method; ?>" <?php echo ($method == $patient->method) ? 'selected' : ''; ?>><?php echo $method; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="area" class="form-label">Area</label>
                            <input type="text" class="form-control" id="area" name="area" placeholder="Graft Plan" value="<?php echo $patient->graft_plan; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="extractednumber" class="form-label">No. of Grafts Extracted</label>
                            <input type="text" class="form-control" id="extractednumber" name="extractednumber" placeholder="No of Grafts Extracted" value="<?php echo $patient->graft_plan; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label align-items-center">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="Y" value="Y" name="status" <?php if ($patient->status == 'Y') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                <label class="form-check-label" for="Y">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="N" value="N" name="status" <?php if ($patient->status == 'N') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                <label class="form-check-label" for="N">Inactive</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" id="remarks" name="remarks"><?php echo $patient->remarks; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-end pe-5 my-4">
            <input class="btn button-primary" type="submit" value="Submit">
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<div id="getAllDetails">

</div>
