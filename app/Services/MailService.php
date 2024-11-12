<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Support\Facades\View;

class MailService
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // Configurar PHPMailer usando los valores de config/mail.php
        $this->mail->isSMTP();
        $this->mail->Host = config('mail.mailers.smtp.host');
        $this->mail->Port = config('mail.mailers.smtp.port');
        $this->mail->SMTPAuth = true;
        $this->mail->Username = config('mail.mailers.smtp.username');
        $this->mail->Password = config('mail.mailers.smtp.password');
        $this->mail->SMTPSecure = config('mail.mailers.smtp.encryption');

        // Configurar el remitente predeterminado
        $this->mail->setFrom(config('mail.from.address'), config('mail.from.name'));
    }

    public function sendContactEmail($to, $subject, $messageContent)
    {
        try {
            $this->mail->addAddress($to);
    
            // Cargar el contenido HTML desde la vista Blade
            $htmlContent = View::make('components.emails.contact', [
                'subject' => $subject,
                'messageContent' => $messageContent
            ])->render();
    
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $htmlContent;
            $this->mail->AltBody = strip_tags($messageContent);
    
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            Log::warning("El mensaje no se pudo enviar. Error: {$this->mail->ErrorInfo}");
            return false;
        }
    }
}