<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo "Hello";
//?>

<?=CHtml::link("Thêm người dùng", array("create"), array('class'=>'btn btn-primary'))?> 

<?php
//
//$dataProvider=new CActiveDataProvider('User');
//
//$this->widget('zii.widgets.CListView', array(
//    'dataProvider'=>$model->search(),
//    'itemView'=>'_view',   // refers to the partial view named '_post'
//    'sortableAttributes'=>array(
//        'id',
//        'username'=>'N',
//    ),
//));


$dataProvider=new CActiveDataProvider('User',array('pagination'=>array(
                        'PageSize'=>3,)));

$this->widget('application.extensions.MyGridView', array(
    'dataProvider'=>$dataProvider,
    'pager'=>array(
        'maxButtonCount'=>3,
        
        ),
    'htmlOptions'=>array(
        'class'=>'table table-striped table-bordered table-highlight _datatable'
    ),
    'columns'=>array(  
        
        array(
            'name'=>"#",
            'value'=>'$row+1',
            'htmlOptions'=>array('style'=>'width:40px; text-align: center;')
            ),
        array (
            'name' => 'username',  // display the 'name' attribute of the 'category' relation
            'htmlOptions'=>array('style'=>'width:110px; text-align: left;')
        ),        

        'profile.full_name',   // display the 'content' attribute as purified HTML
        'group.name',
        array (
            'name'=>'profile.is_active',
            'value'=>'($data->profile->is_active == 0)? "không":"có"'
        ),
        array(            // display 'create_time' using an expression
            'name'=>'profile.dob',
            'value'=>'$data->profile->dob',
        ),       
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
        ),
    ),
));

?>