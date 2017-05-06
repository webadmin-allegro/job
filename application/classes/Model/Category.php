<?php defined('SYSPATH') or die('No direct script access.');

class Model_Category extends Model
{
    protected $_tableC = 'category';
    protected $_tableE = 'employment';
    protected $_tableCurr = 'curr';
    protected $_tableEx = 'experience';
    protected $_tableCountry = 'country';
    protected $_tableEd = 'education_type';
    protected $filterOptions = [];


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

    public function get_education_type($param=false)
    {
        $query = DB::select()->from($this->_tableEd)
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

    public function get_category($id,$filters = false)
    {
        /*  $this->filterOptions = [
            'rule' => ['condition' => '='],
            'rule2' => ['condition' => '>'],
        ];

        foreach ($filters as $filterName => $filterValue)
        {
            if (isset($this->filterOptions[$filterName]))
            {
                $object->where($filterName, $this->filterOptions[$filterName],$filterValue);
            }
        } */

        $items = 10;

        $query = DB::select('r.*','u.username','u.age','u.img','u.phone','u.email','u.residence')
            ->from(array('resume','r'))
            ->join(array('users','u'))
            ->on('u.id', '=', 'r.user_id')
            ->where('r.active', '=', 1);

       if ($id>0) $query ->and_where('r.category_id', '=', $id);

        if (is_array($filters['resume_post'])) {

            foreach ($filters['resume_post'] as $filterName => $filterValue) {

                if ($filterValue > 0) {

                    if ($filterName != 'experience_id') {

                        $query->and_where('r.' . $filterName, '=', $filterValue);

                    }else{

                        $query ->join(array('resume_proff','rp'))
                            ->on('r.id', '=', 'rp.resume_id')
                            ->where('rp.experience_id', '=', $filterValue);

                    }
                }

            }

        }

        if (is_array($filters['category']) || is_array($filters['experience'])){

            $query ->join(array('resume_proff','rp'))
                   ->on('r.id', '=', 'rp.resume_id')
                   ->where('rp.category_id', 'IN', $filters['category'])
                   ->group_by('r.id');

        }

        //$pagination_query = clone $query;
        $count = $query->execute()->count();

        $paginator = Pagination::factory(array(
            'total_items' => $count,
            'items_per_page' => $items,

        ));

        $category = $query
            ->order_by('id','DESC')
            ->limit($paginator->items_per_page)
            ->offset($paginator->offset)
            ->execute()
            ->as_array();

        $filter = DB::select()->from($this->_tableC)->where('parent_id', '=', $id)
            ->execute()->as_array();

        return ['list'=>$category,'filter'=>$filter,'paginator' => $paginator];
    }

}