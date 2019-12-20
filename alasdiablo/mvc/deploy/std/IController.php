<?php


namespace mvcdeploy\std;


interface IController
{
    public function run(string $action_type, array $data_input): array;

    public function accept(string $action_type): bool;
}