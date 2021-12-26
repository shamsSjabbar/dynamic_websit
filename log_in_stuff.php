
<html>

<?php
include("styleLogin.php");

$error_username="";
$error_type="";
$error_password_employee="";
$db_name_employee="";
$db_password_employee="";
$db_type="";
$link_of_page=0;
$username="";
$type="";
$password_employee="";
// echo "* $error_username<br>$error_pass1<br>$error_type<br>$error_type<br>$db_name_employee<br>$db_pass1<br>
// $username<br>$Pass<br>$type<br>";
if(isset($_POST["Login"])){
   $username=$_POST["name_employee"];
   $type=$_POST["type_of_user"];
   $password_employee=$_POST["password_employee"];
//    echo "** $error_username<br>$error_pass1<br>$error_type<br>$error_type<br>$db_name_employee<br>$db_pass1<br>
// $username<br>$Pass<br>$type<br>";
 if (isset($username) && !empty($username)) {
     //echo"$username<br>$Pass<br>$type";
            if (isset($type)&& !empty($type)) {
                if (isset($password_employee)&& !empty($password_employee)) {
                   
                    
                    //echo "*** $db_name_employee<br>$db_pass1<br>$db_type<br>$username<br>$Pass<br>$type<br>";
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '12345';
$dbname="my_project";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn ){
    die('Could not connect: ' . mysqli_error());
 }
 
 $sql = 'SELECT name_employee,type_employee,password_employee FROM stuffs';
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $db_name_employee=$row['name_employee'];
        $db_type=$row['type_employee'];
        $db_password_employee=$row['password_employee'];
       // echo"<br>true";
      //  echo "**** <br>$db_name_employee<br>$db_pass1<br>$db_type<br>
      //  $username<br>$Pass<br>$type<br>";
    
    
    
    if(($username===$db_name_employee)&&($type===$db_type)&&($password_employee===$db_password_employee)){
      $link_of_page=1;
      // echo "*****$db_name_employee <br>$db_pass1<br>$db_type<br>
      //  $username<br>$Pass<br>$type<br>";
      //  echo"<br><span style='color:red'>match</span>";
      
    }
}
}
//echo"******";
   if($link_of_page == 1){

    switch ($type) {
        case "reception":
        header("location: Reception.php");
            break;
        case "adminstative":
           header("location: adminstative.php");
            break;
        case "radial":
         header("location: x_ray.php");
            break;
        default:
        header("location: log_in_stuff.php");
       
    }
            
   }
         
   
   
 mysqli_close($conn);

}    
                
            else {
                $error_password_employee="Pleses,Enter password ";
            }
            } else {
                $error_type="Pleses,Enter type of user";
            }
 } else {
    $error_username ="Pleses,Enter username ";
 }
}
 



?>
 
 <body>
        <div class="loginBox">
   
        <img src="./imag/images3" alt="imageoflogin" class="img">
        <h1 class="h1OfLogin">login Of Stuff</h1>
        <form action ="log_in_stuff.php"  method = "POST">
            <p>Name</p>
            <input type="name" name="name_employee" placeholder="Enter name ">
            <?php echo"$error_username";?>
            <br/><br/>
            <p> User Type  </p>
            <input type="type_of_user" name="type_of_user" placeholder="Enter your type ">
            <?php echo"$error_type";?>
            <p> Password </p>
            <input type="password_employee" name="password_employee" placeholder="Enter your password">
            <?php echo"$error_password_employee";?>
            <input type="submit" name="Login" value="Login">


        </form>
    </div>

</body>

</html>