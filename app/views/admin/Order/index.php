<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список заказов
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Список заказов</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
         <div class="col-md-12">
             <div class="box">
                 <div class="box-body">
                     <?php if($orders):?>
                        <div class="table-responsive">
                         <table class="table table-bordered table-hover">
                             <tr>
                                 <th>ID</th>
                                 <th>User_ID</th>
                                 <th>Status</th>
                                 <th>All Cost</th>
                                 <th>Date Create</th>
                                 <th>Date Change</th>
                                 <th>Action</th>
                             </tr>
                             <?php foreach($orders as $order):?>
                             <?php $status = $order['status'] ? 'success' : '' ?>
                             <tr class="<?=$status?>">
                                 <td><?=$order['id']?></td>
                                 <td><?=$order['user_id']?></td>
                                 <td><?=$order['status'] ? 'Завершен' : 'Новый' ?></td>
                                 <td><?=$order['sum']?> <?=$order['currency']?></td>
                                 <td><?=$order['date']?></td>
                                 <td><?=$order['update_at']?></td>
                                 <td>
                                     <a href="<?=ADMIN?>/order/view?id=<?=$order['id']?>"><i class="fa fa-fw fa-eye"></i></a>
                                     <a class="delete" href="<?=ADMIN?>/order/delete?id=<?=$order['id']?>"><i class="fa fa-fw fa-close text-danger"></i></a>
                                 </td>
                             </tr>
                            <?php endforeach;?>
                         </table>
                     </div>
                     <div class="text-center">
                         <p>
                             (<?=count($orders)?>)
                         </p>
                         <?php if($pagination->countPages > 1):?>
                            <?=$pagination;?>
                         <?php endif;?>
                     </div>
                     <?php endif;?>
                 </div>
             </div>
         </div>
    </div>

</section>
<!-- /.content -->