<?php

namespace TestWidget\Widgets;

use Ceres\Widgets\Helper\BaseWidget;

class TestWidget extends BaseWidget
{
    protected $template = "TestWidget::Widgets.TestWidget";



    public function getSettings()
    {
        $a =  parent::getSettings();
       return $a;
    }

    public function getPreview(array $widgetSettings = [], array $children = []): string
    {
        $a = parent::getPreview($widgetSettings, $children);
        return $a;
    }

    protected function getTemplateData($widgetSettings, $isPreview) {
        $a = parent::getTemplateData($widgetSettings, $isPreview);
        return $a;
    }
}
