<?php
function linkedin_oauth_callback()
{
	//echo 'linkedin Code Is :'.$_REQUEST['code'].'<br>';
$url = "https://ttapi.imobisoft.uk/api/Account/LinkedInLogin";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: text/plain",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"code":"'.$_REQUEST['code'].'","state":"string"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$resp = json_decode($resp);
$fullname  = $resp->result->fullName;
//echo $resp->result->token;
$key = $resp->result->token;


$_SESSION['user_name'] = $fullname;
$_SESSION['user_token'] = $key;
/*if(!isset($_COOKIE['crm_jwtkey'])) {*/	
//setcookie('crm_jwtkey', $key, ['secure' => true,'samesite' => 'None']);
/*}*/
wp_redirect( home_url() ); 
exit;
}
add_action("wp_ajax_linkedin_oauth_callback", "linkedin_oauth_callback");
add_action("wp_ajax_nopriv_linkedin_oauth_callback", "linkedin_oauth_callback");


//The PHP
function login_ajax_request() {
    // The $_REQUEST contains all the data sent via AJAX from the Javascript call
    if ( isset($_REQUEST) ) {
        $uname = $_REQUEST['uname'];
        $psw = $_REQUEST['psw'];
		$url = "https://ttapi.imobisoft.uk/api/Account/Login";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "accept: text/plain",
		   "Content-Type: application/json",
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		$data = '{"email":"'.$uname.'","password":"'.$psw.'"}';

		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		$resp = json_decode($resp);
		
        if($http_code==200){
		$lkey = $resp->result->token;
		$fullname = $resp->result->fullName;
		$userId = $resp->result->userId;
		$_SESSION['user_name'] = $fullname;
		$_SESSION['user_token'] = $lkey;
		$_SESSION['user_Id'] = $userId;
		
        //var_dump($resp);
        }
		else {
			echo "False";
		} 
}		
    // Always die in functions echoing AJAX content
   die();
}
// This bit is a special action hook that works with the WordPress AJAX functionality.
add_action( 'wp_ajax_login_ajax_request', 'login_ajax_request' );
add_action( 'wp_ajax_nopriv_login_ajax_request', 'login_ajax_request' ); 


//The PHP
function registration_ajax_request() {
    // The $_REQUEST contains all the data sent via AJAX from the Javascript call
    if ( isset($_REQUEST) ) {
        $rfname = $_REQUEST['rfname'];
        $rlname = $_REQUEST['rlname'];
        $rcompanyname = $_REQUEST['rcompanyname'];
        $remailaddress = $_REQUEST['remailaddress'];
        $rpassword= $_REQUEST['rpassword'];
        $rindustryfrom = settype($_REQUEST['rindustryfrom'], "integer"); ;
		$url = "https://ttapi.imobisoft.uk/api/Subscriber/SubscriberRegistration";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "accept: text/plain",
		   "Content-Type: application/json",
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


                $data = '{"firstName":"'.$rfname.'","lastName":"'.$rlname.'","email":"'.$remailaddress.'","password":"'.$rpassword.'","companyName":"'.$rcompanyname.'","industryType":'.$rindustryfrom.'}';
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		$resp = json_decode($resp);
          
                if($http_code == 200){
                    echo "True";
                }
                else{
                    echo "False";
                }	
}		
    // Always die in functions echoing AJAX content
   die();
}
// This bit is a special action hook that works with the WordPress AJAX functionality.
add_action( 'wp_ajax_registration_ajax_request', 'registration_ajax_request' );
add_action( 'wp_ajax_nopriv_registration_ajax_request', 'registration_ajax_request' ); 


function registration_ajax_request_page() {
    // The $_REQUEST contains all the data sent via AJAX from the Javascript call
    if ( isset($_REQUEST) ) {
        $prfname = $_REQUEST['prfname'];
        $prlname = $_REQUEST['prlname'];
        $prcompanyname = $_REQUEST['prcompanyname'];
        $premailaddress = $_REQUEST['premailaddress'];
        $prpassword= $_REQUEST['prpassword'];
        $prindustryfrom = settype($_REQUEST['prindustryfrom'], "integer"); ;
		$url = "https://ttapi.imobisoft.uk/api/Subscriber/SubscriberRegistration";
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url); 
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "accept: text/plain",
		   "Content-Type: application/json",
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


                $data = '{"firstName":"'.$prfname.'","lastName":"'.$prlname.'","email":"'.$premailaddress.'","password":"'.$prpassword.'","companyName":"'.$prcompanyname.'","industryType":'.$prindustryfrom.'}';
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);
		$resp = json_decode($resp);
          
                if($http_code == 200){
                    echo "True";
                }
                else{
                    echo "False";
                }	
}		
    // Always die in functions echoing AJAX content
   die();
}
// This bit is a special action hook that works with the WordPress AJAX functionality.
add_action( 'wp_ajax_registration_ajax_request_page', 'registration_ajax_request_page' );
add_action( 'wp_ajax_nopriv_registration_ajax_request_page', 'registration_ajax_request_page' ); 

//The PHP
function forgot_ajax_request() {
    // The $_REQUEST contains all the data sent via AJAX from the Javascript call
    if ( isset($_REQUEST) ) {
            $fpemailadd = filter_input(INPUT_GET, 'fpemailadd');
            $url = 'https://ttapi.imobisoft.uk/api/Account/ForgotPassword?email='.$fpemailadd;
            
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
               "accept: text/plain",
               "Content-Type: application/x-www-form-urlencoded",
               "Content-Length: 0",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            
            $resp = curl_exec($curl);
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $resp = json_decode($resp);
            curl_close($curl);
              if($http_code == 200){
                echo $returnmessage = $resp->message;
            }
            else {
                echo "The Server Is Busy";
            }
           // var_dump($resp);
}		
    // Always die in functions echoing AJAX content
   die();
}
// This bit is a special action hook that works with the WordPress AJAX functionality.
add_action( 'wp_ajax_forgot_ajax_request', 'forgot_ajax_request' );
add_action( 'wp_ajax_nopriv_forgot_ajax_request', 'forgot_ajax_request' );
