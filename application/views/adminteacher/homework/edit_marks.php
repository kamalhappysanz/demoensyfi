<div class="main-panel">
   <div class="content">
      <div class="col-md-12">
         <!-- end card -->
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
				   <?php foreach ($result as $rows)
                        {} ?>
                     <?php
                        $subname=$rows->subject_name;
						$cname=$rows->class_name;
						$sename=$rows->sec_name;?>
                     <h4 class="title">Edit Marks <?php echo $cname ;?> - <?php echo $sename;?> <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" >BACK</button></h4>
                    
                     <p class="category"><b>Subject </b>- <?php echo $subname ;?> </br>
                     </p>
                  </div>
                  <div class="content">
                     <table class="table">
                        <thead>
                           <th style="font-size:15px;font-weight:bold;width:10%">S.No</th>
                           <th style="font-size:15px;font-weight:bold;width:40%">Name</th>
                           <th style="font-size:15px;font-weight:bold;width:25%">Marks</th>
                           <th style="font-size:15px;font-weight:bold;width:25%">Comments</th>
                        </thead>
                        <form method="post" action="<?php echo base_url(); ?>homework/update" class="form-horizontal" enctype="multipart/form-data" id="markform">
                           <tbody>
                              <?php $i=1;
                                 foreach ($result as $rows)
                                 {
                                 ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $rows->name; ?>
                                    <input type="hidden" name="enroll[]" value="<?php echo $rows->enroll_mas_id;?>"/>
                                    <input type="hidden" name="hwid" value="<?php echo $rows->hw_mas_id;?>"/>
                                 </td>
                                 <td style="width:20%;">
                                    <input type="text" name="marks[]" value="<?php echo $rows->marks; ?>" class="form-control"/>
                                 </td>
                                 <td> <textarea name="remarks[]" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="1" cols="2"><?php echo $rows->remarks; ?></textarea></td>
                                 <td></td>
                              </tr>
                              <?php $i++;  }?>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><button type="submit" id="save" class="btn btn-info btn-fill" style="cursor:pointer;float:right;">SAVE</button></td>
                              </tr>
                           </tbody>
                        </form>
                     </table>
                  </div>
               </div>
            </div>
            <!-- end col-md-12 -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
   };
   
   
   $(document).ready(function () {
   
   	$('#homeworkmenu').addClass('collapse in');
   	$('#home').addClass('active');
   	$('#home1').addClass('active');
    $('#admissionform').validate({ // initialize the plugin
        rules: {
   
            name:{required:true }, address:{required:true },
            email:{required:true,email:true
            },
            sex:{required:true },
            dob:{required:true },
            age:{required:true,number:true,maxlength:2 },
            nationality:{required:true },
            religion:{required:true },
            community_class:{required:true },
            community:{required:true },
   
            mobile:{required:true }
   
        },
        messages: {
   
              address: "Enter Address",
              admission_date: "Select Admission Date",
              name: "Enter Name",
               email: "Enter Email Address",
                remote: "Email already in use!",
              sex: "Select Gender",
              dob: "Select Date of Birth",
              age: "Enter AGE",
              nationality: "Nationality",
              religion: "Enter the Religion",
              community:"Enter the Community",
              community_class:"Enter the Community Class",
              mother_tongue:"Enter The Mother tongue",
              mobile:"Enter the mobile Number"
   
            }
    });
   });
   
</script>
<script type="text/javascript">
   function checkMailStatus(){
       //alert("came");
   var email=$("#email").val();// value in field email
   alert(email);
   $.ajax({
           type:'post',
           url:'check_email',// put your real file name
           data:{email: email},
           success:function(msg){
           alert(msg); // your message will come here.
           }
    });
   }
   
   
   
</script>

