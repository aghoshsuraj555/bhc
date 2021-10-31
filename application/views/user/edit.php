<div class="container-fluid d-md-flex mb-4">
    <?php echo form_open_multipart('user/edit/'.$user->id, array('id' => 'form')); ?>
    <div class="row col-12">
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <h5 class="card-header fw-bold">Basic Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control required" id="fname" name="fname" value="<?php echo $user->fname;?>" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control required" id="lname" name="lname" value="<?php echo $user->lname;?>" placeholder="Last Name">
                        </div>
                        <div class="col-md-6">
                            <label for="jobtitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="<?php echo $user->fname;?>" placeholder="Job Title">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label align-items-center">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="Y" value="Y" name="status" <?php echo ($user->status=='Y')?'checked':'';?>>
                                <label class="form-check-label" for="Y">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="N" value="N" name="status" <?php echo ($user->status=='N')?'checked':'';?>>
                                <label class="form-check-label" for="N">Inactive</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image" id="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <h5 class="card-header fw-bold">Contact Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="contactno" class="form-label">Contact Number</label>
                            <input type="text" class="form-control required" id="contactno" name="contactno"  value="<?php echo $user->contactno;?>" placeholder="Contact Number">
                        </div>
                        <div class="col-md-6">
                            <label for="whatsappno" class="form-label">WhatsApp Number</label>
                            <input type="text" class="form-control required" id="whatsappno" name="whatsappno"  value="<?php echo $user->whatsappno;?>" placeholder="WhatsApp Number">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Id</label>
                            <input type="text" class="form-control required" id="email" name="email"  value="<?php echo $user->email_id;?>" placeholder="Email Id">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mt-4">
            <div class="card">
                <h5 class="card-header fw-bold">Login Details</h5>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control required" id="username" name="username"  value="<?php echo $user->username;?>" placeholder="Username" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select required">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($roles as $role) {
                                ?>
                                    <option value="<?php echo $role['id']; ?>"<?php echo ($role['id']==$user->role_id)?'selected="selected"':'';?>><?php echo $role['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Branch</label>
                            <select id="branch" name="branch" class="form-select required">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($branches as $branch) {
                                ?>
                                    <option value="<?php echo $branch['id']; ?>"<?php echo ($branch['id']==$user->branch_id)?'selected="selected"':'';?>><?php echo $branch['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="passwword" class="form-label">Password</label>
                            <input type="password" class="form-control required" id="password" name="password" placeholder="Password" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-end pe-5 my-4">
            <input class="btn button" type="submit" value="Submit">
        </div>
    </div>
    <?php echo form_close(); ?>
</div>