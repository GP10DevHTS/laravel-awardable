<?php

namespace Gp10devhts\Awardable\Tests\Models;

use Gp10devhts\Awardable\Traits\Awardable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Awardable;

    protected $fillable = ['name'];
}
