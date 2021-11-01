<?php
$priorities = array('High', 'Medium', 'Low');
$nris = array('Yes', 'No');
$methods = array('Y', 'N');
?>
<div class="container-fluid d-md-flex mb-4">
    <?php echo form_open_multipart('patient/add/', array('id' => 'form')); ?>
    <div class="row col-12">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <h5 class="card-header fw-bold">Contact Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="patientid" class="form-label">Patient ID</label>
                            <input type="text" class="form-control required" name="patientid" id="patientid" value="<?php echo $refno;?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Patient Name</label>
                            <input type="text" class="form-control required" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <label for="contactno" class="form-label">Contact Number</label>
                            <input type="text" class="form-control required" id="contactno" name="contactno" placeholder="Contact Number">
                        </div>
                        <div class="col-md-6">
                            <label for="whatsappno" class="form-label">WhatsApp Number</label>
                            <input type="text" class="form-control required" id="whatsappno" name="whatsappno" placeholder="WhatsApp Number">
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="text" class="form-control disable datepicker" id="dob" name="dob">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label align-items-center">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="male" checked>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="patient-address" class="form-label">Address</label>
                            <textarea name="address" name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control required" name="city" id="city" placeholder="City">
                        </div>
                        <div class="col-md-6">
                            <label for="state" class="form-label">State/Province</label>
                            <input type="text" class="form-control required" id="state" name="state" placeholder="State">
                        </div>
                        <div class="col-md-6">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
                        </div>
                        <div class="col-md-6">
                            <label for="nri" class="form-label">NRI</label>
                            <select id="nri" name="nri" class="form-select required">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($nris as $nri) {
                                ?>
                                    <option value="<?php echo $nri; ?>"><?php echo $nri; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select id="nationality" name="nationality" class="form-select search-select">
                                <option value="">Choose...</option>
                                <?php foreach ($nationality as $nationalityval) {
                                ?>
                                    <option value="<?php echo $nationalityval['id']; ?>"><?php echo $nationalityval['name']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="profession" class="form-label">Profession</label>
                            <input type="text" class="form-control" id="profession" placeholder="Profession">
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
                            <input type="text" class="form-control disable datepicker required" name="enquirydate" id="enquirydate">
                        </div>
                        <div class="col-md-6">
                            <label for="source" class="form-label">Source</label>
                            <select id="source" name="source" class="form-select required">
                                <option value="">Choose...</option>
                                <?php foreach ($sources as $source) {
                                ?>
                                    <option value="<?php echo $source['id']; ?>"><?php echo $source['name']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="graft-plan" class="form-label">Graft Plan</label>
                            <input type="text" class="form-control" id="graftplan" name="graftplan" placeholder="Graft Plan">
                        </div>
                        <div class="col-md-6">
                            <label for="method" class="form-label">Method</label>
                            <select id="method" name="method" class="form-select">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($methods as $method) {
                                ?>
                                    <option value="<?php echo $method; ?>"><?php echo $method; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="area" class="form-label">Area</label>
                            <input type="text" class="form-control" id="area" name="area" placeholder="Graft Plan">
                        </div>
                        <div class="col-md-6">
                            <label for="extractednumber" class="form-label">No. of Grafts Extracted</label>
                            <input type="text" class="form-control" id="extractednumber" name="extractednumber" placeholder="No of Grafts Extracted">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label align-items-center">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="Y" value="Y" name="status" checked>
                                <label class="form-check-label" for="Y">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="N" value="N" name="status">
                                <label class="form-check-label" for="N">Inactive</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" id="remarks" name="remarks"></textarea>
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
