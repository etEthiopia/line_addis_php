
    
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/tether/tether.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/socicon/css/styles.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/theme/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/gallery/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/material-design/css/material-icons.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/flag-icons/css/flag-icon.min.css">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/lineaddis-logo-square-1432x970" type="image/x-icon">
    


</head>

<body>
    <section class="menu cid-rYSkkelB30" once="menu" id="menu2-0">



        <nav
            class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="<?php echo URLROOT; ?>/pages/index/">
                            <img src="<?php echo URLROOT; ?>/assets/images/line-addis-logo-122x54.png" alt="LINE ADDIS" title=""
                                style="height: 3.8rem;">
                        </a>
                    </span>

                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-primary display-4" href="<?php echo URLROOT; ?>/pages/index">
                            Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link link text-primary display-4" href="<?php echo URLROOT; ?>/pages/aboutus">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-primary display-4"
                            href="<?php echo URLROOT; ?>/pages/ourservices">Our Services &nbsp;&nbsp;</a></li>
                    <li class="nav-item"><a class="nav-link link text-primary display-4" href="<?php echo URLROOT; ?>/pages/testimonials">
                            Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link link text-primary display-4"
                            href="<?php echo URLROOT; ?>/pages/posts">Offer Posts</a></li>
                    <li class="nav-item"><a class="nav-link link text-primary display-4"
                            href="#form4-i">Contact Us</a></li>
                    <?php if(isset($_SESSION['user_email'])) : ?>
                    <?php if($_SESSION['user_type'] == 1): ?>
                    <?php $userkey = 'agents'?>
                    <?php elseif($_SESSION['user_type'] == 2): ?>
                    <?php $userkey = 'employees'?>
                    <?php elseif($_SESSION['user_type'] == 0): ?>
                    <?php $userkey = 'controls'?>
                    <?php endif; ?>
                    <li class="nav-item dropdown"><a class="nav-link link text-primary dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="false">
                            <?php echo explode(" ", $_SESSION['user_name'])[0] ?>
                    </a><div class="dropdown-menu">
                    <a class="text-primary dropdown-item display-4" href="<?php echo URLROOT; ?>/<?php echo $userkey;?>/dashboard">Dashboard</a>
                    <a class="text-primary dropdown-item display-4" href="<?php echo URLROOT; ?>/<?php echo $userkey;?>/profile">Profile</a>
                    <a class="text-primary dropdown-item display-4" href="<?php echo URLROOT; ?>/<?php echo $userkey;?>/logout">Logout</a></div></li>
                    <?php endif; ?>
                </ul>
                <?php if(!isset($_SESSION['user_email'])) : ?>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-info display-4"
                        href="https://t.me/lineaddisconsultancy" target="_blank"><span
                            class="socicon socicon-telegram mbr-iconfont mbr-iconfont-btn"
                            style="color: rgb(255, 255, 255);"></span></a>
                </div>
                <?php endif; ?>
            </div>
        </nav>
    </section>