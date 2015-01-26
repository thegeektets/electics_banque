<?php  error_reporting(0); ?>
  <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-gear"></span>
        </button>
        <a class="navbar-brand" href="#"><span>ICRAF INTERN MANAGEMENT & CAPACITY BUILDING INFORMATION SYSTEM </span></a>
      </div>

      <div class="navbar-collapse ">

       <?php  if( strpos($_SERVER['REQUEST_URI'],'index.php')){
          ?>
            <ul class="nav navbar-nav">
       
          <li ><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="active"><a href="<?php echo base_url('index.php/user'); ?>">Dashboard</a></li>

        </ul>
    <?php   

        } 
        else { ?>
        <ul class="nav navbar-nav">
       
          <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="<?php echo base_url('index.php/user'); ?>">Dashboard</a></li>

        </ul>

        <?php } ?>
<?php if (strlen($profile['0']['username']) > 1 ){ ?>
        <ul class="nav navbar-nav navbar-right user-nav">
      <li class="dropdown profile_menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="" src="<?php echo $profile['0']['user_avatar'];?>" height="40px" /><?php echo $profile['0']['username'] ;?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="">My Account</a></li>
          <li><a href="">Profile</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url('index.php/user/logout') ;?>">Sign Out</a></li>
        </ul>
      </li>
    </ul>     
    <ul class="nav navbar-nav navbar-right not-nav">
      <li class="button dropdown">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" fa fa-comments"></i><span class="bubble">5</span></a>
        <ul class="dropdown-menu messages">
          <li>
            <div class="nano nscroller">
              <div class="content">
                <ul>
                  <li>
                    <a href="#">
                      <img src="images/avatar2.jpg" alt="avatar" /><span class="date pull-right">13 Sept.</span> <span class="name">Daniel</span> I'm following you, and I want your money! 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="images/avatar_50.jpg" alt="avatar" /><span class="date pull-right">20 Oct.</span><span class="name">Adam</span> is now following you 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="images/avatar4_50.jpg" alt="avatar" /><span class="date pull-right">2 Nov.</span><span class="name">Michael</span> is now following you 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="images/avatar3_50.jpg" alt="avatar" /><span class="date pull-right">2 Nov.</span><span class="name">Lucy</span> is now following you 
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <ul class="foot"><li><a href="#">View all messages </a></li></ul>           
          </li>
        </ul>
      </li>
      
    </ul>
<?php } ?>

      </div><!--/.nav-collapse -->
    </div>
  </div>
