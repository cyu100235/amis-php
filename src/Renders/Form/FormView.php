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
namespace Xbcode\Builder\Renders\Form;

use Xbcode\Builder\Components\Form\AmisForm;
use Xbcode\Builder\Components\Form\FormBase;
use Xbcode\Builder\Renders\Form\rows\FormRowDate;
use Xbcode\Builder\Renders\Form\rows\FormRowInput;
use Xbcode\Builder\Renders\Form\rows\FormRowClick;
use Xbcode\Builder\Renders\Form\rows\FormRowUpload;
use Xbcode\Builder\Renders\Form\rows\FormRowDisplay;
use Xbcode\Builder\Renders\Form\rows\FormRowOptions;

/**
 * 表单视图渲染
 * @copyright 贵州积木云网络科技有限公司
 * @author 楚羽幽 958416459@qq.com
 */
trait FormView
{
    use FormRowDate;
    use FormRowInput;
    use FormRowClick;
    use FormRowUpload;
    use FormRowOptions;
    use FormRowDisplay;
    
    /**
     * 表单实例
     * @var AmisForm
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    protected AmisForm $form;

    /**
     * 初始表单设置
     * @param string $api
     * @param string $title
     * @return void
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function formConfig(string $title = '数据编辑')
    {
        $this->form->title($title);
        $this->form->mode('normal');
        $this->form->wrapWithPanel(false);
    }

    /**
     * 添加表单组件
     * @param string $type 组件名称或组件类
     * @param string $field 组件字段
     * @param string $title 组件标题
     * @param mixed $value 组件默认值
     * @param callable|array $option 
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    public function addRow(string $type, string $field, string $title, mixed $value = '', callable|array $option = [])
    {
        // 检查非命名空间的组件名称
        if(!str_contains($type, '\\')) {
            // 如果是组件名称，则转换为类名
            $type = 'Xbcode\\Builder\\Components\\Form\\' . ucfirst($type);
        }
        /** @var FormBase */
        $component = new $type;
        $component->name($field);
        $component->label($title);
        $component->value($value);
        
        // 设置组件提示占位符
        $componentType = $component->getComponentType();
        $component->placeholder($componentType ? "请选择{$title}" : "请填写{$title}");
        $this->setComponent($component, $option);
        $this->formView[] = $component;
        return $component;
    }

    /**
     * 渲染表单
     * @return AmisForm
     * @copyright 贵州积木云网络科技有限公司
     * @author 楚羽幽 958416459@qq.com
     */
    protected function renderForm(): AmisForm
    {
        $this->form->body($this->formView);
        return $this->form;
    }
}
