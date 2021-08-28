<?php

if(!isset($_POST['submit']))
{

  echo "Erro, voce precisa enviar a mensagem!";

  exit;

}


$name = $_POST['name'];
$visitor_email = $_POST['email'];
$telefone = $_POST['tel'];
$message = $_POST['message'];


if(empty($name)||empty($visitor_email)||empty($message)) 
{
    echo "Nome e email obrigatorios!";
    exit;
}


if(IsInjected($visitor_email))
{
    echo "Email invalido!";
    exit;
}


// $email_from = 'barbaha.maria@conteud.com';
$email_from = 'barbaha@barbaha.pe.hu';
$email_subject = "$name entrou em contato pelo site";
$email_body = "Nome: $name \nEmail: $visitor_email\n Telefone: $telefone \n Conteúdo: \n $message \n E-mail recebido via Site da J.Coelho Inspeções.";
    

// $to1 = "jcoelho@conteud.com";
$to1 = "barbaha.mariah@hotmail.com";

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";



mail($to1,$email_subject,$email_body,$headers);



function IsInjected($str)

{

  $injections = array('(\n+)',

              '(\r+)',

              '(\t+)',

              '(%0A+)',

              '(%0D+)',

              '(%08+)',

              '(%09+)'

              );

  $inject = join('|', $injections);

  $inject = "/$inject/i";

  if(preg_match($inject,$str))

    {

    return true;

  }

  else

    {

    return false;

  }
}

echo "<center>Pronto, e-mail enviado! </center>";
echo "<center><a href=\"javascript:history.go(-1)\">Voltar</center></a>";
exit;

?> 

