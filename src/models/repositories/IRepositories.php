<?php


interface IRepositories
{
    public function getAll();
    public function getByKey($key);
    public function add($data);
    public function update($key, $data);
    public function delete($key);
}