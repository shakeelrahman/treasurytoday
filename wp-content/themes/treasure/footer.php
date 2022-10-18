<footer class="footer bg-primary pt-0 pt-md-5">
       <div class="container">
         <div class="d-md-block d-flex footer-cont border-bottom pt-5">
           <div class="row mx-0">
            <div class="col-lg-2 col-md-3 foot-logo py-md-0 py-3 ps-md-0">
              <a class="py-3" href="/">
              <img src="<?php echo get_template_directory_uri();  ?>/assets/images/logo_footer.png" alt="logo" class="logo-f img-fluid ms-0">
              </a>
            </div>
            <div class="col-lg-2 col-md-3 border-right ms-0">
              <ul class="list-unstyled">
                <li><a class="text-white footer-links" href="/insight-analysis">Insight & analysis</a></li>
                <li><a class="text-white footer-links" href="/technology">Technology</a></li>
                <li><a class="text-white footer-links" href="/banking">Banking</a></li>
                <li><a class="text-white footer-links" href="/regulation-and-standards">Regulation </a></li>
                <li><a class="text-white footer-links" href="/treasury-practice">Treasury Practice</a></li>
                <li><a class="text-white footer-links" href="/funding-and-investment">Funding and investing</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-3 border-right">
              <ul class="list-unstyled">
                <li><a class="text-white footer-links" href="/magazine">Treasury Today</a></li>
                <li><a class="text-white footer-links" href="/treasury-today-asia">Treasury Today Asia</a></li>
                <li><a class="text-white footer-links" href="/adam-smith-awards-yearbook-2">Adam Smith Awards</a></li>
                <li><a class="text-white footer-links" href="/adam-smith-awards-asia-yearbook">Adam Smith Awards Asia </a></li>
                <li><a class="text-white footer-links" href="/perspectives">Perspectives</a></li>
                <li><a class="text-white footer-links" href="/treasury-practice">Corporate Case Studies</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-3 border-right">
              <ul class="list-unstyled">
                <li><a class="text-white footer-links" href="/women-in-treasury">Women in Treasury</a></li>
                <li><a class="text-white footer-links" href="/cash-liquidity-management">Cash and Liquidity</a></li>
                <li><a class="text-white footer-links" href="/risk-management">Management</a></li>
                <li><a class="text-white footer-links" href="/">Home </a></li>
                <li><a class="text-white footer-links" href="/contact">Contact Us</a></li>
                <li><a class="text-white footer-links" href="/terms-and-conditions">Terms & Conditions</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-6 me-0 touch-in pt-0 pt-md-3">
              <h4 class="text-white  d-md-block d-none"><i class="fa-regular fa-envelope"></i> Subscribe to Treasury Insights</h4>
                <form class="py-3 d-md-block d-none mb-3" onsubmit="validateForm()">
                  <div class="form-group d-flex">
                    <input id="subsEmail" type="email" class="foot-input form-control" placeholder="Email Address" required>
                    <button type="submit" class="foot-btn btn btn-secondary">Subscribe</button>
                  </div>
                  <p id="errSubs" class="small text-danger"></p>
                </form>
            </div>
           </div>
             <div class="social text-end me-md-1">
                  <a  class="text-white mx-2 border-3 border-white border rounded-circle" target="_blank" href="https://www.youtube.com/channel/UC_VmwSlMwKooMTOEYyFtjeA"><i class="fa-brands fa-youtube"></i></a>
                  <a  class="text-white mx-2 border-3 border-white border rounded-circle" target="_blank" href="https://www.linkedin.com/company/treasury-today"><i class="fa-brands fa-linkedin-in"></i></a>
                  <a  class="text-white mx-2 border-3 border-white border rounded-circle" target="_blank" href="https://twitter.com/treasurytoday"><i class="fa-brands fa-twitter"></i></a>
                  <a  class="text-white mx-2 border-3 border-white border rounded-circle" target="_blank" href="https://www.instagram.com/treasurytoday/"><i class="fa-brands fa-instagram"></i></a>
                  <div class="d-md-none mt-3 d-flex align-items-center justify-content-center text-center"><a href="#" class="back text-white position-relative">Back to top <i class="fa-solid fa-chevron-up text-secondary ps-2"></i></a></div>
                </div>
         </div>
         <div class="d-flex justify-content-between pt-4 pb-3">
           <p class="small text-muted mb-0">Copyright &copy; Treasury Today 2022 all rights reserved - Terms and Conditions</p>
           <a href="#" class="back me-4 fs-sm text-white position-relative d-md-block d-none">Back to top <span class="material-icons text-secondary up">
              expand_less
              </span></a>
         </div>
       </div>
     </footer>
</div>
    <?php get_template_part('login');  ?>
	<?php get_template_part('register');  ?>
	<?php get_template_part('forgot');  ?>
	<?php wp_footer(); ?>
</body>
</html>