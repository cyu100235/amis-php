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
namespace Xbcode\Builder\Components\Custom;

use Xbcode\Builder\Components\BaseSchema;

/**
 * 远程渲染Vue组件
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @method $this url(string $url) 远程组件接口
 * @method $this body(string $body) 组件内容
 */
class Component extends BaseSchema
{
    public string $type = 'render-component';

    /**
     * 远程组件接口
     * @param string $url 组件接口地址
     * @return static
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function url(string $url)
    {
        $this->type = 'remote-component';
        $this->setVariable('url', $url);
        return $this;
    }

    /**
     * 渲染组件内容
     * @param string $component 组件内容
     * @return static
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function body(string $component)
    {
        $this->type = 'render-component';
        $this->setVariable('body', $component);
        return $this;
    }
}
