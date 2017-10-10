<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/13 0013
 * Time: 上午 10:53
 */

namespace Sonka\PubHealth\Controllers;


use App\Http\Controllers\Controller;
use Sonka\PubHealth\Models\User;

class UserController extends Controller
{
    public function index()
    {

    }

    public function show($id)
    {
        return User::find($id);
    }
}