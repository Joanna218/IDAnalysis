<?php
  sendMail();
  $res->msg = "表單送出成功，將會有專人為您服務！";
  $message = json_encode($res);
  echo $message;



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
    $companyOrg =='' || $email == '' || $selectDemand ==' ') {
      echo '請完整輸入必填欄位！';
      exit;
    }

    if ($note == '') {
      $note = '無';
    }



    $to = "idanalysis_service@i-buzz.com.tw";
    $subject = "iBuzzID";

    $message = "
    <html>
      <head>
        <title>HTML email</title>
      </head>
      <body>
        <p>iBuzz報名聯絡資料</p>
        <table border='1'>
        <tr>
          <th>聯絡人</th>
          <th>職稱</th>
          <th>聯絡電話</th>
          <th>公司/組織單位</th>
          <th>E-mail</th>
          <th>服務需求</th>
          <th>備註說明</th>
        </tr>
        <tr>
          <td style='text-align:center;'>$contactPerson</td>
          <td style='text-align:center;'>$department</td>
          <td style='text-align:center;'>$contactPhone</td>
          <td style='text-align:center;'>$companyOrg</td>
          <td style='text-align:center;'>$email</td>
          <td style='text-align:center;'>$selectDemand</td>
          <td style='text-align:center;'>$note</td>
        </tr>
        </table>
      </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <jingyulin888@gmail.com.tw>' . "\r\n";
    $headers .= 'Cc: okokis101@gmail.com.tw' . "\r\n";

    mail($to,$subject,$message,$headers);
  }



?>
