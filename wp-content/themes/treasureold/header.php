<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Google Analytics -->
    <script>
        window.ga = window.ga || function() {
            (ga.q = ga.q || []).push(arguments)
        };
        ga.l = +new Date;
        ga('create', 'UA-237172084-1', 'auto');
        <?php
        if (isset($_SESSION['user_name'])) :
            $gtaguserid = "trtoday_" . $_SESSION['user_Id'];
            $gtaguserid = strval($gtaguserid);
		else:
			$gtaguserid = "trtoday_" . "0";
            $gtaguserid = strval($gtaguserid);
        endif;
        ?>
		ga('set', 'userId', '<?php echo $gtaguserid; ?>'); // Set the user ID using signed-in user_id.
        ga('send', 'pageview');
		
		ga('set', 'pageTitle', <?php echo get_the_title(); ?>);
		ga('set', 'pageUserId', <?php echo $gtaguserid; ?>);
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
    <!-- End Google Analytics -->


    <?php wp_head(); ?>
</head>

<body>
    <div class="ab-header text-center">
        <img class="img-fluid py-3" src="<?php echo get_template_directory_uri();  ?>/assets/images/ab-header.jfif" alt="ab_header">
    </div>
    <header>
        <div class="top-nav py-2 d-none d-lg-block">
            <div class="container d-flex justify-content-end align-items-center">
                <?php get_search_form(); ?> 

                <?php if (!isset($_SESSION['user_name'])) : ?>
                    <div class="me-3 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#signInModal">
                        <button class="sign-btn btn text-white position-relative">Sign In
                        </button>
                        <span class="sign-icon material-icons fs-6 text-white rounded-circle border border-2 border-white">person_outline</span>
                    </div>
                    <div class="ms-3">
                        <button class="reg-btn btn text-white border border-3 py-1 border-white rounded-pill px-4 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                    </div>
                <?php
                else :
                ?>
                    <div class="ms-3 dropdown">
                        <a class="sign-btn btn text-white position-relative dropdown-toggle apiloginoutputname" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user_name']; ?><span class="position-absolute sign-icon material-icons fs-6 rounded-circle border border-2 border-white">person_outline</span></a>
                        <ul class="dropdown-menu rounded-0 border-0 shadow logout" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" id="clear-cart">Logout</a></li>
                        </ul>
                    </div>
                <?php
                endif;
                ?>


            </div>
        </div>
        <?php echo create_bootstrap_menu("primary"); ?>

        </div>
    </header>