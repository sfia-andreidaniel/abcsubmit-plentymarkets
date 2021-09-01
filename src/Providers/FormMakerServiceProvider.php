<?php
 
namespace AbcSubmit\Providers;

use AbcSubmit\Widgets\FormMaker;
use IO\Helper\ResourceContainer;
use Plenty\Modules\ShopBuilder\Contracts\ContentWidgetRepositoryContract;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
 
class FormMakerServiceProvider extends ServiceProvider
{
	public function register()
	{
 
	}
 
	public function boot(Twig $twig, Dispatcher $eventDispatcher)
    {
        /** @var ContentWidgetRepositoryContract $widgetRepository */
        $widgetRepository = pluginApp(ContentWidgetRepositoryContract::class);
        $widgetRepository->registerWidget(FormMaker::class);

        $eventDispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addScriptTemplate('AbcSubmit::Content.Scripts');
            $container->addStyleTemplate('AbcSubmit::Widgets.Styles');
        }, 0);
    }
}
