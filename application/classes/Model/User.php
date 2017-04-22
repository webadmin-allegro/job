<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User
{


    public function user_roles($user_id)
    {

        $db = DB::select('role_id');

        # SELECT -> ROLES_USERS
        $db->from('roles_users');
        $db->where('user_id', '=', $user_id);
        $db->and_where('role_id', '=', 2);

        $roles = $db->execute()->as_array();

        return !empty($roles) ? true : false;
    }


    public function country($param=false)
    {

        $db = DB::select('id','name');
        $db->from('country');
        if ($param) $db->where($param, '=', 1);
        $db->order_by('name','ASC');
        $res = $db->execute()->as_array();

        return $res;
    }



}