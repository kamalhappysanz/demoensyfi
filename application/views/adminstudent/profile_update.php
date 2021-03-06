<script src="<?php  echo base_url(); ?>assets/js/croppie.js"></script>
<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/croppie.css" />
<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-8">
               <div class="card">

                  <div class="content">

               <div class=" panel-default">
                   <h4 class="title">Profile Picture</h4>
                   <div class="panel-body">
                     <input type="file" name="upload_image" id="upload_image" />
                     <div id="uploaded_image"></div>
                   </div>
                 </div>
               </div>

		<div id="uploadimageModal" class="modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Upload & Crop Image</h4>
					</div>
					<div class="modal-body">
						<div class="row">
						<div class="col-md-2"></div>
							<div class="col-md-6 text-center">
								  <div id="image_demo" style="width:350px; margin-top:30px"></div>
							</div>
							<div class="col-md-4"></div>
						</div>
						<div class="row">
						<div class="col-md-3"></div>
							<div class="col-md-6 text-center">
								  <button class="btn btn-info btn-fill center crop_image" style="width:170px;cursor:pointer;">Crop & Upload Image</button>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
               </div>
            </div>
<?php foreach ($res as $rows) { } ?>
            <div class="col-md-4">
               <div class="card card-user">
                  <div class="image">
                     <img src="<?php echo base_url(); ?>assets/img/full-screen-image-3.jpg" alt="..." />
                  </div>
                  <div class="content">
                     <div class="author">
                        <a href="#">
                            <?php if(empty($rows->user_pic)){ ?>
                            <img class="avatar border-gray" src="<?php echo base_url(); ?>assets/noimg.png">
                           <?php  }else{ ?>
                        <img class="avatar border-gray" id="output23" src="<?php echo base_url(); ?>assets/students/profile/<?php echo $rows->user_pic; ?>" alt="..."/>
                         <?php } ?>
                        </a>
                        <h4 class="title" style="line-height:20px;"><?php echo $rows->name; ?></h4>
                        <br>
                        <p><a onclick="remove_img()" style="cursor: pointer;">Remove Profile Picture</a>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
function remove_img(){
  $.ajax({
    url:"<?php  echo base_url();  ?>studentprofile/remove_img",
    type: "POST",
    data:{"hi": "response"},
    success:function(data)
    {
      if(data=="success"){
          alert("Profile picture removed");
          window.setTimeout(function(){location.reload()},1000)
      }else{
          alert("Profile picture not found!");
      }
    }
  });
}

$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"<?php  echo base_url();  ?>studentprofile/post_img",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          if(data=="success"){
              alert("Profile picture changed");
              window.setTimeout(function(){location.reload()},1000)
          }else{
              alert("Something Went Wrong");
          }
        }
      });
    })
  });

});
</script>
