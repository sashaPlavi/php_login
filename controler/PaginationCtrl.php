<?php

class PaginationCtrl
{


  public function paginate()
  {
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);


    require("$root/php_login/db/db.php");
    require("$root/php_login/db/models/resetpwd.php");

    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
    $no_of_records_per_page = 3;


    $total_pages_sql = "SELECT COUNT(*) FROM my_images";
    $result = mysqli_query($mysqli, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    //var_dump($total_rows);
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    // What page are we currently on?
    $pageno = min($total_pages, filter_input(INPUT_GET, 'pageno', FILTER_VALIDATE_INT, array(
      'options' => array(
        'default'   => 1,
        'min_range' => 1,
      ),
    )));

    // Calculate the offset for the query
    $offset = ($pageno - 1) * $no_of_records_per_page;


    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $no_of_records_per_page), $total_rows);


    // The "back" link
    $prevlink = ($pageno > 1) ? '<a href="?pageno=1" title="First page">&laquo;</a> <a href="?pageno=' . ($pageno - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($pageno < $total_pages) ? '<a href="?pageno=' . ($pageno + 1) . '" title="Next page">&rsaquo;</a> <a href="?pageno=' . $total_pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
    echo '<div id="paging"><p>', $prevlink, ' Page ', $pageno, ' of ', $total_pages, ' pages, displaying ', $start, '-', $end, ' of ', $total_rows, ' results ', $nextlink, ' </p></div>';




    //echo '<div id="paging"><p>', $prevlink, ' Page ', $pageno, ' of ', $total_pages_sql, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';


    $sql = "SELECT * FROM my_images ORDER BY uploaded DESC LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($res_data)) {
      $image = base64_encode($row['image']);
      //$imgView = "<img width='350' src='data:image/jpg;charset=utf8;base64,.$image.;/>";
      echo "<img width='350' src='data:image/jpg;charset=utf8;base64," . $image . "' />";
      // var_dump($image);
      // echo 'bla';
    }
    mysqli_close($mysqli);
  }
}
