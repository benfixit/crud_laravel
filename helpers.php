<?php
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 9/24/18
 * Time: 11:21 AM
 */

if (!function_exists('create_slug')) {

    /**
     * @param string $string
     *
     * @return string
     */
    function create_slug(string $string): string
    {
        return (string) strtolower(str_replace([' ', '.', '\''], '-', $string));
    }
}