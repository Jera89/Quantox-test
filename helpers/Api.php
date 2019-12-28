<?php

class Api {
    
    public static function response(string $message = "", $data, int $code = 200, $type = 'json')
    {
        $response = [
            "info" => [
                "date" => date('Y-m-d H:i:s'),
                "time" => time(),
                "success" => true
            ],
            "message" => $message,
            "data" => $data,
            "status_code" => $code,
        ];
        
        if($type == 'json'){
            return json_encode($response);
        }
        $xml = new SimpleXMLElement('');
        return array_walk_recursive($response, array ($xml,'addChild'));
        
    }
    
    public static function errorResponse(string $message, array $errors, int $code = 422)
    {
        $response = [
            "info" => [
                "date" => date('Y-m-d H:i:s'),
                "time" => time(),
                "success" => false
            ],
            "message" => $message,
            "errors" => $errors,
            "status_code" => $code,
        ];
        
        if($type == 'json'){
            return json_encode($response);
        }
        $xml = new \SimpleXMLElement('');
        return array_walk_recursive($response, array ($xml,'addChild'));
        
    }
    
}

