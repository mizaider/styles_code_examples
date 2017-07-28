<?php
    // My modifications to mailer script from:
    // http://blog.teamtreehouse.com/create-ajax-contact-form
    // Added input sanitizing to prevent injection

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
                $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $tel = strip_tags(trim($_POST["tel"]));
                $tel = str_replace(array("\r","\n"),array(" "," "),$tel);
        $email = filter_var(trim($_POST["e-mail"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        $t_qty_1 = trim($_POST["type-qty-1"]);
        $t_qty_2 = trim($_POST["type-qty-2"]);
        $t_qty_3 = trim($_POST["type-qty-3"]);
        $t_qty_4 = trim($_POST["type-qty-4"]);
        $t_qty_5 = trim($_POST["type-qty-5"]);
        $t_qty_6 = trim($_POST["type-qty-6"]);
        $t_qty_7 = trim($_POST["type-qty-7"]);
        $t_qty_8 = trim($_POST["type-qty-8"]);
        $t_qty_9 = trim($_POST["type-qty-9"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($tel) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            if (!function_exists('http_response_code'))
            {
                function http_response_code($newcode = NULL)
                {
                    static $code = 400;
                    if($newcode !== NULL)
                    {
                        header('X-PHP-Response-Code: '.$newcode, true, $newcode);
                        if(!headers_sent())
                            $code = $newcode;
                    }       
                    return $code;
                }
            }
            echo "Уупс! Возникла проблема с отправкой Вашей информации. Пожалуйста заполните форму и попробуйте ещё раз.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "info@tai-kom.ru";
        // $recipient = "info@gltrend.ru";

        // Set the email subject.
        $subject = "Сообщение с сайта Premiumpanel.ru | Новый заказ от $name";

        // Build the email content.
        $email_content = "Имя: $name\n";
        $email_content .= "Телефон: $tel\n";
        $email_content .= "E-mail: $email\n\n\n";
        $email_content .= "Сообщение: $message\n\n\n";
        $email_content .= "Заказ:\n Stripe x $t_qty_1,\n Square x $t_qty_2,\n Bump x $t_qty_3,\n Cube x $t_qty_4,\n Wave x $t_qty_5,\n Icon x $t_qty_6,\n Liquid x $t_qty_7,\n Domino x $t_qty_8,\n Клей x $t_qty_9.\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            if (!function_exists('http_response_code'))
            {
                function http_response_code($newcode = NULL)
                {
                    static $code = 200;
                    if($newcode !== NULL)
                    {
                        header('X-PHP-Response-Code: '.$newcode, true, $newcode);
                        if(!headers_sent())
                            $code = $newcode;
                    }       
                    return $code;
                }
            }
            echo "Спасибо! Ваше сообщение отправлено!";
        } else {
            // Set a 500 (internal server error) response code.
            if (!function_exists('http_response_code'))
            {
                function http_response_code($newcode = NULL)
                {
                    static $code = 500;
                    if($newcode !== NULL)
                    {
                        header('X-PHP-Response-Code: '.$newcode, true, $newcode);
                        if(!headers_sent())
                            $code = $newcode;
                    }       
                    return $code;
                }
            }
            echo "Уупс! Что-то пошло не так и мы не можем отправить Ваше сообщение.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
            if (!function_exists('http_response_code'))
            {
                function http_response_code($newcode = NULL)
                {
                    static $code = 403;
                    if($newcode !== NULL)
                    {
                        header('X-PHP-Response-Code: '.$newcode, true, $newcode);
                        if(!headers_sent())
                            $code = $newcode;
                    }       
                    return $code;
                }
            }
        echo "Возникла проблема с отправкой Вашей информации, попробуйте ещё раз!";
    }

?>