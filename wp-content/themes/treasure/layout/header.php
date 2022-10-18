<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" async>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" async>
  <link rel="stylesheet" href="./scss/main.css" async>
  <link rel="icon" type="image/png" href="./assets/images/favicon.ico" />
  <?php wp_head(); ?>
</head>

<body>
  <div class="ab-header text-center">
    <img class="img-fluid py-3" src="./assets/images/ab-header.jfif" alt="ab_header">
  </div>
  <header>
    <div class="top-nav py-2 d-none d-lg-block">
      <div class="container d-flex justify-content-end align-items-center">
        <form class="position-relative">
          <div class="form-group d-flex justify-content-end me-4">
            <input type="text" class="form-control border-3 border-primary text-white rounded-pill py-1" placeholder="Search">
            <button class="search-btn position-absolute" type="button">
              <i class="material-icons fs-4 btn text-white">search</i>
            </button>
          </div>
        </form>
        <div class="me-3">
          <button class="sign-btn d-flex align-items-center justify-content-center btn text-white position-relative" type="button" data-bs-toggle="modal" data-bs-target="#signInModal">Sign In </button>
          <span class="sign-icon material-icons fs-6 rounded-circle border border-2 border-white">
            person_outline
          </span>
        </div>
        <div class="ms-3">
          <button class="reg-btn btn text-white border border-3 py-1 border-white rounded-pill px-4 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
        </div>
      </div>
    </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light border-bottom py-0">
      <div class="container pe-0">
        <a href="index.php" class="border-end logo-link py-lg-0 py-2 pe-lg-3"> <img class="img-fluid logo my-2" src="./assets/images/treasury-today-logo.png" alt="logo"></a>
        <button onclick="toggleSidenav()" class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse h-100" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-0 ms-lg-0">
            <!-- Mobile-view -->
            <div class="mobile-view d-lg-none d-block">
              <li class="d-flex m-3"><a data-bs-toggle="modal" data-bs-target="#signInModal" class="w-50 btn me-1 btn-primary justify-content-center border-3 border-white rounded-pill">Sign in</a>
                <a type="button" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn w-50 btn-secondary ms-1 justify-content-center border-3 border-secondary rounded-pill">Register</a>
              </li>
              <li>
                <form>
                  <div class="form-group position-relative m-3">
                    <input type="text" class="bg-primary search text-white form-control border-3 border-primary rounded-pill" placeholder="Search">
                    <button class="icon position-absolute btn"><span class="material-icons text-white">search</span></button>
                  </div>
                </form>
              </li>
            </div>
            <!-- Mobile-view -->
            <li class="nav-item dropdown position-relative border-end">
              <a class="nav-link dropdown-toggle py-lg-0" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Topics
                <span class="material-icons expand" id="expd">
                  expand_more
                </span>
              </a>
              <div class="dropdown-menu">
                <ul class="dropdown-inner list-unstyled" aria-labelledby="navbarDropdown">
                  <li class="ps-0"><a class="dropdown-link" href="./insights-&-analysis.php">Insight & Analysis</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./cash-and-liquidity-management.php">Cash & liquidity Management</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./risk-management.php">Risk Management</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./treasury-talent.php">Treasury Talent</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./funding-&-investing.php">Funding & Investing</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./technology.php">Technology</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./trade-and-supply-chain.php">Trade & Supply Chain</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./regulation-and-standards.php">Regulatios & Standards</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./banking.php">Banking</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./treasury-practice.php">Treasury Practice</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./regional-focus.php">Regional Focus</a></li>
                  <li class="ps-0"><a class="dropdown-link last" href="./perspectives.php">Perspectives</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown position-relative border-end">
              <a class="nav-link dropdown-toggle py-lg-0" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Magazines
                <span class="material-icons expand" id="expd">
                  expand_more
                </span>
              </a>
              <div class="dropdown-menu">
                <ul class="dropdown-inner list-unstyled" aria-labelledby="navbarDropdown">
                  <li class="ps-0"><a class="dropdown-link" href="./magazine.php">Treasury Today</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./magazine-asia.php">Treasury Today Asia</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./adam-smith-awards-yearbook.php">Adam Smith Awards Yearbook</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./adam-smith-awards-asia-yearbook.php">Adam Smith Awards Asia Yearbook</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./supplements.php">Supplements</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./handbooks.php">Handbooks</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown position-relative border-end">
              <a class="nav-link dropdown-toggle py-lg-0" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Awards
                <span class="material-icons expand" id="expd">
                  expand_more
                </span>
              </a>
              <div class="dropdown-menu">
                <ul class="dropdown-inner list-unstyled" aria-labelledby="navbarDropdown">
                  <li class="ps-0"><a class="dropdown-link" href="./adam-smith-awards.php">Adam Smith Awards</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./adam-smith-awards-asia.php">Adam Smith Awards Asia</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown position-relative border-end">
              <a class="nav-link dropdown-toggle py-lg-0" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Women in Treasury
                <span class="material-icons expand" id="expd">
                  expand_more
                </span>
              </a>
              <div class="dropdown-menu">
                <ul class="dropdown-inner list-unstyled" aria-labelledby="navbarDropdown">
                  <li class="ps-0"><a class="dropdown-link" href="./women-in-treasury.php">Home</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="javascript:void(0)">Forums</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="javascript:void(0)">Study</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="javascript:void(0)">Awards</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="javascript:void(0)">Profiles</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="javascript:void(0)">Articles</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown position-relative border-end d-xl-none d-none d-lg-block">
              <a class="nav-link dropdown-toggle py-0" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                More
                <span class="material-icons expand" id="expd">
                  expand_more
                </span>
              </a>
              <div class="dropdown-menu">
                <ul class="dropdown-inner list-unstyled" aria-labelledby="navbarDropdown">
                  <li class="ps-0"><a class="dropdown-link" href="javascript:void(0)">Masterclasses</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./webinars.php">Webinars</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./podcasts.php">Podcasts</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./events.php">Events</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./china-zone.php">China Zone 中国</a></li>
                  <li class="ps-0"><a class="dropdown-link" href="./contact.php">Contact</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item d-xl-block d-lg-none d-block border-end">
              <a class="nav-link" href="javascript:void(0)">Masterclasses</a>
            </li>
            <li class="nav-item d-xl-block d-lg-none d-block border-end">
              <a class="nav-link" href="./webinars.php">Webinars</a>
            </li>
            <li class="nav-item d-xl-block d-lg-none d-block border-end">
              <a class="nav-link" href="./podcasts.php">Podcasts</a>
            </li>
            <li class="nav-item d-xl-block d-lg-none d-block border-end">
              <a class="nav-link" href="./events.php">Events</a>
            </li>
            <li class="nav-item d-xl-block d-lg-none d-block border-end">
              <a class="nav-link" href="./china-zone.php">China Zone 中国</a>
            </li>
            <li class="nav-item d-xl-block d-lg-none d-block">
              <a class="nav-link" href="./contact.php">Contact</a>
            </li>
          </ul>
        </div>
    </nav>

    </div>
  </header>