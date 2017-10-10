<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitSelfCareAbility extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $table = "visit_self_care_ability";
    protected $fillable = ['archive_id', 'doctor_id','visit_mode', 'meal', 'comb_wash', 'dressing', 'toilets', 'activity','tenant_id'];

    public function visit()
    {
        return $this->belongsTo('App\Models\Visit');
    }

    public static function boot()
    {
        parent::boot();
        static::observe(new VisitObserver());
    }

}
