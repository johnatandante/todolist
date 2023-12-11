<?php

namespace utils;

class Utility
{
    public static function clean_data($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>