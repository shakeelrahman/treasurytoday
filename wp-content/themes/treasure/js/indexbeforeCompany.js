function fnameLength(el) {
    if(el.value.length == ""){
        document.getElementById("errFname").innerHTML="Please fill this field";
    }
    if (el.value.length > 50) {
        document.getElementById("errFname").innerHTML="Field length should be less than 50"
    }
}
function lnameLength(el) {
    if(el.value.length == ""){
        document.getElementById("errLname").innerHTML="Please fill this field";
    }
    if (el.value.length > 50) {
        document.getElementById("errLname").innerHTML="Field length should be less than 50"
    }
}
function companyLength(el) {
    if(el.value.length == ""){
        document.getElementById("errComp").innerHTML="Please fill this field";
    }
    if (el.value.length > 50) {
        document.getElementById("errComp").innerHTML="Field length should be less than 50"
    }
}
function emailLength(el) {
    const email = document.getElementById("premailaddress");
    const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(el.value.length == ""){
        document.getElementById("errEmail").innerHTML="Please fill this field";
    }
    if (el.value.length > 50) {
        document.getElementById("errEmail").innerHTML="Field length should be less than 50"
    }
    // if(!email.value.match(mailformat)){
    //     document.getElementById("errEmail").innerHTML = "Enter a valid Email";
    //         }
}

function validateForm(){
    const subsEmail = getElementById('subsEmail');
    const mailformat = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if(!subsEmail.value.match(mailformat)){
        document.getElementById('errSubs').innerHTML= "Email is not valid";
    }
}
function showPass() {
    const passInput = document.getElementById('psw');
    if (passInput.type === "text") {
        passInput.type = "password"
    } else {
        passInput.type = "text"
    }
}
function showRegPass() {
    const passInput = document.getElementById('rpassword');
    if (passInput.type === "text") {
        passInput.type = "password"
    } else {
        passInput.type = "text"
    }
}
function showRegContentPass() {
    const passInput = document.getElementById('prpassword');
    if (passInput.type === "text") {
        passInput.type = "password"
    } else {
        passInput.type = "text"
    }
}
jQuery(document).ready(function ($) {
    // Gets the video src from the data-src on each button
    var $videoSrc;
    $('.video-panel__link').click(function () {
        $videoSrc = $(this).data("src");
    });
    console.log($videoSrc);
    // when the modal is opened autoplay it  
    $('#videomodel').on('shown.bs.modal', function (e) {

        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    });

    // stop playing the youtube video when I close the modal
    $('#videomodel').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src', $videoSrc);
    });
    // document ready  
});


(function ($) {
    $(document).ready(function () {
        $('#rpassword').change(function () {
            var passWord = $("#rpassword").val();
            var passLength = passWord.length;

            var upper_text = new RegExp('[A-Z]');
            var lower_text = new RegExp('[a-z]');
            var number_check = new RegExp('[0-9]');
            var special_char = new RegExp('[!/\'^�$%&*()}{@#~?><>,|=_+�-\]');
            if (passLength < 8) {
                alert("Password Length Must Be 8.")
                exit;
            }
            if (!passWord.match(upper_text) || !passWord.match(lower_text) || !passWord.match(number_check) || !passWord.match(special_char))
                alert("Password must conatin atleast one special character, one digit ,one uppercase letter and one lowercase letter. ");

        });
    });
})(jQuery);