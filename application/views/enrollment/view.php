<style>
.formdesign
{
	padding-bottom: 48px;
    padding-top: 10px;
    background-color: rgba(209, 209, 211, 0.11);
    border-radius: 12px;
}
</style>
<?php  
foreach ($result as $rows) {
		$search_year = $rows->admit_year;
		$class_id = $rows->class_sec_id;
		$status = $rows->static_value;
 } 
 if ($status == 'Y'){
		 $class_sec_id = $class_id;
 }else{
		 $class_sec_id = "";
 }
 
 ?>
<div class="main-panel">
   <div class="content">
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
                        <h4 class="title" style="padding-bottom: 20px;">Students Allocated to Classes</h4>

						<form method="post" action="<?php echo base_url(); ?>enrollment/view" class="form-horizontal" enctype="multipart/form-data" id="search_year" name="search_year">
                        <fieldset>
                           <div class="form-group">
                              <div class="col-sm-4">
                                 <select name="ace_year" id="ace_year"  required class="selectpicker" >
								  <option value="">Select Year</option>
                                    <?php foreach($ace_years as $rows)
                                       {
                                       $fyear=$rows->from_month;
                                       $month= strtotime($fyear);

                                       $eyear=$rows->to_month;
                                       $month1= strtotime($eyear);
                                    ?>
                                    <option value="<?php  echo $rows->year_id; ?>"><?php  echo  date('Y',$month); ?> (To) <?php  echo  date('Y',$month1); ?></option>
                                    <?php } ?>
                                 </select><script language="JavaScript">document.search_year.ace_year.value="<?php echo $search_year; ?>";</script>
                              </div>
							<div class="col-sm-2">
                                  <select name="class_sec_id" id="class_sec_id" class="selectpicker" >
									<option value="">Select Class</option>
                                    <?php foreach($classes as $rows) { ?>
                                    <option value="<?php  echo $rows->class_id; ?>"><?php echo $rows->class_name; ?> <?php echo $rows->sec_name ; ?></option>
                                    <?php } ?>
                                 </select><script language="JavaScript">document.search_year.class_sec_id.value="<?php echo $class_sec_id; ?>";</script>
                              </div>
                              <div class="col-sm-4">
                                  <button type="submit" id="search" class="btn btn-info btn-fill center" style="cursor:pointer;">Search </button>
                              </div>
                           </div>
                        </fieldset>
                     </form>
					 <hr>
                      <table id="example" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                              <thead>
                                 <th>S.No</th>
                                 <th>Name</th>
                                 <th>Admission No</th>
                                 <th>Blood Group</th>
                                 <th>Class-Section</th>
                                 <th>Reg. Date</th>
                                 <th>Status</th>
                                 <th>Actions</th>
                              </thead>
                              <tbody>
                          <?php
							$i=1;
                          foreach ($result as $rows) {
                          $stu=$rows->status;

                          ?>
                       <tr>
                          <td><?php echo $i; ?></td>
                          <?php
						  /* foreach ($year as $row)
                             {
                                 $fyear=$row->from_month;
                                 $month= strtotime($fyear);
                                 $eyear=$row->to_month;
                                 $month1= strtotime($eyear);
                             } */
                             ?>

                          <td><?php echo $rows->name; ?></td>
                          <td><?php echo $rows->admisn_no; ?></td>
                          <td><?php echo $rows->blood_group_name; ?></td>
                          <td><?php echo $rows->class_name; echo "--"; echo $rows->sec_name; ?></td>
                          <td><?php $date=date_create($rows->admit_date);
                             echo date_format($date,"d-m-Y"); ?></td>
                          <td><?php
                             if($stu=='Active'){?>
                             <button class="btn btn-success btn-fill btn-wd">Active</button>
                             <?php  }else{?>
                             <button class="btn btn-danger btn-fill btn-wd">Inactive</button><?php }
                                ?>
                          </td>
                          <td>
                             <a href="<?php echo base_url(); ?>admission/get_ad_id1/<?php echo $rows->admission_id; ?>" rel="tooltip" title="View Student Profile" class="btn btn-simple btn-info btn-icon table-action view" href="javascript:void(0)" style="cursor:pointer;">
                             <i class="fa fa-address-card-o" aria-hidden="true"></i>
                             </a>
                             <a href="<?php echo base_url(); ?>enrollment/edit_enroll/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Edit Class Allocation" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
                          </td>
                       </tr>
									<?php $i++;  }  ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- end content-->
                  </div>
                  <!--  end card  -->
               </div>
               <!-- end col-md-12 -->
            </div>
            <!-- end row -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
			jQuery('#enrollmentmenu').addClass('collapse in');
            $('#enroll').addClass('active');
            $('#enroll2').addClass('active');

		$('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                 {
                     extend: 'excelHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 },
                 {
                     extend: 'pdfHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 }
             ],
             "pagingType": "full_numbers",
			 "ordering": false,
             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             responsive: true,
             language: {
				 search: "_INPUT_",
				 searchPlaceholder: "Search Students",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "25%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "8%" }
				  ]
         }); 
	});


</script>
