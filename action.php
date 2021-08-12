<?php 
    session_start();

    print_r($_FILES);

extract($_POST);

    if(isset($_SESSION['user_id'])!="")
    {
        header("Location: index.php");
    }
    // if(isset($_FILES['resume']))
    // {
    //     echo "<pre>";
    //     print_r($_FILES);
    //     echo "</pre>";
    //     $file_name = $_FILES['resume']['name'];
    //     $file_temp = $_FILES['resume']['tmp_name'];
    //     $file_type = $_FILES['resume']['type'];

    //     move_uploaded_file($file_temp , "uploader/".$file_name);

    // }
    // $resume = strtoupper(substr($_FILES['resume']['name'],-4));
		
	    // if(empty($_FILES['resume']['name']))
	 	// {
	 	// 	$error['resume']="Please chose Project View Image";
	 	// }
	 	// else if(!($resume==".JPG" || $resume==".PNG" || $resume==".JPEG"))
	 	// {
	 	// 	$error['resume']="Please chose JPG ya PNG file";
	 	// }
	 	// else if(file_exists("uploader/".$_FILES['resume']['name']))
     	// {
	 	// 	$error['resume']="this file already exists";
     	// }


    echo "$uname";
    echo "<br>";
    echo "$email";
    echo "<br>";
    echo "$number";
    echo "<br>";
    echo "$pwd";
    echo "<br>";
    echo "$cpwd";
    echo "<br>";
    echo $_FILES['resume']['name'];
    echo "<br>";

    $conn = mysqli_connect('localhost' , 'root' , '' , 'myproject2021');
    if($conn->connect_error)
    {
        die("connection fail" . $conn->connect_erro) . "<br>";
    }
    else
    {
        echo "conection successfull<br>";
    }

    //$query = "INSERT INTO registration(username, email, phonenumber, password, confirmpassword, resume) VALUES ('$uname','$email','$number','$pwd','$cpwd','$resume')";


     if(isset($_POST["registration"]))
     {
        //  echo "abc";
         $pname = rand(0 , 10000) . "-" . $_FILES["resume"]["name"];
    
         $tname = $_FILES["resume"]["tmp_name"];

         $uploads_dir = 'uploader';

         $file_type = $_FILES['resume']['type'];

         if ($file_type=="application/pdf") 
         {
             echo "Success<br>";
        }
        else if($file_type=="image/gif" || $file_type=="image/jpeg" || $file_type=="image/jpg" || $file_type=="image/png")
        {
            echo "file type is invalid<br>";
        }

         move_uploaded_file($uploads_dir . '/' . $pname , $file_type);
     }
     
        $sql = "INSERT INTO registration(username, email, phonenumber, password, confirmpassword, resume) VALUES ('$uname','$email','$number','$pwd','$cpwd','$pname')";

        $res = mysqli_query($conn  , $sql);

        if($res)
        {
            echo "inserted successfull<br>";
        }
        else
        {
            echo "error<br>";
        }
    
        if (isset($_SESSION['form'])) {
            // logged in
        } else {
            // not logged in
        }
        
    echo "<table width=80% border=1>";
    echo "<tr>";
    echo "<td>File Name</td>";
    echo "<td>File Type</td>";
    echo "<td>View</td>";
    echo "</tr>";

 $sql="SELECT * FROM registration";
 $result_set=mysqli_query($conn , $sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        <tr>
        <td> . <?php $pname ; ?> . </td>
        <td> . <?php $file_type ; ?> . </td>
        <td><a href="<?php echo 'uploader/'.$row['resume']; ?>" target="_blank" ></a></td>
        </tr>
        <?php 
 }

echo "</table>";

    session_destroy();
    ?>