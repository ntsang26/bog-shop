<?php

namespace App\Helper;

class _ApiCode 
{
    const SUCCESS = 200;

    const STATUS_SUCCESS = 1;

    //login status
    const RESET_TOKEN = 201;
    const RESET_LOGIN = 202;
    const NON_AUTH = 203;
    const TOKEN_ERROR = 204;
    const CREATE_TOKEN_FAILED = 205;
    const LOGOUT_FAILED = 206;
    const WRONG_PASS = 207;
    const LOGIN_FAIL = 208;
    const USER_PENDING = 209;

    //user status
    const VERIFYCODE_NOT_FOUND = 301;
    const USER_ACTIVATED = 302;
    const USER_EMAIL_EXIST = 303;
    const USER_PHONE_EXIST = 304;
    const USER_EMAIL_NOT_EXIST = 305;
    const USER_EMAIL_PHONE_EXIST = 306;
    const USER_LOCK = 307;
    const REQUIRE_MORE_INFO = 308;
    const USER_SOCIAL_NEW = 309;
    const SOCIAL_RELOGIN = 310;

    //supplier status
    const SUPPLIER_NOT_EXIST = 311;
    const SUPPLIER_PENDING = 312;
    const SUPPLIER_USER_EXIST = 313;

    //common status
    const RESET_CONTENT = 503;
    const ERROR_INFO = 502;
    const LACK_INFO = 501;
    const ERROR_UNKNOWN = 500;
}