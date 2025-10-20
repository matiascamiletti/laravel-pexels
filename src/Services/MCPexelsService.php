<?php

namespace MC\Pexels\Services;

class MCPexelsService 
{
    protected $apiKey = '';

    public function __construct($config)
    {
        $this->apiKey = $config['api_key'];
    }
}
