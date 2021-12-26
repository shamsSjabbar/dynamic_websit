<html id="top">
<head>
<?php
   include("style.php");
      $error_id_patient="";
      $error_name_patient="";
      $error_id_employee="";
      $error_name_employee="";
      $error_the_picture_type="";
      $error_date_picture="";
      $error_image1="";
      $error_image2="";
      $error_image3="";
      ini_set('mysql.connect_timeout',300);
    ini_set('default_socket_timeout',300);

   ?>
    <?php
         $name1=" ";$image1=" "; $name2=" ";$image2=" "; $name3=" ";$image3=" ";

        if (isset($_POST['Insert'])) {
           if ((getimagesize($_FILES['image1']['tmp_name']) == FALSE) &&( getimagesize($_FILES['image2']['tmp_name']) == FALSE)
           &&(getimagesize($_FILES['image3']['tmp_name']) == FALSE ) )
           {
               echo"pleas select image.";
           }
           else{
                   if (!empty($_POST["id_patient"])&& isset($_POST["id_patient"])) {
                        if (!empty($_POST["name_patient"])&& isset($_POST["name_patient"])) {
                           if (!empty($_POST["id_employee"])&& isset($_POST["id_employee"])) {
                              if (!empty($_POST["name_employee"])&& isset($_POST["name_employee"])) {
                                if (!empty($_POST["the_picture_type"])&& isset($_POST["the_picture_type"])) {
                                 if (!empty($_POST["date_picture"])&& isset($_POST["date_picture"])) {
               
                                     
                                 $image1=addslashes($_FILES['image1']['tmp_name']);
                                 $name1=addslashes($_FILES['image1']['name']);
                                 $image1=file_get_contents($image1);
                                 $image1=base64_encode($image1);
                                 $image2=addslashes($_FILES['image2']['tmp_name']);
                                 $name2=addslashes($_FILES['image2']['name']);
                                 $image2=file_get_contents($image2);
                                 $image2=base64_encode($image2);
                                 $image3=addslashes($_FILES['image3']['tmp_name']);
                                 $name3=addslashes($_FILES['image3']['name']);
                                 $image3=file_get_contents($image3);
                                 $image3=base64_encode($image3);
     
                                                 
                
                                        saveimage($name1,$image1,$name2,$image2,$name3,$image3);

                
                                    } else {
                                       $error_date_picture="Please, Enter date of picture";
                                    }       
                                    } else {
                                           $error_the_picture_type="Please, Enter the picture type";
                                    }
                                       } else {
                                          $error_name_employee="Please, Enter the name of Employee";
                                    }
                                    } else {
                                          $error_id_employee="Please, Enter the id of Employee";
                                    }
                                    } else {
                                         $error_name_patient="Please, Enter the name of patient";
                                    }
                                    } else {
                                          $error_id_patient="Please, Enter the id of patient";
                                    }
                                    
                        
           }
        }
        function saveimage($name1,$image1,$name2,$image2,$name3,$image3)
            {
              
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "12345";
                                                $dbname = "my_project";
                                    
                                                // Create connection
                                                $conn = mysqli_connect( $servername, $username,$password);
                                    
                                                mysqli_select_db($conn,"my_project");
                                               
                                                $sql = "INSERT INTO radiology (id_patient,name_patient,id_employee,name_employee,the_picture_type,date_picture,
                                                      name1,image1,name2,image2,name3,image3) 
                                                      VALUES  ('$_POST[id_patient]' ,'$_POST[name_patient]','$_POST[id_employee]','$_POST[name_employee]',
                                                      '$_POST[the_picture_type]','$_POST[date_picture]' ,'$name1','$image1',
                                                      '$name2','$image2','$name3','$image3')";

                                                
                                                    $result=mysqli_query($conn,$sql);
                                                if ($result) {
                                                   echo" <div class='container'>";
                                                   echo"<div  class='alert alert-success alert-dismissible'>";
                                                   echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                                   echo"<strong>Success!</strong> ";
                                                   echo"The Add process completed successfully.";
                                                   echo"</div>";
                                                   echo"</div>";
                                                 
                                                } else {
                                                   echo" <div class='container'>";
                                                   echo"<div class='alert alert-danger'  alert-dismissible'>";
                                                   echo" <button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                                   echo"<strong>Error!</strong> ";
                                                   echo mysqli_error($conn) ;
                                                   echo"</div>";
                                                   echo"</div>";

                                                }
                                               
                                                $conn->close();
                                              
               
             }
            ?>
</head>

<body>
<div class="row">
         <div class="col-sm-4">
         <button type="button" class=" btn btn-info " data-toggle="collapse" data-target="#demo"><h4 id="show">Help</h4></button>
         <div id="demo" class="collapse"><br/>
            <p id="hide">Fill out all the fields and click (Add) to add the information.If you want to close the help, click on the text.<p>
            
         </div>
         </div>
         </div>
<div >
         <div  class="theamOfHeader">
            <center>
               <i>
                  <h1 >E-orthodontic center management system</h1>
               </i>
            </center>
         </div>
         <div class="theamOfNameOfPages">
         <center>
            <i>
                <h1>Add Information Of X_Ray</h1>
            </i>
   </center>
         </div>

        <br/> <br/>
        <form action = "<?php $_PHP_SELF ?>" method = "POST"  enctype="multipart/form-data" class="box"> 
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                     <p>Patient Id</p>      
                           <input type="text" name="id_patient" id="id_patient" placeholder="Enter id_patient"  >
                           <?php echo "<br><span style='color:red'> $error_id_patient</span>";?>
                     <p>Patient name</p>
                           <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name ">
                           <?php echo "<br><span style='color:red'>  $error_name_patient</span>";?>
                    
                     <p>Employee Id</p>
                           <input type="text" name="id_employee" id="id_employee" placeholder="Enter Id of">
                           <?php echo "<br><span style='color:red'>    $error_id_employee</span>";?>
                        
                     <p>Employee Name</p>
                        <input type="text" name="name_employee"  id="name_employee" placeholder="Enter Employee name ">
                        <?php echo "<br><span style='color:red'>  $error_name_employee</span>";?>
                    
                     <p>The picture type</p>  
                        <input type="text" name="the_picture_type" id="the_picture_type" placeholder="Enter Next Treatment "> 
                        <?php echo "<br><span style='color:red'>  $error_the_picture_type</span>";?>
                  
                        <br/><br/>
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_add">
                              <p>Date of picture</p>
                              <input type="text" name="date_picture" id="date_picture" placeholder="Enter next visit ">
                                 <?php echo "<br><span style='color:red'> $error_date_picture</span>";?>
                                 <br/>
                           <p>The Picture 1</p>  
                                    <input type="file" name="image1" id="image1" placeholder="Enter the picture ">
                                    <?php echo "<br><span style='color:red'> $error_image1</span>";?> 
                           <p>The Picture 2</p>
                                 
                                    <input type="file" name="image2" id="image2" placeholder="Enter the picture ">
                                    <?php echo "<br><span style='color:red'> $error_image2</span>";?> 
                           <p>The Picture 3</p>
                                 
                                 <input type="file" name="image3" id="image3" placeholder="Enter the picture ">
                                 <?php echo "<br><span style='color:red'> $error_image3</span>";?> 
              
                                       
                                      
                        </div>                
                                       
               </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> <br/><br/><br/> 
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <center>
                              <input type="submit" value="Add" name ="Insert"   class="boxinsert"/>  
                        </center>
                 </form>
               </div>

               <?php
                  include("footer.php");
                  ?>
    
         </div>
</body>

</html>