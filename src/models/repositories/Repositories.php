<?php

namespace Models\Repositories;

require_once 'src/models/repositories/IRepositories.php';
require_once 'src/models/repositories/Dotenv.php';


abstract class Repositories implements IRepositories
{
    protected $apiUrl;
    protected $baseUrl;

    public function __construct($tableName)
    {
        $this->baseUrl = Dotenv::get('BASE_URL');

        $this->apiUrl = $this->baseUrl . $tableName;
    }

    protected function fetchData($url, $method = 'GET', $data = null)
    {
        $options = [
            'http' => [
                'method' => $method,
                'header' => 'Content-type: application/json',
                'content' => $data ? json_encode($data) : null,
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result ? json_decode($result, true) : null;
    }

    public function getAll()
    {
        return $this->fetchData($this->apiUrl);
    }

    public function getByKey($key)
    {
        $url = $this->apiUrl . '/' . $key;
        return $this->fetchData($url);
    }

    public function add($data)
    {
        return $this->fetchData($this->apiUrl, 'POST', $data);
    }

    public function update($key, $data)
    {
        $url = $this->apiUrl . '/' . $key;
        return $this->fetchData($url, 'PUT', $data);
    }

    public function delete($key)
    {
        $url = $this->apiUrl . '/' . $key;
        return $this->fetchData($url, 'DELETE');
    }
}