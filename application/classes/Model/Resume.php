<?php defined('SYSPATH') or die('No direct script access.');

class Model_Resume extends Model
{
    protected $_table = 'resume';


    public function get_user_resume($id)
    {

        $query = DB::select()->from($this->_table)->where('user_id', '=', $id)
            ->execute();

        $result = $query->as_array();
        return $result;

    }

    public function get_all_resume()
    {

        $sql = "SELECT r.*, COUNT('id') as count, country.name as country_name, curr.name as curr_name, employment.name as employment_name, users.username, users.age, users.img, users.phone, users.email, users.residence
                          FROM resume r 
                          JOIN users  ON users.id=r.user_id
                          JOIN country  ON country.id=r.country_id
                          JOIN curr  ON curr.id=r.curr_id
                          JOIN employment  ON employment.id=r.employment_id
                          WHERE r.active=1";
        
        $res = DB::query(Database::SELECT, $sql)
            ->execute()->as_array();
        return $res;

    }


    public function get_resume_id($id)
    {

        $sql = "SELECT r.*, country.name as country_name, curr.name as curr_name, employment.name as employment_name, users.username, users.age, users.img, users.phone, users.email, users.residence
                          FROM resume r 
                          JOIN users  ON users.id=r.user_id
                          JOIN country  ON country.id=r.country_id
                          JOIN curr  ON curr.id=r.curr_id
                          JOIN employment  ON employment.id=r.employment_id
                          WHERE r.active=1 and r.id = '$id'";

        $res = DB::query(Database::SELECT, $sql)
            ->execute()->as_array();
        return $res;

    }

}