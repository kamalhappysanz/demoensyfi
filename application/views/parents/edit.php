<div class="main-panel">
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Parents Details</h4>
                </div>
                <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php endif; ?>
                        <div class="content">
                            <form method="post" action="<?php echo base_url(); ?>parents/update_parents" class="form-horizontal" enctype="multipart/form-data" id="parentform" name="parentform">
                                <div class="content">

                                    <ul role="tablist" class="nav nav-tabs" style="border-bottom: none;padding-left:05px;">
                                        <li role="presentation" class="active">
                                            <a href="#father" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;" data-toggle="tab">Father</a>
                                        </li>
                                        <li>
                                            <a href="#mothers" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;" data-toggle="tab">Mother</a>
                                        </li>
                                        <li>
                                            <a href="#guardian" class="btn btn-info btn-fill" style="border-bottom-color:#976dea;" data-toggle="tab">Guardian</a>
                                        </li>
                                        <?php  $s=count($editres);
 									if($s==3){ }else{ //foreach($editres as $prow){} $aid=$prow->admission_id;
									?>
                                            <li style="margin-left:560px;">
                                                <a href="<?php echo base_url(); ?>parents/create_new_parents_details/<?php echo $sid;?>/<?php echo 0;?>" class="btn btn-info btn-fill">Add More Details </a>
                                            </li>
                                            <?php } ?>
                                    </ul>
                                </div>
                                <p id="erid" style="color:red;"></p>
                                <div class="tab-content">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Student Name</label>
                                            <div class="col-sm-4">
                                                <?php
						 foreach($editres as $prow){ }?>
                                                    <select multiple name="stu_name[]" class="selectpicker form-control">
                                                        <?php
									  $tea_name=$prow->	admission_id;
									  $sQuery = "SELECT * FROM edu_admission";
									  $objRs=$this->db->query($sQuery);
									  $row=$objRs->result();
									  foreach ($row as $rows1)
									  {
											 $stu_id= $rows1->admission_id;
											 $sname=$rows1->name;
											 $arryPlatform = explode(",",$tea_name);
											 $sPlatform_id  = trim($stu_id);
											 $sPlatform_name  = trim($sname);
											 if (in_array($sPlatform_id, $arryPlatform ))
											  {
												   echo "<option value=\"$stu_id\" selected/>$sname </option>";
											  }
										}
								?>
                                                    </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div id="father" class="tab-pane active">
                                        <?php 	 foreach($editres as $prow){
                              						   $relation1=$prow->relationship;
                              						    if($relation1=="Father"){
                                                if(empty($prow->id)){
                                                  $fid=" ";
                                                }else{
                                                    $fid=$prow->id;
                                                }
                                                ?>
                                            <input type="hidden" name="admission_no" class="form-control" value="<?php echo $sid; ?>">
                                            <input type="hidden" name="oldstu" class="form-control" value="<?php  echo $sid; ?>">
                                            <input type="hidden" name="morestu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="newstu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="text" name="fid" id="fid" class="form-control" value="<?php  echo $fid; ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Father Name <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="fname" id="fname" placeholder="Enter Name" class="form-control" value="<?php echo $prow->name; ?>">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="flogin" id="flogin" class="selectpicker form-control">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                        <script>$('#flogin').val('<?php echo $prow->primary_flag; ?>');</script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Primary Email <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="fpemail" id="fpemail" value="<?php echo $prow->email; ?>" class="form-control" placeholder="Email Address" onblur="checkemailfun(this.value)" />
                                                  </div>
                                                  <label class="col-sm-2 control-label">Secondary Email</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="fsemail" id="fsemail" class="form-control" value="<?php echo $prow->sec_email; ?>" id="email" placeholder="Email Address" />
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Primary Mobile <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->mobile; ?>" name="fpmobile" id="fpmobile" class="form-control" onblur="fcheckmobilefun(this.value)">

                                                  </div>
                                                  <label class="col-sm-2 control-label">Secondary Mobile</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->sec_mobile; ?>" name="fsmobile" id="fsmobile" class="form-control">
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Occupation</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="foccupation" id="foccupation" placeholder="Occupation" class="form-control" value="<?php echo $prow->occupation; ?>">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Income</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Income" name="fincome" id="fincome" class="form-control" value="<?php echo $prow->income; ?>">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Home Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="fhaddress" id="fhaddress" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80">
                                                            <?php echo $prow->home_address; ?>
                                                        </textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Home Phone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Home Phone" value="<?php echo $prow->home_phone; ?>" name="fhome_phone" id="fhome_phone" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Office Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="foffice_address" id="foffice_address" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80">
                                                            <?php echo $prow->office_address; ?>
                                                        </textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Office Phone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Office Phone" value="<?php echo $prow->office_phone; ?>" name="foffice_phone" id="foffice_phone" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Father Pic</label>
                                                    <div class="col-sm-4">
                                                        <input type="file" name="father_pic" id="fpic" class="form-control" onchange="loadFile(event)" accept="image/*">
                                                        <input type="hidden" name="frelationship" value="<?php echo "Father";?>" readonly class="form-control">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Old Picture</label>
                                                    <div class="col-sm-4">
                                                        <img src="<?php echo base_url(); ?>assets/parents/<?php echo $prow->user_pic; ?>" id="output" class="img-responsive" style="width:110px;">
                                                        <input type="hidden" name="old_father_pic" class="form-control" value="<?php echo $prow->user_pic; ?>">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                        <select name="fstatus" id="fstatus" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive">DeActive</option>
                                                        </select>
                                                        <script language="JavaScript">
                                                            document.parentform.fstatus.value = "<?php echo $prow->status; ?>";
                                                        </script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
                                                        <button type="submit" id="save1" class="btn btn-info btn-fill center">Update Father</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                          <?php } } ?>
                                    </div>
                                    <!-- Mother-->

                                    <div id="mothers" class="tab-pane">
                                        <?php foreach($editres as $prow){
                                         $relation=$prow->relationship;

				                                 if($relation=="Mother"){
                                           if(empty($prow->id)){
                                             $mid="0";
                                           }else{
                                               $mid=$prow->id;
                                           }
                                            ?>
                                            <input type="hidden" name="admission_no" class="form-control" value="<?php echo $sid; ?>">
                                            <input type="hidden" name="oldstu" class="form-control" value="<?php  echo $sid; ?>">
                                            <input type="hidden" name="newstu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="morestu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="text" name="mid" id="mid" class="form-control" value="<?php echo $mid; ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mother Name <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="mname" id="mname" placeholder="Enter Name" class="form-control" value="<?php echo $prow->name; ?>">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="mlogin" id="mlogin" class="selectpicker form-control">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                        <script language="JavaScript">
                                                            document.parentform.mlogin.value = "<?php echo $prow->primary_flag; ?>";
                                                        </script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Primary Email <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="mpemail" id="mpemail" value="<?php echo $prow->email; ?>" class="form-control" placeholder="Email Address" onblur="mcheckemailfun(this.value)" />
                                                  </div>
                                                  <label class="col-sm-2 control-label">Secondary Email</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="msemail" id="msemail" value="<?php echo $prow->sec_email; ?>" class="form-control" placeholder="Email Address" />
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Primary Mobile <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->mobile; ?>" name="mpmobile" id="mpmobile" class="form-control" onblur="mcheckmobilefun(this.value)">
                                                  </div>
                                                  <label class="col-sm-2 control-label">Secondary Mobile</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->sec_mobile; ?>" name="msmobile" id="msmobile" class="form-control">
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Occupation</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="moccupation" id="moccupation" placeholder="Occupation" class="form-control" value="<?php echo $prow->occupation; ?>">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Income</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Income" value="<?php echo $prow->income; ?>" name="mincome" id="mincome" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Home Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="mhaddress" id="mhaddress" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80">
                                                            <?php echo $prow->home_address; ?>
                                                        </textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Home Phone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Home Phone" value="<?php echo $prow->home_phone; ?>" name="mhome_phone" id="mhome_phone" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Office Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="moffice_address" id="moffice_address" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80">
                                                            <?php echo $prow->office_address; ?>
                                                        </textarea>
                                                    </div>

                                                    <label class="col-sm-2 control-label">Office Phone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Office Phone" value="<?php echo $prow->office_phone; ?>" name="moffice_phone" id="moffice_phone" class="form-control">
                                                    </div>

                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Mother Pic</label>
                                                    <div class="col-sm-4">
                                                        <input type="file" name="mother_pic" id="mpic" class="form-control" onchange="loadFile1(event)" accept="image/*">
                                                        <input type="hidden" placeholder="Office Phone" value="<?php echo $prow->relationship; ?>" name="mrelationship" id="mrelationship" class="form-control">

                                                    </div>
                                                    <label class="col-sm-2 control-label">Old Picture</label>
                                                    <div class="col-sm-4">
                                                        <img id="output1" src="<?php echo base_url(); ?>assets/parents/<?php echo $prow->user_pic; ?>" class="img-responsive" style="width:110px;">
                                                        <input type="hidden" name="old_mother_pic" class="form-control" value="<?php echo $prow->user_pic; ?>">
                                                      </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                        <select name="mstatus" id="mstatus" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive">DeActive</option>
                                                        </select>
                                                        <script language="JavaScript">
                                                            document.parentform.mstatus.value = "<?php echo $prow->status; ?>";
                                                        </script>
                                                    </div>

                                                 </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
                                                        <button type="submit" id="save1" class="btn btn-info btn-fill center">Update Mother</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <?php }  } ?>
                                    </div>
                                    <!-- Guardian -->
                                    <div id="guardian" class="tab-pane">
                                        <?php 	foreach($editres as $prow){
                                  					     $relation=$prow->relationship;
                                  						 if($relation=="Guardian"){
                                                 if(empty($prow->id)){
                                                   $gid="";
                                                 }else{
                                                   $gid=$prow->id;
                                                 }
                                  								?>
                                            <input type="hidden" name="admission_no" class="form-control" value="<?php echo $sid; ?>">
                                            <input type="hidden" name="oldstu" class="form-control" value="<?php  echo $sid; ?>">
                                            <input type="hidden" name="newstu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="hidden" name="morestu" class="form-control" value="<?php echo $prow->admission_id; ?>">
                                            <input type="text" name="gid" class="form-control" value="<?php echo $gid; ?>">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Guardian Name <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="gname" id="gname" placeholder="Enter Name" class="form-control" value="<?php echo $prow->name; ?>">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Login <span class="mandatory_field">*</span></label>
                                                    <div class="col-sm-4">
                                                        <select name="glogin" id="glogin" class="selectpicker form-control">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>

                                                        </select>
                                                        <script language="JavaScript">
                                                            document.parentform.glogin.value = "<?php echo $prow->primary_flag; ?>";
                                                        </script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Primary Email <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="gpemail" id="gpemail" value="<?php echo $prow->email; ?>" class="form-control" placeholder="Email Address" onblur="gcheckemailfun(this.value)" />

                                                  </div>
                                                  <label class="col-sm-2 control-label">Secondary Email</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" name="gsemail" value="<?php echo $prow->sec_email; ?>" class="form-control " id="gsemail" placeholder="Email Address" />
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">Primary Mobile <span class="mandatory_field">*</span></label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->mobile; ?>" name="gpmobile" id="gpmobile" class="form-control" onblur="gcheckmobilefun(this.value)">
                                                  </div>
                                                  <label class="col-sm-2 control-label">Secondary Mobile</label>
                                                  <div class="col-sm-4">
                                                      <input type="text" placeholder="Mobile Number" value="<?php echo $prow->sec_mobile; ?>" name="gsmobile" id="gsmobile" class="form-control">
                                                  </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Occupation</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="goccupation" id="goccupation" placeholder="Occupation" class="form-control" value="<?php echo $prow->occupation; ?>">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Income</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Income" value="<?php echo $prow->income; ?>" name="gincome" id="gincome" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Home Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="ghaddress" id="ghaddress" MaxLength="150" placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80">
                                                            <?php echo $prow->home_address; ?>
                                                        </textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Home Phone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Home Phone" value="<?php echo $prow->home_phone; ?>" name="ghome_phone" id="ghome_phone" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Office Address</label>
                                                    <div class="col-sm-4">
                                                        <textarea name="goffice_address" id="goffice_address" MaxLength="150"
                                                        placeholder="MaxCharacters 150" class="form-control" rows="4" cols="80"><?php echo $prow->office_address; ?></textarea>
                                                    </div>
                                                    <label class="col-sm-2 control-label">Office Phone</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Office Phone" value="<?php echo $prow->office_phone; ?>" name="goffice_phone" id="goffice_phone" class="form-control">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Guardian Pic</label>
                                                    <div class="col-sm-4">
                                                        <input type="file" name="guardian_pic" id="gpic" class="form-control" onchange="loadFile2(event)" accept="image/*">
                                                          <input type="hidden" placeholder="Office Phone" value="<?php echo $prow->relationship; ?>" name="grelationship" id="grelationship" class="form-control">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Old Picture</label>
                                                    <div class="col-sm-4">
                                                        <img id="output2" src="<?php echo base_url(); ?>assets/parents/<?php echo $prow->user_pic; ?>" class="img-responsive" style="width:110px;">
                                                        <input type="hidden" name="old_guardian_pic" class="form-control" value="<?php echo $prow->user_pic; ?>">
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                        <select name="gstatus" id="gstatus" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                            <option value="Active">Active</option>
                                                            <option value="Deactive">DeActive</option>
                                                        </select>
                                                        <script language="JavaScript">
                                                            document.parentform.gstatus.value = "<?php echo $prow->status; ?>";
                                                        </script>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">&nbsp;</label>
                                                    <div class="col-sm-4">
                                                        <button type="submit" id="save1" class="btn btn-info  center">Update Guardian</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <?php }
						}?>
                                    </div>

                                </div>
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

    var loadFile1 = function(event) {
        var output1 = document.getElementById('output1');
        output1.src = URL.createObjectURL(event.target.files[0]);
    };

    var loadFile2 = function(event) {
        var output2 = document.getElementById('output2');
        output2.src = URL.createObjectURL(event.target.files[0]);
    };

    function validates() {
        var fname = document.getElementById("fname").value;
        var mname = document.getElementById("mname").value;
        var gname = document.getElementById("gname").value;

        var foccupation = document.getElementById("foccupation").value;
        var moccupation = document.getElementById("moccupation").value;
        var goccupation = document.getElementById("goccupation").value;

        var fincome = document.getElementById("fincome").value;
        var mincome = document.getElementById("mincome").value;
        var gincome = document.getElementById("gincome").value;

        var fhaddress = document.getElementById("fhaddress").value;
        var mhaddress = document.getElementById("mhaddress").value;
        var ghaddress = document.getElementById("ghaddress").value;

        var fstatus = document.getElementById("fstatus").value;
        var mstatus = document.getElementById("mstatus").value;
        var gstatus = document.getElementById("gstatus").value;

        var fpemail = document.getElementById("fpemail").value;
        var mpemail = document.getElementById("mpemail").value;
        var gpemail = document.getElementById("gpemail").value;

        var fpmobile = document.getElementById("fpmobile").value;
        var mpmobile = document.getElementById("mpmobile").value;
        var gpmobile = document.getElementById("gpmobile").value;

        var frelationship = document.getElementById("frelationship").value;
        var mrelationship = document.getElementById("mrelationship").value;
        var grelationship = document.getElementById("grelationship").value;

        var flogin = document.getElementById("flogin").value;
        var mlogin = document.getElementById("mlogin").value;
        var glogin = document.getElementById("glogin").value;

        // if (fname == "" && mname == "" && gname == "") {
        //     $("#erid").html("Please Enter anyone Name");
        //     return false;
        // }
        // if (foccupation == "" && moccupation == "" && goccupation == "") {
        //     $("#erid").html("Please Enter Occupation");
        //     return false;
        // }
        // if (fpemail == "" && mpemail == "" && gpemail == "") {
        //     $("#erid").html("Please Enter Email Id");
        //     return false;
        // }
        // if (fpmobile == "" && mpmobile == "" && gpmobile == "") {
        //     $("#erid").html("Please select priority for login");
        //     return false;
        // }
        // if (frelationship == "" && mrelationship == "" && grelationship == "") {
        //     $("#erid").html("Please select Relationship Of Students");
        //     return false;
        // }
        //
        // if (fincome == "" && mincome == "" && gincome == "") {
        //     $("#erid").html("Please Enter Income");
        //     return false;
        // }
        // if (fhaddress == "" && mhaddress == "" && ghaddress == "") {
        //     $("#erid").html("Please select Home Address");
        //     return false;
        // }
        // if (fstatus == "" && mstatus == "" && gstatus == "") {
        //     $("#erid").html("Please select Status");
        //     return false;
        // }
        //
        // if (flogin == "" && mlogin == "" && glogin == "") {
        //     $("#erid").html("Please select priority for login");
        //     return false;
        // }

    }
</script>
<script type="text/javascript">
    function checkemailfun(val) { //alert("hi");
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/checker',
            data: 'email=' + val,
            success: function(test) {
                if (test == "Email Id already Exit") {
                    $("#msg").html(test);
                    $("#save1").hide();
                } else {
                    $("#msg").html(test);
                    $("#save1").show();
                }

            }
        });
    }

    function mcheckemailfun(val) { //alert("hi");
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/checker',
            data: 'email=' + val,
            success: function(test) {
                if (test == "Email Id already Exit") {
                    $("#mmsg").html(test);
                    $("#save1").hide();
                } else {
                    $("#mmsg").html(test);
                    $("#save1").show();
                }

            }
        });
    }

    function gcheckemailfun(val) { //alert("hi");
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/checker',
            data: 'email=' + val,
            success: function(test) {
                if (test == "Email Id already Exit") {
                    $("#gmsg").html(test);
                    $("#save1").hide();
                } else {
                    $("#gmsg").html(test);
                    $("#save1").show();
                }
            }
        });
    } //gcheckmobilefun

    function fcheckmobilefun(val) {
        //alert('hi');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/cellchecker1',
            data: 'cell=' + val,
            success: function(test) {
                //alert(test)
                if (test == "Mobile Number Available") {
                    $("#fmsg1").html('<span style="color:green;">Mobile Number Available</span>');
                    $("#save1").show();
                } else {
                    $("#fmsg1").html('<span style="color:red;">Mobile number already exit</span>');
                    $("#save1").hide();
                }
            }
        });
    }

    function mcheckmobilefun(val) { //alert('hi');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/cellchecker1',
            data: 'cell=' + val,
            success: function(test) {
                //alert(test)
                if (test == "Mobile Number Available") {
                    $("#mmsg1").html('<span style="color:green;">Mobile Number Available</span>');
                    $("#save1").show();
                } else {
                    $("#mmsg1").html('<span style="color:red;">Mobile number already exit</span>');
                    $("#save1").hide();
                }
            }
        });
    }

    function gcheckmobilefun(val) { //alert('hi');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/cellchecker1',
            data: 'cell=' + val,
            success: function(test) {
                //alert(test)
                if (test == "Mobile Number Available") {
                    $("#gmsg1").html('<span style="color:green;">Mobile Number Available</span>');
                    $("#save1").show();
                } else {
                    $("#gmsg1").html('<span style="color:red;">Mobile number already exit</span>');
                    $("#save1").hide();
                }
            }
        });
    }

    function checkcellfun(val) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>/parents/cellchecker',
            data: 'cell=' + val,
            success: function(test) {
                if (test == "Mobile Number Available") {
                    $("#msg1").html('<span style="color:green;">Mobile Number Available</span>');
                    $("#save").show();
                } else {
                    $("#msg1").html('<span style="color:red;">Mobile Number Not Available</span>');
                    $("#save").hide();
                }
            }
        });
    }

    $('#parentform').validate({

        rules: {
            fid:{required:false},
            fname:{required:true},
            mname:{required:true},
            gname:{required:true},
			fsmobile:{required:false,maxlength:10,minlength:10,number:true},
			fincome:{required:false,maxlength:10,number:true},
			fhome_phone:{required:false,maxlength:10,minlength:10,number:true},
			foffice_phone:{required:false,maxlength:10,minlength:10,number:true},
			msmobile:{required:false,maxlength:10,minlength:10,number:true},
			mincome:{required:false,maxlength:10,number:true},
			mhome_phone:{required:false,maxlength:10,minlength:10,number:true},
			moffice_phone:{required:false,maxlength:10,minlength:10,number:true},
			gsmobile:{required:false,maxlength:10,minlength:10,number:true},
			gincome:{required:false,maxlength:10,number:true},
			ghome_phone:{required:false,maxlength:10,minlength:10,number:true},
			goffice_phone:{required:false,maxlength:10,minlength:10,number:true},
			
            fpmobile:{required:true,maxlength:10,minlength:10,number:true,
              remote: {
                     url: "<?php echo base_url(); ?>parents/check_fpmobile_number_exist/<?php echo $fid; ?>",
                     type: "post"
                  }
                },
            mpmobile:{required:true,maxlength:10,minlength:10,
              remote: {
                     url: "<?php echo base_url(); ?>parents/check_mpmobile_number_exist/<?php echo $mid; ?>",
                     type: "post"
                  }
                },
            gpmobile:{required:true,maxlength:10,minlength:10,
              remote: {
                     url: "<?php echo base_url(); ?>parents/check_gpmobile_number_exist/<?php echo $gid; ?>",
                     type: "post"
                  }
                },
            fpemail:{required:true,email:true,
            remote: {
                     url: "<?php echo base_url(); ?>parents/check_fpemail_id_exist/",
                     type: "post"
                  }
                },
                mpemail:{required:true,email:true,
                remote: {
                         url: "<?php echo base_url(); ?>parents/check_mpemail_id_exist/",
                         type: "post"
                      }
                    },
                    gpemail:{required:true,email:true,
                    remote: {
                             url: "<?php echo base_url(); ?>parents/check_gpemail_id_exist/",
                             type: "post"
                          }
                        }

        },
        messages: {
          fname:{required:"Enter the father name"},
          mname:{required:"Enter the mother name"},
          gname:{required:"Enter the Guardian name"},
          fpmobile:{required:"Enter the mobile number",remote:"Mobile Number Already Exist"},
          mpmobile:{required:"Enter the mobile number",remote:"Mobile Number Already Exist"},
          gpmobile:{required:"Enter the mobile number",remote:"Mobile Number Already Exist"},
          fpemail:{required:"Enter Email Address",remote:"Email Already Exist"},
          mpemail:{required:"Enter Email Address",remote:"Email Already Exist"},
          gpemail:{required:"Enter Email Address",remote:"Email Already Exist"}
            }
    });




</script>
