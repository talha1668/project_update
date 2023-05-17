<!-- Navbar (sit on top) -->

<nav class="navbar navbar-expand-custom navbar-mainbg">

  <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- <li class=""> -->
    <!-- <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a> -->
    <a class="navbar-brand navbar-logo " href="index.php"><B>DASHBOARD</B></a>
    <!-- </li> -->
    <ul class="navbar-nav ml-auto">

      <div class="hori-selector">
        <div class="left"></div>
        <div class="right"></div>
      </div>

      <li class="nav-item tab-space">
        <a class="nav-link" href="">&nbsp;</a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="navigation.php"><i class="far fa-address-book"></i>Navigation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="object.php"><i class="far fa-clone"></i>Object Recognition</a>
      </li>
      <!-- <li class="nav-item">
                    <a class="nav-link" href=""><i class="far fa-calendar-alt"></i>Calendar</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-copy"></i>Documents</a>
                </li> -->
    </ul>
  </div>
</nav>

<div id="accordian">
  <ul class="show-dropdown main-navbar">
    <div class="selector-active">
      <div class="top"></div>
      <div class="bottom"></div>
    </div>
   
    <li class="active">
      <a href="javascript:void();">&nbsp;</a>
    </li>
    <li>
      <a href="javascript:void(0);"><i class="far fa-clone"></i>Drone Operation</a>
    </li>
    <li>
      <a href="admin.php"><i class="far fa-calendar-alt"></i>Admin</a>
    </li>
    <li>
      <a href="javascript:void(0);"><i class="far fa-chart-bar"></i>Upload Video</a>
    </li>
   <li>
      <a href="welcome.php"><i class="far fa-heart"></i>Log out</a>
    </li>
  </ul>
</div>
<script>// ---------vertical-menu with-inner-menu-active-animation-----------

var tabsVerticalInner = $('#accordian');
var selectorVerticalInner = $('#accordian').find('li').length;
var activeItemVerticalInner = tabsVerticalInner.find('.active');
var activeWidthVerticalHeight = activeItemVerticalInner.innerHeight();
var activeWidthVerticalWidth = activeItemVerticalInner.innerWidth();
var itemPosVerticalTop = activeItemVerticalInner.position();
var itemPosVerticalLeft = activeItemVerticalInner.position();
$(".selector-active").css({
	"top":itemPosVerticalTop.top + "px", 
	"left":itemPosVerticalLeft.left + "px",
	"height": activeWidthVerticalHeight + "px",
	"width": activeWidthVerticalWidth + "px"
});
$("#accordian").on("click","li",function(e){
	$('#accordian ul li').removeClass("active");
	$(this).addClass('active');
	var activeWidthVerticalHeight = $(this).innerHeight();
	var activeWidthVerticalWidth = $(this).innerWidth();
	var itemPosVerticalTop = $(this).position();
	var itemPosVerticalLeft = $(this).position();
	$(".selector-active").css({
		"top":itemPosVerticalTop.top + "px", 
		"left":itemPosVerticalLeft.left + "px",
		"height": activeWidthVerticalHeight + "px",
		"width": activeWidthVerticalWidth + "px"
	});
});


// --------------add active class-on another-page move----------
jQuery(document).ready(function($){
  // Get current path and find target link
  var path = window.location.pathname.split("/").pop();

  // Account for home page with empty path
  if ( path == '' ) {
    path = 'index.html';
  }

  var target = $('#accordian ul li a[href="'+path+'"]');
  // Add active class to target link
  target.parent().addClass('active');
});
</script>