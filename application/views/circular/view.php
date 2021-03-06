<style>

.trheight{
	height: 50px;
}
</style>
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
                        <h4 class="title">Circular Details</h4>

						<fieldset>
                           <div class="form-group">
						     <div class="content">
                                <ul role="tablist" class="nav nav-tabs" style="border-bottom: none;padding-left:165px;">
                                    <li class="active">
                                        <a href="#Teachers" class="btn btn-info btn-fill"  id="teacher" data-toggle="tab" style="cursor:pointer;">Teachers</a>
                                    </li>
                                    <li>
                                        <a href="#Students"  class="btn btn-info btn-fill" id="classes" data-toggle="tab" style="cursor:pointer;">Students</a>
                                    </li>
                                    <li>
                                        <a href="#Parents" class="btn btn-info btn-fill" id="parents" data-toggle="tab" style="cursor:pointer;">Parents</a>
                                    </li>
									 <li>
                                        <a href="#bmember" class="btn btn-info btn-fill" id="parents" data-toggle="tab" style="width:150px;cursor:pointer;">Board Members</a>
                                    </li>
                                </ul>
                            </div>
                           </div>
                        </fieldset>

						 <!--fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-6">
							   <button type="button" id="teacher" onclick="myFunction()" class="btn btn-info btn-fill ">Teachers</button>
							   <button type="button" id="classes" onclick="myFunction1()" class="btn btn-info btn-fill ">Parents</button>
							   <button type="button" id="parents" onclick="myFunction2()" class="btn btn-info btn-fill ">Students</button>
                              </div>
                           </div>
                        </fieldset-->
							<!-- Parents---->
                   <div class="tab-content">
				   
				   <!-- Teachers---->
               <div id="Teachers" class="tab-pane  active">
                        <div class="fresh-datatables">
                            <table id="bootstrap-table2" class="table">
                              <thead>
                                 <th class="text-left">S.No</th>
                                 <th class="text-left" data-sortable="true">Target</th>
                                 <th class="text-left" data-sortable="true">Title</th>
                                 <th class="text-left" data-sortable="true">Sent Via</th>
								 <th class="text-left" data-sortable="true">Status</th>
                                 <th class="text-left" data-sortable="true">Date</th>
                              </thead>

                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($teachers as $rows) {
									$type=$rows->user_type;
									if($type==2){
									?>
                                 <tr class="trheight">
                                    <td class="text-left"><?php echo $i; ?></td>
                                    <td class="text-left"><?php echo $rows->name;  ?></td>
                                   <td class="text-left"><?php echo $rows->circular_title;?></td>

									 <td class="text-left"><?php echo $rows->circular_type;?></td>
									  <td class="text-left"><?php echo $rows->status;?></td>
                                    <td class="text-left"><?php $date=date_create($rows->circular_date);
                                       echo date_format($date,"d-m-Y");
                                       ?></td>
                                 </tr>
									<?php $i++;  } }  ?>
                              </tbody>
                           </table>
                        </div>
				</div>
				
				
				
				     <div id="Students" class="tab-pane">
                        <div class="fresh-datatables">

                                  <table id="bootstrap-table1" class="table">
                              <thead>
                                <th class="text-left">S.No</th>
                                 <th class="text-left" data-sortable="true">Target</th>
                                 <th class="text-left" data-sortable="true">Title</th>
                                 <th class="text-left" data-sortable="true">Sent Via</th>
								 <th class="text-left" data-sortable="true">Status</th>
                                 <th class="text-left" data-sortable="true">Date</th>
                              </thead>
<tbody>
                                 <?php
                                    $i=1;
                                    foreach ($students as $rows) {
									$type=$rows->user_type;
									$cls=$rows->class_id;
									$query="select cm.class_sec_id,cm.class,cm.section,c.class_name,s.sec_name FROM edu_classmaster AS cm,edu_class AS c,edu_sections AS s WHERE cm.class_sec_id='$cls' AND c.class_id=cm.class AND s.sec_id=cm.section";
								   $result1=$this->db->query($query);
								   $result2= $result1->result();
								   foreach($result2 as $cls_sec){}
								   $cs=$cls_sec->class_name;
								   $se=$cls_sec->sec_name;
									if($type==3){
									?>
                                 <tr class="trheight">
                                    <td class="text-left"><?php echo $i; ?></td>
                                     <td class="text-left"><?php echo $cs; ?> <?php echo $se; ?></td>
                                   <td class="text-left"><?php echo $rows->circular_title;?></td>

									 <td class="text-left"><?php echo $rows->circular_type;?></td>
									  <td class="text-left"><?php echo $rows->status;?></td>
                                    <td class="text-left"><?php $date=date_create($rows->circular_date);
                                       echo date_format($date,"d-m-Y");
                                       ?></td>
                                 </tr>
									<?php $i++;  } }  ?>
                              </tbody>
                              
                           </table>


						   </div>
                        </div>

						


                      <div id="Parents" class="tab-pane">
                        <div class="fresh-datatables">
                           <table id="bootstrap-table3" class="table">
                              <thead>
                                <th class="text-left">S.No</th>
                                <th class="text-left" data-sortable="true">Target</th>
                                 <th class="text-left" data-sortable="true">Title</th>
                                 <th class="text-left" data-sortable="true">Sent Via</th>
								 <th class="text-left" data-sortable="true">Status</th>
                                 <th class="text-left" data-sortable="true">Date</th>
                              </thead>

								<tbody>
                                 <?php
                                    $i=1;
                                    foreach ($parents as $rows1) {
									$type=$rows1->user_type;
									$cls=$rows1->class_id;
									$query="select cm.class_sec_id,cm.class,cm.section,c.class_name,s.sec_name FROM edu_classmaster AS cm,edu_class AS c,edu_sections AS s WHERE cm.class_sec_id='$cls' AND c.class_id=cm.class AND s.sec_id=cm.section";
								   $result1=$this->db->query($query);
								   $result2= $result1->result();
								   foreach($result2 as $cls_sec){}
								   $cs=$cls_sec->class_name;
								   $se=$cls_sec->sec_name;
									if($type==4){
									?>
                                 <tr class="trheight">
                                    <td class="text-left"><?php echo $i; ?></td>
                                    <td class="text-left"><?php echo $cs; ?> <?php echo $se; ?></td>
                                   <td class="text-left"><?php echo $rows1->circular_title;?></td>
									 <td class="text-left"><?php echo $rows1->circular_type;?></td>
									  <td class="text-left"><?php echo $rows1->status;?></td>
                                    <td class="text-left"><?php $date=date_create($rows1->circular_date);
                                       echo date_format($date,"d-m-Y");
                                       ?></td>
                                 </tr>
									<?php $i++;  } }  ?>
                              </tbody>
                              
                           </table>
                        </div>
				</div>


				<!-- Board Members---->
                      <div id="bmember" class="tab-pane">
                        <div class="fresh-datatables">
                           <table id="bootstrap-table3" class="table">
                              <thead>
                                <th class="text-left">S.No</th>
                                <th class="text-left" data-sortable="true">Target</th>
                                 <th class="text-left" data-sortable="true">Title</th>
                                 <th class="text-left" data-sortable="true">Sent Via</th>
								 <th class="text-left" data-sortable="true">Status</th>
                                 <th class="text-left" data-sortable="true">Date</th>
                              </thead>

                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($bmembers as $rows) {
									$type=$rows->user_type;
									/* $cls=$rows->class_id;
									$query="select cm.class_sec_id,cm.class,cm.section,c.class_name,s.sec_name FROM edu_classmaster AS cm,edu_class AS c,edu_sections AS s WHERE cm.class_sec_id='$cls' AND c.class_id=cm.class AND s.sec_id=cm.section";
								   $result1=$this->db->query($query);
								   $result2= $result1->result();
								   foreach($result2 as $cls_sec){}
								   $cs=$cls_sec->class_name;
								   $se=$cls_sec->sec_name; */
									if($type==5){
									?>
                                 <tr class="trheight">
                                    <td class="text-left"><?php echo $i; ?></td>
                                     <td class="text-left"><?php echo $rows->name;  ?></td>
                                   <td class="text-left"><?php echo $rows->circular_title;?></td>

									 <td class="text-left"><?php echo $rows->circular_type;?></td>
									  <td class="text-left"><?php echo $rows->status;?></td>
                                    <td class="text-left"><?php $date=date_create($rows->circular_date);
                                       echo date_format($date,"d-m-Y");
                                       ?></td>
                                 </tr>
									<?php $i++;  } }  ?>
                              </tbody>
                           </table>
                        </div>
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
$('#communcicationmenu').addClass('collapse in');
     $('#communication').addClass('active');
     $('#communication2').addClass('active');

	$('#bootstrap-table1').DataTable();
	$('#bootstrap-table2').DataTable();
	$('#bootstrap-table3').DataTable();



</script>
