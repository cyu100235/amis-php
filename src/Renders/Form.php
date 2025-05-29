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
use Xbcode\Builder\Components\Form\AmisForm;

/**
 * 表单渲染器
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 * @link http://www.xbcode.net
 * @method $this name(string $value) 字符串注释示例
 */
class Form implements JsonSerializable
{
    /**
     * 页面实例
     * @var Page
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    private Page $page;

    /**
     * 构造函数
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function __construct()
    {
        $this->page = Page::make()->title("编辑");
        $this->form = AmisForm::make();
    }
    
    /**
     * 创建表单实例
     * @param array $data
     * @param callable $func
     * @return Form
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public static function make(array $data,callable $func): Form
    {
        $form = new static();
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
     * 渲染表单
     * @return mixed
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function jsonSerialize(): mixed
    {
        // $toolbar = $this->toolbar->renderToolbar();
        $toolbar = [];
        $this->page
            ->toolbar($toolbar)
            ->body([
                // $this->renderForm(),
            ]);

        return $this->page;
    }
}
