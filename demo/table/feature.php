<?php

use Xbcode\Builder\Renders\Grid;

require '../../vendor/autoload.php';

// 特殊单元的表格示例
$result = Grid::make([], function (Grid $grid) {
    // 设置页面标题
    $grid->usePage()->title('数据列表');
    // 设置表格数据源
    $grid->useCRUD()->api('/admin/table/normalData');
    // 设置是否将过滤条件的参数同步到地址栏
    $grid->useCRUD()->syncLocation(true);
    // 展示列显示开关, 自动即：列数量大于或等于 5 个时自动开启
    $grid->useCRUD()->columnsTogglable(true);
    // 开启表格列拖拽排序
    $grid->useCRUD()->draggable(true);

    // 添加状态列
    $grid->addColumnStatus('status', '状态');
    // 添加映射列
    $grid->addColumnMap('map', '映射', [
        '1' => '启用',
        '0' => '禁用',
    ]);
    // 添加开关列
    $grid->addColumnSwitch('switch', '开关', [
        'onText' => '启用',
        'offText' => '禁用',
        'onValue' => 1,
        'offValue' => 0,
    ]);
    // 添加进度列
    $grid->addColumnProgress('progress', '进度');
    // 添加卡片列
    $grid->addColumnCard('card', '卡片');
    // 添加JSON列
    $grid->addColumnJson('json', 'JSON');
    // 添加图片列
    $grid->addColumnImage('image', '图片');
    // 添加图片组列
    $grid->addColumnImages('images', '图片组');
    // 添加音频列
    $grid->addColumnAudio('audio', '音频');
    // 添加视频列
    $grid->addColumnVideo('video', '视频');
});
// 转JSON(必须)
$json = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
print_r($json);
exit;