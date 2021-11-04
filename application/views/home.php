<section class="dashboard-notifications">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <img class="dash-icon p-2 rounded-circle bg-secondary" src="<?php echo base_url('/public/assets/images/icons/person-question-mark-svgrepo-com.svg'); ?>" alt="image1">
                            <div class="d-flex align-items-baseline justify-content-center">
                                <p class="card-text dash-icon-title bg-secondary text-white rounded-3 pe-2 ps-2 mt-3">Total Appointments</p>
                                <p class="card-text dash-icon-title bg-secondary text-white rounded-3 pe-2 ps-2 mt-3 ms-2">
                                    <?php echo count($appointment); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <img class="dash-icon p-2 rounded-circle bg-warning" src="<?php echo base_url('/public/assets/images/icons/person-feedback-svgrepo-com.svg'); ?>" alt="image1">
                            <div class="d-flex align-items-baseline justify-content-center">
                                <p class="card-text dash-icon-title bg-warning text-white rounded-3 pe-2 ps-2 mt-3">Total Enquiry</p>
                                <p class="card-text dash-icon-title bg-warning text-white rounded-3 pe-2 ps-2 mt-3 ms-2">
                                    <?php echo count($total_enquiry); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <img class="dash-icon p-2 rounded-circle bg-danger" src="<?php echo base_url('/public/assets/images/icons/person-call-svgrepo-com.svg'); ?>" alt="image1">
                            <div class="d-flex align-items-baseline justify-content-center">
                                <p class="card-text dash-icon-title bg-danger text-white rounded-3 pe-2 ps-2 mt-3">Follow Up</p>
                                <p class="card-text dash-icon-title bg-danger text-white rounded-3 pe-2 ps-2 mt-3 ms-2">
                                    <?php echo count($followup); ?>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <img class="dash-icon p-2 rounded-circle bg-success" src="<?php echo base_url('/public/assets/images/icons/person-add-svgrepo-com.svg'); ?>" alt="image1">
                            <div class="d-flex align-items-baseline justify-content-center">
                                <p class="card-text dash-icon-title bg-success text-white rounded-3 pe-2 ps-2 mt-3">Converted</p>
                                <p class="card-text dash-icon-title bg-success text-white rounded-3 pe-2 ps-2 mt-3 ms-2">
                                    <?php echo count($converted); ?>
                                </p>
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
                    <div class="card">
                        <div class=" card-body ">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="card-title ">Today Appointments</h5>
                            </div>

                            <div class="table-responsive tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">Doctor</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Services</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($appointments) {
                                            foreach ($appointments as $appointment) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $appointment['name']; ?></td>
                                                    <td><?php echo $appointment['fname'] . '-' . $appointment['lname']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($appointment['appointment_date'])); ?></td>
                                                    <td><?php echo date('h:i a', strtotime($appointment['appointment_time'])); ?></td>
                                                    <td><?php echo $appointment['service_name']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr><td colspan="5" class="text-center">No Details Available</td></tr>
                                        <?php
                                        }
                                        ?>
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
                                <a href="<?php echo base_url('enquiry'); ?>" class="btn btn-primary button-primary"> View All</a>
                            </div>
                            <div class="table-responsive tableFixHead">
                                <table class="table table-hover">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Contact No</th>
                                            <th scope="col">Followup Date</th>
                                            <th scope="col">Assign To</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($enquiries) {
                                            foreach ($enquiries as $enquiry) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $enquiry['name']; ?></td>
                                                    <td><?php echo $enquiry['contactno']; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($enquiry['followup_date'])); ?></td>
                                                    <td><?php echo $enquiry['fname'] . '-' . $enquiry['lname']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr><td colspan="4" class="text-center">No Details Available</td></tr>
                                        <?php
                                        }
                                        ?>
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