<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Главная</a></li>
                <li>Регистрация</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>REGISTER</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator">
                                <div class="form-group has-feedback">
                                    <label for="login">Login</label>
                                    <input required value="<?=isset($_SESSION['form_data']['login']) ? hsc($_SESSION['form_data']['login'])  : '';?>" type="text" name="login" class="form-control" id="login" placeholder="Login">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="pasword">Password</label>
                                    <input required value="<?=isset($_SESSION['form_data']['password']) ? hsc($_SESSION['form_data']['password'])  : '';?>" type="password" name="password" class="form-control" id="pasword" placeholder="Password" data-error="minimum 6 characters" data-minlength="6">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="name">Имя</label>
                                    <input required value="<?=isset($_SESSION['form_data']['name']) ? hsc($_SESSION['form_data']['name'])  : '';?>" type="text" name="name" class="form-control" id="name" placeholder="Имя">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input required value="<?=isset($_SESSION['form_data']['email']) ? hsc($_SESSION['form_data']['email'])  : '';?>" type="email" name="email" class="form-control" id="email" placeholder="Email">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">Address</label>
                                    <input required value="<?=isset($_SESSION['form_data']['address']) ? hsc($_SESSION['form_data']['address'])  : '';?>" type="text" name="address" class="form-control" id="address" placeholder="Address">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <button type="submit" class="btn btn-default">Зарегистрировать</button>
                            </form>
                            <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->