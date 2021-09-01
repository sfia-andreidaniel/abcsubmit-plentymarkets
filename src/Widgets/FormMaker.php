<?php

namespace AbcSubmit\Widgets;

use Ceres\Widgets\Helper\BaseWidget;
use Ceres\Widgets\Helper\Factories\WidgetDataFactory;
use Ceres\Widgets\Helper\Factories\WidgetSettingsFactory;
use Ceres\Widgets\Helper\WidgetCategories;
use Ceres\Widgets\Helper\WidgetTypes;

class FormMaker extends BaseWidget
{
    protected $template = "AbcSubmit::Widgets.FormMaker";

    private static $increment_unique_id = 0;

    /**
     * @return array
     */
    public function getData(): array
    {
        return WidgetDataFactory::make("AbcSubmit::FormMaker")
            ->withLabel("Widget.abcSubmitFormBuilder")
            ->withPreviewImageUrl("/images/abcsubmit-widget.svg")
            ->withType(WidgetTypes::DEFAULT)
            ->withCategory(WidgetCategories::FORM)
            ->withPosition(1)
            ->toArray();
    }

    public function getSettings()
    {
        /** @var WidgetSettingsFactory $settings */
        $settings = pluginApp(WidgetSettingsFactory::class);

        $settings->createText('id')
            ->withCondition(false)
            ->withName('Id')
            ->withDefaultValue($this->uniqueId());

        $settings->createText('cssClass')
            ->withName('Class name')
            ->withDefaultValue('');

        return $settings->toArray();
    }

    public function getPreview(array $widgetSettings = [], array $children = []): string
    {
        return parent::getPreview($widgetSettings, $children);
    }

    public function render(array $widgetSettings = [], array $children = []): string
    {
        return parent::render($widgetSettings, $children);
    }

    protected function getTemplateData($widgetSettings, $isPreview) {

        $id = $widgetSettings["id"]["mobile"];

        return [
            'uuid' => $id ?? ''
        ];
    }

    public function uniqueId(): string {
        self::$increment_unique_id++;
        $d = (time() * 1000 + self::$increment_unique_id) + rand(1,1000);
        return 'id_' . $this->toBase32($d) . '_' . $this->toBase32(rand(0, 65535));
    }

    private function toBase32($source ): string {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz234567';
        $result = '';
        while ( $source > 32 ) {
            $div = $source % 32;
            $source = floor($source / 32);
            $result .= $alphabet[$div];
        }

        return $result;
    }
}
