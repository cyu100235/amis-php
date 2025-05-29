<?php
namespace Xbcode\Builder\Renders\Grid\Column;

use Closure;
use Xbcode\Builder\Components\Tpl;
use Xbcode\Builder\Components\Date;
use Xbcode\Builder\Components\Each;
use Xbcode\Builder\Components\Flex;
use Xbcode\Builder\Components\Image;
use Xbcode\Builder\Components\Status;
use Xbcode\Builder\Components\Mapping;

trait ColumnDisplay
{
    /**
     * 图片渲染
     * @param int $w
     * @param int $h
     * @param \Closure|null $closure
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function image(int $w = 80, int $h = 80, Closure $closure = null): Column
    {
        $image = Image::make()->width($w)->height($h);
        if ($closure) {
            $closure($image);
        }
        $this->useTableColumn($image);
        return $this;
    }
    
    /**
     * 标签渲染
     * @param string $type
     * @param string $size
     * @param \Closure|null $closure
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function label(string $type = 'info', string $size = 'sm', Closure $closure = null): Column
    {
        $tpl = Tpl::make()->tpl("<span class='label label-{$type} label-{$size} m-r-sm'><%= this.{$this->name} %></span>");
        if ($closure) {
            $closure($tpl);
        }
        $this->useTableColumn($tpl);
        return $this;
    }
    
    /**
     * 循环渲染
     * @param \Closure|null $closure
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function each(Closure $closure = null): Column
    {
        /** @var Each */
        $each = Each::make();
        $each->placeholder('暂无数据');

        $content = "<span class='label label-info m-r-sm'><%= this.item %></span>";
        $tpl = Tpl::make()->tpl($content);
        $each->items($tpl);

        if ($closure) {
            $closure($each);
        }
        $this->useTableColumn($each);
        return $this;

    }
    
    /**
     * 日期渲染
     * @param \Closure|null $closure
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function date(Closure $closure = null): Column
    {
        $date = Date::make();
        if ($closure) {
            $closure($date);
        }
        $this->useTableColumn($date);
        return $this;
    }
    
    /**
     * 状态渲染
     * @param \Closure|null $closure
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function status(Closure $closure = null): Column
    {
        $status = Status::make();
        if ($closure) {
            $closure($status);
        }
        $this->useTableColumn($status);
        return $this;
    }
    
    /**
     * 数字渲染
     * @param mixed $numDigits
     * @param mixed $suffix
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function number($numDigits = 2, $suffix = ""): Column
    {
        $this->useTableColumn(Tpl::make()->tpl("\${FLOOR({$this->name},$numDigits)} $suffix"));
        return $this;
    }
    
    /**
     * 映射渲染
     * @param array $map
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function mapping(array $map): Column
    {
        $mapping = Mapping::make();

        $mapping->map($map);

        $this->useTableColumn($mapping);
        return $this;
    }
    
    /**
     * 多个字段显示
     * @param array $items
     * @param mixed $column
     * @param \Closure|null $closure
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function multipleDisplay(array $items = [], $column = true, Closure $closure = null): Column
    {
        $flex = Flex::make()->items($items);
        if ($column) {
            $flex->direction("column");
        }
        if ($closure) {
            $closure($flex);
        }
        $items = data_get($flex, "items");

        $newItems = array();

        foreach ($items as $key => $item) {
            if ($key <= 0) {
                $newItems[] = $item;
                continue;
            }
            if ($item instanceof BaseSchema && !property_exists($item, "className")) {
                $item->className("mt-1");
            }
            $newItems[] = $item;
        }
        $flex->items($newItems);

        $this->useTableColumn($flex);
        return $this;
    }
}
