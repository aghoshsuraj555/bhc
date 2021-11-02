<header class="header d-flex justify-content-between align-items-center position-fixed w-100 top-0 body-pd" id="header">
	<div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
	<!-- <div class="header_img d-flex justify-content-center rounded-circle overflow-hidden"> <img src="/final/images/profile.jpg" alt=""> </div> -->
	<div class="d-flex justify-content-between ">
		<?php
		if ($this->session->userdata('role') == 1) {
			echo form_open('home/set_branch'); ?>
			<div class="d-flex align-items-center branch pe-md-5">
				<label for="branch-name" class="pe-2">Branch </label>
				<select id="branch" name="branch" class="form-select" onchange="this.form.submit()">
					<?php
					foreach ($branches as $branch) {
					?>
						<option value="<?php echo $branch['id']; ?>" <?php echo ($branch['id'] == $this->session->userdata('branch')) ? 'selected="selected"' : ''; ?>><?php echo $branch['name']; ?></option>
					<?php
					}
					?>
				</select>
				<input type="hidden" name="url" value="<?php echo current_url(); ?>" />
			</div>
		<?php
		}
		echo form_close(); ?>
		<div class="dropdown">
			<button class="btn btn-light dropdown-toggle p-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
				<?php echo $this->session->userdata('name'); ?>
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
				<li><a class="dropdown-item" href="#">Logout</a></li>
			</ul>
		</div>
	</div>
</header>
<div class="l-navbar position-fixed vh-100 top-0 show-side" id="nav-bar">
	<nav class="header-menu vh-100 d-flex flex-column justify-content-between">
		<div>
			<a href="#" id="iconId" class="nav_logo icon pt-0 mt-0"> <img src="<?php echo base_url('public/assets/images/logo-new.png'); ?>" class="img-fluid header-image" alt=""> </a>
			<div class="nav_list">
				<?php echo $menu; ?>
			</div>
		</div>
	</nav>
</div>