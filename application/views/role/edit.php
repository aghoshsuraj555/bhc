<?php echo form_open('role/update/' . $role->id.'/'.$return,array('id'=>'form')); ?>
<div class="modal-body">
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Name</label>
        <input type="text" class="form-control required" name="name" id="name" value="<?php echo $role->name?>">
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label align-items-center">Status</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="active" value="Y" <?php if($role->status=='Y'){ echo 'checked'; }?>>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="inactive" value="N"  <?php if($role->status=='N'){ echo 'checked'; }?>>
            <label class="form-check-label" for="inactive">Inactive</label>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary button-primary">Submit</button>
</div>
<?php echo form_close(); ?>
