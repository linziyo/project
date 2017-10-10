<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Crypt;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, BelongsToTenants;

    use EntrustUserTrait {
        restore as private restoreEntrust;
    }

    use SoftDeletes {
        restore as private restoreSoftDeletes;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'email', 'mobile', 'password','address','real_name', 'id_code', 'avatar', 'sex', 'date_of_birth','tenant_id'];
    public static $sex=[1 => '男', 2 => '女'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'deleted_at', 'oauth_client_id'];

    /** 合约
     * @return \Illuminate\Database\Eloquent\Relations\hasManyThrough
     */
    public function contracts()
    {
        return $this->hasManyThrough('App\Models\Contract', 'App\Models\Archive');
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

//        $this->attributes['code'] = '1111';
    }
    public function getMidwiferyModeAttribute()
    {
        return $this->attributes['sex']?explode(',',$this->attributes['sex']):0;
    }
    /*
     * 签约的医组
     */
    public function groups()
    {
        $userId = $this->id;
        return Group::whereHas('contracts', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        });
//        return $this->hasManyThrough('App\Models\Group', 'App\Models\Contract', 'group_id', 'contract_id', 'contract_id');
    }

    public function restore()
    {
        $this->restoreEntrust();
        $this->restoreSoftDeletes();
    }

    /** 用户档案
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function archive()
    {
        return $this->belongsToMany('App\Models\Archive','archive_users');
    }

    /** 家人
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function family()
    {
        return $this->hasMany('App\Models\Family');
    }

    public function tenant()
    {
        return $this->belongsTo('App\Models\Tenant');
    }

    public function member()
    {
        return $this->hasOne('App\Models\HealthMember', 'IdCode', 'id_code');
    }

    /**医生
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function doctor()
    {
        return $this->hasMany('App\Models\Doctor');
    }

    /**员工
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function staff()
    {
        return $this->hasMany('App\Models\Staff');
    }

    public function findForPassport($username) {
        return self::where('mobile', $username)->first(); // change column name whatever you use in credentials
    }
}
