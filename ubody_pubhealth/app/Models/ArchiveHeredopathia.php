<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveHeredopathia extends Model
{
    public function archive()
    {
        return $this->hasOne('App\Models\Archive');
    }
}
