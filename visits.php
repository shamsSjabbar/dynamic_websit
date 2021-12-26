
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
     <h1 class="theamOfNameOfPages">Visits</h1>
     </i>
     </center>
     </div>
  <div  class="borderofbutton">
     <div class="spaces">
       
    
           <center>
                     
                     <input type="button" value="visitor information"  style="float: left;" onclick="window.location.href='visits_info'"  class="MyButton"/>
                     <input type="button" value="visitor report of photos" onclick="window.location.href='visits_report_photo.php'"  class="MyButton"/>
                     <input type="button" value="visitor report" style="float:right;"onclick="window.location.href='visits_report.php'"  class="MyButton"/>
                     <br/><br/><br/>
            
            </center> 

            </div>
         

      </div>
      <?php
                  include("footer.php");
                  ?>
 </div>
</body>
</html>