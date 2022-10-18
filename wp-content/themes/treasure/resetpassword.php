<?php
/*
Template Name: Reset Password
 */
get_header();
$http_code = "";
$outputmessage = "";
$emptyEmailErr = "";

$form = "";
if ((isset($_GET["email"])) && (isset($_GET["token"]))) :
    $useremailidpassreset = filter_input(INPUT_GET, 'email');
    $usertokenpassreset =  filter_input(INPUT_GET, 'token', FILTER_SANITIZE_ENCODED);
    $form = '<form id="ajaxsetnewpassword" action="" class="mt-3">
                     <div class="form-group mb-4">
                     <label>New Password</label>
                        <input type="password" class="form-control bg-light" name="setnewpass" id="setnewpass" required>
                        <p class="text-danger small">Please enter the new password</p>
                       </div>
                       <div class="form-group mb-4">
                       <label>Confirm Password</label>
                        <input type="password" class="form-control bg-light" name="setnewpassverify" id="setnewpassverify" required>
                        <p class="text-danger small">Please confirm your password</p>
                        </div>
                        <input type="hidden" value="' . $useremailidpassreset . '" id="spemailpassed" name="spemailpassed" >
                        <input type="hidden" value="' . $usertokenpassreset . '" id="sptokenpassed" name="sptokenpassed" >
                        <div class="text-center my-4">
                        <button type="submit" class="button btn rounded-pill border-3 border-secondary btn-white text-secondary px-5 fw-bold">Reset Password</button>
                        </div>
                    </form>';
elseif ((isset($_GET['setnewpass'])) && (isset($_GET['setnewpassverify']))) :
    $newpass = filter_input(INPUT_GET, 'setnewpass');
    $newpassverify = filter_input(INPUT_GET, 'setnewpassverify');
    $newpassemail = filter_input(INPUT_GET, 'spemailpassed');
    $newpasstoken = filter_input(INPUT_GET, 'sptokenpassed');

    //          echo $newpass.'<br>';
    //        echo $newpassverify .'<br>';
    //            echo $newpassemail.'<br>';
    //          echo $newpasstoken .'<br>';
    $url = "https://ttapi.imobisoft.uk/api/Account/CreatePassword";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "accept: text/plain",
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = '{"email":"' . $newpassemail . '","password":"' . $newpass . '","confirmPassword":"' . $newpassverify . '","token":"' . $newpasstoken . '"}';

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $resp = json_decode($resp);
    curl_close($curl);
    if ($resp != NULL) {
        if ($http_code == 200) {
            $outputmessage =  "<h2>Thank You</h2><p>Password Updated Sucessfully.</p>";
        } else {
            $form = '<form id="ajaxsetnewpassword" action="" class="mt-3">
                        <div class="form-group mb-4">
                        <label>New Password</label>
                        <input type="password" class="form-control bg-light" name="setnewpass" id="setnewpass" required>
                        </div>
                        <div class="form-group mb-4">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control bg-light" name="setnewpassverify" id="setnewpassverify" required>
                        </div>
                        <input type="hidden" value="' . $newpassemail . '" id="spemailpassed" name="spemailpassed" class="text-danger">
                        <input type="hidden" value="' . $newpasstoken . '" id="sptokenpassed" name="sptokenpassed" >
                        <div class="text-center my-4">
                        <button type="submit" class="button btn rounded-pill border-3 border-secondary btn-white text-secondary px-5 fw-bold">Reset Password</button>
                        </div>
                    </div>
                </form>';
            //var_dump($resp);
            if (is_array($resp->responseException)) {
                $outputmessage = implode(" ", $resp->responseException);
            } else {
                $outputmessage = $resp->responseException;
            }
        }
    } else {
        $outputmessage = '<div class="text-center"><h3 class="text-danger">Server Busy</h3><p>Try agin by clicking on the link sent via email.</p>
        <img class="img-fluid" src="/wp-content/themes/treasure/assets/images/error.svg" alt="500 error">
        </div>' . $http_code;
    }
else :
    $outputmessage = '<h2 class="text-danger text-center">Unauthorized Access</h2><p class="text-center">Not authorized to access this page directly</p>';
endif;
?>
<section class="resetpasswordpage">
    <div class="container py-5">
        <div class="row mx-0">
            <div class="col-md-8 offset-md-2 bg-light p-5">
                <h2 class="text-center fw-bold mb-3">Reset Password</h2>
                <?php
                echo $form;
                echo $outputmessage;
                ?>
            </div>
            <!-- <div class="col-md-3">
                <div class="sidebar">

                </div>
            </div> -->
        </div>
    </div>
</section>

<?php
get_footer();
