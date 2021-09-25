<?php echo form_open($url, array('id' => 'form')); ?>
<div class="modal-content border-0">
    <div class="modal-body p-0">
        <div class="card border-0 p-sm-3 p-2 justify-content-center">
            <div class="card-header pb-0 bg-white border-0 ">
                <div class="row justify-content-end">
                    <div class="col"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>
                </div>
                <p class="text-muted text-center font-weight-bold"> Are you sure you wanna delete this ?</p>
            </div>
            <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                <div class="row justify-content-end no-gutters">
                    <div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button></div>
                    <div class="col-auto"><button type="button" class="btn btn-danger px-4" data-dismiss="modal">Delete</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>