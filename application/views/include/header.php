<header class="header d-flex justify-content-between align-items-center position-fixed w-100 top-0 body-pd" id="header">
	<div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
	<!-- <div class="header_img d-flex justify-content-center rounded-circle overflow-hidden"> <img src="/final/images/profile.jpg" alt=""> </div> -->
	<div class="d-flex justify-content-between ">
		<div class="branch pe-md-5">
			<label for="branch-name">Branch </label>
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
	<nav class="header-menu vh-100 d-flex flex-column justify-content-between">
		<div>
			<a href="#" id="iconId" class="nav_logo icon pt-0 mt-0"> <img src="<?php echo base_url('public/assets/images/logo-new.png'); ?>" class="img-fluid header-image" alt=""> </a>
			<div class="nav_list">
				<a href="#" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/dashboard-svgrepo-com.svg'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" alt="" srcset=""> <span class="nav_name">Dashboard</span> </a>
				<a href="<?php echo base_url('enquiry'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/question-svgrepo-com.svg'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiries" alt="" srcset="">	 <span class="nav_name">Enquiries</span> </a>
				<a href="<?php echo base_url('patient'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/person-svgrepo-com.svg'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Patients" alt="" srcset=""> <span class="nav_name">Patients</span> </a>
				<a href="<?php echo base_url('branch'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/location-company-svgrepo-com.svg'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Branches" alt="" srcset=""> <span class="nav_name">Branch</span> </a>
				<a href="<?php echo base_url('consultation_status'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/interview-svgrepo-com.svg'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Consultation Status" alt="" srcset=""><span class="nav_name">Consultation Status</span> </a>
				<a href="<?php echo base_url('enquiry_status'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/search.png'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry Status" alt="" srcset=""> <span class="nav_name">Enquiry Status</span> </a>
				<a href="<?php echo base_url('service'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/customer-service.png'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Services" alt="" srcset=""> <span class="nav_name">Services</span> </a>
				<a href="<?php echo base_url('source'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/search-worldwide.png'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Sources" alt="" srcset=""> <span class="nav_name">Sources</span> </a>
				<a href="<?php echo base_url('role'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/roles.png'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Roles" alt="" srcset=""> <span class="nav_name">Roles</span> </a>
				<a href="<?php echo base_url('user'); ?>" class="nav_link"> <img src="<?php echo base_url('/public/assets/images/icons/user.png'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Users" alt="" srcset=""> <span class="nav_name">Users</span> </a>
				<a class="nav_link" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
				<img src="<?php echo base_url('/public/assets/images/icons/settings.png'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Settings" alt="" srcset=""><span class="nav_name">Settings <i class="bx bx-caret-down"></i></span>
				</a>
				<div class="collapse" id="home-collapse">
					<ul class="btn-toggle-nav list-unstyled fw-normal ps-md-5">
						<li><a href="#" class="nav_link">Overview</a></li>
						<li><a href="#" class="nav_link">Updates</a></li>
						<li><a href="#" class="nav_link">Reports</a></li>
					</ul>
				</div>
				<a href="<?php echo base_url('enquiry/daily_report'); ?>" class="nav_link"><img src="<?php echo base_url('/public/assets/images/icons/daily-report.png'); ?> " data-bs-toggle="tooltip" data-bs-placement="right" title="Daily Report" alt="" srcset=""> <span class="nav_name">Daily Report</span> </a>
				
			</div>
		</div>
	</nav>
</div>
