<?php
/*
Template Name: Verify User
 */
get_header();
$http_code = "";
if ((isset($_GET["email"])) && (isset($_GET["token"]))  ){ 
    $useremailid = filter_input(INPUT_GET, 'email');
    $usertoken =  filter_input(INPUT_GET, 'token',FILTER_SANITIZE_ENCODED);
    $url = "https://ttapi.imobisoft.uk/api/Account/VerifySubscriber";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
   "accept: text/plain",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = '{"email":"'.$useremailid.'","token":"'.$usertoken.'"}';
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
//$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
}
//if($http_code == 200){
    $messagebrowser =  '<h2>Account verified</h2>
                <p>Thank you for verifying your account with Treasury Today. Your account is now active and you can freely view all our content across the site.</p>
                <p><strong>Happy Browsing!</strong></p>';
//}
//else
//{
   // $messagebrowser =  '<h2>Not Authorised/Invalid Request</h2>
              //  <p>You are not authorised to access this page directly.</p>
             //   <p><strong>Happy Browsing!</strong></p>';
//}
?>
<section class="verifyuserpage">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                    <?php 
                        //echo $http_code;
                        echo $messagebrowser;
                    ?>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
