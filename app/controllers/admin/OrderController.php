<?php

namespace app\controllers\admin;

use ishop\libs\Pagination;
use RedBeanPHP\R;

class OrderController extends AppController{

    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 1;
        $count = R::count('order');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $orders = R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`,`order`.`date`,`order`.`update_at`,`order`.`currency`, `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` JOIN `user` ON `order`.`user_id` = `user`.`id` JOIN `order_product` ON `order`.`id` = `order_product`.`order_id` GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage ");
        $this->set(compact('pagination', 'orders', 'count'));
        $this->setMeta('Список заказов');
    }

    public function viewAction(){
        $order_id = $this->getRequestID();
        $order = R::getRow("SELECT `order`. * ,  `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` JOIN `user` ON `order`.`user_id` = `user`.`id` JOIN `order_product` ON `order`.`id` = `order_product`.`order_id` WHERE `order`.`id` = ? GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1 ",[$order_id]);
        if(!$order){
            throw new \Exception('ID заказа не найдено');
        }
        $order_products = R::findAll('order_product', "order_id = ?",[$order_id]);
        $this->setMeta('Детальная страница заказа №($order_id)');
        $this->set(compact('order','order_products'));
    }

    public function changeAction(){
        $order_id = $this->getRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';
        $order = R::load('order', $order_id);
        if(!$order){
            throw new \Exception('Order ID not found');
        }
        $order->status = $status;
        $order->update_at = date("Y-m-d H:i:s");
        $orderq = R::store($order);
        $_SESSION['success'] = 'Изменения сохранены';
        redirect();
    }

    public function deleteAction(){
        $order_id = $this->getRequestID();
        $order = R::load('order',$order_id);
        R::trash($order);
        $_SESSION['success'] = 'Заказ удален';
        redirect(ADMIN . '/order');
    }

}