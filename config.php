<?php
const MYSQL_USER = 'root';
const MYSQL_PASS = '';
const MYSQL_DB = 'guillotinagdt';
const MYSQL_HOST = 'localhost';
class config{
    public static $veda;

    static function setVeda($value){
        self::$veda = $value;
    }
}