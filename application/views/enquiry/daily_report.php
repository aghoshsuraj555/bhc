<section>
    <?php echo $this->session->flashdata('message');
    $return = $this->uri->segment('3');
    ?>
    <div class="form-control mx-auto">
        <div class="table-heading d-flex align-items-center justify-content-between p-2">
            <p class="fs-2">Daily Report</p>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover table-responsive-sm">
                <thead>
                    <th scope="col">Staff</th>
                    <th scope="col">Missed Calls</th>
                    <?php
                    foreach ($enquiry_statuses as $enquiry_status) {
                    ?>
                        <th scope="col"><?php echo $enquiry_status['name']; ?></th>
                    <?php
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if ($daily_reports) {
                        foreach ($daily_reports as $daily_report) {
                    ?>
                            <tr>
                                <td><?php echo $daily_report['name']; ?></td>
                                <?php
                                foreach ($daily_report['count'] as $count) {
                                ?>
                                    <td><?php echo $count; ?></td>
                                <?php
                                }
                                ?>
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
    </div>

</section>