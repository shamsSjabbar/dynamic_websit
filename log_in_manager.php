<!-- this page is log in of admin(doctor):persen use this page have all power -->
<html>

<?php
include("styleLogin.php");

$error_username="";
$error_pass1="";
$db_name_dr="";
$db_pass1="";
$username="";
$Pass="";
$link_of_page;
// echo "* $error_username<br>$error_pass1<br>$error_type<br>$error_type<br>$db_name_dr<br>$db_pass1<br>
// $username<br>$Pass<br>$type<br>";
if(isset($_POST["Login"])){
   $username=$_POST["name_dr"];
   $Pass=$_POST["password_dr"];
//    echo "** $error_username<br>$error_pass1<br>$error_type<br>$error_type<br>$db_name_dr<br>$db_pass1<br>
// $username<br>$Pass<br>$type<br>";
 if (isset($username) && !empty($username)) {
     //echo"$username<br>$Pass<br>$type";
     if (isset($Pass)&& !empty($Pass)) {
                  
     
 //echo "*** $db_name_dr<br>$db_pass1<br>$db_type<br>$username<br>$Pass<br>$type<br>";
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '12345';
$dbname="my_project";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn ){
    die('Could not connect: ' . mysqli_error());
 }
 echo 'Connected successfully';
 
 $sql = 'SELECT name_dr,password_dr FROM manager ';
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $db_name_dr=$row['name_dr'];
        $db_pass1=$row['password_dr'];
        
       // echo"<br>true";
      //  echo "**** <br>$db_name_dr<br>$db_pass1<br>$db_type<br>
      //  $username<br>$Pass<br>$type<br>";
    
    
    
    if(($username===$db_name_dr)&&($Pass===$db_pass1)){
      $link_of_page=1;
      // echo "*****$db_name_dr <br>$db_pass1<br>$db_type<br>
      //  $username<br>$Pass<br>$type<br>";
      //  echo"<br><span style='color:red'>match</span>";
      
    }
}
 }
 if($link_of_page == 1){
  
           header("location: manager.php");
 }else {
   
    header("location: log_in_manager.php");
  
 }

 mysqli_close($conn);
} else {
   $error_pass1 ="Pleses,Enter password";
}
} else {
   $error_username ="Pleses,Enter name ";
}
}    



?>
 
 <body>
        <div class="loginBox">
   
        <img src="./imag/images3" alt="imageoflogin" class="img">

        <h1 class="h1OfLogin">login of manager</h1>
        <form action ="log_in_manager.php"  method = "POST">
            <p>Name</p>
            <input type="name" name="name_dr" placeholder="Enter name ">
            <?php echo"$error_username";?>
            <br/><br/>
            <p>Password</p>
            <input type="password_dr" name="password_dr" placeholder="Enter password_dr ">
            <?php echo" $error_pass1";?>
            <br/><br/><br/>
            <input type="submit" name="Login" value="Login">


        </form>
    </div>

</body>

</html>