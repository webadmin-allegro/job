<?php defined('SYSPATH') or die('No direct script access.');

class Model_Resume extends Model
{
    protected $_table = 'resume';
    protected $_tableC = 'category';


    public function get_user_resume($id)
    {

        $query = DB::select()->from($this->_table)->where('user_id', '=', $id)
            ->execute();

        $result = $query->as_array();
        return $result;

    }

    public function get_all_resume()
    {

        $sql = "SELECT r.*, COUNT('id') as count, users.username, users.age, users.img, users.phone, users.email, users.residence
                          FROM resume r 
                          JOIN users  ON users.id=r.user_id
                          WHERE r.active=1";
        
        $res = DB::query(Database::SELECT, $sql)
            ->execute()->as_array();
        return $res;

    }


    public function get_resume_id($id)
    {

        $sql = "SELECT r.*, users.username, users.age, users.img, users.phone, users.email, users.residence
                          FROM resume r 
                          JOIN users  ON users.id=r.user_id
                          WHERE r.active=1 and r.id = '$id'";

        $res = DB::query(Database::SELECT, $sql)
            ->execute()->as_array();
        return $res;

    }

    public function get_category($id)
    {
        $sql = "SELECT r.*, users.username, users.age, users.img, users.phone, users.email, users.residence
                          FROM resume r 
                          JOIN users  ON users.id=r.user_id
                          WHERE r.active=1 and r.category_id = '$id'";

        $category = DB::query(Database::SELECT, $sql)->execute()->as_array();

        $filter = DB::select()->from($this->_tableC)->where('parent_id', '=', $id)
            ->execute()->as_array();

        return ['category'=>$category,'filter'=>$filter];
    }

}