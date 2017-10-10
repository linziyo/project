<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use BelongsToTenants;
}
