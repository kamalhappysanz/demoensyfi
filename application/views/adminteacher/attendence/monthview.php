<div class="main-panel">
<div class="content">
       <div class="container-fluid">
         <div class="col-md-12">

                        <div class="card">
                            <div class="header">Select Class</div>
                            <div class="content">

                              <div class="row">
                            <?php

                              if(empty($res)){   ?>
                              <div class="col-md-3">  <p>NO Records Found</p></div>
                                <?php  }  else{  foreach($res as $rows) { ?>
                                <?php
                                 ?>
                             <div class="col-md-3">
                                   <a href="<?php echo  base_url(); ?>teacherattendence/month/<?php echo $rows->class_master_id; ?>" class="btn btn-wd"><?php echo $rows->class_name."-".$rows->sec_name; ?></a></div>


                            <?php  } }  ?>
                            </div>
                            </div>


                        </div> <!-- end card -->

          </div>
       </div>
   </div>
</div>

<script type="text/javascript">


$('#attendmenu').addClass('collapse in');
$('#atten').addClass('active');
$('#atten3').addClass('active');

</script>
