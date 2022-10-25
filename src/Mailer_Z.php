<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Composer のオートローダーの読み込み
require '../vendor/autoload.php';
//エラーメッセージ用日本語言語ファイルを読み込む場合（25行目の指定も必要）
require '../vendor/phpmailer/phpmailer/language/phpmailer.lang-ja.php';


class Mailer_Z
{

    public $mail;
    public $from;
    public array $to;
    public $cc;
    public $replyTo;
    public $subject;
    public $htmlbody;
    public $textbody;

    public function setFrom($address): void
    {
        $this->from = $address;
    }
    public function setTo(array $address): void
    {
        $this->to = $address;
    }
    public function setReplyTo($address): void
    {
        $this->replyTo = $address;
    }
    public function setCc($address): void
    {
        $this->cc = $address;
    }
    public function setSubject($address): void
    {
        $this->subject = $address;
    }
    public function setHTMLbody($address): void
    {
        $this->htmlbody = $address;
    }
    public function setTextbody($address): void
    {
        $this->textbody = $address;
    }

    function __construct()
    {
        //言語、内部エンコーディングを指定
        mb_language("japanese");
        mb_internal_encoding("UTF-8");

        // インスタンスを生成（引数に true を指定して例外 Exception を有効に）
        $this->mail = new PHPMailer(true);

        //日本語用設定
        $this->mail->CharSet = "utf-8";
        $this->mail->Encoding = "base64";

        //エラーメッセージ用言語ファイルを使用する場合に指定
        $this->mail->setLanguage('ja', 'vendor/phpmailer/phpmailer/language/');
    }

    function Make_Mail()
    {
        try {
            //サーバの設定
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;  // デバグの出力を有効に（テスト環境での検証用）
            $this->mail->isSMTP();   // SMTP を使用
            $this->mail->SMTPAuth   = true;   // SMTP authentication を有効に
            $this->mail->Host       = 'example';  // SMTP サーバーを指定
            $this->mail->Username   = 'example';  // SMTP ユーザ名
            $this->mail->Password   = 'example';
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //差出人アドレス, 差出人名
            $this->mail->setFrom($this->from);
            //受信者アドレス, 受信者名
            foreach ($this->to as $addr) {
                $this->mail->addAddress($addr);
            }
            //返信用アドレス
            if ($this->replyTo) {
                $this->mail->addReplyTo($this->replyTo);
            }
            //cc 
            if ($this->cc) {
                $this->mail->addCC($this->cc);
            }

            // HTML形式を指定
            $this->mail->isHTML(true);
            //メール表題
            $this->mail->Subject = $this->subject;
            //HTML形式の本文
            $this->mail->Body  = $this->htmlbody;
            //テキスト形式の本文
            $this->mail->AltBody = $this->textbody;
        } catch (Exception $e) {
            //エラー（例外：Exception）が発生した場合
            echo "Message could not be created. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    function Send_Mail()
    {
        try {
            $this->mail->send();
            echo 'Message has been send!!!';
        } catch (\Throwable $th) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}