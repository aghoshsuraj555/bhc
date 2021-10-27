<header class="header d-flex justify-content-between align-items-center position-fixed w-100 top-0 body-pd" id="header">
	<div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
	<!-- <div class="header_img d-flex justify-content-center rounded-circle overflow-hidden"> <img src="/final/images/profile.jpg" alt=""> </div> -->
	<div class="d-flex justify-content-between">
		<div class="branch">
			<label for="branch-name">Branch  </label>
			<select id="branch-name" name="branch-name" class="form-select search-select">
				<option value="">Choose...</option>

			</select>
		</div>
		<div class="dropdown">
			<button class="btn btn-light dropdown-toggle p-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
				Admin
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="#">Action</a></li>
				<li><a class="dropdown-item" href="#">Another action</a></li>
				<li><a class="dropdown-item" href="#">Something else here</a></li>
			</ul>
		</div>
	</div>
</header>
<div class="l-navbar position-fixed vh-100 top-0 show-side" id="nav-bar">
	<nav class="h-100 d-flex flex-column justify-content-between overflow-hidden">
		<div>
			<a href="#" id="iconId" class="nav_logo icon mb-2"> <img src="<?php echo base_url('public/assets/images/logo-new.png'); ?>" class="img-fluid header-image" alt=""> </a>
			<div class="nav_list">
				<a href="#" class="nav_link"> <i class='bx bx-grid-alt nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"></i> <span class="nav_name">Dashboard</span> </a>
				<a href="<?php echo base_url('enquiry'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiries"></i> <span class="nav_name">Enquiries</span> </a>
				<a href="<?php echo base_url('patient'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Patients"></i> <span class="nav_name">Patients</span> </a>
				<a href="<?php echo base_url('branch'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiries"></i> <span class="nav_name">Branch</span> </a>
				<a href="<?php echo base_url('consultation_status'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Consultation Status"></i> <span class="nav_name">Consultation Status</span> </a>
				<a href="<?php echo base_url('enquiry_status'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry Status"></i> <span class="nav_name">Enquiry Status</span> </a>
				<a href="<?php echo base_url('service'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Services"></i> <span class="nav_name">Services</span> </a>
				<a href="<?php echo base_url('source'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Sources"></i> <span class="nav_name">Sources</span> </a>
				<a href="<?php echo base_url('role'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Roles"></i> <span class="nav_name">Roles</span> </a>
				<a href="<?php echo base_url('user'); ?>" class="nav_link"> <i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Users"></i> <span class="nav_name">Users</span> </a>
				<a href="<?php echo base_url('enquiry/daily_report'); ?>" class="nav_link"> <i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Daily Report"></i> <span class="nav_name">Daily Report</span> </a>
			</div>
		</div>
	</nav>
</div>
