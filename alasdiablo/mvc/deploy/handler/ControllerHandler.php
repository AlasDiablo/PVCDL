<?php


namespace mvcdeploy\handler;


use mvcdeploy\std\IController;

class ControllerHandler
{
    private $controller_list = array();

    private $view_handler;

    public function __construct(ViewHandler $view_handler)
    {
        $this->view_handler = $view_handler;
    }

    public function addController(string $action_type,IController $controller): ControllerHandler
    {
        $this->controller_list[$action_type] = $controller;
        return $this;
    }

    public function callAController(string $action_type, array $data_input)
    {
        try
        {
            foreach ($this->controller_list as $key => $value)
            {
                if ($value->accept($action_type))
                {
                    $data_output_controller = $value->run($action_type, $data_input);
                    return $this->view_handler->callAView($action_type, $data_output_controller);
                }
            }
        }
        catch (Exception $e) {}
        return false;
    }
}