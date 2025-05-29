<?php

namespace Xbcode\Builder\Renders\Grid;

use Xbcode\Builder\Components\Custom\Component;
use Xbcode\Builder\Components\GridSchema;
use Xbcode\Builder\Components\Tpl;
use Xbcode\Builder\Renders\Grid;

/**
 * 页面头部渲染组件
 * @copyright 贵州猿创科技有限公司
 * @author 楚羽幽 416716328@qq.com
 */
trait HeaderView
{
    /**
     * 表格实例
     * @var Grid
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    protected Grid $grid;

    /**
     * 头部组件列表
     * @var array
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    protected array $header = [];

    /**
     * 添加头部远程组件
     * @param string $url
     * @return void
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderViewUrl(string $url)
    {
        $component = new Component;
        $component->url($url);
        $this->header[] = $component;
    }

    /**
     * 添加头部元素渲染
     * @param string $body
     * @return void
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderViewBody(string $body)
    {
        $component = new Component;
        $component->body($body);
        $this->header[] = $component;
    }
    
    /**
     * 添加头部数据统计组件
     * @param array $columns 列数据，数组字段必须有label和value两个字段
     * @param array $wrap 每隔多少列换行一次，默认[4, 8, 12, 16, 20, 24, 28, 32]
     * @param array $option 选项参数配置，请参看积木官方文档
     * @return void
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    public function addHeaderCount(array $columns, array $wrap = [4, 8, 12, 16, 20, 24, 28, 32],array $option = [])
    {
        $labelStyle = $option['labelStyle'] ?? 'font-size:14px;';
        $valueStyle = $option['valueStyle'] ?? 'font-size:28px;';
        $i = 0;
        $data = [];
        foreach ($columns as $key => $item) {
            if (in_array($key, $wrap)) {
                $i++;
            }
            $tplLabel = $item['label'] ?? '';
            $tplValue = $item['value'] ?? '0';
            $tplContent = <<<STR
            <div style="{$labelStyle}">{$tplLabel}</div>
            <div style="{$valueStyle}">{$tplValue}</div>
            STR;
            $component = new Tpl;
            $component->tpl($tplContent);
            $data[$i][] = $component;
        }
        foreach ($data as $key => $item) {
            $component = new GridSchema;
            $component->className('mt-5');
            $component->columns($item);
            $this->header[] = $component;
        }
    }

    /**
     * 获取渲染规则
     * @return array
     * @copyright 贵州猿创科技有限公司
     * @author 楚羽幽 416716328@qq.com
     */
    protected function renderHeaderView(): array
    {
        return $this->header;
    }
}
