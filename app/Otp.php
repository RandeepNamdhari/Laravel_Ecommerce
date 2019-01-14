<?php
namespace App;
/**
 * 
 */
class Otp 
{
  protected $number;
  protected $url;
  
  function __construct($number)
  {
    $this->number=$number;
    
  }
  function verifyOtp($otp)
  {
    $this->otp=$otp;
    $this->url="https://control.msg91.com/api/verifyRequestOTP.php?authkey=".env('MESSAGE_API_KEY')."&mobile=".$this->number."&otp=".$this->otp;
    return $this->send();
  }
  function resendOtp()
  {
    $this->url="http://control.msg91.com/api/retryotp.php?authkey=".env('MESSAGE_API_KEY')."&mobile=".$this->number."&retrytype=text";
   echo $this->send();
  }

  function sendOtp()
  {
    $this->url="http://control.msg91.com/api/sendotp.php?&otp_length=6&authkey=".env('MESSAGE_API_KEY')."&sender=EdhikEco&mobile=".$this->number."&otp_expiry=30";
   echo $this->send();
  }

  function autoOtp()
  {
    $this->url="http://control.msg91.com/api/sendotp.php?&otp_length=6&authkey=".env('MESSAGE_API_KEY')."&sender=EdhikEco&mobile=".$this->number."&otp_expiry=30";
   return $this->send();
  }

  function send()
  {
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $this->url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return false;
  //echo "cURL Error #:" . $err;
} else {
  return $response;
}
  }
}
