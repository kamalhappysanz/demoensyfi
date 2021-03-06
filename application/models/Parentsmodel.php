<?php

Class Parentsmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();
       $this->load->model('smsmodel');

  }

   //---------------------New----------------------------------

	function add_parents($admission_id,$fname,$foccupation,$fincome,$fhaddress,$fpemail,$fsemail,$fpmobile,$fsmobile,$fhome_phone,$foffice_address,$foffice_phone,$frelationship,$fstatus,$flogin,$userFileName,$mname,$moccupation,$mincome,$mhaddress,$mpemail,$msemail,$mpmobile,$msmobile,$mhome_phone,$moffice_address,$moffice_phone,$mrelationship,$mstatus,$mlogin,$userFileName1,$gname,$goccupation,$gincome,$ghaddress,$gpemail,$gsemail,$gpmobile,$gsmobile,$ghome_phone,$goffice_address,$goffice_phone,$grelationship,$gstatus,$glogin,$userFileName2,$user_id)
	{
		   $school_id=$this->session->userdata('school_id');

		   $digits = 6;
		   $OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
		  
		  //Father Details
		   if(!empty($fname))
		   {
			   $fquery="INSERT INTO edu_parents(admission_id,name,occupation,income,home_address,email,sec_email,mobile,sec_mobile,home_phone,office_address,office_phone,relationship,user_pic,status,primary_flag,created_by,created_at) VALUES ('$admission_id','$fname','$foccupation','$fincome','$fhaddress','$fpemail','$fsemail','$fpmobile','$fsmobile','$fhome_phone','$foffice_address','$foffice_phone','$frelationship','$userFileName','$fstatus','$flogin','$user_id',NOW())";
			   $fresultset=$this->db->query($fquery);
			   $finsert_id = $this->db->insert_id();
			   $fuser_name=$finsert_id+600000;

			  if($flogin=="Yes")
			  {
				 if(!empty($fpemail))
				 {
					$to = $fpemail;
					$subject = '"Welcome Message"';
					$htmlContent = '
					<html>
					<head>  <title></title>
					</head>
					<body style="background-color:beige;">
					 <table cellspacing="0" style=" width: 300px; height: 200px;">
						   <tr>
							   <td>Email:</th><td>'.$fpemail.'</td>
						   </tr>
						   <tr>
							   <td>Username :</th><td>'.$fuser_name.'</td>
						   </tr>
						   <tr>
							   <td>Password:</th><td>'.$OTP.'</td>
						   </tr>
						   <tr>
							   <td><a href="'.base_url() .'">Click here  to Login</a></td>
						   </tr>
					   </table>
					</body>
					</html>';
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					mail($to,$subject,$htmlContent,$headers);
				 }
				 
				 if(!empty($fpmobile))
				 {
					$userdetails="Name : " .$fname. ", Schoolid : " .$school_id.", Username : " .$fuser_name.", Password : ".$OTP.", ";
					$notes =utf8_encode($userdetails."To known more about your child click here  http://bit.ly/2wLwdRQ");
					$phone=$fpmobile;
					$this->smsmodel->sendSMS($phone,$notes);
				 }

				  $fuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$fname','$fuser_name',md5($OTP),'4','$finsert_id','$finsert_id',NOW(),NOW(),'$fstatus')";
			      $furesultset=$this->db->query($fuser);
			  }
		   }
		 //Mother Details
		   if(!empty($mname))
		   {
			  $mquery="INSERT INTO edu_parents(admission_id,name,occupation,income,home_address,email,sec_email,mobile, sec_mobile,home_phone,office_address,office_phone,relationship,user_pic,status,primary_flag,created_by,created_at) VALUES ('$admission_id','$mname','$moccupation','$mincome','$mhaddress','$mpemail','$msemail','$mpmobile','$msmobile','$mhome_phone','$moffice_address','$moffice_phone','$mrelationship','$userFileName1','$mstatus','$mlogin','$user_id',NOW())";
			  $mresultset=$this->db->query($mquery);
			  $minsert_id=$this->db->insert_id();
			  //echo $minsert_id;exit;
			  $muser_name=$minsert_id+600000;

			  if($mlogin=="Yes")
			   {
				  if(!empty($mpemail))
				  {  //echo $mpemail;
					$to = $mpemail;
					$subject = '"Welcome Message"';
					$htmlContent = '
					<html>
					<head>  <title></title>
					</head>
					<body style="background-color:beige;">
					 <table cellspacing="0" style=" width: 300px; height: 200px;">
						   <tr>
							   <td>Email:</th><td>'.$mpemail.'</td>
						   </tr>
						   <tr>
							   <td>Username :</th><td>'.$muser_name.'</td>
						   </tr>
						   <tr>
							   <td>Password:</th><td>'.$OTP.'</td>
						   </tr>
						   <tr>
							  <td><a href="'.base_url().'">Click here  to Login</a></td>
						   </tr>
					   </table>
					</body>
					</html>';
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					mail($to,$subject,$htmlContent,$headers);
				  }
				
				if(!empty($mpmobile))
				 {
					$userdetails="Name : " .$mname. ", Schoolid : " .$school_id.", Username : " .$muser_name.", Password : ".$OTP.", ";
					$notes =utf8_encode($userdetails."To known more about your child click here  http://bit.ly/2wLwdRQ");
					$phone=$mpmobile;
					$this->smsmodel->sendSMS($phone,$notes);
				 }
			  $muser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$mname','$muser_name',md5($OTP),'4','$minsert_id','$minsert_id',NOW(),NOW(),'$mstatus')";
			  $muresultset=$this->db->query($muser);
			  }
		   }
		   // Guardian Details
		   if(!empty($gname))
		   {
			  $mquery="INSERT INTO edu_parents(admission_id,name,occupation,income,home_address,email,sec_email,mobile, sec_mobile,home_phone,office_address,office_phone,relationship,user_pic,	status,primary_flag,created_by,created_at) VALUES ('$admission_id','$gname','$goccupation','$gincome','$ghaddress','$gpemail','$gsemail','$gpmobile','$gsmobile','$ghome_phone','$goffice_address','$goffice_phone','$grelationship','$userFileName2','$gstatus','$glogin','$user_id',NOW())";
			  $gresultset=$this->db->query($mquery);
			  $ginsert_id = $this->db->insert_id();
			  $guser_name=$ginsert_id+600000;

			  if($glogin=="Yes")
			  {
				  if(!empty($gpemail))
				  {
					$to = $gpemail;
					$subject = '"Welcome Message"';
					$htmlContent = '
					<html>
					<head>  <title></title>
					</head>
					<body style="background-color:beige;">
					 <table cellspacing="0" style=" width: 300px; height: 200px;">
						   <tr>
							   <th>Email:</th><td>'.$gpemail.'</td>
						   </tr>
						   <tr>
							   <th>Username :</th><td>'.$guser_name.'</td>
						   </tr>
						   <tr>
							   <th>Password:</th><td>'.$OTP.'</td>
						   </tr>
						   <tr>
							   <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
						   </tr>
					   </table>
					</body>
					</html>';
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					mail($to,$subject,$htmlContent,$headers);
                  }
                 if(!empty($gpmobile))
				 {
					$userdetails="Name : " .$gname . ", Schoolid : " .$school_id.", Username : " .$guser_name .", Password : ".$OTP.", ";
					$notes =utf8_encode($userdetails."To known more about your child click here  http://bit.ly/2wLwdRQ");
					$phone=$gpmobile;
					$this->smsmodel->sendSMS($phone,$notes);
				 }

				  $guser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$gname','$guser_name',md5($OTP),'4','$ginsert_id','$ginsert_id',NOW(),NOW(),'$gstatus')";
			      $guresultset=$this->db->query($guser);
			  }
		   }




		   if(!empty($finsert_id) && !empty($minsert_id) && !empty($ginsert_id) )
		   {
				$fmgid=array($finsert_id,$minsert_id,$ginsert_id);
				$insertid=implode(',',$fmgid);
				$parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$admission_id'";
				$gsresultset=$this->db->query($parnt_guardnid);
		   }

		 if(!empty($finsert_id) && !empty($minsert_id))
		   {
				$fmgid=array($finsert_id,$minsert_id);
				$insertid=implode(',',$fmgid);
				$parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$admission_id'";
				$gsresultset=$this->db->query($parnt_guardnid);
		   }else if(!empty($finsert_id)){
				$fmgid=array($finsert_id);
				$insertid=implode(',',$fmgid);
				$parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$admission_id'";
				$gsresultset=$this->db->query($parnt_guardnid);
		   }else{
			    if(!empty($minsert_id))
		        {
					$fmgid=array($minsert_id);
					$insertid=implode(',',$fmgid);
					$parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$admission_id'";
					$gsresultset=$this->db->query($parnt_guardnid);
				}
		   }


		   if(!empty($finsert_id) && !empty($ginsert_id))
		   {
				$fmgid=array($finsert_id,$ginsert_id);
				$insertid=implode(',',$fmgid);
				$parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$admission_id'";
				$gsresultset=$this->db->query($parnt_guardnid);
		   }
		   if(!empty($ginsert_id)&& !empty($minsert_id))
		   {
				$fmgid=array($ginsert_id,$minsert_id);
				$insertid=implode(',',$fmgid);
				$parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$admission_id'";
				$gsresultset=$this->db->query($parnt_guardnid);
		   }



		   if(!empty($ginsert_id))
		   {
				$fmgid=array($ginsert_id);
				$insertid=implode(',',$fmgid);
				$parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$admission_id'";
				$gsresultset=$this->db->query($parnt_guardnid);
		   }

		  $data= array("status"=>"success");
          return $data;
		 
	   }


	   function add_new_parents($admission_id,$oldadmission_id,$name,$occupation,$income,$haddress,$pemail,$semail,$pmobile,$smobile,$home_phone,$office_address,$office_phone,$relationship,$status,$priority,$userFileName,$user_id)
	   {
			$school_id=$this->session->userdata('school_id');

			$select = "SELECT relationship FROM edu_parents WHERE FIND_IN_SET('$admission_id',admission_id) AND relationship ='$relationship'";
			$res_selec=$this->db->query($select);

         if($res_selec->num_rows()==0){
           $digits = 6;
           $OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

           $pgid="SELECT admission_id,parnt_guardn_id FROM edu_admission WHERE admission_id IN('$oldadmission_id')";
           $resultset=$this->db->query($pgid);
           $row=$resultset->result();
           foreach($row as $rows){
				$spgid=$rows->parnt_guardn_id;
		   }
		   if ($spgid!=''){
			   $apgid= $spgid;
		   } else {		
				$apgid= 0;
		   }

           $sql="INSERT INTO edu_parents(admission_id,name,occupation,income,home_address,email,sec_email,mobile, sec_mobile,home_phone,office_address,office_phone,relationship,user_pic,	status,primary_flag,created_by,created_at)
           VALUES ('$oldadmission_id','$name','$occupation','$income','$haddress','$pemail','$semail','$pmobile','$smobile','$home_phone','$office_address','$office_phone','$relationship','$userFileName','$status','$priority','$user_id',NOW())";
           $newresult=$this->db->query($sql);
           $newinsert_id=$this->db->insert_id();
           $newuser_name=$newinsert_id+600000;

           // if($priority=="Yes"){
			if(!empty($pemail)){
				 $to = $pemail;
				 $subject = '"Welcome Message"';
				 $htmlContent = '<html>
				   <head> <title></title>
				   </head>
				   <body style="background-color:beige;">
				   <table cellspacing="0" style=" width: 300px; height: 200px;">
					   <tr>
						 <td>Email:</th><td>'.$pemail.'</td>
					   </tr>
					   <tr>
						 <td>Username :</th><td>'.$newuser_name.'</td>
					   </tr>
					   <tr>
						 <td>Password:</th><td>'.$OTP.'</td>
					   </tr>
					   <tr>
						 <td><a href="'.base_url() .'">Click here  to Login</a></td>
					   </tr>
					 </table>
				   </body>
				   </html>';
				 $headers = "MIME-Version: 1.0" . "\r\n";
				 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				 $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
				 mail($to,$subject,$htmlContent,$headers);		 
			}
             if(!empty($pmobile))
             {
					$userdetails="Name : " .$name. ", Schoolid : " .$school_id.",Username : " .$newuser_name.", Password : ".$OTP.", ";
					$notes =utf8_encode($userdetails."To known more about your child click here  http://bit.ly/2wLwdRQ");
					$phone=$pmobile;
					$this->smsmodel->sendSMS($phone,$notes);
             }


              $nuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$name','$newuser_name',md5($OTP),'4','$newinsert_id','$newinsert_id',NOW(),NOW(),'$status')";
                $nuresultset=$this->db->query($nuser);
            // }

			$fmgid=array($apgid,$newinsert_id);
			$insertid=implode(',',$fmgid);

			$parnt_guardnid="UPDATE edu_admission SET parnt_guardn_id='$insertid',parents_status='1' WHERE admission_id IN ($oldadmission_id)";
			$gsresultset=$this->db->query($parnt_guardnid);


			$parnt_guardnid1="UPDATE edu_parents SET admission_id='$oldadmission_id' WHERE id IN ($newinsert_id)";
			$gsresultset1=$this->db->query($parnt_guardnid1);

          if($gsresultset){
             $data= array("status" => "success");
				return $data;
            }else{
             $data= array("status" => "FTA");
				return $data;
             }
         }else{
           $data= array("status" => "already");
			return $data;
         }

	}

	function update_parents_details($stu_name,$admission_id,$morestu,$newstu,$oldstu,$flogin,$fid,$fname,$foccupation,$fincome,$fhaddress,$fpemail,$fsemail,$fpmobile,$fsmobile,$fhome_phone,$foffice_address,$foffice_phone,$frelationship,$fstatus,$userFileName,$mlogin,$mid,$mname,$moccupation,$mincome,$mhaddress,$mpemail,$msemail,$mpmobile,$msmobile,$mhome_phone,$moffice_address,$moffice_phone,$mrelationship,$mstatus,$userFileName1,$glogin,$gid,$gname,$goccupation,$gincome,$ghaddress,$gpemail,$gsemail,$gpmobile,$gsmobile,$ghome_phone,$goffice_address,$goffice_phone,$grelationship,$gstatus,$userFileName2,$user_id)
	{
	    $school_id=$this->session->userdata('school_id');
	   // echo $stu_name; echo $morestu; exit;
	       $digits = 6;
		   $OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
		   //Father Details
		   $sql3="SELECT parnt_guardn_id FROM edu_admission WHERE admission_id='$stu_name'";
		   $sql4=$this->db->query($sql3);
		   $rows1=$sql4->result();
		   foreach($rows1 as $rows2){} $pid=$rows2->parnt_guardn_id;
		   //echo $pid;exit;
		   if($stu_name!=$morestu)
		   {
			 $sql="UPDATE edu_admission SET parnt_guardn_id='0',parents_status='0' WHERE admission_id NOT IN($stu_name) AND parnt_guardn_id IN ($pid)";
			  $sql2=$this->db->query($sql);
		   }

		   if(!empty($fname))
		    {
			  $fquery="UPDATE edu_parents SET admission_id='$stu_name',name='$fname',occupation='$foccupation',income='$fincome',home_address='$fhaddress',email='$fpemail',sec_email='$fsemail',mobile='$fpmobile',sec_mobile='$fsmobile',home_phone='$fhome_phone',office_address='$foffice_address',office_phone='$foffice_phone',relationship='$frelationship',user_pic='$userFileName',status='$fstatus',primary_flag='$flogin',updated_by='$user_id',updated_at='NOW()' WHERE  id='$fid' AND FIND_IN_SET('$oldstu',admission_id)";
			   $fresultset=$this->db->query($fquery);
               $fatherid=$fid+600000;
			   //echo $fatherid;exit;
			   if($flogin=="Yes")
			    {
				 $check="SELECT user_name,user_master_id,parent_id,user_type FROM edu_users WHERE user_type='4' AND user_master_id='$fid' AND parent_id='$fid' AND user_name='$fatherid'";
				   $result=$this->db->query($check);
                   if($result->num_rows()==0)
		           {
					  if(!empty($fpemail)){
					  $to = $fpemail;
				      $subject = '"Welcome Message"';
				      $htmlContent = '
					   <html>
					   <head>  <title></title>
					   </head>
					   <body style="background-color:beige;">
						 <table cellspacing="0" style=" width: 300px; height: 200px;">
							   <tr>
								   <th>Email:</th><td>'.$fpemail.'</td>
							   </tr>
							   <tr>
								   <th>Username :</th><td>'.$fatherid.'</td>
							   </tr>
							   <tr>
								   <th>Password:</th><td>'.$OTP.'</td>
							   </tr>
							   <tr>
								   <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
							   </tr>
						   </table>
					   </body>
					   </html>';
					   $headers = "MIME-Version: 1.0" . "\r\n";
					   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					   $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					   mail($to,$subject,$htmlContent,$headers);
				   }
				   if(!empty($fpmobile))
				   {
					$userdetails="Name : " .$fname. ", Schoolid : " .$school_id.",Username : " .$fatherid.", Password : ".$OTP.", ";
					$notes =utf8_encode($userdetails."To Known more details login into http://bit.ly/2wLwdRQ");
          $phone=$fpmobile;
          $this->smsmodel->sendSMS($phone,$notes);

				   }
				  $nuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$fname','$fatherid',md5($OTP),'4','$fid','$fid',NOW(),NOW(),'Active')";
			      $nuresultset=$this->db->query($nuser);
				   }else{
			$query6="UPDATE edu_users SET name='$fname',status='Active',updated_date=NOW() WHERE user_master_id='$fid' AND parent_id='$fid'";
	              $res=$this->db->query($query6);
				   }
			  }else{
			  $query7="UPDATE edu_users SET name='$fname',status='Deactive',updated_date=NOW() WHERE user_master_id='$fid' AND parent_id='$fid'";
	          $res1=$this->db->query($query7);
			  }
			}
		   //Mother Details
		   if(!empty($mname))
		   {
			  $mquery="UPDATE edu_parents SET admission_id='$stu_name',name='$mname',occupation='$moccupation',income='$mincome',home_address='$mhaddress',email='$mpemail',sec_email='$msemail',mobile='$mpmobile',sec_mobile='$msmobile',home_phone='$mhome_phone',office_address='$moffice_address',office_phone='$moffice_phone',relationship='$mrelationship',user_pic='$userFileName1',status='$mstatus',primary_flag='$mlogin',updated_by='$user_id',updated_at='NOW()' WHERE  id='$mid' AND FIND_IN_SET('$oldstu',admission_id)";
			  $mresultset=$this->db->query($mquery);
              $motherid=$mid+600000;
				//echo $motherid;
			  if($mlogin=="Yes")
			   {
				   $check="SELECT user_name,user_master_id,parent_id,user_type FROM edu_users WHERE user_type='4' AND user_master_id='$mid' AND parent_id='$mid' AND user_name='$motherid'";
				   $result=$this->db->query($check);
                   if($result->num_rows()==0)
		           {
					  if(!empty($mpemail)){
					  $to = $mpemail;
				      $subject = '"Welcome Message"';
				      $htmlContent = '
					   <html>
					   <head>  <title></title>
					   </head>
					   <body style="background-color:beige;">
						 <table cellspacing="0" style=" width: 300px; height: 200px;">
							   <tr>
								   <th>Email:</th><td>'.$mpemail.'</td>
							   </tr>
							   <tr>
								   <th>Username :</th><td>'.$motherid.'</td>
							   </tr>
							   <tr>
								   <th>Password:</th><td>'.$OTP.'</td>
							   </tr>
							   <tr>
								   <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
							   </tr>
						   </table>
					   </body>
					   </html>';
					   $headers = "MIME-Version: 1.0" . "\r\n";
					   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					   $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					   mail($to,$subject,$htmlContent,$headers);
					  }
					   if(!empty($mpmobile))
				      {
						$userdetails="Name : " .$mname. ", Schoolid : " .$school_id.",Username : " .$motherid.", Password : ".$OTP.", ";
						$notes =utf8_encode($userdetails."To Known more details login into http://bit.ly/2wLwdRQ");
            $phone=$mpmobile;
            $this->smsmodel->sendSMS($phone,$notes);
				     }
				  $nuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$mname','$motherid',md5($OTP),'4','$mid','$mid',NOW(),NOW(),'$mstatus')";
			      $nuresultset=$this->db->query($nuser);
				   }else{
			    $query6="UPDATE edu_users SET name='$mname',status='Active',updated_date=NOW() WHERE user_master_id='$mid' AND parent_id='$mid'";
	           $res=$this->db->query($query6);
		  }
			}else{
               $query7="UPDATE edu_users SET name='$mname',status='Deactive',updated_date=NOW() WHERE user_master_id='$mid' AND parent_id='$mid'";
	          $res1=$this->db->query($query7);
			  }
		   }
		   // Guardian Details
		   if(!empty($gname))
		   {
			  $mquery="UPDATE edu_parents SET admission_id='$stu_name',name='$gname',occupation='$goccupation',income='$gincome',home_address='$ghaddress',email='$gpemail',sec_email='$gsemail',mobile='$gpmobile',sec_mobile='$gsmobile',home_phone='$ghome_phone',office_address='$goffice_address',office_phone='$goffice_phone',relationship='$grelationship',user_pic='$userFileName2',status='$gstatus',primary_flag='$glogin',updated_by='$user_id',updated_at='NOW()' WHERE  id='$gid' AND FIND_IN_SET('$oldstu',admission_id)";
			  $gresultset=$this->db->query($mquery);
			  $guardianid=$gid+600000;

			  if($glogin=="Yes")
			  {
				  $check="SELECT user_name,user_master_id,parent_id,user_type FROM edu_users WHERE user_type='4' AND user_master_id='$gid' AND parent_id='$gid' AND user_name='$guardianid'";
				   $result=$this->db->query($check);
                   if($result->num_rows()==0)
		           {
					   if(!empty($gpemail)){
					  $to = $gpemail;
				      $subject = '"Welcome Message"';
				      $htmlContent = '
					   <html>
					   <head>  <title></title>
					   </head>
					   <body style="background-color:beige;">
						 <table cellspacing="0" style=" width: 300px; height: 200px;">
							   <tr>
								   <th>Email:</th><td>'.$gpemail.'</td>
							   </tr>
							   <tr>
								   <th>Username :</th><td>'.$guardianid.'</td>
							   </tr>
							   <tr>
								   <th>Password:</th><td>'.$OTP.'</td>
							   </tr>
							   <tr>
								   <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
							   </tr>
						   </table>
					   </body>
					   </html>';
					   $headers = "MIME-Version: 1.0" . "\r\n";
					   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					   $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					   mail($to,$subject,$htmlContent,$headers);
					   }
					    if(!empty($gpmobile))
				        {
							$userdetails="Name : " .$gname. ", Schoolid : " .$school_id.", Username : " .$guardianid.", Password : ".$OTP.", ";
							$notes =utf8_encode($userdetails."To Known more details login into http://bit.ly/2wLwdRQ");
              $phone=$gpmobile;
              $this->smsmodel->sendSMS($phone,$notes);
				        }
				  $nuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$gname','$guardianid',md5($OTP),'4','$gid','$gid',NOW(),NOW(),'Active')";
			      $nuresultset=$this->db->query($nuser);
				   }else{
			$query6="UPDATE edu_users SET name='$gname',status='Active',updated_date=NOW() WHERE user_master_id='$gid' AND parent_id='$gid'";
	         $res=$this->db->query($query6);
				   }
			  }else{
			  $query7="UPDATE edu_users SET name='$gname',status='Deactive',updated_date=NOW() WHERE user_master_id='$gid' AND parent_id='$gid'";
	          $res1=$this->db->query($query7);
			  }
		   }
		  $data= array("status"=>"success");
          return $data;
	   }



	   function send_request($id)
	   {
			$school_id=$this->session->userdata('school_id');

			$digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

		    $sQuery = "SELECT
					e.id,
					u.user_id,
					e.name,
					e.mobile,
					u.user_name
				FROM
					edu_parents AS e,
					edu_users AS u
				WHERE
					e.id = u.parent_id AND e.id = '$id'";

				$result=$this->db->query($sQuery);
				$resultset=$result->result();
				if($result->num_rows()>0)
		         {
					   foreach($resultset as $rows){
						    $name=$rows->name;
						    $user_id=$rows->user_id;
						    $mobile=$rows->mobile;
						    $user_name=$rows->user_name;
						}

						$sql="UPDATE edu_users SET user_password=md5($OTP) WHERE user_id = '$user_id'";
					    $upsql=$this->db->query($sql);

						 $userdetails="Name : " .$name. ", Schoolid : " .$school_id.",Username : " .$user_name.", Password : ".$OTP.", ";
						 $notes =utf8_encode($userdetails."To Known more details login into http://bit.ly/2wLwdRQ");
						 $this->smsmodel->sendSMS($mobile,$notes);
				 }

				  $data= array("status"=>"success");
				  return $data;
		}


	   //New student Add
	   function update_exiting_parents_details($morestu,$newstu,$oldstu,$flogin,$fid,$fname,$foccupation,$fincome,$fhaddress,$fpemail,$fsemail,$fpmobile,$fsmobile,$fhome_phone,$foffice_address,$foffice_phone,$frelationship,$fstatus,$userFileName,$mlogin,$mid,$mname,$moccupation,$mincome,$mhaddress,$mpemail,$msemail,$mpmobile,$msmobile,$mhome_phone,$moffice_address,$moffice_phone,$mrelationship,$mstatus,$userFileName1,$glogin,$gid,$gname,$goccupation,$gincome,$ghaddress,$gpemail,$gsemail,$gpmobile,$gsmobile,$ghome_phone,$goffice_address,$goffice_phone,$grelationship,$gstatus,$userFileName2,$user_id)
	   {
		   $school_id=$this->session->userdata('school_id');
		   //echo $oldstu; echo'<br>'; echo $newstu; echo'<br>';echo $morestu;
		    $newstu;
	       $digits = 6;
		   $OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

		     $sql="SELECT parnt_guardn_id FROM edu_admission WHERE admission_id IN ($oldstu)";

		   $getid=$this->db->query($sql);
		   $getid1=$getid->result();
		   foreach($getid1 as $getid2){} $insertid=$getid2->parnt_guardn_id;
		    // $insertid; exit;
		   //Father Details
		   if(!empty($fname))
		    {
    		 if(empty($newstu)){
				$admission_id=$oldstu;
			    }else{ $admission_id=$morestu;
                  $parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$newstu'";
		          $gsresultset=$this->db->query($parnt_guardnid);
               }
			  $fquery="UPDATE edu_parents SET admission_id='$admission_id',name='$fname',occupation='$foccupation',income='$fincome',home_address='$fhaddress',email='$fpemail',sec_email='$fsemail',mobile='$fpmobile',sec_mobile='$fsmobile',home_phone='$fhome_phone',office_address='$foffice_address',office_phone='$foffice_phone',relationship='$frelationship',user_pic='$userFileName',status='$fstatus',primary_flag='$flogin',updated_by='$user_id',updated_at='NOW()' WHERE admission_id IN($oldstu) AND id='$fid'";
			  $fresultset=$this->db->query($fquery);
               $fatherid=$fid+600000;
			   //echo $fatherid;exit;
			   if($flogin=="Yes")
			    {
				 $check="SELECT user_name,user_master_id,parent_id,user_type FROM edu_users WHERE user_type='4' AND user_master_id='$fid' AND parent_id='$fid' AND user_name='$fatherid'";
				   $result=$this->db->query($check);
                   if($result->num_rows()==0)
		           {
					 if(!empty($fpemail)){
					  $to = $fpemail;
				      $subject = '"Welcome Message"';
				      $htmlContent = '
					   <html>
					   <head>  <title></title>
					   </head>
					   <body style="background-color:beige;">
						 <table cellspacing="0" style=" width: 300px; height: 200px;">
							   <tr>
								   <th>Email:</th><td>'.$fpemail.'</td>
							   </tr>
							   <tr>
								   <th>Username :</th><td>'.$fatherid.'</td>
							   </tr>
							   <tr>
								   <th>Password:</th><td>'.$OTP.'</td>
							   </tr>
							   <tr>
								   <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
							   </tr>
						   </table>
					   </body>
					   </html>';
					   $headers = "MIME-Version: 1.0" . "\r\n";
					   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					   $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					   mail($to,$subject,$htmlContent,$headers);
				   }
				 if(!empty($fpmobile))
				   {
					$userdetails="Name : " .$fname. ", Schoolid : " .$school_id.", Username : " .$fatherid.", Password : ".$OTP.", ";
					$notes =utf8_encode($userdetails."To Known more details login into http://bit.ly/2wLwdRQ");
          $phone=$fpmobile;
          $this->smsmodel->sendSMS($phone,$notes);

				   }


				  $nuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$fname','$fatherid',md5($OTP),'4','$fid','$fid',NOW(),NOW(),'Active')";
			      $nuresultset=$this->db->query($nuser);
				   }else{
			$query6="UPDATE edu_users SET name='$fname',status='Active',updated_date=NOW() WHERE user_master_id='$fid' AND parent_id='$fid'";
	              $res=$this->db->query($query6);
				   }
			  }else{
			  $query7="UPDATE edu_users SET name='$fname',status='Deactive',updated_date=NOW() WHERE user_master_id='$fid' AND parent_id='$fid'";
	          $res1=$this->db->query($query7);
			  }
			}
		 //Mother Details
		   if(!empty($mname))
		   {
			    if(empty($newstu)){
				$admission_id=$oldstu;
			    }else{ $admission_id=$morestu;

			          $parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$newstu'";
		              $gsresultset=$this->db->query($parnt_guardnid);
			    }

			   $mquery="UPDATE edu_parents SET admission_id='$admission_id',name='$mname',occupation='$moccupation',income='$mincome',home_address='$mhaddress',email='$mpemail',sec_email='$msemail',mobile='$mpmobile',sec_mobile='$msmobile',home_phone='$mhome_phone',office_address='$moffice_address',office_phone='$moffice_phone',relationship='$mrelationship',user_pic='$userFileName1',status='$mstatus',primary_flag='$mlogin',updated_by='$user_id',updated_at='NOW()' WHERE admission_id IN($oldstu) AND id='$mid'";
		      $mresultset=$this->db->query($mquery);
              $motherid=$mid+600000;
				//echo $motherid;
			  if($mlogin=="Yes")
			   {
				   $check="SELECT user_name,user_master_id,parent_id,user_type FROM edu_users WHERE user_type='4' AND user_master_id='$mid' AND parent_id='$mid' AND user_name='$motherid'";
				   $result=$this->db->query($check);
                   if($result->num_rows()==0)
		           {
					  if(!empty($mpemail))
					  {
					  $to = $mpemail;
				      $subject = '"Welcome Message"';
				      $htmlContent = '
					   <html>
					   <head>  <title></title>
					   </head>
					   <body style="background-color:beige;">
						 <table cellspacing="0" style=" width: 300px; height: 200px;">
							   <tr>
								   <th>Email:</th><td>'.$mpemail.'</td>
							   </tr>
							   <tr>
								   <th>Username :</th><td>'.$motherid.'</td>
							   </tr>
							   <tr>
								   <th>Password:</th><td>'.$OTP.'</td>
							   </tr>
							   <tr>
								   <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
							   </tr>
						   </table>
					   </body>
					   </html>';
					   $headers = "MIME-Version: 1.0" . "\r\n";
					   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					   $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					   mail($to,$subject,$htmlContent,$headers);
					  }

					 if(!empty($mpmobile))
				      {
						$userdetails="Name : " .$mname. ", Schoolid : " .$school_id.", Username : " .$motherid.", Password : ".$OTP.", ";
						$notes =utf8_encode($userdetails."To Known more details login into http://bit.ly/2wLwdRQ");
            $phone=$mpmobile;
            $this->smsmodel->sendSMS($phone,$notes);
				     }

				  $nuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$mname','$motherid',md5($OTP),'4','$mid','$mid',NOW(),NOW(),'$mstatus')";
			      $nuresultset=$this->db->query($nuser);
				   }else{
			$query6="UPDATE edu_users SET name='$mname',status='Active',updated_date=NOW() WHERE user_master_id='$mid' AND parent_id='$mid'";
	         $res=$this->db->query($query6);
				   }
			}else{
               $query7="UPDATE edu_users SET name='$mname',status='Deactive',updated_date=NOW() WHERE user_master_id='$mid' AND parent_id='$mid'";
	          $res1=$this->db->query($query7);
			  }
		   }

		   // Guardian Details

		   if(!empty($gname))
		   {
			   if(empty($newstu)){
				$admission_id=$oldstu;
			    }else{ $admission_id=$morestu;

			         $parnt_guardnid="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$insertid' WHERE admission_id='$newstu'";
		          $gsresultset=$this->db->query($parnt_guardnid);
			    }

			  $mquery="UPDATE edu_parents SET admission_id='$admission_id',name='$gname',occupation='$goccupation',income='$gincome',home_address='$ghaddress',email='$gpemail',sec_email='$gsemail',mobile='$gpmobile',sec_mobile='$gsmobile',home_phone='$ghome_phone',office_address='$goffice_address',office_phone='$goffice_phone',relationship='$grelationship',user_pic='$userFileName2',status='$gstatus',primary_flag='$glogin',updated_by='$user_id',updated_at='NOW()' WHERE admission_id IN($oldstu) AND id='$gid'";
			  $gresultset=$this->db->query($mquery);
			  $guardianid=$gid+600000;

			  if($glogin=="Yes")
			  {
				  $check="SELECT user_name,user_master_id,parent_id,user_type FROM edu_users WHERE user_type='4' AND user_master_id='$gid' AND parent_id='$gid' AND user_name='$guardianid'";
				   $result=$this->db->query($check);
                   if($result->num_rows()==0)
		           {
					   if(!empty($gpemail)){
					  $to = $gpemail;
				      $subject = '"Welcome Message"';
				      $htmlContent = '
					   <html>
					   <head>  <title></title>
					   </head>
					   <body style="background-color:beige;">
						 <table cellspacing="0" style=" width: 300px; height: 200px;">
							   <tr>
								   <th>Email:</th><td>'.$gpemail.'</td>
							   </tr>
							   <tr>
								   <th>Username :</th><td>'.$guardianid.'</td>
							   </tr>
							   <tr>
								   <th>Password:</th><td>'.$OTP.'</td>
							   </tr>
							   <tr>
								   <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
							   </tr>
						   </table>
					   </body>
					   </html>';
					   $headers = "MIME-Version: 1.0" . "\r\n";
					   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					   $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
					   mail($to,$subject,$htmlContent,$headers);
					   }

					   if(!empty($gpmobile))
				      {
						$userdetails="Name : " .$gname. ", Schoolid : " .$school_id.", Username : " .$guardianid.", Password : ".$OTP.", ";
						$notes =utf8_encode($userdetails."To Known more details login into http://bit.ly/2wLwdRQ");
            $phone=$gpmobile;
            $this->smsmodel->sendSMS($phone,$notes);
				     }

				  $nuser="INSERT INTO edu_users(name,user_name,user_password,user_type,user_master_id,parent_id,created_date,updated_date,status) VALUES('$gname','$guardianid',md5($OTP),'4','$gid','$gid',NOW(),NOW(),'Active')";
			      $nuresultset=$this->db->query($nuser);
				   }else{
			$query6="UPDATE edu_users SET name='$gname',status='Active',updated_date=NOW() WHERE user_master_id='$gid' AND parent_id='$gid'";
	         $res=$this->db->query($query6);
				   }
			  }else{
			  $query7="UPDATE edu_users SET name='$gname',status='Deactive',updated_date=NOW() WHERE user_master_id='$gid' AND parent_id='$gid'";
	          $res1=$this->db->query($query7);
			  }
		   }
		  $data= array("status"=>"success");
          return $data;
	   }
	   //----------------------------------------------------------

       //GET ALL Admission Form WHERE status='A'


    function update_exiting_parents_assign($admission_id,$id,$parnt_guardn_id){

      $update="UPDATE edu_parents SET admission_id='$parnt_guardn_id' WHERE id='$id'";
      $res=$this->db->query($update);
       $update_admin="UPDATE edu_admission SET parnt_guardn_id='$id',parents_status='1' WHERE admission_id='$admission_id'";
       
      $res_admission=$this->db->query($update_admin);
      if($res_admission){
        $data= array("status"=>"success");
      }else{
        $data= array("status"=>"failed");
      }
        return $data;


    }

	   function get_all_details($admission_id)
	   {
		     $query3="SELECT admission_id FROM edu_parents WHERE FIND_IN_SET($admission_id,admission_id)";

         $res=$this->db->query($query3);
         return $res->result();
	   }
      function get_all_parents_details()
	  {
         $query3="SELECT * FROM edu_parents  ORDER BY id DESC ";
         $res=$this->db->query($query3);
         return $res->result();
       }

       function edit_parents($admission_id)
	   {
          $query4="SELECT * FROM edu_parents WHERE FIND_IN_SET('$admission_id',admission_id)";

         $res=$this->db->query($query4);
         return $res->result();
       }

	   function get_stu_name($admission_id)
	   {
		     $query4="SELECT admission_id,name FROM edu_admission WHERE admission_id='$admission_id'";
         $res=$this->db->query($query4);
         return $res->result();
	   }


	   function search_parent($cell)
	   {
		 $query="SELECT * FROM edu_parents WHERE mobile='$cell'";
     $res1=$this->db->query($query);
     $result=$res1->result();
     return $result;
	   }


     function check_relationship($relationship,$id){
       $select="SELECT relationship FROM edu_parents  WHERE FIND_IN_SET('$id',admission_id)";
       $result=$this->db->query($select);
       if($result->num_rows()>0){
         echo "false";
         }else{
          echo "true";
       }


     }

     function get_relation_ship($admission_id){
       $select="SELECT relationship FROM edu_parents  WHERE FIND_IN_SET('$admission_id',admission_id)";
       $result=$this->db->query($select);
       return $result->result();
     }

     function check_fpemail_id($email)
      {
       $select="SELECT * FROM edu_parents Where email='$email'";
        $result=$this->db->query($select);
         if($result->num_rows()>0){
           echo "false";
           }else{
            echo "true";
         }
      }
      function check_fpmobile_number($mobile)
       {
        $select="SELECT * FROM edu_parents Where mobile='$mobile'";
         $result=$this->db->query($select);
          if($result->num_rows()>0){
            echo "false";
            }else{
             echo "true";
          }
       }
       function check_mpmobile_number($mobile)
        {
         $select="SELECT * FROM edu_parents Where mobile='$mobile'";
          $result=$this->db->query($select);
           if($result->num_rows()>0){
             echo "false";
             }else{
              echo "true";
           }
        }
        function check_gpmobile_number($mobile)
         {
          $select="SELECT * FROM edu_parents Where mobile='$mobile'";
           $result=$this->db->query($select);
            if($result->num_rows()>0){
              echo "false";
              }else{
               echo "true";
            }
         }


         function check_email_id_exist($email,$id){
           $select="SELECT * FROM edu_parents Where email='$email' and id!='$id'";
            $result=$this->db->query($select);
             if($result->num_rows()>0){
               echo "false";
               }else{
                echo "true";
             }
         }


         function check_mobile_number_exist($mobile,$id){
           $select="SELECT * FROM edu_parents Where mobile='$mobile' and id!='$id'";
            $result=$this->db->query($select);
             if($result->num_rows()>0){
               echo "false";
               }else{
                echo "true";
             }
         }


         function update_parents_info($id,$name,$occupation,$income,$haddress,$pemail,$semail,$pmobile,$smobile,$home_phone,$office_address,$office_phone,$relationship,$status,$login,$userFileName,$admission_id,$user_id){
           $update="UPDATE edu_parents SET name='$name',occupation='$occupation',income='$income',home_address='$haddress',email='$pemail',sec_email='$semail',mobile='$pmobile',sec_mobile='$smobile',home_phone='$home_phone',office_address='$office_address',
          office_phone='$office_phone',relationship='$relationship',user_pic='$userFileName',status='$status',primary_flag='$login',updated_by='$user_id',updated_at=NOW() WHERE id='$id'";
          $result=$this->db->query($update);
          if($result){
            $data= array("status"=>"success");
          }else{
            $data= array("status"=>"failed");
          }
            return $data;
         }



		function get_relation($relation,$stuid)
		{
		   $pgid="SELECT relationship FROM edu_parents WHERE relationship='$relation' AND FIND_IN_SET('$stuid',admission_id)";
		   $resultset=$this->db->query($pgid);
		   return count($resultset->result());
		}

	function remove_parents_from_students($id,$user_id,$stu_id){
			
		$select_ad="SELECT * FROM edu_parents  WHERE FIND_IN_SET('$stu_id',admission_id)";
		$resultset_ad=$this->db->query($select_ad);
          if($resultset_ad->num_rows()==0){
            $string='';
          }else{
            foreach($resultset_ad->result() as $rows_result_ad){}
              $admission_id=$rows_result_ad->admission_id;
              $string = str_replace($stu_id, ' ', $admission_id);
          }

          $update_admin="UPDATE edu_admission SET parnt_guardn_id='$string',updated_at=NOW(),updated_by='$user_id' WHERE admission_id='$stu_id'";
          $resultset_admission=$this->db->query($update_admin);

          $update="UPDATE edu_parents SET admission_id='$string',updated_at=NOW(),updated_by='$user_id' WHERE id='$id'";
          $resultset=$this->db->query($update);
		  
          $select="SELECT count(*) as count FROM edu_parents  WHERE FIND_IN_SET('$stu_id',admission_id)";
          $resultset=$this->db->query($select);
          foreach($resultset->result() as $rows_result){}
          $res_count=$rows_result->count;
          if($res_count==0){
            $update_status="UPDATE edu_admission SET parents_status='0' WHERE admission_id='$stu_id'";
            $result_status=$this->db->query($update_status);
          }
		  
          $update_user="UPDATE edu_users SET status='Deactive',updated_date=NOW() WHERE user_type='4' AND user_master_id='$id'";
          $result_user=$this->db->query($update_user);
		  
          if($result_user){
              echo "success";
          }else{
              echo "failed";
          }

	}



}
?>
