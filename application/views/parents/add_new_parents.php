<style>
#msg{
  color: red;
  font-size: 14px;
}
</style>
<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Parent Profile</h4>
                </div>
				<hr>
                <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php endif; ?>
                        <div class="content">

                                <form method="post" action="<?php echo base_url(); ?>parents/create_new_parents" class="form-horizontal" enctype="multipart/form-data" id="parentform">
                                    <input type="hidden" name="admission_id" id="stuid" class="form-control" value="<?php echo $aid;?>">
                                    <?php if($eid==0)
									{
										if (count($alldetails) > 0) {
											foreach($alldetails as $all) {
												$asid=$all->admission_id;
											}
									?>
										<input type="hidden" name="insertadmission_no" class="form-control" value="<?php echo $asid;?>">
										<?php } else { ?>
										<input type="hidden" name="insertadmission_no" class="form-control" value="<?php echo $eid;?>,<?php echo $aid;?>">
										<?php }?>
                                   <?php }else{?>
										<input type="hidden" name="insertadmission_no" class="form-control" value="<?php echo $eid;?>,<?php echo $aid;?>">
                                   <?php }?>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Relationship <span class="mandatory_field">*</span></label>
                                                        <!-- <?php print_r($relation); ?> -->
                                                        <div class="col-sm-4">
                                        <?php foreach($relation as $rows_relation){ } ?>

                                       <span id="msg"></span>
                              <select name="relationship" id="relationship" class="selectpicker form-control" onchange="checkrelationfun(this)"/>
                              <option value="">--Select--</option>
                              <option value="Father">Father</option>
                              <option value="Mother">Mother</option>
                              <option value="Guardian">Guardian</option>
                              </select>

                                                        </div>


                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label">Name <span class="mandatory_field">*</span></label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="name" placeholder="Enter Name" class="form-control" value="" maxlength="30">
                                                      </div>
                                                      <label class="col-sm-2 control-label">Login Access</label>
                                                      <div class="col-sm-4">
														<select name="priority" id="priority" class="selectpicker form-control">
                                                                    <option value="Yes">Enabled</option>
                                                                    <option value="No">Disabled</option>
                                                         </select>

                                                      </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label">Email ID <span class="mandatory_field">*</span></label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="pemail" id="pemail" class="form-control" placeholder="Email ID"  maxlength="30" />
                                                      </div>
                                                      <label class="col-sm-2 control-label">Alternate Email ID</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" name="semail"  id="semail" placeholder="Secondary Email ID" class="form-control" maxlength="30" />
                                                      </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Mobile Number <span class="mandatory_field">*</span></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="pmobile" id="pmobile" placeholder="Mobile Number" class="form-control" maxlength="10" >
                                                        </div>
                                                        <label class="col-sm-2 control-label"> Alternate Mobile Number</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="smobile" id="smobile" placeholder="Alternate Mobile Number" class="form-control" maxlength="10" >
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Occupation</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" name="occupation" placeholder="Occupation" class="form-control" value="" maxlength="30">
                                                        </div>
                                                        <label class="col-sm-2 control-label">Income</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Income" name="income" class="form-control" maxlength="10">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Residential Address</label>
                                                        <div class="col-sm-4">
                                                            <textarea name="haddress" maxlength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                        </div>
                                                        <label class="col-sm-2 control-label">Office Address</label>
                                                        <div class="col-sm-4">
                                                            <textarea name="office_address" maxlength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"></textarea>
                                                        </div>

                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                      <label class="col-sm-2 control-label">Telephone</label>
                                                      <div class="col-sm-4">
                                                          <input type="text" placeholder="Telephone" name="home_phone" class="form-control" maxlength="14">
                                                      </div>
                                                        <label class="col-sm-2 control-label">Office Phone</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Office Phone" name="office_phone" class="form-control" maxlength="14">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label">Profile Picture</label>
                                                        <div class="col-sm-4">
                                                            <input type="file" name="parents_picture" id="pic" class="form-control" onchange="loadFile(event)" accept="image/*">
                                                        </div>
                                                        <label class="col-sm-2 control-label"></label>
                                                        <div class="col-sm-4">
                                                            <img id="output" class="img-circle" style="width:110px;">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Status</label>
                                                        <div class="col-sm-4">
                                                            <select name="status" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                                <option value="Active">Active</option>
                                                                <option value="Deactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">&nbsp;</label>
                                                        <div class="col-sm-4">
                                                            <input type="submit" id="save" class="btn btn-info btn-fill center" value="CREATE">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                </form>
                        </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
	
	$.validator.addMethod("alphabetsnspace", function(value, element) {
       return this.optional(element) || /^[a-zA-Z\. ]*$/.test(value);
    });
	
	$('#parentform').validate({
	rules: {
		admission_no:{required:true},
		relationship: {required: true},
		name:{required:true,alphabetsnspace: true }, 
		pmobile:{required:true,maxlength:10,minlength:10,number:true,
		remote: {
			url: "<?php echo base_url(); ?>parents/check_pmobile_number/",
			type: "post"
			}
		},
		smobile:{required:false,maxlength:10,minlength:10,number:true,notEqualTo: "#pmobile"},
		pemail:{required:true,email:true,
		remote: {
			url: "<?php echo base_url(); ?>parents/check_pemail_id/",
			type: "post"
			}
		},
		semail:{required:false, email:true,notEqualTo: "#pemail"},
		occupation:{required:false,alphabetsnspace: true }, 
		income:{required:false,maxlength:10,number:true},
		home_phone:{required:false,maxlength:14,minlength:6,number:true},
		office_phone:{required:false,maxlength:14,minlength:6,number:true},
		},
	messages: {
			relationship:{required: "Please choose an option!"},
			name: {
				  required: "This field cannot be empty!",
				  alphabetsnspace: "Please enter only alphabet"
				},
			pmobile:{required:"This field cannot be empty!",remote:"Mobile number already exist"},
			smobile:{notEqualTo : "Please check your mobile"},
			pemail:{required:"This field cannot be empty!",remote:"Email already exist"},
			semail:{notEqualTo : "Please check your email"},
			occupation: {
				  alphabetsnspace: "Please enter only alphabet"
			}
		}
	});  
	
	
	
</script>
<script type="text/javascript">
    function checkrelationfun() {
        var val=$('#relationship').val();

        var sid = document.getElementById('stuid').value;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/checkrelation',
            data: 'relation=' + val + '&aid=' + sid,
            success: function(test) {
                if (test == "Relation already Added") {
                    $("#msg").html(test);

                } else {
                    $("#msg").html(test);

                }

            }
        });
    }




</script>
