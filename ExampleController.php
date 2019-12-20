<?php

//////////////////////////////////////////
require_once 'vendor/autoload.php';     // DON'T DO THIS
//////////////////////////////////////////

use mvcdeploy\std\IController;

class ExampleController implements IController
{

    public function run(string $action_type, array $data_input): array
    {
        return [];
    }

    public function accept(string $action_type): bool
    {
        return $action_type == 'ROOT';
    }
}