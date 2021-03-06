
<div class="main-panel">
     
      <div class="content">
         <div class="container-fluid">
          <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
         ×</button>
         <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php endif; ?>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                     <h4 class="title">Exam Details For <?php if(empty($view_details)){ }else{
                      foreach ($view_details as $rows)
                      {}
                      echo '<b>'; echo $rows->class_name;
                      echo $rows->sec_name; echo' ('; echo $rows->exam_name; echo') '; echo '</b>'; }?></h4>
                  </div>
				  <hr>
                     <div class="content">
                  <div class="fresh-datatables">
                    
           <table id="bootstrap-table" class="table">
              <thead>
                 <th data-field="id">S. No</th>
                 <th data-field="name" data-sortable="true"> Subject</th>
                 <th data-field="edate" data-sortable="true">Date</th>
                 <!--th data-field="section"  data-sortable="true">Class/Section</th-->
                 <th data-field="total"  data-sortable="true">Total</th>
                 <th data-field="internal"  data-sortable="true">Internal</th>
                 <th data-field="external"  data-sortable="true">External</th>
                 <th data-field="teacher"  data-sortable="true">Teacher</th>
                 <th data-field="Status"  data-sortable="true">Status</th>
                 <th>Action</th>
              </thead>
              <tbody>
                 <?php
                    $i=1;
                    if(!empty($view_details)){
                    //print_r($result);
                    foreach ($view_details as $rows)
                    {
                    $exid=$rows->exam_id;
                    $inex=$rows->is_internal_external ;  ?>
                 <tr>
                    <td>
                       <?php echo $i; ?>
                    </td>
                    <td>
                       <?php echo $rows->subject_name; ?>
                    </td>
                    <td>
                       <?php $date=date_create($rows->exam_date);
                          echo date_format($date,"d-m-Y");  ?> (<?php echo $rows->times; ?> )
                    </td>
                    <!--td>
                       <?php echo $rows->class_name;?>
                       <?php echo $rows->sec_name; ?> (<?php  echo $rows->exam_name;?>)
                    </td-->
                    <td><?php echo $rows->subject_total;?></td>
                    <?php if($inex==1){ ?>
                    <td><?php echo $rows->internal_mark;?></td>
                    <td><?php echo $rows->external_mark;?></td>
                    <?php }else{?>
                    <td><?php echo'<span style="color:#d6dcd5;">'; echo 'No'; echo'</span>';?></td>
                    <td><?php echo'<span style="color:#d6dcd5;">'; echo 'No'; echo'</span>'; ?></td>
                    <?php } 
                       $id=$rows->teacher_id;
                       if(!empty($id)){
                       $query = "SELECT teacher_id,name FROM edu_teachers WHERE teacher_id='$id' ";
                       $resultset = $this->db->query($query);
                       $res=$resultset->result();
                       $name=$res[0]->name;
                       }else{ echo ""; }
                       ?>
                    <td>
                       <?php if(!empty($id)){ echo $name; }else{ echo"No"; }?>
                    </td>
                    <td>
                       <?php $sta=$rows->status;
                          if($sta=='Active'){?>
                       <button class="btn btn-success btn-fill btn-wd">Active</button>
                       <?php  }else{?>
                       <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
                       <?php } ?>
                    </td>
                    <td>
                       <a href="<?php echo base_url(); ?>examination/edit_exam_details/<?php echo $rows->exam_detail_id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                    </td>
                 </tr>
                 <?php $i++;  }
                    } ?>
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

<script type="text/javascript">

   $('#bootstrap-table').DataTable();
   
   $().ready(function() {
	   $('#exammenu').addClass('collapse in');
	   $('#exam').addClass('active');
	   $('#exam2').addClass('active');
   
  
   $('.datepicker').datetimepicker({
	   format: 'DD-MM-YYYY',
	   icons: {
	   time: "fa fa-clock-o",
	   date: "fa fa-calendar",
	   up: "fa fa-chevron-up",
	   down: "fa fa-chevron-down",
	   previous: 'fa fa-chevron-left',
	   next: 'fa fa-chevron-right',
	   today: 'fa fa-screenshot',
	   clear: 'fa fa-trash',
	   close: 'fa fa-remove'
	}
   });
   
   });
   
</script>

