<?php


namespace mvcdeploy\std;


use mvcdeploy\layout\IDoc;

interface IView
{
    public function run(string $action_type, array $data_input): IDoc;

    public function accept(string $action_type): bool;
}