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
namespace Xbcode\Builder\Components;

/**
 * Plain 组件
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @link http://www.xbcode.net
 * @method $this tpl(string $value) 模板内容
 * @method $this text(string $value) 文本内容
 * @method $this inline(string $value) 内联文本内容
 * @method $this placeholder(string $value) 占位符内容
 * @method $this className(string $value) 组件类名
 */
class Plain extends BaseSchema
{
    public string $type = 'plain';
}
