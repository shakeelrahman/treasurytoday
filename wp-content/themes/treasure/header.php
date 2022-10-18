<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
        if (isset($_SESSION['user_name'])) :
            $gtaguserid = "trtoday_" . $_SESSION['user_Id'];
            $gtaguserid = strval($gtaguserid);
		else:
			$gtaguserid = "trtoday_" . "0";
            $gtaguserid = strval($gtaguserid);
        endif;
        ?>
			<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		 
		  ga('create', 'UA-237172084-1', 'auto');
		  ga('send', 'pageview', {
			'dimension1': '<?php echo $gtaguserid; ?>'
		}); 
		</script>
    <?php wp_head(); ?>
</head>

<body>
    <div class="ab-header text-center">
        <img class="img-fluid" src="<?php echo get_template_directory_uri();  ?>/assets/images/ab-header.jfif" alt="ab_header">
    </div>
    <header>
        <div class="top-nav d-none d-lg-block">
            <div class="container d-flex justify-content-end align-items-center">
                <?php get_search_form(); ?> 

                <?php if (!isset($_SESSION['user_name'])) : ?>
                    <div class="me-3 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#signInModal">
                        <button class="sign-btn btn text-white position-relative"><small>Sign in</small>
                        </button>
                        <span class="sign-icon material-icons fs-6 text-white rounded-circle border border-2 border-white">person_outline</span>
                    </div>
                    <div class="ms-3">
                        <button class="reg-btn btn text-white border border-2 border-white rounded-pill fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#registerModal"><small>Register</small></button>
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