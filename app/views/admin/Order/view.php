<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Заказ № <?=$order['id']?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/order"><i class="fa fa-dashboard"></i>Список заказов</a></li>
        <li class="active">Заказ № <?=$order['id']?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>Заказ ID</td>
                                <td><?=$order['id']?></td>
                            </tr>
                            <tr>
                                <td>Пользователь ID</td>
                                <td><?=$order['user_id']?></td>
                            </tr>
                            <tr>
                                <td>Имя пользователя</td>
                                <td><?=$order['name']?></td>
                            </tr>
                            <tr>
                                <td>Дата создания</td>
                                <td><?=$order['date']?></td>
                            </tr>
                            <tr>
                                <td>Дата изменения</td>
                                <td><?=$order['update_at']?></td>
                            </tr>
                            <tr>
                                <td>Статус</td>
                                <td><?=$order['status'] ? 'Завершен' : 'Новый' ?></td>
                            </tr>
                            <tr>
                                <td>Заметки по заказу</td>
                                <td><?=$order['note']?></td>
                            </tr>
                            <tr class="text-bold">
                                <td>Итого:</td>
                                <td><?=$order['sum']?> <?=$order['currency']?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <h3>Детали</h3>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Кол-во</th>
                                <th>Цена</th>
                            </tr>
                            <tbody>
                                <?php $qty = 0; foreach($order_products as $product):?>
                                    <tr>
                                        <td><?=$product->id?></td>
                                        <td><?=$product->title?></td>
                                        <td><?=$product->qty; $qty += $product->qty;?></td>
                                        <td><?=$product->price?></td>
                                    </tr>
                                <?php endforeach;?>
                                <tr class="active">
                                    <td colspan="2">
                                        <b>Итого:</b>
                                    </td>
                                    <td><b><?=$qty?></b></td>
                                    <td><b><?=$order['sum']?> <?=$order['currency']?></b></td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->