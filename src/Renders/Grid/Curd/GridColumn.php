<?php

namespace Xbcode\Builder\Renders\Grid\Curd;

use Xbcode\Builder\Components\Card;
use Xbcode\Builder\Renders\Grid;
use Xbcode\Builder\Renders\Grid\Column\Column;

/**
 * 表格列组件
 * @copyright 贵州猿创科技有限公司
 * @author 楚羽幽 416716328@qq.com
 */
trait GridColumn
{
    /**
     * 表格实例
     * @var Grid
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    protected Grid $grid;

    /**
     * 表格列配置
     * @var array
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    protected array $columns = [];

    /**
     * 添加普通列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumn(string $name, string $label, callable|array $option = null): Column
    {
        $component = new Column($name, $label);
        $this->setComponent($component, $option);
        $this->columns[] = $component;
        return $component;
    }

    /**
     * 添加数字列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnNumber(string $name, string $label, callable|array $option = null): Column
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('number');
        return $component;
    }

    /**
     * 添加日期列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnDate(string $name, string $label, callable|array $option = null): Column
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('date');
        return $component;
    }

    /**
     * 添加日期时间列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Grid\Column\Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnDateTime(string $name, string $label, callable|array $option = null): Column
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('datetime');
        return $component;
    }

    /**
     * 添加状态列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnStatus(string $name, string $label, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('status');
        return $component;
    }

    /**
     * 添加映射列
     * @param string $name
     * @param string $label
     * @param array $mapping
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnMap(string $name, string $label, array $mapping, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->mapping($mapping);
        return $component;
    }

    /**
     * 添加进度列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnProgress(string $name, string $label, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('progress');
        return $component;
    }

    /**
     * 添加开关列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnSwitch(string $name, string $label, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('switch');
        return $component;
    }

    /**
     * 添加卡片列
     * @param string $name
     * @param string $label
     * @param array $fields
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnCard(string $name, string $label,array $fields = [], callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('card');
        // 设置卡片属性
        $title = $fields['title'] ?? 'title';
        $subTitle = $fields['subtitle'] ?? 'subtitle';
        $image = $fields['image'] ?? 'image';
        $component->header([
            'title' => "<%= this.{$title} %>",
            'subTitle' => "<%= this.{$subTitle} %>",
            'avatar' => "<%= this.{$image} %>",
            'avatarClassName' => 'pull-left thumb-md avatar b-3x m-r',
        ]);
        return $component;
    }

    /**
     * 添加JSON列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnJson(string $name, string $label, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('json');
        return $component;
    }

    /**
     * 添加图片列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnImage(string $name, string $label, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->width('30px'); 
        $component->height('30px');
        $component->type('image');
        return $component;
    }

    /**
     * 添加图片组列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Grid\Column\Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnImages(string $name, string $label, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('images');
        return $component;
    }

    /**
     * 添加音频列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnAudio(string $name, string $label, callable|array $option = null): Column
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('audio');
        return $component;
    }

    /**
     * 添加视频列
     * @param string $name
     * @param string $label
     * @param callable|array $option
     * @return Column
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addColumnVideo(string $name, string $label, callable|array $option = null)
    {
        $component = $this->addColumn($name, $label, $option);
        $component->type('video');
        return $component;
    }
    
    /**
     * 获取表格列配置
     * @return array
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    protected function getColumns(): array
    {
        return $this->columns;
    }
}
