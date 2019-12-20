<?php


namespace mvcdeploy;


use mvcdeploy\handler\ControllerHandler;
use mvcdeploy\handler\ViewHandler;

class MvcDeploy
{

    public static function getControllerHandler(ViewHandler $view_handler, array $map_of_controller = null)
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
}