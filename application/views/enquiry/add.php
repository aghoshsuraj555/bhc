<div class="container-fluid d-md-flex mb-4">
    <div class="row col-12">
        <form action="" class="row col-12" method="post">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <h5 class="card-header fw-bold">Contact Details</h5>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="patient-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="" placeholder="Name">
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email ID</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="contact-number" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contactno" name="no" placeholder="Contact Number">
                            </div>
                            <div class="col-md-6">
                                <label for="whatsapp-number" class="form-label">WhatsApp Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="whatsappno" name="whatsappno" placeholder="WhatsApp Number" required>
                            </div>

                            <div class="col-md-6">
                                <label for="nationality" class="form-label">Nationality</label>
                                <select id="nationality" name="nationality" class="form-select search-select">
                                    <option value="">Choose...</option>
                                    <?php foreach ($nationality as $nationalityval) {
                                    ?>
                                        <option value="<?php echo $nationalityval['id'];?>"><?php echo $nationalityval['name'];?></option>
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
                                <input type="text" class="form-control disable datepicker" name="enquirydate" id="enquirydate">
                            </div>
                            <div class="col-md-6">
                                <label for="source" class="form-label">Source</label>
                                <select id="source" name="source" class="form-select">
                                    <option disabled selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea name="remarks" class="form-control" id="remarks"></textarea>
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
</div>