<?php

use Xbcode\Builder\Renders\Grid;

require '../../vendor/autoload.php';

$headerCount = [
    [
        'label' => '总数',
        'value' => 100,
    ],
    [
        'label' => '今日新增',
        'value' => 10,
    ],
    [
        'label' => '昨日新增',
        'value' => 5,
    ],
    [
        'label' => '本月新增',
        'value' => 50,
    ],
    [
        'label' => '上月新增',
        'value' => 30,
    ],
    [
        'label' => '总访问量',
        'value' => 1000,
    ],
    [
        'label' => '今日访问量',
        'value' => 100,
    ],
    [
        'label' => '昨日访问量',
        'value' => 80,
    ],
];

// 完整的表格示例
$result = Grid::make([], function (Grid $grid) use ($headerCount) {
    $grid->initCRUD('/admin/table/normalData', '数据列表');
    // 设置头部远程组件
    // $grid->addHeaderViewUrl('https://www.example.com/header');
    // 设置头部自定义组件
    // $grid->addHeaderViewBody('这是一个html字符串，可以是任意HTML内容。');
    // 设置头部数据统计
    $grid->addHeaderCount($headerCount);
    // 设置头部弹窗按钮
    $grid->addHeaderDialogBtn('/admin/form/add', '这个是弹窗标题', [
        'label' => '添加用户',
    ]);
    // 设置头部跳转链接按钮
    $grid->addHeaderLinkBtn('/admin/form/import', '内部跳转');
    // 设置头部直接跳转按钮
    $grid->addHeaderUrlBtn('/admin/form/export', '超链接跳转');
    // 设置头部确认框按钮
    $grid->addHeaderConfirmBtn('/admin/form/delete', '确认框按钮');
    // 设置头部抽屉按钮
    $grid->addHeaderDrawerBtn('/admin/form/edit', '抽屉按钮');

    // 设置头部筛选查询
    $grid->addFilterInput('name', '用户名称');
    $grid->addFilterSelect('status', '用户状态', 1, [
        'options' => [
            ['label' => '启用', 'value' => 1],
            ['label' => '禁用', 'value' => 0],
        ],
    ]);
    $grid->addFilterDate('created_at', '创建时间', '', [
        'placeholder' => '请选择日期',
        'format' => 'YYYY-MM-DD',
    ]);
    $grid->addFilterDateRange('created_at', '创建时间', [
        'start' => '2023-01-01',
        'end' => '2023-12-31',
    ]);
    $grid->addFilterCheckbox('roles', '用户角色', '', [
        'options' => [
            ['label' => '管理员', 'value' => 'admin'],
            ['label' => '编辑', 'value' => 'editor'],
            ['label' => '访客', 'value' => 'guest'],
        ],
    ]);
    $grid->addFilterRadio('sex', '用户性别', 0, [
        'options' => [
            ['label' => '男', 'value' => 0],
            ['label' => '女', 'value' => 1],
            ['label' => '未知', 'value' => 2],
        ],
    ]);
    $grid->addFilterSwitch('status1', '用户状态', 0, [
        'onText' => '启用1',
        'offText' => '禁用2',
        'onValue' => 1,
        'offValue' => 0,
    ]);


    // 设置操作按钮选项
    $grid->addActionDialogBtn('/admin/form/edit', '编辑');
    $grid->addActionConfirmBtn('/admin/form/del', '删除');

    // 添加表格头部工具栏-ajax请求
    // $grid->addBulkActionAjax('ajax', 'ajax请求');
    // // 添加表格头部工具栏-确认框
    // $grid->addBulkActionConfirm('confirm', '确认框');
    // // 添加表格头部工具栏-弹窗
    // $grid->addBulkActionDialog('dialog', '打开弹窗');
    // // 添加表格头部工具栏-下载
    // $grid->addBulkActionDownload('download', '下载数据');
    // // 添加表格头部工具栏-抽屉
    // $grid->addBulkActionDrawer('drawer', '打开抽屉');
    // // 添加表格头部工具栏-跳转链接
    // $grid->addBulkActionLink('link', '跳转链接');
    // // 添加表格头部工具栏-直接跳转
    // $grid->addBulkActionUrl('url', '直接跳转');

    // 添加普通列
    $grid->addColumn('id', 'ID');
    // 添加日期列
    $grid->addColumnDate('create_at', '创建时间');
    // 添加日期时间列
    $grid->addColumnNumber('number', '数字列');
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