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
namespace Xbcode\Builder\Components\Action;

use Xbcode\Builder\Components\Button;

/**
 * 直接跳转
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @link https://aisuda.bce.baidu.com/amis/zh-CN/components/action
 * @method $this blank(bool $value) 如果为 true 将在新 tab 页面打开
 * @method $this url(string $value) 按钮点击后，会打开指定页面。可用 ${xxx} 取值
 */
class UrlAction extends Button
{
    public string $actionType = 'url';
}
