<?php foreach ($this->groups as $group_id => $group_name):?>
<section  class="sky-form">
    <h4><?=$group_name;?></h4>
    <div class="row1 scroll-pane">
        <div class="col col-4">
            <?php foreach ($this->attributes[$group_id] as $id_attr => $value):?>
                <?php
                    if(!empty($filter) && in_array($id_attr, $filter)){
                        $checked = 'checked';
                    }else{
                        $checked = null;
                    }
                ?>
                <label class="checkbox">
                    <input type="checkbox" name="checkbox" value="<?=$id_attr;?>" <?=$checked?> ><i></i><?=$value;?>
                </label>
            <?php endforeach;?>
        </div>
    </div>
</section>
<?php endforeach;?>