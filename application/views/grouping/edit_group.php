<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Group
                            <a href="<?php echo base_url(); ?>grouping/home" class="btn btn-wd btn-default pull-right">BACK</a></h4>
							<hr>
                        </div>

                        <div class="content">
                            <?php  foreach($res as $rows){} ?>
                                <form method="post" action="" class="form-horizontal" enctype="multipart/form-data" id="grouping_form" name="grouping_form">

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Title <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="group_title" class="form-control" value="<?php echo $rows->group_title; ?>" maxlength="30">
                                                <input type="hidden" name="id" class="form-control" value="<?php echo $rows->id; ?>">

                                            </div>
                                        </div>
										</fieldset>
										
										<fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Admin <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="group_lead_id" id="group_lead_id" class="selectpicker form-control">
                                                    <?php foreach($list_of_teacher as $rows1){ ?>
                                                        <option value="<?php echo $rows1->user_id; ?>">
                                                            <?php echo $rows1->name; ?>
                                                        </option>
                                                        <?php    } ?>

                                                </select>
                                                <script language="JavaScript">
                                                    document.grouping_form.group_lead_id.value = "<?php echo $rows->group_lead_id; ?>";
                                                </script>
                                            </div>
											<div class="col-sm-6"></div>
                                        </div>
										</fieldset>
										  
										<fieldset>
											<div class="form-group">
												<label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
												<div class="col-sm-4">
													<select name="status" class="selectpicker form-control">
														<option value="Active">Active</option>
														<option value="Deactive">Inactive</option>
													</select>
													<script language="JavaScript">
														document.grouping_form.status.value = "<?php echo $rows->status; ?>";
													</script>
												</div>
												<div class="col-sm-6"></div>
											</div>
										</fieldset>
										
									  <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">&nbsp;</label>
                                        <div class="col-sm-4">
											<input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
                                         
                                        </div>
										<div class="col-sm-6"></div>
                                    </div>
                                    </fieldset>

                                </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
    $('#grouping_form').validate({ // initialize the plugin
        rules: {
            group_title: {
                required: true
            },
            group_lead: {
                required: true
            },
            status: {
                required: true
            },
        },
        messages: {
            group_title: "This field cannot be empty!",
			group_lead:"Please choose an option!",
			status:"Please choose an option!"

        },


        submitHandler: function(form) {
         //alert("hi");
         swal({
                       title: "Are you sure?",
                       text: "You Want Confirm this form",
                       type: "success",
                       showCancelButton: true,
                       confirmButtonColor: '#DD6B55',
                       confirmButtonText: 'Yes',
                       cancelButtonText: "No",
                       closeOnConfirm: false,
                       closeOnCancel: false
                   },
                   function(isConfirm) {
                       if (isConfirm) {
        $.ajax({
            url: "<?php echo base_url(); ?>grouping/save_group",
             type:'POST',
            data: $('#grouping_form').serialize(),
            success: function(response) {
                if(response=="success"){
                 //  swal("Success!", "Thanks for Your Note!", "success");
                   $('#grouping_form')[0].reset();
                   swal({
            title: "Wow!",
            text: "Changes made are saved",
            type: "success"
        }, function() {
             location.reload();
        });
                }else{
                  sweetAlert("Oops...", "Something went wrong!", "error");
                }
            }
        });
        }else{
          swal("Cancelled", "Process Cancel :)", "error");
        }
        });
        }

    });
    jQuery('#groupingmenu').addClass('collapse in');
    $('#grouping').addClass('active');
    $('#group1').addClass('active');
</script>
