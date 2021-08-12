<!DOCTYPE html>
<?php 
     
     include ("include/header.php");
	  if(isset($_SESSION['product']))
		   {
		   extract($_SESSION['product']);
		   }
	 
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add New Project</div>
        <div class="card-body">
		
		<?php
		if(isset($_SESSION['done']))
		{
			echo '<font color="green">'.$_SESSION['done'].'</font><br />';
			unset($_SESSION['done']);
		}
		else if(! empty($_SESSION['error']))
		{
			foreach($_SESSION['error'] as $er)
			{
				
			}
		}
		
		
		?>
            <form action="product-process.php" method="post" enctype="multipart/form-data">
			<?php
					if(isset($_SESSION['error']['pnm']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pnm'].'</font>';
									
					}			
			?>
			<br />
			<label>Project Name</label>
			<input type="text" value="<?php echo $pnm;?>" class="form-control" name="pnm">
			</br>
			<?php
					if(isset($_SESSION['error']['devname']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['devname'].'</font>';
									
					}			
			?>
			<br />
			<label>Developer Name</label>
			<input type="text" value="<?php echo $devname;?>" class="form-control" name="devname">
			</br>
			<?php
					if(isset($_SESSION['error']['pop']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pop'].'</font>';
									
					}			
			?>
			<br />
			<label>Project Or Program</label>
			<select type="text"  class="form-control" name="pop">
				<option>Project</option>
				<option>Demo</option>
				<option>Template </option>
				<option>Theme</option>
			</select>
			<br />
			<?php
					if(isset($_SESSION['error']['ptype']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['ptype'].'</font>';
									
					}			
			?>
			</br>
			<label>Project type</label>
			<select type="text" value="<?php echo $ptype;?>" class="form-control" name="ptype">
				<option>Web Application</option>
				<option>Desktop Application</option>
				<option>Mobile Application</option>
				<option>Game Application</option>
			</select>
			<br />
			<?php
					if(isset($_SESSION['error']['plan']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['plan'].'</font>';
									
					}			
			?>
			</br>
			<label>Language</label>
			<select type="text" value="<?php echo $plan;?>" class="form-control" name="plan">
			<option value="0">Select Language</option>
			<?php
			
			    $cq="select * from category";
			    $cres = mysqli_query($link,$cq);
				while($crow = mysqli_fetch_assoc($cres))
				{ 
					if($crow['c_id'] == $plan)
					{
					echo '<option selected="selected" value="'.$crow['c_id'].'">'.$crow['c_name'].'</option>';
				    }
					else
					{ 
					echo '<option value="'.$crow['c_id'].'">'.$crow['c_name'].'</option>';						
					}
				}
			?>
				
			</select>
			<br />
			<?php
					if(isset($_SESSION['error']['pplan']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pplan'].'</font>';
									
					}			
			?>
			</br>
			<label>programming Language</label>
			<input type="text" value="<?php echo $pplan;?>" class="form-control" name="pplan">
			<br />
			<?php
					if(isset($_SESSION['error']['pdatanm']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pdatanm'].'</font>';
									
					}			
			?>
			</br>
			<label>Project Database</label>
			<input type="text" value="<?php echo $pdatanm;?>" class="form-control" name="pdatanm">
			<br />
			<?php
					if(isset($_SESSION['error']['pide']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pide'].'</font>';
									
					}			
			?>
			</br>
			<label>Project Ide</label>
			<input type="text" value="<?php echo $pide;?>" class="form-control" name="pide">
			<br />
			<?php
					if(isset($_SESSION['error']['pde']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pde'].'</font>';
									
					}			
			?>
			</br>
			<label>Project Description</label>
			<textarea class="form-control" name="pde" > <?php echo $pde; ?></textarea>
			<br />
			<?php
					if(isset($_SESSION['error']['pdata']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pdata'].'</font>';
									
					}			
			?>
			</br>
			<label>Project source code 
                  (Code + Database zip file)</label>
			<input type="file" class="form-control" name="pdata">
			<br />
			<?php
					if(isset($_SESSION['error']['pmet']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pmet'].'</font>';
									
					}			
			?>
			</br>
			
			<label>Report 
                  (Screen shot + Doc + ppt file)</label>
			<input type="file" class="form-control" name="pmet">
			<br />
		
			<?php
					if(isset($_SESSION['error']['img']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['img'].'</font>';
									
					}			
			?>
			</br>
			
			<label>Chose project view image</label>
			<input type="file" class="form-control" name="img">
			<br />
			<?php
					if(isset($_SESSION['error']['pcode']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pcode'].'</font>';
									
					}			
			?>
			</br>
			<label>Project code import step</label>
			<textarea class="form-control" name="pcode" > <?php echo $pcode;?> </textarea>
			<br />
			<?php
					if(isset($_SESSION['error']['pdatast']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pdatast'].'</font>';
									
					}			
			?>
			</br>
			<label>Project database import step</label>
			<textarea class="form-control" name="pdatast" > <?php echo $pdatast;?> </textarea>
				<br />
			<?php
					if(isset($_SESSION['error']['pprice']))
					{ 
						echo'<font color="red">'.$_SESSION['error']['pprice'].'</font>';
									
					}			
			?>
			</br>
			<label>Project Price</label>
			<input type="text" value="<?php echo $pprice;?>" class="form-control" name="pprice">
			</br>
			<input type="submit" value="Add Project" class="btn btn-success">
			</form>
			<?php
				unset($_SESSION['error']);
			?>
			<?php
									unset($_SESSION['product']);
								?>	
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    </div>
	<?php
	    include ("include/footer.php");
	?>
