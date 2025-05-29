<?php
use Xbcode\Builder\Renders\Form;
include '../../vendor/autoload.php';

$result = Form::make('/admin/form/add', function (Form $form) {
    // 初始化表单配置
    $form->formConfig('用户编辑');

    // 添加表单工具栏按钮
    // $form->addHeaderDrawerBtn('/admin/form/edit', '添加用户');

    // 添加表单组件
    $form->addRowInput('username', '登录账号');
    $form->addRowInput('password', '登录密码')->password();
    $form->addRowInput('nickname', '用户昵称');
});

// 转JSON(必须)
$json = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
print_r($json);
exit;