<div id="da-header">
	<div id="da-header-top">
    
        <!-- Container -->
        <div class="da-container clearfix">
            
            <!-- Logo Container. All images put here will be vertically centere -->
            <div id="da-logo-wrap">
                <div id="da-logo">
                    <div id="da-logo-img">
                    <?php
					if($lvl=="Admin")
					{
						$link="dashboard_admin.php";	
					}
					if($lvl=="Kasir")
					{
						$link="dashboard_kasir.php";	
					}
					if($lvl=="Design")
					{
						$link="dashboard_design.php";	
					}
					if($lvl=="Printing")
					{
						$link="dashboard_printing.php";	
					}
					?>
                        <a href="<?php $link ?>">
                            <img src="images/logo.png" alt="Dandelion Admin" />
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Header Toolbar Menu -->
            <div id="da-header-toolbar" class="clearfix">
                <div id="da-user-profile">
                    <div id="da-user-avatar">
                        <img src="images/pp.jpg" alt="" />
                    </div>
                    <div id="da-user-info">
                        <?php echo"$name"; ?>
                        <span class="da-user-title"><?php echo"$lvl"; ?></span>
                    </div>
                    <ul class="da-header-dropdown">
                        <li class="da-dropdown-caret">
                            <span class="caret-outer"></span>
                            <span class="caret-inner"></span>
                        </li>
                        <li class="da-dropdown-divider"></li>
                        <li><a href="#">Dashboard</a></li>
                        <li class="da-dropdown-divider"></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Change Password</a></li>
                    </ul>
                </div>
                <div id="da-header-button-container">
                    <ul>
                        <!--<li class="da-header-button notif">
                            <span class="da-button-count">32</span>
                            <a href="#">Notifications</a>
                            <ul class="da-header-dropdown">
                                <li class="da-dropdown-caret">
                                    <span class="caret-outer"></span>
                                    <span class="caret-inner"></span>
                                </li>
                                <li>
                                    <span class="da-dropdown-sub-title">Notifications</span>
                                    <ul class="da-dropdown-sub">
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="da-dropdown-sub-footer">
                                        View all notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="da-header-button message">
                            <span class="da-button-count">1</span>
                            <a href="#">Messages</a>
                            <ul class="da-header-dropdown">
                                <li class="da-dropdown-caret">
                                    <span class="caret-outer"></span>
                                    <span class="caret-inner"></span>
                                </li>
                                <li>
                                    <span class="da-dropdown-sub-title">Messages</span>
                                    <ul class="da-dropdown-sub">
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="da-dropdown-sub-footer">
                                        View all messages
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        <li class="da-header-button logout">
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
                            
        </div>
    </div>
    <div id="da-header-bottom">
        <!-- Container -->
        <div class="da-container clearfix">
        
            <div id="da-search">
                &nbsp;<?php date_default_timezone_set("Asia/Jakarta"); echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y"); ?> | <span id="ngeposta"></span>
            </div>
            
            <!-- Breadcrumbs -->
            <div id="da-breadcrumb">
                <ul>
                <?php
				if($header=="dashboard"){
				echo"<li class='active'><span><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</span></li>";
				}
				if($header=="master_user"){
				echo"<li><a href='dashboard_admin.php'><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</a></li>";
				echo"<li class='active'><span>Master User</span></li>";
				}
				if($header=="master_jenis_cetak"){
				echo"<li><a href='dashboard_admin.php'><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</a></li>";
				echo"<li class='active'><span>Master Jenis Cetak</span></li>";
				}
				if($header=="master_jenis_bahan"){
				echo"<li><a href='dashboard_admin.php'><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</a></li>";
				echo"<li class='active'><span>Master Jenis Bahan</span></li>";
				}
				if($header=="transaksi_penjualan"){
				echo"<li><a href='dashboard_admin.php'><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</a></li>";
				echo"<li class='active'><span>Transaksi Penjualan</span></li>";
				}
				if($header=="transaksi_penawaran"){
				echo"<li><a href='dashboard_admin.php'><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</a></li>";
				echo"<li class='active'><span>Transaksi Penawaran</span></li>";
				}
				if($header=="laporan_penjualan"){
				echo"<li><a href='dashboard_admin.php'><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</a></li>";
				echo"<li class='active'><span>Laporan Penjualan</span></li>";
				}
				if($header=="laporan_penawaran"){
				echo"<li><a href='dashboard_admin.php'><img src='images/icons/black/16/home.png' alt='Home' />Dashboard</a></li>";
				echo"<li class='active'><span>Laporan Penawaran</span></li>";
				}
				?>
                </ul>
            </div>
            
            
        </div>
    </div>
</div>