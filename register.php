<?php
include 'include/header.php';
?>
<body>
    <h1>Personal Information</h1>
    <form action="action.php" method="post" enctype="multipart/form-data">
        User name : <input type="text" name="uname" placeholder="Enter your User name" required><br>
        Email : <input type="text" name="email" placeholder="Enter your Email" required><br>
        Phone Number : <input type="text" name="number" placeholder="Enter your Phone Number" required><br>
        Password : <input type="password" name="pwd" placeholder="Enter your Password" required><br>
        Confirm Password : <input type="password" name="cpwd" placeholder="Enter your Confirm  password" required><br>
        Resume : <input type="file" name="resume" required><br>
        <input type="submit" value="Registration" name="registration">
    </form>
<?php
include 'include/footer.php';
?>