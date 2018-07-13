<?php

namespace App\Controller\Component;

use Cake\Controller\Component;


class JsonParserComponent extends Component
{
    public function readJson($path_to_file){
        return file_get_contents($path_to_file);
    }

    public function readJsonAsArray($path_to_file, $offset = false){
        return json_decode(file_get_contents($path_to_file, $offset));
    }

    public function writeJson($path_to_file, $content){
        file_put_contents($path_to_file, $content);
    }

    public function writeJsonAsArray($path_to_file, $content){
        file_put_contents($path_to_file, json_encode($content));
    }

}