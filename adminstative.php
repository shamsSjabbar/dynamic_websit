
<html>

<?php
include("style.php");
?>
 <body>
 <div>
   
   <center><i>
   <h1 class="theamOfHeader">E-orthodontic center management system</h1>
   </i>
   </center>
   <div>
   <center><i>
   <h1 class="theamOfNameOfPages">Adminstative</h1>
   </i>
   </center>
   </div>
  <div  class="borderofbutton">
   <div class="spaces">
     
  
         <center>
                   
                   <input type="button" value="Report about Patient"  style="float: left;" onclick="window.location.href='patient_report.php'"  class="MyButton"/>
                   <input type="button" value="Report about Account"   onclick="window.location.href='account_report.php'"  class="MyButton"/> 
                   <input type="button" value="Report about Materials"  style="float:right;" onclick="window.location.href='materials_report.php'"  class="MyButton"/>
                   <br/><br/><br/>
                   <input type="button" value="Report about doctors"  style="float: left;" onclick="window.location.href='doctor_report.php'"  class="MyButton"/>
                   <input type="button" value=" Accounts"   onclick="window.location.href='account_info.php'"  class="MyButton"/> 
                   <input type="button" value="Materials"  style="float:right;"onclick="window.location.href='materials.php'"  class="MyButton"/>
                   <br/><br/><br/>
                   <input type="button" value="Log out"   onclick="window.location.href='Log_out_stuff.php'"  class="MyButton"/>
                  
                 
                   
          </center> 

          </div>
       

    </div>
   
</div>


<?php
                  include("footer.php");
                  ?>




</body>
</html>