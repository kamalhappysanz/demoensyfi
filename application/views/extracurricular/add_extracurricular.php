<div class="main-panel">
	<div class="content">
	
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Create Co-curricular Activity</h4>
                       </div>
						<div class="content">
                           <form method="post" action="<?php echo base_url(); ?>extracurricular/create_extracurricular" class="form-horizontal" enctype="multipart/form-data" id="activitiesformsection" name="activitiesformsection">
						
							<div class="form-group">
								
								<label class="col-sm-2 control-label">Activity <span class="mandatory_field">*</span></label>
								<div class="col-sm-3">
								 <input type="text" name="ext_name" class="form-control" value="" maxlength="30">
								</div>
								
								<label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
								<div class="col-sm-3">
								<select name="status"  class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
									  <option value="Active">Active</option>
									  <option value="Deactive">Inactive</option>
								</select>
								</div>
								
								<div class="col-sm-2">
										<input type="submit" id="save" class="btn btn-info btn-fill center"  value="CREATE">
								</div>
							</div>
							 </form>		
						</div>
					</div>

				 </div>
		   </div>
	   </div>
				   

	   
<?php if($this->session->flashdata('msg')): ?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
×</button> <?php echo $this->session->flashdata('msg'); ?>
</div>
<?php endif; ?>

       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                <h4 class="title">Co-curricular Activities</h4> <br>
                                <div class="fresh-datatables">
                          <table id="bootstrap-table" class="table">
                              <thead>
                                <th>S.no</th>
                                <th>Activities Name</th>
								                <th>Status</th>
                                <th class="disabled-sorting text-right">Actions</th>
                              </thead>
                              <tbody>
                                <?php
                                  $i=1;
                                  foreach($result as $rows){$stu=$rows->status;
                                ?>
                                  <tr>
                                    <td><?php  echo $i; ?></td>
                                    <td><?php  echo $rows->extra_curricular_name; ?></td>

									 <td><?php
										  if($stu=='Active'){?>
											<button class="btn btn-success btn-fill btn-wd">Active</button>
										 <?php  }else{?>
										  <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
										  <?php } ?></td>
                                    <td class="text-right">
                                      <a rel="tooltip" title="Edit" href="<?php echo base_url(); ?>extracurricular/edit_activities/<?php echo $rows->id; ?>" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
                                    </td>
                                  </tr>
							                  <?php $i++;   } ?>
                              </tbody>
                          </table>
                        </div>
                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->
            </div>
        </div>
		
   </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
$('#mastersmenu').addClass('collapse in');
$('#master').addClass('active');
$('#curricular1').addClass('active');

   $('#activitiesformsection').validate({ // initialize the plugin
       rules: {
           ext_name:{required:true },
  		     status:{required:true }
       },
       messages: {
             ext_name:"This field cannot be empty!",
  		       status:"Please choose an option!"
          }
   });
});
$('#bootstrap-table').DataTable();


</script>
