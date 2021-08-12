<?php session_start();

	
	if(! empty($_POST))
	{
		
		extract($_POST);
		$error = array();
		
		
	
		
		if(empty($pnm))
		{
			$error['pnm']="Please enter Project Name";
		}
		if(empty($devname))
		{
			$error['devname']="Please enter Developer Name";
		}
		if(empty($pop))
		{
			$error['pop']="Please select Project Or Program";
		}
		if(empty($ptype))
		{
			$error['ptype']="Please select Project Type";
		}
		if(empty($plan))
		{
			$error['plan']="Please select Project Language";
		}
		if(empty($pplan))
		{
			$error['pplan']="Please enter Programming Language";
		}
		if(empty($pdatanm))
		{
			$error['pdatanm']="Please enter Project Database Name";
		}
		if(empty($pide))
		{
			$error['pide']="Please enter Project Ide";
		}
		if(empty($pde))
		{
			$error['pde']="Please enter Project Description";
		}
		
		
		$ext = strtoupper(substr($_FILES['pdata']['name'],-4));
		
		if(empty($_FILES['pdata']['name']))
		{
			$error['pdata']="Please chose Project source code";
		}
		else if(!($ext==".ZIP" || $ext==".RAR"))
		{
			$error['pdata']="Please chose ZIP ya RAR file";
		}
		else if(file_exists("../project/".$_FILES['pdata']['name']))
		{
			$error['pdata']="this file already exists";
		}
		
		
		$extt = strtoupper(substr($_FILES['pmet']['name'],-4));
		
		  if(empty($_FILES['pmet']['name']))
		{
			$error['pmet']="Please chose Project Report";
		}
		else if(!($extt==".ZIP" || $extt==".RAR"))
		{
			$error['pmet']="Please chose ZIP ya RAR file";
		}
		else if(file_exists("../projectmet/".$_FILES['pmet']['name']))
		{
			$error['pmet']="this file already exists";
		}	
		
		
		$img = strtoupper(substr($_FILES['img']['name'],-4));
		
		  if(empty($_FILES['img']['name']))
		{
			$error['img']="Please chose Project View Image";
		}
		else if(!($img==".JPG" || $img==".PNG"))
		{
			$error['img']="Please chose JPG ya PNG file";
		}
		else if(file_exists("../proimage/".$_FILES['img']['name']))
		{
			$error['img']="this file already exists";
		}
		
		
		if(empty($pcode))
		{
			$error['pcode']="Please enter Project code import step";
		}
		if(empty($pdatast))
		{
			$error['pdatast']="Please enter Project database import step";
		}
		if(empty($pprice))
		{
			$error['pprice']="Please enter Project Price";
		}
		else if(! is_numeric($pprice))
		{
			$error['pprice']="Please enter Proper Price";
		}
		if(! empty($error))
		{
			$_SESSION['error'] = $error;
			$_SESSION['product'] = $_POST;
		     header("location:product.php");
		}
		else
		{
			 $t = time();
			 
			 $data = $t."_".$pnm.".".$ext;
			 
			 move_uploaded_file($_FILES['pdata']['tmp_name'],"../project/".$data);
			 
			 $datamet = $t."_".$pnm.".".$extt;
			 
			move_uploaded_file($_FILES['pmet']['tmp_name'],"../projectmet/".$datamet); 
			
			
			$dataimg = $t."_".$_FILES['img']['name'];
			 
			move_uploaded_file($_FILES['img']['tmp_name'],"../proimage/".$dataimg);
			
			include("include/config.php");
			
			$q="insert into product(p_name,p_devname,p_pop,p_ptype,p_plan,p_pplan,p_pdatanm,p_pide,p_pde,p_pdata,p_pmet,	p_pimg,p_pcode, p_pdatast,p_pprice,p_time)values('$pnm','$devname','$pop','$ptype',$plan,'$pplan','$pdatanm','$pide','$pde','$data','$datamet','$dataimg','$pcode','$pdatast',$pprice,'$t')";
			
			mysqli_query($link,$q);
			
			$_SESSION['done']="product successfully inserted";
		
		 header("location:product.php");
		}
	}
	else
	{
		 header("location:product.php");
	}
    
?>