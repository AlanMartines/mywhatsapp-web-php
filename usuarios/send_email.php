<?php
include('configdb.php');
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $password = $_POST['password'];
    $telefone = $_POST['telefone'];
    $morada = $_POST['morada'];
    $cp = $_POST['cp'];

    $com_code = md5(uniqid(rand()));
    $query_registo = "INSERT INTO users(email, nome, password, telefone, morada, cp, admin, com_code) VALUES ('$email', '$nome','$password', '$telefone', '$morada', '$cp', 0, '$com_code')";
    $resultado_registo = mysqli_query($mysqli,$query_registo) or die(mysqli_error($mysqli));
    // Verifica se o registo foi bem efectuado na BD, manda e-mail de confirmação para o utilizador.
            if($result)
    {
        $to = $email;
        $subject = "Confirmação da Agreen Space para $nome";
        $header = "Agreen Space: Confirme o seu e-mail.";
        $message = "Por favor clique no link abaixo para confirmar a sua conta. rn ";
        $message .= "http://localhost/agreen/HTML/confirmar_email.php?passkey=$com_code";

        $sentmail = mail($to,$subject,$message,$header);

        if($sentmail)
        {
            echo "
            <script language='JavaScript'>
            window.alert('Foi enviado um e-mail de confirmação para o seu endereço de e-mail. Clique para voltar à página inicial.')
            window.location.href='index.php';
            </script>";
        }
        else
        {
            echo "
            <script language='JavaScript'>
            window.alert('Não foi possível enviar um e-mail de confirmação para o seu endereço de e-mail. Clique para voltar à página inicial.')
            window.location.href='index.php';
            </script>";
        }
    }
}
?>