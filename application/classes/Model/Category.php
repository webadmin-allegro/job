<?php defined('SYSPATH') or die('No direct script access.');

class Model_Category extends Model
{
    protected $_tableC = 'category';
    protected $_tableE = 'employment';
    protected $_tableCurr = 'curr';
    protected $_tableEx = 'experience';
    protected $_tableCountry = 'country';


    public function get_table($param=false)
    {
        if ($param) $id = $param; else $id = 0;

        $query = DB::select()->from($this->_tableC)->where('parent_id', '=', $id)
            ->execute()->as_array();

        return $query;

    }

    public function get_employment($param=false)
    {
        $query = DB::select()->from($this->_tableE)
            ->execute()->as_array();

        if ($param){
            foreach ($query as $v) $result[$v['id']]= $v['name'];
        }else{
            $result= $query;
        }

        return $result;

    }

    public function get_curr($param=false)
    {

        $query = DB::select()->from($this->_tableCurr)
            ->execute()->as_array();

        if ($param){
            foreach ($query as $v) $result[$v['id']]= $v['name'];
        }else{
            $result= $query;
        }


        return $result;

    }

    public function get_experience()
    {
        $query = DB::select()->from($this->_tableEx)
            ->execute()->as_array();

        return $query;

    }

    public function get_country($param=false)
    {
        $query = DB::select()->from($this->_tableCountry)
            ->execute()->as_array();

        if ($param){
            foreach ($query as $v) $result[$v['id']]= $v['name'];
        }else{
            $result= $query;
        }
        return $result;

    }

}