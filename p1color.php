<?php
      require_once 'include/general-includes.php';
      require_once 'class/clsp1tags.php';
        $objp1tags = new p1tags();
        $condition = ' AND positive_or_negative=1 ';
        $p1_positive_sum = $objp1tags->sum_records($condition);

        $condition = ' AND positive_or_negative=2 ';
        $p1_negative_sum = $objp1tags->sum_records($condition);

        if($p1_positive_sum < $p1_negative_sum)
        {
          echo "<div id='p1color' class='red-img'>";
          echo "<img src='images/person1.jpg'>";
          echo "</div>";
        }
        else
        {
          echo "<div id='p1color' class='green-img'>";
          echo "<img src='images/person1.jpg'>";
          echo "</div>";
        }
?>