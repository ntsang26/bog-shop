<?php

namespace App\Http\DAL;

class DAL_Config
{
    const ROLE_USER_SP_ADMIN = 1;
    const ROLE_USER_ADMIN = 2;
    const ROLE_USER_MOD = 3;
    const ROLE_USER_NORMAL = 11;

    const USER_STATUS_PUBLIC = 1;
    const USER_STATUS_PENDING = 2;
    const USER_STATUS_LOCKED = 3;
}