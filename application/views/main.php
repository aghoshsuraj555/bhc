<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/boxicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/jquery.timepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/sample.css'); ?>">
    <script src="<?php echo base_url('public/assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.timepicker.min.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>BHC</title>
</head>

<body id="body-pd" class="position-relative body-pd">
    <?php echo $header; ?>
    <div class="bg-light">
        <?php echo $content; ?>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="delete-form">
                        <div class="modal-body">
                            <h5>Are you sure you wanna delete this ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show-side')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')

                })
            }

        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready
    });
</script>
<script>
    const toggle = document.querySelector('#header-toggle');
    toggle.addEventListener('click', () => {
        document.querySelector('#iconId').classList.toggle('icon-show');
    });
</script>
<!-- <script src="<?php echo base_url('public/assets/js/popper.js'); ?>"></script> -->
<!-- <script src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/select2.min.js'); ?>"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    $(document).ready(function() {
        $(".get-details").click(function() {
            let url = $(this).attr('url');
            $.ajax({
                type: "get",
                url: url,
                success: function(result) {
                    $('#get-details').html(result);
                }
            });
        });
        $("#getAllDetails").on('click', '.ajaxPopup', function() {
            let url = $(this).attr('url');
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(data) {
                    $('#ajaxPopform').html(data.view);
                    $('.timepicker').timepicker({});
                    $(".datepicker").datepicker({
                        dateFormat: 'dd-mm-yy'
                    });
                }
            });
        });
        $('#getAllDetails').on('click', '.addAjaxPopup', function(e) {
            e.preventDefault();
            var form = $('#getAllDetails #form');
            $.ajax({
                type: "POST",
                url: form[0].action,
                data: form.serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.type == 'error') {
                        $('#ajaxPopform').html(data.view);
                        $('.timepicker').timepicker({});
                        $(".datepicker").datepicker({
                            dateFormat: 'dd-mm-yy'
                        });
                    } else {
                        $(".modal").modal("hide");
                        $('#getAllDetails').html(data.view);
                        $('.timepicker').timepicker({});
                        $(".datepicker").datepicker({
                            dateFormat: 'dd-mm-yy'
                        });
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
        });
        $('#getAllDetails').on('click', '.editAjaxPopup', function(e) {
            e.preventDefault();
            var form = $('#getAllDetails #form');
            console.log(form[0].action);
            $.ajax({
                type: "POST",
                url: form[0].action,
                data: form.serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.type == 'error') {
                        $('#get-details').html(data.view);
                        $('.timepicker').timepicker({});
                        $(".datepicker").datepicker({
                            dateFormat: 'dd-mm-yy'
                        });
                    } else {
                        $(".modal").modal("hide");
                        $('#getAllDetails').html(data.view);
                        $('.timepicker').timepicker({});
                        $(".datepicker").datepicker({
                            dateFormat: 'dd-mm-yy'
                        });
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
        });
        $('#getAllDetails').on('click', '.get-details', function() {
            let url = $(this).attr('url');
            $.ajax({
                type: "get",
                url: url,
                success: function(result) {
                    $('#get-details').html(result);
                    $('.timepicker').timepicker({});
                    $(".datepicker").datepicker({
                        dateFormat: 'dd-mm-yy'
                    });
                }
            });
        });
        $('.deleteModal').click(function() {
            let url = $(this).attr('url');
            document.getElementById('delete-form').action = url;
        });

        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });

        $('.daterange_picker').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('.daterange_picker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });

        $('.daterange_picker').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $('.search-select').select2();
        $('.timepicker').timepicker({});
        jQuery.validator.addMethod("phone_number", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.match(/[0-9]/);
        }, "Please specify a valid phone number");

        $('#form').validate({
            rules: {
                contactno: {
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                    phone_number: true
                },
                whatsappno: {
                    required: true,
                    minlength: 8,
                    maxlength: 15,
                    phone_number: true
                }
            }
        });
        $('#get-details').on('click', '#form', function() {
            $("#get-details #form").validate();
        });
        $('#enquiry_status').on('change', function() {
            let val = $(this).val();
            if (val == 1) {
                $('#followup').addClass('d-block');
                $('#followup').removeClass('d-none');
            } else {
                $('#followup').addClass('d-none');
                $('#followup').removeClass('d-block');
            }
        });
        if ($('#getAllDetails').length > 0) {
            $.ajax({
                type: "get",
                dataType: "json",
                url: "<?php echo base_url('appointment/lists/' . $this->uri->segment('3')) ?>",
                success: function(data) {
                    $('#getAllDetails').html(data.view);
                }
            });
        }
        $('#getAllDetails').on('click','.timepicker',function(){
           $('.ui-timepicker-container').addClass('.popup-timepicker');
        });
    });
</script>
<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("active-dropdown");
        });
    }
</script>

</html>
