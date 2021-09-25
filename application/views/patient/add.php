<div class="container-fluid d-md-flex mb-4">
    <form action="" class="row col-12" method="post">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <h5 class="card-header fw-bold">Contact Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="patientId" class="form-label">Patient ID<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="patientId" id="patientId" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Patient Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <label for="patient-address" class="form-label">Address</label>
                            <textarea name="address" name="address" id="address" class="form-control"></textarea>
                        </div>


                        <div class="col-md-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" placeholder="State">
                        </div>
                        <div class="col-md-4">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincode" placeholder="Pincode">
                        </div>
                        <div class="col-md-6">
                            <label for="nationality" class="form-label">Nationality</label>
                            <select id="nationality" class="form-select search-select">
                                <option value="">Choose...</option>
                                <?php foreach ($nationality as $nationalityval) {
                                ?>
                                    <option value="<?php echo $nationalityval['id']; ?>"><?php echo $nationalityval['name']; ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="contact-number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact-number" placeholder="Contact Number">
                        </div>
                        <div class="col-md-6">
                            <label for="whatsapp-number" class="form-label">WhatsApp Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="whatsapp-number" placeholder="WhatsApp Number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="text" class="form-control disable datepicker" id="enquiry-date">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label align-items-center">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="profession" class="form-label">Profession</label>
                            <input type="text" class="form-control" id="profession" placeholder="Profession">
                        </div>
                        <div class="col-12">
                            <label for="patient-image" class="form-label">Patient Image</label>
                            <input type="file" class="form-control" id="patient-image" placeholder="Number">
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
                            <input type="text" class="form-control disable datepicker" id="enquiry-date">
                        </div>
                        <div class="col-md-6">
                            <label for="source" class="form-label">Source</label>
                            <select id="source" class="form-select">
                                <option disabled selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="nri" class="form-label">NRI</label>
                            <select id="nri" class="form-select">
                                <option disabled selected>Choose...</option>
                                <option>YES</option>
                                <option>NO</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="consultation-status" class="form-label">Consultation Status</label>
                            <select id="consultation-status" class="form-select">
                                <option disabled selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="graft-plan" class="form-label">Graft Plan</label>
                            <input type="text" class="form-control" id="graft-plan" placeholder="Graft Plan">
                        </div>
                        <div class="col-md-6">
                            <label for="method" class="form-label">Method</label>
                            <select id="method" class="form-select">
                                <option disabled selected>Choose...</option>
                                <option>N</option>
                                <option>P</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="area" class="form-label">Area</label>
                            <input type="text" class="form-control" id="area" placeholder="Graft Plan">
                        </div>
                        <div class="col-md-6">
                            <label for="extracted-number" class="form-label">No. of Grafts Extracted</label>
                            <input type="text" class="form-control" id="extracted-number" placeholder="Number">
                        </div>
                        <div class="col-12">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="remarks" class="form-control" id="remarks"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label align-items-center">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="active" value="active">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inactive" value="inactive">
                                <label class="form-check-label" for="inactive">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>




            </div>


        </div>
        <div class="d-flex align-items-center justify-content-end pe-5 my-4">
            <input class="btn button" type="button" value="Submit">
        </div>
    </form>
</div>