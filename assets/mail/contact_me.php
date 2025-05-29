<?php

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = 'contato@agenciaateon.com';

$email_subject = "Contato via site:  $name";
$email_body =
    "Nova mensagem do formulario de contato do seu website.\n\n" .
    "Segue os detalhes:\n\n
Nome:$name \n
Email: $email_address\n
Telefone: $phone\n
Mensagem: $message\n";

$headers = "From: \n";
$headers .= "Reply-To: $email_address";

mail($to, $email_subject, $email_body, $headers);
header('Location: https://agenciaateon.com/');
return true;
?>
