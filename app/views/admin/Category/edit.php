<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактировать категорию `<?=$category->title;?>`
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN;?>/category"><i class="fa fa-dashboard"></i>Список категорий</a></li>
        <li class="active">Редактировать категорию</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <form action="<?=ADMIN;?>/category/edit" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="parent_id">Родительская категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'admin_select',
                                    'attrs' => [
                                        'name'=>'parent_id',
                                        'id' => 'parent_id'
                                    ],
                                    'class' => 'form-control',
                                    'prepend' => '<option value="0">Без родителя</option>'
                                ])?>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="title">Название категории</label>
                                <input type="text" name="title" class="form-control" value="<?=hsc($category->title)?>" id="title" placeholder="Название категории" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" value="<?=hsc($category->keywords)?>" placeholder="Ключевые слова">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description" value="<?=hsc($category->description)?>" placeholder="Описание">
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?=hsc($category->id)?>">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->