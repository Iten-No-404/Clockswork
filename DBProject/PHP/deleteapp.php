<?php
require_once 'app.php';
require_once 'review.php';
require_once 'functions.php';

 $obj=new App();
 $review=new Review();
 $ApplicationID=(int)$_GET['id'];


 $obj-> deletefrompurchased_by($ApplicationID);
 $result=$review->select($ApplicationID);
 $review-> deletefromreviwed($ApplicationID);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          
             
                $review->deletefromreviw($row['ReviewID']);
           
          }
      }
  $obj->deleteapp($ApplicationID);
RedirectJS("../HTML/Myapp.php");
     ?>