<?php
	require_once 'include/general-includes.php';
  require_once 'class/clsperson.php';
  require_once 'class/clsrate.php';
  require_once 'class/clspositivetags.php';
  require_once 'class/clsnegativetags.php';
  require_once 'class/clsp1tags.php';
  require_once 'class/clsp2tags.php';
  require_once 'class/clsp3tags.php';
?>


<!DOCTYPE HTML>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
<title>Grade your politicians now</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap theme -->
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="colorbox.css" />
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">

<script src="lib/sweet-alert.js"></script>
<link rel="stylesheet" href="lib/sweet-alert.css">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<!-- tab -->


</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <!-- Navigation -->
    <div class="navbar-outer"><nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main0-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">PoliGrader</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main0-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="http://www.mucholab.net">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#" data-toggle="modal" data-target="#ModalAbout">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#disclaimer" data-toggle="modal" data-target="#ModalDiscla">Disclaimer</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav></div>
<div class="modal fade" id="ModalAbout" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">About</h4>
            </div>
            <div class="modal-body">
                <h2>Click the picture.Choose like or dislike and as many tags as you want.If the tag you want is not there, create one. Be respectful.</h2>
            </div>
            
    </div>
  </div>
</div>
<!-- /.modal -->
<div class="modal fade" id="ModalDiscla" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Disclaimer</h4>
            </div>
            <div class="modal-body">
                <h2>I am not responsible for the tags people decide to write here. They do not reflect my opinions.Unrespectful tags will be removed the soonest possible.</h2>
            </div>
            
    </div>
  </div>
</div>
<!-- /.modal2 -->
<div class="container">
  <div class="hidden-xs"><div class="fb-share-button" data-href="http://mucholab.net/PersonalityCounter/index.php" data-layout="button_count"></div></div>
  <h1 class="top-title">Politicians Grader</h1>
  
  <div class="col-lg-12">
  
	<?php
		$condition="";
    $objperson = new person();
		$rec = $objperson->get_records($condition);
		
    ?>

    <div class="top-box" id="temp-update"> 
      
       <?php

        $objrate = new rate();
        $condition = ' AND p_id = 1 AND rate = 1 ';
        $p1likes = $objrate->count_records($condition);

        $condition = ' AND p_id = 1 AND rate = 2 ';
        $p1dislikes = $objrate->count_records($condition);

        if($p1likes < $p1dislikes)
        {
          echo "<div  class='red-img'>";
        }
        else
        {
          echo "<div class='green-img'>";
        }

      ?>
        <a class='inline' href="#inline_content1">
          <img src="images/<?php echo $rec[0]['image']; ?>">
        </a>
      </div>
      <h1><?php echo $rec[0]['name']; ?></h1>
      <h2><a class="inline" href="#inline_content1">Vota Aquí!</a></h2>
      
      <div id="p1likesdislikes" class="like-ctn">
        <div class="left"><img  src="images/like-icon.png"  alt="Like">
         
          <?php
            $objrate = new rate();
            $condition = ' AND p_id = 1 AND rate = 1 ';
            $p1likes = $objrate->count_records($condition);

            echo "(" . $p1likes . ")"; 
          ?>
          
        </div>
        <div class="right">
          <img src="images/unlike-icon.png" alt="Unlike">
          
          <?php
            $objrate = new rate();
            $condition = ' AND p_id = 1 AND rate = 2 ';
            $p1dislikes = $objrate->count_records($condition);
        
            echo "(" . $p1dislikes . ")"; 
          ?>

        </div></div>
        <div class="info"><small>Tags más populares:</small></div>
      
      <div class="tag-btn">
        <ul id="main_tag_p1">
          <?php
            $objp1tags = new p1tags();
            $condition = "";
            $order = " count_tags DESC LIMIT 3";
            $p1_tags = $objp1tags->get_records($condition, $order);

            foreach($p1_tags as $r)
            {
              if($r['positive_or_negative'] == 1)
              {
                echo "<li class='label label-success'>" . $r['tag_name']  ."</li>";
              }
              else if($r['positive_or_negative'] == 2)
              {
                echo "<li class='label label-danger'>" . $r['tag_name']  ."</li>";
              }
            }
          ?>
        </ul>
      </div>
    </div>

    <div class="top-box">

       <?php

        $objrate = new rate();
        $condition = ' AND p_id = 2 AND rate = 1 ';
        $p2likes = $objrate->count_records($condition);

        $condition = ' AND p_id = 2 AND rate = 2 ';
        $p2dislikes = $objrate->count_records($condition);

        if($p2likes < $p2dislikes)
        {
          echo "<div class='red-img'>";
        }
        else
        {
          echo "<div class='green-img'>";
        }

      ?>

        <a class='inline' href="#inline_content2">
          <img src="images/<?php echo $rec[1]['image']; ?>">
        </a></div>
      <h1><?php echo $rec[1]['name']; ?></h1>
      <h2><a class="inline" href="#inline_content2">Vota Aquí!</a></h2>

      <div id="p2likesdislikes" class="like-ctn">
        <div class="left"><img src="images/like-icon.png" alt="Like">

          <?php
            $objrate = new rate();
            $condition = ' AND p_id = 2 AND rate = 1 ';
            $p2likes = $objrate->count_records($condition);

            echo "(" . $p2likes . ")"; 
          ?>

        </div>
        <div class="right"><img src="images/unlike-icon.png"  alt="Like">

          <?php
            $objrate = new rate();
            $condition = ' AND p_id = 2 AND rate = 2 ';
            $p2dislikes = $objrate->count_records($condition);
        
            echo "(" . $p2dislikes . ")"; 
          ?>

        </div>
      </div>
      <div class="info"><small>Tags más populares:</small></div>
      <div class="tag-btn">
        <ul id="main_tag_p2">
          <?php
            $objp2tags = new p2tags();
            $condition = "";
            $order = " count_tags DESC LIMIT 3";
            $p2_tags = $objp2tags->get_records($condition, $order);

            foreach($p2_tags as $r)
            {
              if($r['positive_or_negative'] == 1)
              {
                echo "<li class='label label-success'>" . $r['tag_name']  ."</li>";
              }
              else if($r['positive_or_negative'] == 2)
              {
                echo "<li class='label label-danger'>" . $r['tag_name']  ."</li>";
              }
            }
          ?>
        </ul>
      </div>
    </div>

    <div class="top-box top-box-last">

       <?php

        $objrate = new rate();
        $condition = ' AND p_id = 3 AND rate = 1 ';
        $p3likes = $objrate->count_records($condition);

        $condition = ' AND p_id = 3 AND rate = 2 ';
        $p3dislikes = $objrate->count_records($condition);

        if($p3likes < $p3dislikes)
        {
          echo "<div class='red-img'>";
        }
        else
        {
          echo "<div class='green-img'>";
        }

      ?>


        <a class='inline' href="#inline_content3">
          <img src="images/<?php echo $rec[2]['image']; ?>">
        </a></div>
      <h1><?php echo $rec[2]['name']; ?></h1>
      <h2><a class="inline" href="#inline_content3">Vota Aquí!</a></h2>

      <div id="p3likesdislikes" class="like-ctn">
        <div class="left"><img src="images/like-icon.png"  alt="Like">
          <?php
            $objrate = new rate();
            $condition = ' AND p_id = 3 AND rate = 1 ';
            $p3likes = $objrate->count_records($condition);
        
            echo "(" . $p3likes . ")"; 
          ?>
        </div>
        <div class="right"><img src="images/unlike-icon.png"  alt="Like">
          <?php
            $objrate = new rate();
            $condition = ' AND p_id = 3 AND rate = 2 ';
            $p3dislikes = $objrate->count_records($condition);
        
            echo "(" . $p3dislikes . ")"; 
          ?>
        </div>
      </div>
      <div class="info"><small>Tags más populares:</small></div>
      <div class="tag-btn">
        <ul id="main_tag_p3">
          <?php
            $objp3tags = new p3tags();
            $condition = "";
            $order = " count_tags DESC LIMIT 3";
            $p3_tags = $objp3tags->get_records($condition, $order);

            foreach($p3_tags as $r)
            {
              if($r['positive_or_negative'] == 1)
              {
                echo "<li class='label label-success'>" . $r['tag_name']  ."</li>";
              }
              else if($r['positive_or_negative'] == 2)
              {
                echo "<li class='label label-danger'>" . $r['tag_name']  ."</li>";
              }
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
  <?php
    $condition=" AND id=1 ";
    $objperson = new person();
    $rec = $objperson->get_records($condition);
  ?>
<div style="display:none">
  <div id="inline_content1">
    <div class="popup-box">

      <?php
        $objp1tags = new p1tags();
        $condition = ' AND positive_or_negative=1 ';
        $p1_positive_sum = $objp1tags->sum_records($condition);

        $condition = ' AND positive_or_negative=2 ';
        $p1_negative_sum = $objp1tags->sum_records($condition);

        if($p1_positive_sum < $p1_negative_sum)
        {
          echo "<div class='red-img'>";
          echo "<img src='images/mrajoy.jpg'>";
          echo "</div>";
        }
        else
        {
          echo "<div class='green-img'>";
          echo "<img src='images/mrajoy.jpg'>";
          echo "</div>";
        }

      ?>

        
      <div class="likebtn-ctn">

        <?php
          if(isset($_COOKIE['PCounterLikeDislike_1']))
          {
            $objrate = new rate();
            $condition = ' AND id = ' . $_COOKIE['PCounterLikeDislike_1'];
            
            $rec = $objrate->get_records($condition);

            if($rec[0]['rate']==1)
            { ?>
              <input id='btn-like-p1' type="button" class="like-btn-green" value="" disabled="disabled">
              <input id='btn-dislike-p1' type="button" class="unlike-btn" value="" disabled="disabled">
     <?php  }
            else if($rec[0]['rate']==2)
            { ?>
              <input id='btn-like-p1' type="button" class="like-btn" value="" disabled="disabled">
              <input id='btn-dislike-p1' type="button" class="unlike-btn-red" value="" disabled="disabled">
     <?php  }
            else
            { ?>
              <input id='btn-like-p1' type="button" class="like-btn" value="">
              <input id='btn-dislike-p1' type="button" class="unlike-btn" value="">
     <?php  }
          }
          else
          { ?>
            <input id='btn-like-p1' type="button" class="like-btn" value="">
            <input id='btn-dislike-p1' type="button" class="unlike-btn" value="">
   <?php  }
        ?>
      </div>
      <div><h3>Chosen before:</h3></div>
      <div class="tag-btn">
        <ul id="p1_tags">
          <?php
            $objp1tags = new p1tags();
            $condition = "";
            $p1_tags = $objp1tags->get_records($condition);

            foreach($p1_tags as $r)
            {
              if($r['positive_or_negative'] == 1)
              {
                echo "<li class='label label-success'>" . $r['tag_name']  ."</li>";
              }
              else if($r['positive_or_negative'] == 2)
              {
                echo "<li class='label label-danger'>" . $r['tag_name']  ."</li>";
              }
            }
          ?>
        </ul>
      </div>

      <div class="addtag-ctn">
        <input id='txtnewtagp1' type="text" value="" placeholder="Add your tags. Respect!">
        <input id='btnnewtagp1' type="submit" value="">
      </div>
      <div><h3>Choose listed tags:</h3></div>
      <div id="positive_negative_tag_list_p1" class="np-ctn">
        <ul>
          <?php
            $objnegativetags = new negativetags();
            $condition = "";
            $negative_tag_names = $objnegativetags->get_records($condition);

            foreach($negative_tag_names as $r)
            {
              echo "<li>";
              echo "<input name='p1_negative_btn_list' type='button' class='btn btn-danger' value='$r[tag_name]'>";
              echo "</li>"; 
            }
          ?>
        </ul>
        <ul>
          <?php
            $objpositivetags = new positivetags();
            $condition = "";
            $positive_tag_names = $objpositivetags->get_records($condition);

            foreach($positive_tag_names as $r)
            {
              echo "<li>";
              echo "<input name='p1_positive_btn_list' type='button' class='btn btn-success' value='$r[tag_name]'>";
              echo "</li>"; 
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
    
      
<?php
    $condition=" AND id=2 ";
    $objperson = new person();
    $rec = $objperson->get_records($condition);
?>
<div style="display:none">
  <div id="inline_content2">
    <div class="popup-box">

      <?php
        $objp2tags = new p2tags();
        $condition = ' AND positive_or_negative=1 ';
        $p2_positive_sum = $objp2tags->sum_records($condition);

        $condition = ' AND positive_or_negative=2 ';
        $p2_negative_sum = $objp2tags->sum_records($condition);

        if($p2_positive_sum < $p2_negative_sum)
        {
          echo "<div class='red-img'>";
          echo "<img src='images/psanchez.jpg'>";
          echo "</div>";
        }
        else
        {
          echo "<div class='green-img'>";
          echo "<img src='images/psanchez.jpg'>";
          echo "</div>";
        }

      ?>

        
      <div class="likebtn-ctn">

        <?php
          if(isset($_COOKIE['PCounterLikeDislike_2']))
          {
            $objrate = new rate();
            $condition = ' AND id = ' . $_COOKIE['PCounterLikeDislike_2'];
            
            $rec = $objrate->get_records($condition);

            if($rec[0]['rate']==1)
            { ?>
              <input id='btn-like-p2' type="button" class="like-btn-green" value="" disabled="disabled">
              <input id='btn-dislike-p2' type="button" class="unlike-btn" value="" disabled="disabled">
    <?php   }
            else if($rec[0]['rate']==2)
            { ?>
              <input id='btn-like-p2' type="button" class="like-btn" value="" disabled="disabled">
              <input id='btn-dislike-p2' type="button" class="unlike-btn-red" value="" disabled="disabled">
    <?php   }
            else
            { ?>
              <input id='btn-like-p2' type="button" class="like-btn" value="">
              <input id='btn-dislike-p2' type="button" class="unlike-btn" value="">
    <?php   }
          }
          else
          { ?>
            <input id='btn-like-p2' type="button" class="like-btn" value="">
            <input id='btn-dislike-p2' type="button" class="unlike-btn" value="">
    <?php } ?>
        
      </div>
      <div><h3>Chosen before:</h3></div>
      <div class="tag-btn">
        <ul id="p2_tags">
          <?php
            $objp2tags = new p2tags();
            $condition = "";
            $p2_tags = $objp2tags->get_records($condition);

            foreach($p2_tags as $r)
            {
              if($r['positive_or_negative'] == 1)
              {
                echo "<li class='label label-success'>" . $r['tag_name']  ."</li>";
              }
              else if($r['positive_or_negative'] == 2)
              {
                echo "<li class='label label-danger'>" . $r['tag_name']  ."</li>";
              }
            }
          ?>
        </ul>
      </div>
      <div class="addtag-ctn">
        <input id="txtnewtagp2" type="text" value="" placeholder="Add your tags. Respect!">
        <input id="btnnewtagp2" type="submit" value="">
      </div>
      <div><h3>Choose listed tags:</h3></div>
      <div id="positive_negative_tag_list_p2" class="np-ctn">
        <ul>
          <?php
            $objnegativetags = new negativetags();
            $condition = "";
            $negative_tag_names = $objnegativetags->get_records($condition);

            foreach($negative_tag_names as $r)
            {
              echo "<li>";
              echo "<input name='p2_negative_btn_list' type='button' class='btn btn-danger' value='$r[tag_name]'>";
              echo "</li>"; 
            }
          ?>
        </ul>
        <ul>
          <?php
            $objpositivetags = new positivetags();
            $condition = "";
            $positive_tag_names = $objpositivetags->get_records($condition);

            foreach($positive_tag_names as $r)
            {
              echo "<li>";
              echo "<input name='p2_positive_btn_list' type='button' class='btn btn-success' value='$r[tag_name]'>";
              echo "</li>"; 
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php
    $condition=" AND id=3 ";
    $objperson = new person();
    $rec = $objperson->get_records($condition);
?>
<div style="display:none">
  <div id="inline_content3">
    <div class="popup-box">
      <?php
        $objp3tags = new p3tags();
        $condition = ' AND positive_or_negative=1 ';
        $p3_positive_sum = $objp3tags->sum_records($condition);

        $condition = ' AND positive_or_negative=2 ';
        $p3_negative_sum = $objp3tags->sum_records($condition);

        if($p3_positive_sum < $p3_negative_sum)
        {
          echo "<div class='red-img'>";
          echo "<img src='images/piglesias.jpg'>";
          echo "</div>";
        }
        else
        {
          echo "<div class='green-img'>";
          echo "<img src='images/piglesias.jpg'>";
          echo "</div>";
        }

      ?>
 
      <div class="likebtn-ctn">

        <?php
          if(isset($_COOKIE['PCounterLikeDislike_3']))
          {
            $objrate = new rate();
            $condition = ' AND id = ' . $_COOKIE['PCounterLikeDislike_3'];
            
            $rec = $objrate->get_records($condition);

            if($rec[0]['rate']==1)
            { ?>
              <input id='btn-like-p3' type="button" class="like-btn-green" value="" disabled="disabled">
              <input id='btn-dislike-p3' type="button" class="unlike-btn" value="" disabled="disabled">
     <?php  }
            else if($rec[0]['rate']==2)
            { ?>
              <input id='btn-like-p3' type="button" class="like-btn" value="" disabled="disabled">
              <input id='btn-dislike-p3' type="button" class="unlike-btn-red" value="" disabled="disabled">
     <?php  }
            else
            { ?>
              <input id='btn-like-p3' type="button" class="like-btn" value="">
              <input id='btn-dislike-p3' type="button" class="unlike-btn" value="">
     <?php  }
          }
          else
          { ?>
            <input id='btn-like-p3' type="button" class="like-btn" value="">
            <input id='btn-dislike-p3' type="button" class="unlike-btn" value="">
    <?php }
        ?>
      </div>
      <div><h3>Chosen before:</h3></div>
      <div class="tag-btn">
        <ul id="p3_tags">
          <?php
            $objp3tags = new p3tags();
            $condition = "";
            $p3_tags = $objp3tags->get_records($condition);

            foreach($p3_tags as $r)
            {
              if($r['positive_or_negative'] == 1)
              {
                echo "<li class='label label-success'>" . $r['tag_name']  ."</a></li>";
              }
              else if($r['positive_or_negative'] == 2)
              {
                echo "<li class='label label-danger'>" . $r['tag_name']  ."</a></li>";
              }
            }
          ?>
        </ul>
      </div>
      <div class="addtag-ctn">
        <input id="txtnewtagp3" type="text" value="" placeholder="Add your own tags.Respect!">
        <input id="btnnewtagp3" type="submit" value="">
      </div>
      <div><h3>Choose listed tags:</h3></div>
      <div id="positive_negative_tag_list_p3" class="np-ctn">
        <ul>
          <?php
            $objnegativetags = new negativetags();
            $condition = "";
            $negative_tag_names = $objnegativetags->get_records($condition);

            foreach($negative_tag_names as $r)
            {
              echo "<li>";
              echo "<input name='p3_negative_btn_list' type='button' class='btn btn-danger' value='$r[tag_name]'>";
              echo "</li>"; 
            }
          ?>
        </ul>
        <ul>
          <?php
            $objpositivetags = new positivetags();
            $condition = "";
            $positive_tag_names = $objpositivetags->get_records($condition);

            foreach($positive_tag_names as $r)
            {
              echo "<li>";
              echo "<input name='p3_positive_btn_list' type='button' class='btn btn-success' value='$r[tag_name]'>";
              echo "</li>"; 
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script src="js/jquery.colorbox.js"></script> 
 <script>$(function() { document.getElementsByName("p1_positive_btn_list")[1].onclick = function () {
    this.disabled = true;
};});</script>

<script>
$(document).ready(function(){
    //Examples of how to assign the Colorbox event to elements
    
    $(".inline").colorbox({inline:true, width:"480px"});
    
    
});
</script> 
<script type="text/javascript">
	// Make ColorBox responsive
	jQuery.colorbox.settings.maxWidth  = '95%';
	jQuery.colorbox.settings.maxHeight = '95%';

	// ColorBox resize function
	var resizeTimer;
	function resizeColorBox()
	{
		if (resizeTimer) clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
				if (jQuery('#cboxOverlay').is(':visible')) {
						jQuery.colorbox.load(true);
				}
		}, 300);
	}

	// Resize ColorBox when resizing window or changing mobile device orientation
	jQuery(window).resize(resizeColorBox);
	window.addEventListener("orientationchange", resizeColorBox, false);
</script>

<script type="text/javascript">

// Like code for person - 1
$('#btn-like-p1').click(function()
{
    $(this).removeClass('like-btn');
    $('#btn-dislike-p1').removeClass('unlike-btn-red');
    $(this).addClass('like-btn-green');
    $('#btn-dislike-p1').addClass('unlike-btn');

    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:'act=like&p_id=1',
        success: function(data)
        {
          $( "#p1likesdislikes" ).load( "p1likesdislikes.php", function() 
          {
            $('#btn-like-p1').prop("disabled", true);
            $('#btn-dislike-p1').prop("disabled", true);
          });
        }
    });
});

// Dislike code for person - 1
$('#btn-dislike-p1').click(function()
{
    $(this).removeClass('unlike-btn');
    $('#btn-like-p1').removeClass('like-btn-green');
    $(this).addClass('unlike-btn-red');
    $('#btn-like-p1').addClass('like-btn');
    

    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:'act=dislike&p_id=1',
        success: function(data)
        {
          $( "#p1likesdislikes" ).load( "p1likesdislikes.php", function() 
          {
            $('#btn-like-p1').prop("disabled", true);
            $('#btn-dislike-p1').prop("disabled", true);
          });
        }
    });
});

// Like code for person - 2
$('#btn-like-p2').click(function()
{
    $(this).removeClass('like-btn');
    $('#btn-dislike-p2').removeClass('unlike-btn-red');
    $(this).addClass('like-btn-green');
    $('#btn-dislike-p2').addClass('unlike-btn');

    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:'act=like&p_id=2',
        success: function(data)
        {
          $( "#p2likesdislikes" ).load( "p2likesdislikes.php", function() 
          {
            $('#btn-like-p2').prop("disabled", true);
            $('#btn-dislike-p2').prop("disabled", true);
          });
        }
    });
});

// Dislike code for person - 2
$('#btn-dislike-p2').click(function()
{
    $(this).removeClass('unlike-btn');
    $('#btn-like-p2').removeClass('like-btn-green');
    $(this).addClass('unlike-btn-red');
    $('#btn-like-p2').addClass('like-btn');    

    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:'act=dislike&p_id=2',
        success: function(data)
        {
          $( "#p2likesdislikes" ).load( "p2likesdislikes.php", function() 
          {
            $('#btn-like-p2').prop("disabled", true);
            $('#btn-dislike-p2').prop("disabled", true);
          });
        }
    });
});

// Like code for person - 3
$('#btn-like-p3').click(function()
{
    $(this).removeClass('like-btn');
    $('#btn-dislike-p3').removeClass('unlike-btn-red');
    $(this).addClass('like-btn-green');
    $('#btn-dislike-p3').addClass('unlike-btn');

    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:'act=like&p_id=3',
        success: function(data)
        {
          $( "#p3likesdislikes" ).load( "p3likesdislikes.php", function() 
          {
            $('#btn-like-p3').prop("disabled", true);
            $('#btn-dislike-p3').prop("disabled", true);
          });
        }
    });
});

// Dislike code for person - 3
$('#btn-dislike-p3').click(function()
{
    $(this).removeClass('unlike-btn');
    $('#btn-like-p3').removeClass('like-btn-green');
    $(this).addClass('unlike-btn-red');
    $('#btn-like-p3').addClass('like-btn');    

    $.ajax({
        type:"POST",
        url:"ajax.php",
        data:'act=dislike&p_id=3',
        success: function(data)
        {
          $( "#p3likesdislikes" ).load( "p3likesdislikes.php", function() 
          {
            $('#btn-like-p3').prop("disabled", true);
            $('#btn-dislike-p3').prop("disabled", true);
          });
        }
    });
});
///anadido
$(function(){
  var count = 3,
      $btn = $('input[type="button"]'); //Or which ever you want
      
      
      
  $btn.click(function(){
      
      count--;
      if(count==0) {
            return !$btn.attr('disabled','disabled');
      }
  })
})


// Person 1 Negative Button List Clicked
$("input[name='p1_negative_btn_list']").click(function()
{
  var value = $(this).val();
  
  $.ajax({
        type:"POST",
        url:"addtagtop1.php",
        data:'btnval='+value+'&p_n=2',
        success: function(data)
        {
          $( "#p1_tags" ).load( "p1_tags.php", function() 
          {
             //swal("Tag added", "Your tag counted", "success");
              swal({ 
                title: "Tag added",
                text: "Your tag counted",
                timer: 2000
                });
          });
        }
    });
});

// Person 1 Positive Button List Clicked
$("input[name='p1_positive_btn_list']").click(function()
{
  var value = $(this).val();
  
  $.ajax({
        type:"POST",
        url:"addtagtop1.php",
        data:'btnval='+value+'&p_n=1',
        success: function(data)
        {
          $( "#p1_tags" ).load( "p1_tags.php", function() 
          {
              //swal("Tag added", "Your tag counted", "success");
            swal({ 
              title: "Tag added",
              text: "Your tag counted",
              timer: 2000
              });
          });
        }
    });
});


// Person 2 Negative Button List Clicked
$("input[name='p2_negative_btn_list']").click(function()
{
  var value = $(this).val();
  
  $.ajax({
        type:"POST",
        url:"addtagtop2.php",
        data:'btnval='+value+'&p_n=2',
        success: function(data)
        {
          $( "#p2_tags" ).load( "p2_tags.php", function() 
          {
              //swal("Tag added", "Your tag counted", "success");
            swal({ 
              title: "Tag added",
              text: "Your tag counted",
              timer: 2000
              });
          });
        }
    });
});

// Person 2 Positive Button List Clicked
$("input[name='p2_positive_btn_list']").click(function()
{
  var value = $(this).val();
  
  $.ajax({
        type:"POST",
        url:"addtagtop2.php",
        data:'btnval='+value+'&p_n=1',
        success: function(data)
        {
          $( "#p2_tags" ).load( "p2_tags.php", function() 
          {
              //swal("Tag added", "Your tag counted", "success");
            swal({ 
              title: "Tag added",
              text: "Your tag counted",
              timer: 2000
              });
          });
        }
    });
});

// Person 3 Negative Button List Clicked
$("input[name='p3_negative_btn_list']").click(function()
{
  var value = $(this).val();
  
  $.ajax({
        type:"POST",
        url:"addtagtop3.php",
        data:'btnval='+value+'&p_n=2',
        success: function(data)
        {
          $( "#p3_tags" ).load( "p3_tags.php", function() 
          {
              //swal("Tag added", "Your tag counted", "success");
            swal({ 
              title: "Tag added",
              text: "Your tag counted",
              timer: 2000
              });
          });
        }
    });
});

// Person 3 Positive Button List Clicked
$("input[name='p3_positive_btn_list']").click(function()
{
  var value = $(this).val();
  
  $.ajax({
        type:"POST",
        url:"addtagtop3.php",
        data:'btnval='+value+'&p_n=1',
        success: function(data)
        {
          $( "#p3_tags" ).load( "p3_tags.php", function() 
          {
              //swal("Tag added", "Your tag counted", "success");
            swal({ 
              title: "Tag added",
              text: "Your tag counted",
              timer: 2000
              });
          });
        }
    });
});

// If new tag added to person 1
$('#btnnewtagp1').click(function()
{
  var newtagp1 = $('#txtnewtagp1').val();

  if(newtagp1!='')
  {
   
  $.ajax({
      type:"POST",
      url:"checktagexists.php",
      data:'tagname='+newtagp1,
      success: function(data)
      {
        if(data == '1')
        {
          swal({ 
              title: "Tag already exists",
              text: "Please add another tag",
              timer: 2000
              });
        }
        else if(data == '0')
        {
          swal({
                title: "Confirm Tag",
                text: "Click on positive button for positive tag or click on negative button for negative tag",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#FF0000",
                confirmButtonText: "Negative Tag",
                cancelButtonText: "Positive Tag",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm)
              {
                if (isConfirm)
                {
                  $.ajax({
                      type:"POST",
                      url:"add_new_negative_tag.php",
                      data:'tagname='+newtagp1+'&p=1',
                      success: function(data)
                      {
                        // Write code for refresh page and popup
                        $('#txtnewtagp1').val('');
                        $( "#p1_tags" ).load( "p1_tags.php", function() 
                        {
                          $( "#positive_negative_tag_list_p1" ).load( "positive_negative_tag_list.php", function() 
                          {
                            swal({ 
                              title: "Tag added",
                              text: "Negative tag added",
                              timer: 2000
                            });
                          })
                        })

                      }
                    });
                }
                else
                {
                  $.ajax({
                      type:"POST",
                      url:"add_new_positive_tag.php",
                      data:'tagname='+newtagp1+'&p=1',
                      success: function(data)
                      {
                        // Write code for refresh page and popup
                        $('#txtnewtagp1').val('');
                        $( "#p1_tags" ).load( "p1_tags.php", function() 
                        {
                          $( "#positive_negative_tag_list_p1" ).load( "positive_negative_tag_list.php", function() 
                          {
                            swal({ 
                              title: "Tag added",
                              text: "Positive tag added",
                              timer: 2000
                            });
                          })
                        }) 
                        
                        
                      }
                    });
                }
              });
        }
      }
    });
  }
});


// If new tag added to person 2
$('#btnnewtagp2').click(function()
{
  var newtagp2 = $('#txtnewtagp2').val();
  
  if(newtagp2 != '')
  {

  $.ajax({
      type:"POST",
      url:"checktagexists.php",
      data:'tagname='+newtagp2,
      success: function(data)
      {
        if(data == '1')
        {
          swal({ 
              title: "Tag already exists",
              text: "Please add another tag",
              timer: 2000
              });
        }
        else if(data == '0')
        {
          swal({
                title: "Confirm Tag",
                text: "Click on positive button for positive tag or click on negative button for negative tag",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#FF0000",
                confirmButtonText: "Negative Tag",
                cancelButtonText: "Positive Tag",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm)
              {
                if (isConfirm)
                {
                  $.ajax({
                      type:"POST",
                      url:"add_new_negative_tag.php",
                      data:'tagname='+newtagp2+'&p=2',
                      success: function(data)
                      {
                        // Write code for refresh page and popup
                        $('#txtnewtagp2').val('');
                        $( "#p2_tags" ).load( "p2_tags.php", function() 
                        {
                          $( "#positive_negative_tag_list_p2" ).load( "positive_negative_tag_list.php", function() 
                          {
                              swal({ 
                                title: "Tag added",
                                text: "Negative tag added",
                                timer: 2000
                              });
                          })
                        })
                      }
                    });
                }
                else
                {
                  $.ajax({
                      type:"POST",
                      url:"add_new_positive_tag.php",
                      data:'tagname='+newtagp2+'&p=2',
                      success: function(data)
                      {
                        // Write code for refresh page and popup
                        $('#txtnewtagp2').val('');
                        $( "#p2_tags" ).load( "p2_tags.php", function() 
                        {
                          $( "#positive_negative_tag_list_p2" ).load( "positive_negative_tag_list.php", function() 
                          {
                              swal({ 
                                title: "Tag added",
                                text: "Positive tag added",
                                timer: 2000
                              });
                          })
                        })
                      }
                    });
                }
              });
        }
      }
    });
  }
});


// If new tag added to person 3
$('#btnnewtagp3').click(function()
{
  var newtagp3 = $('#txtnewtagp3').val();
   
  if(newtagp3!='')
  {
  $.ajax({
      type:"POST",
      url:"checktagexists.php",
      data:'tagname='+newtagp3,
      success: function(data)
      {
        if(data == '1')
        {
          swal({ 
              title: "Tag already exists",
              text: "Please add another tag",
              timer: 2000
              });
        }
        else if(data == '0')
        {
          swal({
                title: "Confirm Tag",
                text: "Click on positive button for positive tag or click on negative button for negative tag",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#FF0000",
                confirmButtonText: "Negative Tag",
                cancelButtonText: "Positive Tag",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm)
              {
                if (isConfirm)
                {
                  $.ajax({
                      type:"POST",
                      url:"add_new_negative_tag.php",
                      data:'tagname='+newtagp3+'&p=3',
                      success: function(data)
                      {
                        // Write code for refresh page and popup
                        $('#txtnewtagp3').val('');
                        $( "#p3_tags" ).load( "p3_tags.php", function() 
                        {
                          $( "#positive_negative_tag_list_p3" ).load( "positive_negative_tag_list.php", function() 
                          {
                              swal({ 
                                title: "Tag added",
                                text: "Negative tag added",
                                timer: 2000
                              });
                          })
                        })
                      }
                    });
                }
                else
                {
                  $.ajax({
                      type:"POST",
                      url:"add_new_positive_tag.php",
                      data:'tagname='+newtagp3+'&p=3',
                      success: function(data)
                      {
                        // Write code for refresh page and popup
                        $('#txtnewtagp3').val('');
                        $( "#p3_tags" ).load( "p3_tags.php", function() 
                        {
                          $( "#positive_negative_tag_list_p3" ).load( "positive_negative_tag_list.php", function() 
                          {
                              swal({ 
                                title: "Tag added",
                                text: "Positive tag added",
                                timer: 2000
                              });
                          })
                        })
                      }
                    });
                }
              });
        }
      }
    });
  }
});
</script>

</body>
</html>
