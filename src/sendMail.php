<?php
  sendMail();


  // 寄信
  function sendMail() {
    // POST Data
    $contactPerson = $_POST['contactPerson'];
    $department= $_POST['department'];
    $contactPhone = $_POST['contactPhone'];
    $companyOrg = $_POST['companyOrg'];
    $email= $_POST['email'];
    $selectDemand = $_POST['selectDemand'];
    $note = $_POST['note'];

    if ($contactPerson == '' || $department == '' || $contactPhone =='' ||
    $companyOrg =='' || $email == '' || $selectDemand =='') {
      echo '請完整輸入必填欄位！';
      exit;
    }

    if ($note == '') {
      $note = '無';
    }



    // $to = "joanna@return.com.tw";
    $to ="idanalysis_service@i-buzz.com.tw";

    $subject = "iBuzzID客戶資料";
    $subject = "=?UTF-8?B?".base64_encode($subject )."?=";

    $message = "
    聯絡人：$contactPerson <br>
    職稱：$department <br>
    聯絡電話：$contactPhone <br>
    公司/組織單位：$companyOrg <br>
    E-mail：$email <br>
    服務需求：$selectDemand <br>
    備註說明：$note <br>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <idanalysis_service@i-buzz.com.tw>' . "\r\n";
    // $headers .= 'Cc: okokis101@gmail.com.tw' . "\r\n";

    mail($to,$subject,$message,$headers);

    echo "表單送出成功，將會有專人為您服務！";
  }



?>
