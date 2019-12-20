<?php


namespace mvcdeploy\handler;


use mvcdeploy\std\IView;

class ViewHandler
{
    private $view_list = array();

    public function addView(string $action_type, IView $view): ViewHandler
    {
        $this->view_list[$action_type] = $view;
        return $this;
    }

    public function callAView(string $action_type, array $data_input)
    {
        try
        {
            foreach ($this->view_list as $key => $value)
            {
                if ($value->accept($action_type))
                {
                    echo $value->run($action_type, $data_input)->generatedDoc();
                }
            }
        }
        catch (Exception $e) {}
        return false;
    }

}