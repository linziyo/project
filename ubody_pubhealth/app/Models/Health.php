<?php

namespace App\Models;

use App\Models\Observers\HealthObServer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Health extends Model
{
    use SoftDeletes;
    protected $fillable = ['MachineId', 'UnitNo', 'UnitName', 'MacAddr', 'RecordNo', 'MeasureTime', 'DeviceType', 'LoginType'];
    protected $hidden = ['content', 'created_at', 'updated_at', 'deleted_at'];

    public function alcohol()
    {
        return $this->hasOne('App\Models\HealthAlcohol');
    }

    public function bloodFat()
    {
        return $this->hasOne('App\Models\HealthBloodFat');
    }

    public function bloodOxygen()
    {
        return $this->hasOne('App\Models\HealthBloodOxygen');
    }

    public function bloodPressure()
    {
        return $this->hasOne('App\Models\HealthBloodPressure');
    }

    public function bloodSugar()
    {
        return $this->hasOne('App\Models\HealthBloodSugar');
    }

    public function bMD()
    {
        return $this->hasOne('App\Models\HealthBMD');
    }

    public function cardiovascular()
    {
        return $this->hasOne('App\Models\HealthCardiovascular');
    }

    public function chol()
    {
        return $this->hasOne('App\Models\HealthChol');
    }

    public function ecg()
    {
        return $this->hasOne('App\Models\HealthEcg');
    }

    public function fat()
    {
        return $this->hasOne('App\Models\HealthFat');
    }

    public function hb()
    {
        return $this->hasOne('App\Models\HealthHb');
    }

    public function height()
    {
        return $this->hasOne('App\Models\HealthHeight');
    }

    public function lung()
    {
        return $this->hasOne('App\Models\HealthLung');
    }

    public function minFat()
    {
        return $this->hasOne('App\Models\HealthMinFat');
    }

    public function pEEcg()
    {
        return $this->hasOne('App\Models\HealthPEEcg');
    }

    public function temperature()
    {
        return $this->hasOne('App\Models\HealthTemperature');
    }

    public function uricAcid()
    {
        return $this->hasOne('App\Models\HealthUricAcid');
    }

    public function urinalysis()
    {
        return $this->hasOne('App\Models\HealthUrinalysis');
    }

    public function whr()
    {
        return $this->hasOne('App\Models\HealthWhr');
    }

    public function member()
    {
        return $this->hasOne('App\Models\HealthMember');
    }

    public function scopeUser($query, $user)
    {
        return $query->whereHas("Member", function ($q) use ($user) {
            $q->where('IdCode', $user->id_code)->orWhere('Mobile', $user->mobile);
        });
    }

    public static function boot(){
        parent::boot();
        static::observe(new HealthObServer());
    }
}
