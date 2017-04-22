<?php defined('SYSPATH') or die('No direct script access.');

class Model_Category extends Model
{
    protected $_tableC = 'category';
    protected $_tableE = 'employment';
    protected $_tableCurr = 'curr';


    public function get_table()
    {
        $sql = "SELECT id,name FROM ". $this->_tableC;

        $query = DB::query(Database::SELECT, $sql)
            ->execute();

        $result = $query->as_array();
        return $result;

    }

    public function get_employment()
    {
        $sql = "SELECT id,name FROM ". $this->_tableE;

        $query = DB::query(Database::SELECT, $sql)
            ->execute();

        $result = $query->as_array();
        return $result;

    }

    public function get_curr()
    {
        $sql = "SELECT * FROM ". $this->_tableCurr;

        $query = DB::query(Database::SELECT, $sql)
            ->execute();

        $result = $query->as_array();
        return $result;

    }

}