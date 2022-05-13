<?php

namespace App\Enums;

enum RoleList : string {
    case Admin = 'Admin';
    case Owner = 'Owner';
    case Customer = 'Customer';
}
