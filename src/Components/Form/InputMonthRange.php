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

/**
 * 月份范围
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @link https://aisuda.bce.baidu.com/amis/zh-CN/components/form/input-month-range
 * @method $this format(string $value) 日期选择器值格式
 * @method $this inputFormat(string $value) 日期选择器显示格式
 * @method $this placeholder(string $value) 占位文本
 * @method $this minDate(string $value) 限制最小日期，用法同 限制范围
 * @method $this maxDate(string $value) 限制最大日期，用法同 限制范围
 * @method $this minDuration(string $value) 限制最小跨度，如： 2days
 * @method $this maxDuration(string $value) 限制最大跨度，如：1year
 * @method $this utc(bool $value) 保存 UTC 值
 * @method $this clearable(bool $value) 是否可清除
 * @method $this embed(bool $value) 是否内联模式
 * @method $this animation(bool $value) 是否启用游标动画
 * @method $this extraName(string $value) 是否存成两个字段
 * @method $this popOverContainerSelector(string $value) 弹层挂载位置选择器，会通过querySelector获取
 */
class InputMonthRange extends InputDateRange
{
    public string $type = 'input-month-range';
}
