<?php

namespace Models;
class Errors
{
    public static function showErrors($err)
    {
        if (!empty($err)) {
            if (!empty($err)) {
                foreach ($err as $error) {
                    echo $error . "<br>";
                }
            }
        }
    }
}