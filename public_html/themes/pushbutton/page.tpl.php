<?
ob_start();
$page=end(explode('/',$_SERVER['REQUEST_URI'])); 
if($page==trim('th'))
{
 header('location:http://www.thaieye.com/th/th_home');
}
$lang=$language->language;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>

  <meta http-equiv="Content-Style-Type" content="text/css" />
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  
  <!--slide-->
<link rel="stylesheet" type="text/css" href="http://www.thaieye.com/slider/contentslider.css" />
<script type="text/javascript" src="http://www.thaieye.com/slider/contentslider.js"></script>
<!--slide-->

<!--tab-->
<script type="text/javascript" src="http://www.thaieye.com/js/events.js"></script>
<script type="text/javascript" src="http://www.thaieye.com/js/tabs.js"></script>
<link  type="text/css" media="screen" rel="stylesheet" href="http://www.thaieye.com/css/tabs.css">



<!--[if IE]>
<style type="text/css" media="screen">
body {
font-size: x-small;
}
</style>
<![endif]-->
<!--tab-->
<link rel="stylesheet" type="text/css" href="http://www.thaieye.com/tab2/tab.css">
<script type="text/javascript" src="http://www.thaieye.com/tab2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	//$("div.tabhead li:first").addClass("active").show(); //Activate first tab
	$("div.tabhead li").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("div.tabhead li").click(function() {

		$("div.tabhead li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
</script>

<?php 
if($_GET[q] != "admin/build/block")
{
?>
<!--gallery -->
<script type="text/javascript" src="http://www.thaieye.com/gallery/jquery.tools.min.js"></script>

<? }?>

<link rel="stylesheet" type="text/css" href="http://www.thaieye.com/gallery/gallery.css">
<!--gallery -->


</head>

<body>
<div id="container">
<div class="hide"><a href="#content" title="<?php print t('Skip navigation') ?>." accesskey="2"><?php print t('Skip navigation') ?></a>.</div>
<!--start header -->
<div id="header">
<div class="logo"><? if($lang!='th'){?><a href="http://www.thaieye.com/home"><img src="http://www.thaieye.com/images/logo.png" alt="" border="0" /></a><? }?>
<? if($lang=='th'){?><a href="http://www.thaieye.com/th/th_home"><img src="http://www.thaieye.com/images/logo.png" alt="" border="0" /></a><? }?>
</div>

<div class="headerright">

<div class="language"><?php print $header ?></div>
<div class="topmenu">
 <?php print theme('links', $primary_links, array('class' => 'links', 'id' => 'navlist')) ?>
</div>

</div>

</div>
<!--end header -->


<?php /*?><table id="primary-menu" summary="Navigation elements." border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td id="home" width="10%">
      <?php if ($logo) : ?>
        <a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print($logo) ?>" alt="<?php print t('Home') ?>" border="0" /></a>
      <?php endif; ?>
    </td>

    <td id="site-info" width="20%">
      <?php if ($site_name) : ?>
        <div class='site-name'><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><?php print($site_name) ?></a></div>
      <?php endif;?>
      <?php if ($site_slogan) : ?>
        <div class='site-slogan'><?php print($site_slogan) ?></div>
      <?php endif;?>
    </td>
    <td class="primary-links" width="70%" align="center" valign="middle">
     
    </td>
  </tr>
</table><?php */?>

<?php /*?><table id="secondary-menu" summary="Navigation elements." border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td class="secondary-links" width="75%"  align="center" valign="middle">
      <?php print theme('links', $secondary_links, array('class' => 'links', 'id' => 'subnavlist')) ?>
    </td>
    <td width="25%" align="center" valign="middle">
      <?php print $search_box ?>
    </td>
  </tr>
  <tr>
    <td colspan="2"><div></div></td>
  </tr>
</table><?php */?>
<?php
if($_SERVER['REQUEST_URI']=="/thaieyenew/home")
{
?>
<div id="middle">
        <?php if ($title != ""): ?>
          <?php //print $breadcrumb ?>
         <?php /*?> <h1 class="title"><?php print $title ?></h1><?php */?>

          <?php if ($tabs != ""): ?>
            <div class="tabs"><?php print $tabs ?></div>
          <?php endif; ?>

        <?php endif; ?>

        <?php if ($show_messages && $messages != ""): ?>
          <?php print $messages ?>
        <?php endif; ?>

        <?php if ($help != ""): ?>
            <div id="help"><?php print $help ?></div>
        <?php endif; ?>

      <!-- start main content -->
      <?php print $content; ?>
      <?php print $feed_icons; ?>
      <!-- end main content -->
</div>
<?php
} else {
?>
<div id="middle">
 <?php if ($tabs != ""): ?>
            <div class="tabs"><?php print $tabs ?></div>
          <?php endif; ?>
          
      <?php if ($mission != ""): ?>
      <?php /*?><div id="mission"><?php print $mission ?></div><?php */?>
      <?php endif; ?>

   <!--   <div id="main">-->
        <?php if ($title != ""): ?>
          <?php //print $breadcrumb ?>
         <?php /*?> <h1 class="title"><?php print $title ?></h1><?php */?>

          <?php if ($tabs != ""): ?>
            <?php /*?><div class="tabs"><?php print $tabs ?></div><?php */?>
          <?php endif; ?>

        <?php endif; ?>

        <?php if ($show_messages && $messages != ""): ?>
          <?php print $messages ?>
        <?php endif; ?>

        <?php if ($help != ""): ?>
            <div id="help"><?php print $help ?></div>
        <?php endif; ?>

      <!-- start main content -->
      <?php print $content; ?>
      <?php print $feed_icons; ?>
      <!-- end main content -->

     <!-- </div>--><!-- main -->

<?php /*?><table id="content" border="0" cellpadding="15" cellspacing="0" width="100%">
  <tr>
    <?php if ($left != ""): ?>
    <td id="sidebar-left">
      <?php print $left ?>
    </td>
    <?php endif; ?>

    <td valign="top">
      <?php if ($mission != ""): ?>
      <div id="mission"><?php print $mission ?></div>
      <?php endif; ?>

      <div id="main">
        <?php if ($title != ""): ?>
          <?php print $breadcrumb ?>
          <h1 class="title"><?php print $title ?></h1>

          <?php if ($tabs != ""): ?>
            <div class="tabs"><?php print $tabs ?></div>
          <?php endif; ?>

        <?php endif; ?>

        <?php if ($show_messages && $messages != ""): ?>
          <?php print $messages ?>
        <?php endif; ?>

        <?php if ($help != ""): ?>
            <div id="help"><?php print $help ?></div>
        <?php endif; ?>

      <!-- start main content -->
      <?php print $content; ?>
      <?php print $feed_icons; ?>
      <!-- end main content -->

      </div><!-- main -->
    </td>
    <?php if ($right != ""): ?>
    <td id="sidebar-right">
      <?php print $right ?>
    </td>
    <?php endif; ?>
  </tr>
</table><?php */?>


</div>
<?php
}
?>


</div>

<div id="footer">
<div class="footermid" id="footer-menu">
<div align="center">    <?php if (isset($primary_links)) : ?>
      <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
    <?php endif; ?>
    <?php if (isset($secondary_links)) : ?>
      <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
    <?php endif; ?></div>
<p align="center">&copy; 2009 Thai Eye Clinic. All Rights Reserved. </p>
</div>
<?php if ($footer_message || $footer) : ?>
<?php /*?><div id="footer-message">
    <?php print $footer_message . $footer;?>
</div><?php */?>
<?php endif; ?>
<?php print $closure;?>
</div>
</body>
</body>
</html>
