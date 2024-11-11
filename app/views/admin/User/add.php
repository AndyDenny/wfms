<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Новый пользователь
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN;?>/user"><i class="fa fa-dashboard"></i>Список пользователей</a></li>
        <li class="active">Новый пользователь</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/user/signup" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control has-feedback" name="login" id="login" value="<?=isset($_SESSION['form_data']['login']) ? $_SESSION['forn_data']['login'] : '' ?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="text" class="form-control" name="password" id="password" data-min-length="6" data-error="Пароль должен быть не менне 6-ти символов">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control has-feedback" name="name" id="name" value="<?=isset($_SESSION['form_data']['name']) ? $_SESSION['forn_data']['name'] : ''?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control has-feedback" name="email" id="email" value="<?=isset($_SESSION['form_data']['email']) ? $_SESSION['forn_data']['email'] : ''?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input type="text" class="form-control has-feedback" name="address" id="address" value="<?=isset($_SESSION['form_data']['address']) ? $_SESSION['forn_data']['address'] : ''?>">
                        </div>
                        <div class="form-group">
                            <label for="role">Роль</label>
                            <select name="role" id="role" class="form-control">
                                <option value="user">Пользователь</option>
                                <option value="admin">Администратор</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data'])?>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->