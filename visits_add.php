<html id="top">
<head>
<?php
   include("style.php");
      $error_id_patient="";
      $error_name_patient="";
      $error_id_dr="";
      $error_name_dr="";
      $error_date_first_treatment="";
      $error_next_visiter="";
      $error_diagnosis="";
      $error_image1="";
      $error_image2="";
      $error_image3="";
      $error_no_of_visit="";
      $error_id_material="";
      $error_name_material="";
      $error_no_use_materials="";
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
                  if (!empty($_POST["id_dr"])&& isset($_POST["id_dr"])) {
                     if (!empty($_POST["name_dr"])&& isset($_POST["name_dr"])) {
                       if (!empty($_POST["date_first_treatment"])&& isset($_POST["date_first_treatment"])) {
                         if (!empty($_POST["next_visiter"])&& isset($_POST["next_visiter"])) {
                            if (!empty($_POST["diagnosis"])&& isset($_POST["diagnosis"])) {
                                  if (!empty($_POST["no_of_visit"])&& isset($_POST["no_of_visit"])) {
                                     if (!empty($_POST["id_material"])&& isset($_POST["id_material"])) {
                                        if (!empty($_POST["name_material"])&& isset($_POST["name_material"])) {
                                          if (!empty($_POST["no_use_materials"])&& isset($_POST["no_use_materials"])) {
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
                        $error_no_use_materials="";
                     }
                        } else {
                   $error_name_material="";
                    }
                          } else {
                       $error_id_material="";
                      }
                                 
                              } else {
                                 $error_no_of_visit="Please, Enter number of visit";
                              }
                              
                       
                           }else {
                           $error_diagnosis="Please, Enter the diagnosis";
                           }
                        }else {
                        $error_next_visiter="Please, Enter the next visit ";
                        } 

                        }else {
                        $error_date_first_treatment="Please, Enter the treatment began";
                        }
                        }else {
                        $error_name_dr="Please, Enter the name of doctor";
                        }
                        }else {
                        $error_id_dr="Please, Enter the id of doctor";
                        }
                        }else {
                        $error_name_patient="Please, Enter the name of patient";

                        }
                        }else {
                        $error_id_patient="Please, Enter the id";
                        }
           }
           $no_use_materials=$_POST['no_use_materials'];
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
                                               
                                                $sql = "INSERT INTO visiter (id_patient,name_patient,id_dr,name_dr,date_first_treatment,next_visiter,diagnosis,
                                                      name1,image1,name2,image2,name3,image3,no_of_visit,id_material,name_material,no_use_materials) 
                                                      VALUES  ('$_POST[id_patient]' ,'$_POST[name_patient]','$_POST[id_dr]','$_POST[name_dr]',
                                                      '$_POST[date_first_treatment]','$_POST[next_visiter]' ,'$_POST[diagnosis]','$name1','$image1',
                                                      '$name2','$image2','$name3','$image3', '$_POST[no_of_visit]', '$_POST[id_material]', '$_POST[name_material]', '$_POST[no_use_materials]')";

                                                
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
                <h1>Add Information Of Visiter </h1>
            </i>
   </center>
         </div>

        <br/>
        <form action = "<?php $_PHP_SELF ?>" method = "POST"  enctype="multipart/form-data" class="box"> 
                <div style="float:left;"  class="borderofbutton" >
                     <div class="spaces_of_add">
                     <p>Patient Id</p>      
                           <input type="text" name="id_patient" id="id_patient" placeholder="Enter id_patient"  >
                           <?php echo "<br><span style='color:red'> $error_id_patient</span>";?>
                     <p>Patient name</p>
                           <input type="text" name="name_patient" id="name_patient" placeholder="Enter Name ">
                           <?php echo "<br><span style='color:red'>  $error_name_patient</span>";?>
                     <p>Doctor Id</p>
                           <input type="text" name="id_dr" id="id_dr" placeholder="Enter Id of doctor">
                           <?php echo "<br><span style='color:red'>    $error_id_dr</span>";?>
                        
                     <p>Doctor Name</p>
                        <input type="text" name="name_dr"  id="name_dr" placeholder="Enter Doctor name ">
                        <?php echo "<br><span style='color:red'>  $error_name_dr</span>";?>
                     <p>Treatment Began</p>  
                        <input type="text" name="date_first_treatment" id="date_first_treatment" placeholder="Enter Treatment Began "> 
                        <?php echo "<br><span style='color:red'>  $error_date_first_treatment</span>";?>
                  
                     <p>Next visit</p>
                          <input type="text" name="next_visiter" id="next_visiter" placeholder="Enter next visit ">
                           <?php echo "<br><span style='color:red'> $error_next_visiter</span>";?>
                      <p>Diagnosis</p>
                           <input type="text" name="diagnosis" id="diagnosis" placeholder="Enter Diagnosis ">
                                 <?php echo "<br><span style='color:red'>  $error_diagnosis</span>";?> 
                                 <br/>
                   <p>The Picture 1</p>  
                       <input type="file" name="image1" id="image1" placeholder="Enter the picture ">
                        <?php echo "<br><span style='color:red'> $error_image1</span>";?> 
                                    
                                 
                                          
                     </div>              
               </div>

               <div style="float:right;" class="borderofbutton">
                        <div class="spaces_of_add">
                      
                           <p>The Picture 2</p>
                                 
                                    <input type="file" name="image2" id="image2" placeholder="Enter the picture ">
                                    <?php echo "<br><span style='color:red'> $error_image2</span>";?> 
                                    <br/>
                           <p>The Picture 3</p>
                                 
                                 <input type="file" name="image3" id="image3" placeholder="Enter the picture ">
                                 <?php echo "<br><span style='color:red'> $error_image3</span>";?> 
                                
                           <p>Number of visit</p>
                                 
                                 <input type="text" name="no_of_visit" id="no_of_visit" placeholder="Enter Namber of visit ">
                                 <?php echo "<br><span style='color:red'> $error_no_of_visit</span>";?> 
                                 <p>Material Id</p>
                           <input type="text" name="id_material" id="id_material" placeholder="Enter id of material"  >
                           <?php echo "<br><span style='color:red'>$error_id_material</span>";?>
                     <p>Material Name</p>
                           <input type="text" name="name_material" id="name_material" placeholder="Enter Name of material">
                           <?php echo "<br><span style='color:red'>$error_name_material</span>";?>
                           <p>Number of use material</p>
                                 
                                 <input type="text" name="no_use_materials" id="no_use_materials" placeholder="Enter Namber of material ">
                                 <?php echo "<br><span style='color:red'> $error_no_use_materials</span>";?> 
                         
                                  <br/><br/><br/><br/><br/>
                                      
                                      
                        </div>                
                                       
               </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> <br/><br/><br/><br/> <br/><br/><br/>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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