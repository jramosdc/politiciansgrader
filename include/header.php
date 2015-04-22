<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo PAGE_TITLE; ?></title>

<!-- theme Data -->

<link href="<?php  echo ADMIN_THEME; ?>css/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="<?php echo ADMIN_THEME; ?>css/stylesheets/theme.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_THEME; ?>css/font-awesome/font-awesome.css" />

<script type="text/javascript" src="<?php echo ADMIN_THEME; ?>js/jquery-1.7.2.min.js"></script>


<!-- oRIGINAL tHEME fILE -->
<link href="<?php echo ADMIN_THEME; ?>css/developer.css" type="text/css" rel="stylesheet" />
<link href="<?php echo ADMIN_THEME; ?>css/developer-new.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/common.js" language="javascript"></script>

<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_THEME; ?>css/suckertree.css" />
<script type="text/javascript" src="js/suckertree.js"></script>

<?php
	common::import_component_javascript($component);
?>


<style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
		li
		{
			list-style-type:none;	
		}
</style>





</head>

<body>
 
<div class="navbar">
  <div class="navbar-inner">
       <ul class="nav pull-right"></ul>
            <a class="brand" href="<?php echo SITE_URL; ?>" target="_blank"><span class="second"><?php echo SITE_URL; ?></span></a>
												<?php
			if ( common::is_user_loggedin() ) {
		  ?> 
												<?php if ($_GET["component"]=="user" && $_GET["action"]=="login"){ 
												 }
													else
													{
													?>
												<ul class="nav pull-right">
                    
                    <li><a href="index.php?component=user&action=logout" class="hidden-phone visible-tablet visible-desktop" role="button">Log Out</a></li>
                                                
            </ul>
												<?php
												}
												?>
												<?php
												}
												?>
      </ul>
   </div>
</div>


   <?php
			if ( common::is_user_loggedin() ) {
		  ?>          
       
        	
									<!--<script type="text/javascript">
            	if (window.addEventListener)
				window.addEventListener("load", buildsubmenus_horizontal, false)
				else if (window.attachEvent)
				window.attachEvent("onload", buildsubmenus_horizontal)
            </script>-->
				      
												 <div class="sidebar-nav">
        						
									
									<a href="#home-menu" class="nav-header" data-toggle="collapse">&nbsp;&nbsp;Dashboard</a>
         <ul id="home-menu" ><!--class="nav nav-list collapse"-->
            
												<li><a href="index.php?component=menu&action=dashboard" style="color:#414959" >&nbsp;&nbsp;Home</a></li>
												
												<li><a href="index.php?component=site-settings&action=addedit" style="color:#414959">&nbsp;&nbsp;Site Settings</a></li>
            
            <li><a href="index.php?component=user&action=change-password" style="color:#414959">&nbsp;&nbsp;Change Password</a></li>
            
         </ul>
									
									<a href="#tours-menu" class="nav-header" data-toggle="collapse">&nbsp;&nbsp;Tours</a>
         <ul id="tours-menu">
         				
										<li><a href="index.php?component=guidedtours&action=list" style="color:#414959">&nbsp;&nbsp;Guided Tours</a></li>
          
          
          
          <li><a href="index.php?component=booking&action=list" style="color:#414959">&nbsp;&nbsp;Booking</a></li>
          
									</ul>
         
         
		<a href="index.php?component=ourteam&action=list" class="nav-header">&nbsp;&nbsp;Our Team</a>
         
         <a href="index.php?component=faq&action=list" class="nav-header">&nbsp;&nbsp;FAQ</a>
         
         <a href="index.php?component=gallery&action=list" class="nav-header">&nbsp;&nbsp;Gallery</a>
         
         <a href="index.php?component=testimonials&action=list" class="nav-header">&nbsp;&nbsp;Testimonials</a>
         
         <a href="index.php?component=pages&action=list" class="nav-header">&nbsp;&nbsp;Pages</a>
   
   		<a href="index.php?component=manage-header&action=list" class="nav-header">&nbsp;&nbsp;Manage Home Header</a>
        <a href="index.php?component=page-header&action=list" class="nav-header">&nbsp;&nbsp;Manage Pages Header</a>
   <!--
								
								<a href="index.php?component=complaints&action=list" class="nav-header">&nbsp;&nbsp;Complaints</a>
								
													<a href="#report-menu" class="nav-header" data-toggle="collapse">&nbsp;&nbsp;Reports</a>
         <ul id="report-menu" class="nav nav-list collapse">
            
												<li><a href="index.php?component=siteallocationreports&action=list">&nbsp;&nbsp;Site Allocation Reports</a></li>
												
												<li><a href="index.php?component=complaintsreports&action=list">&nbsp;&nbsp;Complaints Reports</a></li>
            
         </ul>-->
									
									
									
								
								<a href="index.php?component=user&action=logout" class="nav-header">&nbsp;&nbsp;Log Out</a>
								
								
									
									
																	
														
														
								
    </div>

												
												
		
       
       <?php
			}
			
	   ?>
       
       	