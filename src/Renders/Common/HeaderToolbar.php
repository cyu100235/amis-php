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
namespace Xbcode\Builder\Renders\Common;

use Xbcode\Builder\Components\Service;
use Xbcode\Builder\Components\Action\UrlAction;
use Xbcode\Builder\Components\Action\LinkAction;
use Xbcode\Builder\Components\Action\AjaxAction;
use Xbcode\Builder\Components\Action\DialogAction;
use Xbcode\Builder\Components\Action\DrawerAction;

/**
 * 页面头部工具栏
 * @copyright 贵州猿创科技有限公司
 * @author 楚羽幽 416716328@qq.com
 */
trait HeaderToolbar
{
    use ComponentUtils;
    
    /**
     * 页面头部工具栏组件
     * @var array
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    protected array $headerToolbar = [];

    /**
     * 添加头部弹窗按钮
     * @param string $url 请求地址
     * @param string $title 弹窗标题
     * @param callable|array $callback 回调函数或属性数组
     * @return DialogAction
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderDialogBtn(string $url, string $title, callable|array $callback = null): DialogAction
    {
        /** @var DialogAction */
        $component = DialogAction::make();
        $component->label($title);
        $component->level('primary');
        $component->icon('fa fa-add');
        // 执行组件设置
        $this->setComponent($component, $callback);
        // 设置弹窗标题和内容
        $component->dialog([
            'title' => $title,
            'body' => Service::make()->schemaApi($url),
        ]);
        // 添加到头部组件列表
        $this->headerToolbar[] = $component;
        // 返回组件
        return $component;
    }

    /**
     * 添加头部单页跳转组件
     * @param string $url 跳转地址
     * @param string $title 按钮文字
     * @param callable|array $callback 回调函数或属性数组
     * @return LinkAction
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderLinkBtn(string $url, string $title, callable|array $callback = null): LinkAction
    {
        /** @var LinkAction */
        $component = LinkAction::make();
        $component->label($title);
        $component->level('primary');
        $component->icon('fa fa-link');
        $component->link($url);
        // 执行组件设置
        $this->setComponent($component, $callback);
        // 添加到头部组件列表
        $this->headerToolbar[] = $component;
        // 返回组件
        return $component;
    }

    /**
     * 添加头部链接跳转组件
     * @param string $url 跳转地址
     * @param string $title 按钮文字
     * @param callable|array $callback 回调函数或属性数组
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderUrlBtn(string $url, string $title, callable|array $callback = null): UrlAction
    {
        /** @var UrlAction */
        $component = UrlAction::make();
        $component->url($url);
        $component->label($title);
        $component->level('primary');
        $component->icon('fa fa-link');
        // 执行组件设置
        $this->setComponent($component, $callback);
        // 添加到头部组件列表
        $this->headerToolbar[] = $component;
        // 返回组件
        return $component;
    }

    /**
     * 添加头部确认按钮
     * @param string $url 跳转地址
     * @param string $title 按钮文字
     * @param callable|array $callback 回调函数或属性数组
     * @return AjaxAction
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderConfirmBtn(string $url, string $title, callable|array $callback = null): AjaxAction
    {
        /** @var AjaxAction */
        $component = AjaxAction::make();
        $component->api($url);
        $component->label($title);
        $component->level('primary');
        $component->icon('fa fa-trash');
        $component->confirmTitle('温馨提示');
        $component->confirmText('是否确认进行该操作？');
        // 执行组件设置
        $this->setComponent($component, $callback);
        // 添加到头部组件列表
        $this->headerToolbar[] = $component;
        // 返回组件
        return $component;
    }
    /**
     * 添加头部抽屉按钮
     * @param string $url 跳转地址
     * @param string $title 按钮文字
     * @param callable|array $callback 回调函数或属性数组
     * @return DialogAction
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderDrawerBtn(string $url, string $title, callable|array $callback = null): DrawerAction
    {
        /** @var DrawerAction */
        $component = DrawerAction::make();
        $component->label($title);
        $component->level('primary');
        $component->icon('fa fa-drawer');
        // 执行组件设置
        $this->setComponent($component, $callback);
        // 设置抽屉属性
        $component->drawer([
            'title' => $title,
            'body' => Service::make()->schemaApi($url),
        ]);
        // 添加到头部组件列表
        $this->headerToolbar[] = $component;
        // 返回组件
        return $component;
    }

    /**
     * 动态设置组件属性
     * @param mixed $component
     * @param array|callable $callback
     * @return void
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    private function setComponent(mixed $component, array|callable $callback = null)
    {
        // 回调函数设置属性
        if ($callback && is_callable($callback)) {
            $callback($component);
        }
        // 数组设置属性
        if ($callback && is_array($callback)) {
            foreach ($callback as $name => $value) {
                $component->setVariable($name, $value);
            }
        }
    }

    /**
     * 渲染页面头部工具栏
     * @return array
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function renderHeaderToolbar()
    {
        return $this->headerToolbar;
    }
}
