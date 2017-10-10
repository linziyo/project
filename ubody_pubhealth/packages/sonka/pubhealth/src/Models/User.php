<?php

namespace Sonka\PubHealth\Models;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/13 0013
 * Time: 上午 10:17
 */
class User extends \Illuminate\Database\Eloquent\Model
{
    protected $connection = 'sonka_v1_user';

    protected $table = 'user_base_info_11';

    protected $primaryKey = 'userid';

    public static function find($id, $columns = array('*'))
    {
        if (is_array($id) && empty($id)) return new Collection;

        $tableId = self::hash_tableid($id, 20);

        $instance = new static();

        return $instance->setTable($instance->table . $tableId)->newQuery()->find($id, $columns);
    }

    private static function hash_tableid($data, $range = 10)
    {
        if (is_int($data)) {
            return ($data % $range + 1);
        }
        if (strlen(trim($data)) == 0) {
            return "";
        }
        $hash = floatval(sprintf("%u", crc32($data)));
        return (intval(fmod($hash, $range)) + 1);
    }
}