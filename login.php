<?php
include 'include/header.php';
?>
    <form action="action.php" method="post">
        User name : <input type="text" name="uname" placeholder="Enter your User name" required><br>
        Password : <input type="password" name="pwd" placeholder="Enter your Password" required><br>
        <input type="submit" value="Log in">
    </form>
<?php
include 'include/footer.php';
?>