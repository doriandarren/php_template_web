<?php

namespace Core;

class Container
{

    protected $bindings = [];

    // Vinvular
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }


    
    // Resolver
    public function resolve($key)
    {
        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception("No matching binding for {$key}");
        }
        
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }


}
