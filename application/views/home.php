<section class="dashboard-notifications">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img class="dash-icon p-2 rounded-circle bg-secondary" src="<?php echo base_url('/public/assets/images/icons/person-question-mark-svgrepo-com.svg');?>" alt="image1">
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <p class="card-text dash-icon-title bg-secondary text-white rounded-3 pe-2 ps-2 mt-3">Total Appointments</p>
                                    <p class="card-text dash-icon-title bg-secondary text-white rounded-3 pe-2 ps-2 mt-3 ms-2"><?php echo count($appointment);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img class="dash-icon p-2 rounded-circle bg-warning" src="<?php echo base_url('/public/assets/images/icons/person-feedback-svgrepo-com.svg');?>" alt="image1">
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <p class="card-text dash-icon-title bg-warning text-white rounded-3 pe-2 ps-2 mt-3">Total Enquiry</p>
                                    <p class="card-text dash-icon-title bg-warning text-white rounded-3 pe-2 ps-2 mt-3 ms-2"><?php echo count($total_enquiry);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img class="dash-icon p-2 rounded-circle bg-danger" src="<?php echo base_url('/public/assets/images/icons/person-call-svgrepo-com.svg');?>" alt="image1">
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <p class="card-text dash-icon-title bg-danger text-white rounded-3 pe-2 ps-2 mt-3">Follow Up</p>
                                    <p class="card-text dash-icon-title bg-danger text-white rounded-3 pe-2 ps-2 mt-3 ms-2"><?php echo count($followup);?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <img class="dash-icon p-2 rounded-circle bg-success" src="<?php echo base_url('/public/assets/images/icons/person-add-svgrepo-com.svg');?>" alt="image1">
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <p class="card-text dash-icon-title bg-success text-white rounded-3 pe-2 ps-2 mt-3">Converted</p>
                                    <p class="card-text dash-icon-title bg-success text-white rounded-3 pe-2 ps-2 mt-3 ms-2"><?php echo count($converted);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dashboard mt-md-5">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card vh-100">
                            <div class=" card-body ">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title ">Today Appointments</h5>
                                </div>

                                <div class="table-responsive overflow-auto">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Doctor</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Services</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="card h-100 ">
                            <div class="card-body ">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="card-title ">Today Enquiry</h5>
                                    <a href="<?php echo base_url('enquiry');?>" class="btn btn-primary button-primary"> View All</a>
                                </div>
                                <div class="table-responsive overflow-auto">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Doctor</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Services</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex justify-content-evenly">
                                                        <img src="" class="patient-image" alt="patient_img">
                                                        <p>Name</p>
                                                    </div>
                                                </td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>