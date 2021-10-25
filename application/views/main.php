<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/boxicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/sample.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/sample.css'); ?>">
    <script src="<?php echo base_url('public/assets/js/jquery.min.js'); ?>"></script>
    <title>BHC</title>
</head>

<body id="body-pd" class="position-relative body-pd">
    <?php echo $header; ?>
    <div class="height-100 bg-light">
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
<!-- <script src="<?php echo base_url('public/assets/js/popper.js'); ?>"></script> -->
<!-- <script src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script> -->
<script src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/select2.min.js'); ?>"></script>
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

        $('.deleteModal').click(function(){
            let url = $(this).attr('url');
            document.getElementById('delete-form').action = url;
        });

        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });

        $('.search-select').select2();
        $('#form').validate({
            rules: {
                field1: {
                    required: true,
                    email: true
                },
                field2: {
                    required: true,
                    minlength: 5
                }
            }
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
