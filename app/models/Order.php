<?php

namespace app\models;

use ishop\App;
use RedBeanPHP\R;

class Order extends AppModel {

    public static function saveOrder($data){
        $order = R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order->currency = $_SESSION['cart.currency']['code'];
        $order_id = R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;
    }

    public static function saveOrderProduct($order_id){
        $sql_part = '';
        foreach ($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']})," ;
        }
        $sql_part = rtrim($sql_part,',');
        $id = R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES {$sql_part}");
    }

    public static function mailOrder($order_id, $user_email){
        $transport = (new \Swift_SmtpTransport( App::$app->getProperty('smtp_host'),App::$app->getProperty('smtp_port'),App::$app->getProperty('smtp_protocol') ))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'));
        $mailer = new \Swift_Attachment($transport);
        ob_start();
        require  APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();
        $message = (new Swift_Message("Order № {$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email,App::$app->getProperty('admin_email'))
            ->setBody($body, 'text/html');
        $result = $mailer->send($message);
            unset($_SESSION['cart']);
            unset($_SESSION['cart.qty']);
            unset($_SESSION['cart.sum']);
            unset($_SESSION['cart.currency']);
            $_SESSION['success'] = 'Thanks for order';
    }
}