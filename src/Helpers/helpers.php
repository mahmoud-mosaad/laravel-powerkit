<?php

if (! function_exists('powerkit_info')) {
    function powerkit_info(string $message): void
    {
        logger()->info('[PowerKit] '.$message);
    }
}
