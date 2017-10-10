<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Tenant extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'full_name', 'contact_name', 'phone_number'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public static function current(Request $request)
    {
        $pattern = '/^(\d)+\.(.*)\.ubody\.(.*)/';
        if (preg_match($pattern, $request->getHost(), $match)) {
            $tenantId = $match[1];
            return Tenant::findOrFail($tenantId);
        } else {
//            return Tenant::findOrFail(1);
        }


//        throw new TenantNullIdException('Tenant Error.');
    }

    public function hospitals()
    {
        return $this->hasMany('App\Models\CommunityHospital');
    }

    public function communities()
    {
        return $this->hasManyThrough('App\Models\Community', 'App\Models\CommunityHospital');
    }
    public function device()
    {
        return $this->hasMany('App\Models\Device');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    public function staff()
    {
        return $this->hasMany('App\Models\Staff');
    }

    public function areas()
    {
        return $this->hasMany('App\Models\Area');
    }

//    public function areas()
//    {
//        return $this->hasManyThrough('App\Models\Area', 'App\Models\Community');
//    }

    public function doctors()
    {
        return $this->hasManyThrough('App\Models\Doctor', 'App\Models\CommunityHospital');
    }
//    public function group_doctors()
//    {
//        return $this->hasManyThrough('App\Models\Group_doctor', 'App\Models\CommunityHospital');
//    }
    public function groups()
    {
        return $this->hasManyThrough('App\Models\Group', 'App\Models\CommunityHospital');
    }

    public function packages()
    {
        return $this->hasManyThrough('App\Models\Package', 'App\Models\CommunityHospital');
    }
    public function archives()
    {
        return $this->hasMany('App\Models\Archive');
    }

//    public function archives()
//    {
//        return $this->hasManyThrough('App\Models\Archive', 'App\Models\CommunityHospital');
//    }
    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
//    public function contracts()
//    {
//        return $this->hasManyThrough('App\Models\Contract', 'App\Models\CommunityHospital');
//    }
}
