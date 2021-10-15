<?php


namespace app\api\service;


class Token
{
    // 生成令牌
    public static function generateToken()
    {
        //32个字符组成一 组随机字符申
        $randChar = getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('secure.token_salt');
        return md5($randChar . $timestamp . $tokenSalt);
    }
}