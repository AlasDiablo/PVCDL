<?php

//////////////////////////////////////////
require_once 'vendor/autoload.php';     // DON'T DO THIS
//////////////////////////////////////////

use mvcdeploy\layout\HtmlDoc;
use mvcdeploy\layout\IDoc;
use mvcdeploy\std\IView;

class ExampleView implements IView
{

    public function run(string $action_type, array $data_input): IDoc
    {
        return new HtmlDoc('fr',  'test page', 'hello, world!');
    }

    public function accept(string $action_type): bool
    {
        return $action_type == 'ROOT';
    }
}