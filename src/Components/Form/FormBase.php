<?php
/**
 * 积木云渲染器
 *
 * @package  XbCode
 * @author   楚羽幽 <958416459@qq.com>
 * @version  1.0
 * @license  Apache License 2.0
 * @link     http://www.xbcode.net
 * @document http://doc.xbcode.net
 */
namespace Xbcode\Builder\Components\Form;

use Xbcode\Builder\Components\BaseSchema;
use Storage;

/**
 * 表单基类
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @link https://aisuda.bce.baidu.com/amis/zh-CN/components/form/index
 * @method $this size(string $value) 设置大小，支持 xs、sm、base、md、lg
 * @method $this label(string $value) 设置标签
 * @method $this labelClassName(string $value) 设置标签 CSS 类名
 * @method $this name(string $value) 设置字段名
 * @method $this remark(string $value) 设置备注
 * @method $this clearable(string $value) 设置是否可清除
 * @method $this labelRemark(string $value) 设置标签备注
 * @method $this hint(string $value) 设置提示信息
 * @method $this submitOnChange(string $value) 设置是否在值变化时提交
 * @method $this readOnly(string $value) 设置是否只读
 * @method $this readOnlyOn(string $value) 设置只读条件
 * @method $this validateOnChange(string $value) 设置是否在值变化时验证
 * @method $this description(string $value) 设置描述
 * @method $this desc(string $value) 设置描述（别名）
 * @method $this descriptionClassName(string $value) 设置描述 CSS 类名
 * @method $this mode(string $value) 设置展示模式
 * @method $this horizontal(string $value) 设置是否水平布局
 * @method $this inline(string $value) 设置是否内联布局
 * @method $this inputClassName(string $value) 设置输入框 CSS 类名
 * @method $this placeholder(string $value) 设置占位符
 * @method $this required(string $value) 设置是否必填
 * @method $this requiredOn(string $value) 设置必填条件
 * @method $this validationErrors(string $value) 设置验证错误信息
 * @method $this validations(string $value) 设置验证规则
 * @method $this value(string $value) 设置默认值
 * @method $this clearValueOnHidden(string $value) 设置隐藏时是否清除值
 * @method $this validateApi(string $value) 设置验证 API
 * @method $this columnRatio(string $value) 设置宽度占用比率
 */
class FormBase extends BaseSchema
{
    public string $type = "input-text";


    protected function deleteFile($file): bool
    {
        // if (is_string($file)) {
        //     $storage = Storage::disk(config('amis-admin.upload.disk'));
        //     if ($storage->exists($file)) {
        //         return $storage->delete($file);
        //     }
        // }
        return false;
    }

}
