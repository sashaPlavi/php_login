<?php
// Include the database configuration file  
require_once './db/db.php';
require './db/models/images.php';
require './controler/PaginationCtrl.php';

// Get image data from database 
//$result =  Images::get_images($mysqli);
//print_r($result)
// $page = new PaginationCtrl;
// $page->paginate()




?>


<?php
require 'header.php';
?>

<div class="center">

  <h3>Images</h3>
  <?php

  $page = new PaginationCtrl;
  $data = $page->paginate();
  ?>
</div>



<div class="center">
  <?php
  while ($row = mysqli_fetch_array($data)) {
    $image = base64_encode($row['image']);
    $created_at = $row['uploaded'];
    echo "<div class='image_box'>
     <img width='350'; src='data:image/jpg;charset=utf8;base64," . $image . "' />
     <p>created at " . $created_at . "</p>
     </div>";
  }


  ?>

</div>







<!-- <img width="350" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> -->