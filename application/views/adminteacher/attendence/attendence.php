
<div class="main-panel">
<div class="content">
       <div class="container-fluid">
         <div class="col-md-12">

<div class="col-md-8">
  <?php  if($status=="success"){ ?>
                   <div class="card">
                       <div class="header">
                           Take Attendance
                       </div>
                       <?php

                        if(empty($res)){   ?>
                           <p class="text-center" style="margin-top:20px;">No Record Found</p> <style>#submit{display: none;}</style>
                      <?php     }else{ ?>
                        <hr>

                     <div class="fresh-datatables">
                         <form action="" method="post" enctype="multipart/form-data" id="takeattendence">
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <th>S. No</th>
                                       <th>Name</th>
                                       <th>Status</th>
                                   </tr>
                               </thead>
                               <tbody>
                                 <?php  $i=1;
                                 foreach($res as $rows){
                                    ?>
                                   <tr>
                                       <td><?php echo $i;  ?></td>
                                       <input type="hidden" name="student_count" value="<?php echo count($res); ?>">
         <td><?php echo $rows->name;  ?>
         <input type="hidden" name="student_id[]" value="<?php echo $rows->enroll_id; ?>">
         <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
          <input type="hidden" name="user_id" value="<?php echo $user_id=$this->session->userdata('user_id'); ?>">

                                       </td>
                                       <td><select name="attendence_val[]">
                                         <option value="P,<?php echo $rows->enroll_id; ?>,<?php
 $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
 echo $dateTime->format("A");
 ?>">Present</option>
                                        <option value="A,<?php echo $rows->enroll_id; ?>,<?php
$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $dateTime->format("A");
?>">Absent</option>
                                        <option value="L,<?php echo $rows->enroll_id; ?>,<?php
$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $dateTime->format("A");
?>">Leave</option>
                                        <option value="OD,<?php echo $rows->enroll_id; ?>,<?php
$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $dateTime->format("A");
?>">On Duty</option>
                                       </select>
                                       </td>
                                        <!-- <td>
                                           <div class="switch"
                                                data-on-label=""
                                                data-off-label="">
                                                <input type="checkbox" name="attendence_val[]" value="A,<?php echo $rows->enroll_id; ?>,<?php
$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $dateTime->format("A");
?>"/>
                                           </div>
                                       </td> -->
                                   </tr>

                            <?php
                            $i++; } }

                            ?>

                               </tbody>

                           </table>
                          <button type="button"   class="btn btn-warning btn-fill btn-wd pull-right"  id="submit" style="margin-top:20px;width:150px;" onclick="submitAttendence()">
                        Submit </button>
                         </form>

                       </div>
                   </div>
                   <?php  } else{  ?>
                     <div class="card-header" data-background-color="purple">
	                        <h4 class="title">Sorry</h4>
	                        <p class="category"><?php echo "Attendance already taken for this class"; ?> </p>
	                    </div>

                  <button onclick="history.go(-1);" class="btn btn-wd btn-default" style="margin-top:0px;">BACK</button>
                  <?php  } ?>
               </div>

               </div>
            </div>
        </div>
     </div>


<script type="text/javascript">
$('#attendmenu').addClass('collapse in');
$('#atten').addClass('active');
$('#atten1').addClass('active');

function submitAttendence(){
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
           url: "<?php echo base_url(); ?>teacherattendence/take_attendence",
            type:'POST',
           data: $('#takeattendence').serialize(),
           success: function(response) {
             //alert(response);
               if(response=="success"){
                //  swal("Success!", "Thanks for Your Note!", "success");
                  $('#takeattendence')[0].reset();
                  swal({
           title: "Done!",
           text: "Attendance submitted",
           type: "success"
       }, function() {
           window.location = "<?php echo base_url(); ?>teacherattendence/view";
       });
               }else{
                 sweetAlert("Oops...", response, "error");
               }
           }
       });
     }else{
         swal("Cancelled", "Process Cancel :)", "error");
     }
   });


}
</script>
