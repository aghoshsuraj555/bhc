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
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover table-responsive-sm">
                <thead>
                    <th scope="col">SL.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">ContactNo</th>
                    <th scope="col">WhatsAppNo</th>
                    <th scope="col">Enquiry Date</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    if ($enquiries) {
                        foreach ($enquiries as $enquiry) {
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $enquiry['name']; ?></td>
                                <td><?php echo $enquiry['contactno']; ?></td>
                                <td><?php echo $enquiry['whatsappno']; ?></td>
                                <td><?php echo $enquiry['enquiry_date']; ?></td>
                                <td><span class="btn btn-<?php echo $statusarray['class' . $branch['status']];  ?> btn-xs"><?php echo $statusarray[$branch['status']]; ?></span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary get-details" data-bs-toggle="modal" url="<?php echo base_url('branch/edit/' . $branch['id']) ?>" data-bs-target="#editModal" data-bs-whatever="@mdo">Edit</button>
                                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <li><a class="dropdown-item get-details" href="javascript:void(0)" data-bs-toggle="modal" url="<?php echo base_url('branch/edit/' . $branch['id'] . '/' . $return) ?>" data-bs-target="#editModal" data-bs-whatever="@mdo">Edit</a></li>
                                            <li><a class="dropdown-item deleteModal" href="javascript:void(0)" data-bs-toggle="modal" url="<?php echo base_url('branch/delete/' . $branch['id'] . '/' . $return) ?>" data-bs-target="#deleteModal" data-bs-whatever="@mdo">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3" class="text-center">No Details Available!!</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end"><?php echo $this->pagination->create_links(); ?></div>
    </div>

</section>