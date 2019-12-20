<?php


namespace mvcdeploy;


use mvcdeploy\handler\ControllerHandler;
use mvcdeploy\handler\ViewHandler;

class MvcDeploy
{

    public static function getControllerHandler(ViewHandler $view_handler, array $map_of_controller = null): ControllerHandler
    {
        $controller_handler = new ControllerHandler($view_handler);
        if (isset($map_of_controller))
        {
            foreach ($map_of_controller as $key => $value)
            {
                $controller_handler->addController($key, $value);
            }
        }
        return $controller_handler;
    }

    public static function getViewHandler(array $map_of_view = null): ViewHandler
    {
        $view_handler = new ViewHandler();
        if (isset($map_of_view))
        {
            foreach ($map_of_view as $key => $value)
            {
                $view_handler->addView($key, $value);
            }
        }
        return $view_handler;
    }
}