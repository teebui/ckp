<?php $this->pageTitle = "Quản lý người dùng";?>
<div class="row">
    <?=CHtml::link("Thêm người dùng", array("create"), array('class'=>'btn btn-primary', 'style'=>'margin-bottom:7px;'))?> 
    <div class="span12">
        <div class="widget widget-table">
            <div class="widget-header">						
                    <h3>
                            <i class="icon-th-list"></i>
                            Danh sách người dùng
                    </h3>
                  
            </div> <!-- /widget-header -->
            
            <div class="widget-content">
                <table class="table table-striped table-bordered table-highlight _datatable" id="_datatable">
                    <thead>
                            <tr style="text-align: centre;">
                                    <th>STT</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Tên đầy đủ</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Nhóm người dùng</th>
                                    <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                foreach ($model as $item) {
                                    $i++;
                                    ?>
                            <tr>
                                <td>
                                    <?=$i?>
                                </td>
                                <td>
                                  <?=CHtml::link($item->username, array("user/view", 'id'=>$item->id))?>
                                </td>
                                <td>
                                  <?=$item->profile->full_name?>  
                                </td>
                                <td>
                                  <?=$item->profile->dob?>  
                                </td>
                                <td>
                                  <?=($item->profile->gender == 1)?"nam":"nữ"?>  
                                </td>
                                <td>
                                  <?=$item->group->name?>  
                                </td>
                                <td>
                                <center>
                                  <?=CHtml::link("Xem", array("user/view", 'id'=>$item->id))?> | 
                                  <?=CHtml::link("Sửa", array("user/update",'id'=>$item->id));?> | 
                                  <?=CHtml::link("Xóa", array("user/delete",'id'=>$item->id), array('onClick'=>' return confirm("Bạn có chắc muốn xóa?")'));?>
                                 </center>
                                </td>
                                    
                            </tr>
                                <?php
                                }
                            ?>
                            
                            
                            
                        </tbody>
                </table>
                <div class="row">
                    <div class="span6">
                        <div class="dataTables_info">
                            Showing 1 to 10 of 57 entries
                        </div>                        
                    </div>
                    <div class="span6">
                         <div class="dataTables_paginate paging_bootstrap pagination">

                            <?php 
                                        $this->widget('CLinkPager', array(
                                            'firstPageLabel'=>'Đầu',
                                            'lastPageLabel'=>'Cuối',
                                            'nextPageLabel'=>'Tiếp',
                                            'prevPageLabel'=>'Trước',                
                                            'header'=>'',
                                            'pages' => $pages
                                        )) 
                                    ?>
                            </div>                       
                    </div>                    
                </div>
                
            </div>
            
        </div>
       
    </div>
</div>
