<header class="header d-flex justify-content-between align-items-center position-fixed w-100 top-0 body-pd" id="header">
	<div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
	<!-- <div class="header_img d-flex justify-content-center rounded-circle overflow-hidden"> <img src="/final/images/profile.jpg" alt=""> </div> -->
	<div class="dropdown">
		<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
			Admin
		</button>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
			<li><a class="dropdown-item" href="#">Action</a></li>
			<li><a class="dropdown-item" href="#">Another action</a></li>
			<li><a class="dropdown-item" href="#">Something else here</a></li>
		</ul>
	</div>
</header>
<div class="l-navbar position-fixed vh-100 top-0 show-side" id="nav-bar">
	<nav class="h-100 d-flex flex-column justify-content-between overflow-hidden">
		<div>
			<a href="#" class="nav_logo mb-2"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name fw-bold">BBBootstrap</span> </a>
			<div class="nav_list">
				<ul class="list-unstyled">
					<li><a href="#" class="nav_link"> <i class='bx bx-grid-alt nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard"></i> <span class="nav_name">Dashboard</span> </a></li>
					<li><a href="<?php echo base_url('branch'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiries"></i> <span class="nav_name">Branch</span> </a></li>
					<li><a href="<?php echo base_url('consultation_status'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Consultation Status"></i> <span class="nav_name">Consultation Status</span> </a></li>
					<li><a href="<?php echo base_url('enquiry'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiries"></i> <span class="nav_name">Enquiries</span> </a></li>
					<li><a href="<?php echo base_url('enquiry_status'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Enquiry Status"></i> <span class="nav_name">Enquiry Status</span> </a></li>
					<li><a href="<?php echo base_url('source'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Source"></i> <span class="nav_name">Source</span> </a></li>
					<li><a href="<?php echo base_url('role'); ?>" class="nav_link"> <i class='bx bx-message-square-detail nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Role"></i> <span class="nav_name">Role</span> </a></li>
					<li><a href="#" class="nav_link"> <i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Users"></i> <span class="nav_name">Users</span> </a></li>
					<li>
						<a class="nav_link" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
							<i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Users"></i> <span class="nav_name">Home <i class="bx bx-caret-down"></i></span>
						</a>
						<div class="collapse" id="home-collapse">
							<ul class="btn-toggle-nav list-unstyled fw-normal pb-1  ps-5">
								<li><a href="#" class="nav_link">Overview</a></li>
								<li><a href="#" class="nav_link">Updates</a></li>
								<li><a href="#" class="nav_link">Reports</a></li>
							</ul>
						</div>
					</li>
					<li>
						<a href="#" class="nav_link dropdown-btn"><i class='bx bx-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right" title="Users"></i> <span class="nav_name">Users
								<i class="bx bx-caret-down"></i></span>
						</a>
						<div class="dropdown-list ps-5" style="display: none;">
							<a class="nav_link" href="#">Link 1</a>
							<a class="nav_link" href="#">Link 2</a>
							<a class="nav_link" href="#">Link 3</a>
						</div>
					</li>
					
				</ul>

			</div>
		</div>
	</nav>
</div>
