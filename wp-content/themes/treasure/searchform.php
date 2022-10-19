 <form class="position-relative search-form" action="<?php echo home_url(); ?>" id="search-form" method="get">
     <div class="form-group d-flex justify-content-end me-4">
         <input type="search" name="s" id="s" class="form-control py-1 small" placeholder="Search">
         <button class="search-btn position-absolute" type="button">
             <!-- <i class="material-icons fs-4 btn text-white">search</i> -->
             <span class="sr-only">Search</span>
         </button>
         <input type="hidden" value="submit" />
     </div>
 </form>

 <style>
    .search-form .form-control{
        font-size:14px !important;
        outline:  2px solid #173e6d;
    }
     .search-btn::after {
         background-image: url(<?php echo get_template_directory_uri() . '/assets/images/search-icon.svg'; ?> );
         content: "";
         display: block;
         position: absolute;
         top: 26px;
         left: -25px;
         cursor: pointer;
         width: 100%;
         height: 100%;
     }

     .sr-only {
         position: absolute;
         width: 1px;
         height: 1px;
         padding: 0;
         margin: -1px;
         overflow: hidden;
         clip: rect(0, 0, 0, 0);
         border: 0;
     }
     .search-btn{
        display: block;
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    right: 30px;
    background: transparent;
    border: none;
    height: 22px;
    width: 22px;
    padding: 0;
     }
 </style>