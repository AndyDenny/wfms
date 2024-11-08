<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактирование пользователя
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN;?>/user"><i class="fa fa-dashboard"></i>Список пользователей</a></li>
        <li class="active">Редактирование пользователя</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/user/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control has-feedback" name="login" id="login" value="<?=hsc($user->login)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="text" class="form-control has-feedback" name="password" id="password" placeholder="Новый пароль">
                        </div>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control has-feedback" name="name" id="name" value="<?=hsc($user->name)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control has-feedback" name="email" id="email" value="<?=hsc($user->email)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input type="text" class="form-control has-feedback" name="address" id="address" value="<?=hsc($user->address)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="role">Роль</label>
                            <select name="role" id="role" class="form-control">
                                <option value="user" <?if ($user->role == 'user') echo 'selected' ?> >Пользователь</option>
                                <option value="admin" <?if ($user->role == 'admin') echo 'selected' ?>>Администратор</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$user->id?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
            <h3>Заказы пользователя</h3>
            <div class="box">
                <div class="box-body">
                    <?php if($orders):?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Статус</th>
                                    <th>Поная стоимость</th>
                                    <th>Дата создания</th>
                                    <th>Дата обновления</th>
                                    <th>Действие</th>
                                </tr>
                                <?php foreach($orders as $order):?>
                                    <?php $status = $order['status'] ? 'success' : '' ?>
                                    <tr class="<?=$status?>">
                                        <td><?=$order['id']?></td>
                                        <td><?=$order['status'] ? 'Завершен' : 'Новый' ?></td>
                                        <td><?=$order['sum']?> <?=$order['currency']?></td>
                                        <td><?=$order['date']?></td>
                                        <td><?=$order['update_at']?></td>
                                        <td>
                                            <a href="<?=ADMIN?>/order/view?id=<?=$order['id']?>"><i class="fa fa-fw fa-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                    <?php else:?>
                        <p class="text-danger">Пока заказов нет</p>
                    <?php endif;?>
                </div>
            </div>

        </div>

    </div>

</section>
<!-- /.content -->