<?php

namespace AvadaIo\Data;

class DataObject
{
    /**
     * @param array $properties
     */
    public function __construct(Array $properties=array()){
        foreach($properties as $key => $value){
            $this->{$key} = $value;
        }
    }
}