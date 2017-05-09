<?php defined('SYSPATH') or die('No direct script access.');

class Model_Vacancy extends Model
{
    protected $_table = 'vacancy';
    protected $_tableC = 'category';


    public function get_user_vacancy($id)
    {

        $query = DB::select()->from($this->_table)->where('user_id', '=', $id)
            ->execute();

        $result = $query->as_array();
        return $result;

    }

    public function get_all_vacancy()
    {

        $sql = "SELECT r.*, users.username, users.age, users.img, users.phone, users.email, users.residence
                          FROM vacancy r 
                          JOIN users  ON users.id=r.user_id
                          WHERE r.active=1";
        
        $res = DB::query(Database::SELECT, $sql)
            ->execute()->as_array();
        return $res;

    }


    public function get_vacancy_id($id)
    {

        $sql = "SELECT r.*, users.username, users.age, users.img, users.phone, users.email, users.residence
                          FROM vacancy r 
                          JOIN users  ON users.id=r.user_id
                          WHERE r.active=1 and r.id = '$id'";

        $res = DB::query(Database::SELECT, $sql)
            ->execute()->as_array();
        return $res;

    }



}