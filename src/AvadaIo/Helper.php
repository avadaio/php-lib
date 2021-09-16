<?php

namespace AvadaIo;

class Helper
{
    /**
     * Json helper for serializing the data
     *
     * @param $data
     * @return false|string
     */
    public static function jsonEncode($data)
    {
        if (empty($data)) {
            return json_encode($data, JSON_FORCE_OBJECT);
        }

        return json_encode($data);
    }
}