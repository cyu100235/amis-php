<?php
namespace Xbcode\Builder\Renders;

use JsonSerializable;
use Xbcode\Builder\Components\CRUD;
use Xbcode\Builder\Components\Page;
use Xbcode\Builder\Renders\Common\HeaderToolbar;
use Xbcode\Builder\Renders\Grid\GridCurd;
use Xbcode\Builder\Renders\Grid\HeaderView;

/**
 * 表格构建器
 * @copyright 贵州猿创科技有限公司
 * @author 楚羽幽 416716328@qq.com
 */
class Grid implements JsonSerializable
{
    // 页面头部工具
    use HeaderToolbar;
    // 页面头部组件
    use HeaderView;
    // 实现CURD组件
    use GridCurd;

    /**
     * 页面组件
     * @var Page
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    protected Page $page;

    /**
     * 是否获取数据
     * @var string
     */
    protected string $_action = '';

    /**
     * 构造函数
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function __construct()
    {
        $this->page = Page::make()->title("列表");
        $this->crud = CRUD::make();
        $this->_action = '';
    }

    /**
     * 创建表格实例
     * @param string $api
     * @param callable $fun
     * @return Grid
     */
    public static function make(string $api, callable $fun)
    {
        $grid = new static;
        $grid->useCRUD()->api($api);
        $fun($grid);
        return $grid;
    }

    /**
     * 设置组件属性
     * @param string $name
     * @param mixed $value
     * @return void
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function setConfig(string $name, mixed $value)
    {
        $this->useCRUD()->setVariable($name, $value);
    }

    /**
     * 使用页面组件
     * @return Page
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function usePage(): Page
    {
        return $this->page;
    }

    /**
     * 获取JSON序列化数据
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     * @return array|Page
     */
    public function jsonSerialize(): mixed
    {
        //获取数据
        if ($this->_action === "getData") {
            // return $this->buildData();
        }
        $this->page
            ->toolbar($this->renderHeaderToolbar())
            ->body([
                // 实现表格头部
                $this->renderHeaderView(),
                // 实现CURD表格区域
                $this->renderCURDView(),
                // 实现底部区域
            ]);
        return $this->page;
    }
}
