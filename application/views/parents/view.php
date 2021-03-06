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
                                <div class="fresh-datatables">
                                  <h4 class="title">List of Parents Details </h4> 
								  <hr>
							<table id="example" class="table table-striped table-no-bordered table-hover" cellspacing="0" >
                              <thead>
                                <th>ID</th>
                                <th>Parents Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
								<th>Status</th>
								<th>Actions</th>
                              </thead>
                              <tbody>
                                <?php
								//print_r($result);
                                $i=1;
                                foreach ($result as $rows)
								 {
									 $stu=$rows->status;
									 $stuid=$rows->admission_id;
									 $priority=$rows->primary_flag;
                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->name; ?></td>
                                    <td><?php echo $rows->email; ?></td>
                                    <td><?php echo $rows->mobile; ?></td>
									<td><?php
									  if($stu=='Active'){?>
									   <button class="btn btn-success btn-fill btn-wd">Active</button>
									 <?php  }else{?>
									  <button class="btn btn-danger btn-fill btn-wd">Inactive</button><?php }
									 ?></td>
									 <td>
									 <?php if (trim($rows->mobile)!=''){ ?>
										<a onclick="return confirm('User Password Reset.. Are you sure?')" href="<?php echo base_url(); ?>parents/send_request/<?php echo $rows->id; ?>" rel="tooltip" title="" class="open-AddBookDialog btn btn-simple btn-warning btn-icon edit" data-original-title="Resend login details" style="font-size:18px;">
										<i class="fa fa-paper-plane"> </i></a>
									 <?php } ?>
                                    </td>
                                    <!-- <td>
                                      <a href="<?php echo base_url(); ?>parents/edit_parents/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                    </td>-->
                                  </tr>
									 <?php $i++;  }  ?>
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
function myFunction() {
  confirm("Press a button!");
}

$(document).ready(function() {
   $('#admissionmenu').addClass('collapse in');
       $('#admission').addClass('active');
       $('#admission3').addClass('active');

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
				 searchPlaceholder: "Search Parents",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "25%" },
					{ "width": "25%" },
					{ "width": "25%" },
					{ "width": "10%" },
					{ "width": "8%" }
				  ]
         }); 

	});

</script>
