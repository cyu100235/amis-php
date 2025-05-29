<?php

use Xbcode\Builder\Renders\Grid;

require '../../vendor/autoload.php';

// 普通的表格基础示例
$result = Grid::make([], function (Grid $grid) {
    // 初始化默认表格
    $grid->initCRUD('/admin/table/normalData', '数据列表');
    // 设置头部弹窗按钮
    $grid->addHeaderDialogBtn('/admin/form/add', '这个是弹窗标题', [
        'label' => '添加用户',
    ]);

    // 添加普通列
    $grid->addColumn('id', 'ID');
    // 添加日期列
    $grid->addColumnDate('create_at', '创建时间');
    // 添加日期时间列
    $grid->addColumnNumber('number', '数字列');
});
// 转JSON(必须)
$json = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
print_r($json);
exit;