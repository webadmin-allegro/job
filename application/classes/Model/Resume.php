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

}