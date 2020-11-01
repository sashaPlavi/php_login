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

<div class="section">
  <?php
  $page = new PaginationCtrl;
  $page->paginate()

  ?>

</div>







<!-- <img width="350" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> -->