<?php
// app/Services/JsonService.php

namespace App\Services;

use Illuminate\Support\Facades\File;

class JsonService
{
    protected $filePath;

    public function __construct($fileName)
    {
        $this->filePath = storage_path("json/{$fileName}.json");
    }

    public function read()
    {
        if (File::exists($this->filePath)) {
            return json_decode(File::get($this->filePath), true);
        }

        return [];
    }

    public function write(array $data)
    {
        File::put($this->filePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function search($key, $value)
    {
        $data = $this->read();
        return array_filter($data, function ($item) use ($key, $value) {
            return isset($item[$key]) && $item[$key] == $value;
        });
    }
    public function find($key, $value)
    {
        $data = $this->read();
        foreach ($data as $item) {
            if (isset($item[$key]) && $item[$key] == $value) {
                return $item;
            }
        }
        return null;
    }

    public function update($key, $value, array $newData)
    {
        $data = $this->read();
        foreach ($data as &$item) {
            if (isset($item[$key]) && $item[$key] == $value) {
                $item = array_merge($item, $newData);
            }
        }
        $this->write($data);
        return $data;
    }

    public function delete($key, $value)
    {
        $data = $this->read();
        $data = array_filter($data, function ($item) use ($key, $value) {
            return !(isset($item[$key]) && $item[$key] == $value);
        });
        $this->write(array_values($data));
        return $data;
    }
}
