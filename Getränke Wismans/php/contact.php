<?php
$request = json_decode(file_get_contents('php://input'), true);
$to = "e.kimm@me.com";
$subject = $request["subject"];
$message = "
    <h1>Kontaktanfrage von ". $request["name"] . "(" . $request["mail"] . ")</h1><p>" . $request["message"] . "</p>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Wismans Website';
if ($request["copy"]) $headers .= ', ' . $request["mail"];
$headers .= "\r\n";
mail($to,$subject,$message,$headers);

