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
namespace Xbcode\Builder\Renders;

use JsonSerializable;
use Xbcode\Builder\Components\Page;
use Xbcode\Builder\Renders\Form\FormView;
use Xbcode\Builder\Components\Form\AmisForm;
use Xbcode\Builder\Renders\Common\HeaderToolbar;

/**
 * 表单渲染器
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @link http://www.xbcode.net
 * @method $this name(string $value) 字符串注释示例
 */
class Form implements JsonSerializable
{
    // 页面工具栏实现
    use HeaderToolbar;
    // 表单组件实现
    use FormView;

    /**
     * 页面实例
     * @var Page
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    protected Page $page;

    /**
     * 表单实例
     * @var AmisForm
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    protected AmisForm $form;

    /**
     * 构造函数
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function __construct()
    {
        $this->page = Page::make()->title("数据编辑");
        $this->form = AmisForm::make();
    }
    
    /**
     * 创建表单实例
     * @param string $api 初始化接口地址
     * @param callable $func 回调函数
     * @param string $saveApi 保存接口地址，如果不传则使用初始化接口
     * @return Form
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public static function make(string $api,callable $func, string $saveApi = ''): Form
    {
        $form = new static();
        $form->useForm()->initApi($api);
        $form->useForm()->api($saveApi ?: $api);
        $func($form);
        return $form;
    }

    /**
     * 获取页面实例
     * @return Page
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function usePage(): Page
    {
        return $this->page;
    }

    /**
     * 获取表单实例
     * @return AmisForm
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function useForm(): AmisForm
    {
        return $this->form;
    }

    /**
     * 设置表单配置
     * @param string $name
     * @param mixed $value
     * @return void
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function setConfig(string $name, mixed $value)
    {
        $this->form->setVariable($name, $value);
    }

    /**
     * 渲染表单
     * @return mixed
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function jsonSerialize(): mixed
    {
        $toolbar = $this->renderHeaderToolbar();
        $this->page
            ->toolbar($toolbar)
            ->body([
                $this->renderForm(),
            ]);
        // 返回页面实例
        return $this->page;
    }
}
