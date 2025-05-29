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
 * 图标组件
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @link https://aisuda.bce.baidu.com/amis/zh-CN/components/icon
 * @method $this className(string $value) 设置外层 CSS 类名
 * @method $this icon(string $value) 图标名称，支持 fontawesome v4 或通过 registerIcon 注册的 icon、或使用 url
 * @method $this vendor(string $value) 图标类型，默认为fa, 表示 fontawesome v4。也支持 iconfont, 如果是 fontawesome v5 以上版本或者其他框架可以设置为空字符串
 */
class Icon extends BaseSchema
{
    public string $type = 'icon';
}
