<?php
include 'db.php';

?>
<?php

$name=$_POST['formInputName'];
$age=$_POST['formInputAge'];
$email=$_POST['formInputEmail'];
$phoneNumber=$_POST['formInputPhoneNumber'];
$gender=$_POST['gender'];
$address=$_POST['formInputAddress'];
$disease=$_POST['formInputDisease'];
$comment=$_POST['formInputComment'];
$response=$_POST['formInputResponse'];
$referredDoctor=$_POST['formInputReferredDoctor'];
date_default_timezone_set("Asia/Kolkata");
$date=date('d/m/y');
$time=date('h:i:sa');

if ($name==''||$age=='' ||$email=='' ||$phoneNumber=='' ||
    $gender=='' ||$address==''||$response=='') {
    header("location:createPatient.php?error=notfilled");
}else{
        $query="select patient_id from id_counter";
        $returnedResult=mysqli_query($connection,$query);
        $row=mysqli_fetch_array($returnedResult);
        $patient_id=$row[0]+1;
        $query="UPDATE id_counter SET patient_id='$patient_id' where patient_id='$row[0]'";
        mysqli_query($connection,$query);
        $query="
        INSERT INTO patient (name, patient_id, gender,address,contact_no,disease, response, doc_id,comment,age,email) VALUES('$name', '$patient_id', '$gender', '$address', '$phoneNumber','$disease'  , '$response', '$deferredDoctor','$comment','$age','$email')";
        mysqli_query($connection,$query);

   /*   ************

        SMS Code starts here


   */
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=Sahil&route=4&mobiles=$phoneNumber&authkey=219279AJL5U0Tnbr5b18c441&country=91&message=Hello! This is a test message",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }
    /*   ************

        Email Code starts here


   */
//    require_once ('PHPMailerAutoload.php');
//    $mail=new \PHPMailer\PHPMailer\PHPMailer();
//    $mail->isSMTP();
//    $mail->SMTPAuth()=true;
//    $mail->SMTPSecure='SSL';
//    $mail->Host='smtp.gmail.com';
//    $mail->Port='465';
//    $mail->isHTML();
//    $mail->Username='ichelontest@gmail.com';
//    $mail->Password='122001qwerty';
//    $mail->setFrom('no-reply@ichelon.com');
//    $mail->Subject='test mail';
//    $mail->Body='this is the mail body';
//    $mail->addAddress('yadav.sy001@gmail.com');
//    $mail->send();


        header("location:createPatient.php?error=success & patient_id=$patient_id");

}
//else{
//    $testQuery="select name from projecttable where roll_number='$rollNumber'";
//    $returnedQueryResult=mysqli_query($connection,$testQuery);
//    if($row=mysqli_fetch_assoc($returnedQueryResult)) {
//        header("location:register.php?error=alreadyExists");
//    }
?>
