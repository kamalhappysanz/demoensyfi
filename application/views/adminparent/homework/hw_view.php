<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">

						 <div class="header">
                                <h4 class="title">Homeworks and Class Tests<button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" >BACK</button></h4>
                            </div>
					<hr>
                    <div class="content">
                     <div class="fresh-datatables">
                       <table id="bootstrap-table" class="table">
                           <thead>
                              <th>S.no</th>
                              <th>Teacher</th>
                              <th>Subject</th>
                              <th>Work</th>
                              <th>Title</th>
                              <th>Date</th>
                              <th>Status </th>
                           </thead>
                           <tbody>
                              <?php
							  //print_r($result);
							  if(empty($result)){echo "Homework Doesn't Add";}else{
							  foreach($stu_id as $sid){}
							  $stu_id=$sid->enroll_id;
							   //$stu_id=$this->input->get('var');
							  //echo $stu_id;
                                 $i=1;
                                 foreach ($result as $rows)
								 {
                                 $type=$rows->hw_type;
                                 $sta=$rows->mark_status;
								 $hw=$rows->hw_type;
                                  ?>
                              <tr>
                                 <td><?php   echo $i; ?></td>
                                <td>
                                    <?php
                                       $id=$rows->teacher_id;
                                       $query="SELECT name,teacher_id FROM edu_teachers WHERE teacher_id='$id'";
                                       $resultset=$this->db->query($query);
                                       $row=$resultset->result();
                                       foreach($row as $row1){}
                                       $tname=$row1->name;
                                       echo $tname; ?>
							  </td>
                                 <td><?php $su=$rows->subject_id;
                                       $sub="SELECT * FROM edu_subject WHERE subject_id='$su'";
                                       $result=$this->db->query($sub);
                                       $row2=$result->result();
                                       foreach($row2 as $row3){}
                                       $subname=$row3->subject_name;
                                       echo $subname;

								 ?></td>
                                 <td><?php if($hw=="HT")
								 {echo "Class Test";}else{ echo "Home Work";}?></td>
                                 <td><?php echo $rows->title; ?></td>

									<td class="datewidth"><?php if($hw=="HT"){ $date=date_create($rows->test_date);
                                    echo date_format($date,"d-m-Y");}else{ $duedate=date_create($rows->due_date);
                                    echo date_format($duedate,"d-m-Y"); }
									 ?></td>
                                 
                                 <td>
                                    <?php if($sta==0 && $type=="HT")
                                       { ?>
                                    <a href="" rel="tooltip" title="Doesn't Add Mark Details" class="btn btn-simple btn-info btn-icon table-action view" style="font-size:18px;">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i></a>
                                    <?php }elseif($sta==1){?> <a href="<?php echo base_url();?>adminparent/view_mark?var1=<?php echo $rows->hw_id; ?>&var2=<?php echo $stu_id;?>" title="View marks" rel="tooltip" class="btn btn-simple btn-warning btn-icon edit" style="color:red;font-size:18px;"><i class="fa fa-id-card-o" aria-hidden="true"></i></a>	<?php }?>

                                 </td>
                              </tr>
                              <?php $i++;  }  }?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  </div>
               </div>
            </div> <!-- row -->
         </div>

      </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
   $('#homework').addClass('collapse in');
   $('#homework').addClass('active');
   $('#homework').addClass('active');
   
   });


  $('#bootstrap-table').DataTable({	});

</script>
