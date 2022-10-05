<?php

class Site_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function get_all_selected_by_condition($table, $where = '', $group_by = '', $group_by_value = '') {
        $this->db->where('active=', '1');
        if ($where != '') {
            $this->db->where($where);
        }
        if ($group_by != '') {
            $this->db->group_by($group_by, $group_by_value);
        }
        return $this->db->get($table)->result_array();
        $this->db->last_query();
        die;
    }
    
     public function insert($table,$data)
{
	if($this->db->set($data)->insert($table))
		return $this->db->insert_id();
	else
		return false;
}

public function select($table,$fields='*',$where=null,$order_by=null,$start=0,$limit=null,$like=null)
{
	$this->db->select($fields);
	if($where)
		$this->db->where($where);
	if($limit)
		$this->db->limit($limit,$start);
	if($order_by)
		$this->db->order_by($order_by[0],$order_by[1]);
	if($like)
	    $this->db->like($like);

	return $this->db->get($table);
}

public function delete($table,$where){
	return $this->db->where($where)->delete($table);
}

public function update($table,$data,$where){
	return $this->db->set($data)->where($where)->update($table);
}

    public function get_all_selected_by_condition2($table, $where = '', $group_by = '', $group_by_value = '') {
//        $this->db->where('active!=', '2');
        if ($where != '') {
            $this->db->where($where);
        }
        if ($group_by != '') {
            $this->db->group_by($group_by, $group_by_value);
        }
        return $this->db->get($table)->result_array();
        $this->db->last_query();
        die;
    }

    public function get_single_row($table, $where = '') {
        $this->db->where('active!=', '2');
        if ($where != '') {
            $this->db->where($where);
        }
        return $this->db->get($table)->row();
//        echo $this->db->last_query(); die;
    }

    public function get_row_count($table, $where = '') {
        $this->db->where('active!=', '2');
        if ($where != '') {
            $this->db->where($where);
        }
        return $this->db->get($table)->num_rows();
//        echo $this->db->last_query(); die;
    }

    function get_single_column($table, $where, $column_name) {
        if ($where != '') {
            $this->db->where($where);
        }
        return $this->db->get($table)->row()->$column_name;
//        echo $this->db->last_query(); die;
    }

    function get_all_count($table, $where = '', $grp_colmn = '', $grp_val = '', $search_column = '') {
        $query = '';
        $query .= " select * from " . $table;
        $query .= " where active!=2 ";
        if ($this->input->get('search_val') != '')
            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
        if ($where != '')
            $query .= $where;
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        return $this->db->query($query)->num_rows();
    }

    function get_all_count2($table, $where = ''){
        $query = '';
        $query .= " select * from " . $table;
        if ($where != '')
            $query .= $where;
        return $this->db->query($query)->num_rows();
    }

    function get_adata_by_cond($table, $limit = '', $grp_colmn = '', $grp_val = '', $where = '') {
        $query = '';
        $query .= " select * from " . $table;
        $query .= " where active!=2 ";
        $query .= " ";
        if ($where != '')
            $query .= $where;
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;

        return $this->db->query($query)->result_array();
    }

    function get_all_data($table, $limit = '', $grp_colmn = '', $grp_val = '', $where = '', $search_column = '') {
        $query = '';
        $query .= " select * from " . $table;
        $query .= " where active!=2 ";
        if ($this->input->get('search_val') != '')
            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
        if ($where != '')
            $query .= $where;
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
    }

    function check_value($table, $col, $val) {
        $query = '';
        $query .= ' select * from ' . $table . ' where ' . $col . "='" . $val . "'";
        return $this->db->query($query)->row();
    }

    function get_popular_tags($limit = '') {
        $query = '';
        $query .= "select t_qt_id,master_tags.tag_name,master_tags.tag_url,count('q_qt_id') as question_count  from master_question_tags ";
        $query .= " left join master_tags on master_tags.tag_id=master_question_tags.t_qt_id";
        $query .= " group by t_qt_id ";
        $query .= " order by question_count desc";
        if ($limit != '')
            $query .= " limit " . $limit;
        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;        
    }

    function get_popular_questions($limit = '') {
        $query = '';
        $query .= " select master_answers.a_question_id,master_questions.question_name,master_questions.question_url,";
        $query .= " master_category.category_url,master_category.category_name,";
        $query .= " count(master_answers.a_question_id) as answer_count from master_answers,master_questions";
        $query .= " left join master_category on master_category.category_id=master_questions.question_category_id ";
        $query .= " where master_questions.question_id=master_answers.a_question_id ";
//        $query .= " left join master_questions on master_questions.question_id=master_answers.a_question_id ";        
        $query .= " group by master_answers.a_question_id ";
        $query .= " order by answer_count desc";
        if ($limit != '')
            $query .= " limit " . $limit;
        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;    
    }

    function get_all_question_by_category_count($grp_colmn = '', $grp_val = '', $find_column = '', $find_column_value = '', $where_in = '') {
        $query = '';
        $query .= " select master_questions.*,master_category.category_url,master_category.category_name,master_users.user_name,master_users.user_image,master_users.user_url,";
        $query .= " COALESCE(x.cnt,0) AS answer_count,COALESCE(y.cnt,0) AS like_count,COALESCE(z.cnt,0) AS dislike_count from master_questions";
        $query .= " left join master_category on master_questions.question_category_id=master_category.category_id";
        $query .= " left join master_users on master_questions.question_user_id=master_users.user_id";
        $query .= " left join master_approvals on master_questions._approval_id=master_approvals.approval_id";
        $query .= " LEFT OUTER JOIN (SELECT a_question_id, count(*) cnt FROM master_answers where master_answers._approval_id=1 and master_answers.active=1  GROUP BY a_question_id) x ON master_questions.question_id = x.a_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_question_id, count(*) cnt FROM question_reactions where active=1 GROUP BY r_question_id) y ON master_questions.question_id = y.r_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_question_id, count(*) cnt FROM question_reactions where active=2 GROUP BY r_question_id) z ON master_questions.question_id = z.r_question_id";
        $query .= " where master_questions.active=1 and  master_questions._approval_id=1 ";
        if ($find_column != '' && $find_column_value != '') {
            $query .= " and " . $find_column . " LIKE '%" . $find_column_value . "%'";
        }
        if ($where_in != '') {
            $query .= " and question_id IN (" . $where_in . ") ";
        }
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        return $this->db->query($query)->num_rows();
    }

    function get_all_question_by_category_data($limit = '', $grp_colmn = '', $grp_val = '', $find_column = '', $find_column_value = '', $where_in = '') {
        $query = '';
        $query .= " select master_questions.*,master_category.category_url,master_category.category_name,master_users.user_name,master_users.user_image,master_users.user_url,";
        $query .= " COALESCE(x.cnt,0) AS answer_count,COALESCE(y.cnt,0) AS like_count,COALESCE(z.cnt,0) AS dislike_count from master_questions";
        $query .= " left join master_category on master_questions.question_category_id=master_category.category_id";
        $query .= " left join master_users on master_questions.question_user_id=master_users.user_id";
        $query .= " left join master_approvals on master_questions._approval_id=master_approvals.approval_id";
        $query .= " LEFT OUTER JOIN (SELECT a_question_id, count(*) cnt FROM master_answers where master_answers._approval_id=1 and master_answers.active=1  GROUP BY a_question_id) x ON master_questions.question_id = x.a_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_question_id, count(*) cnt FROM question_reactions where active=1 GROUP BY r_question_id) y ON master_questions.question_id = y.r_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_question_id, count(*) cnt FROM question_reactions where active=2 GROUP BY r_question_id) z ON master_questions.question_id = z.r_question_id";
        $query .= " where master_questions.active=1 and  master_questions._approval_id=1 ";
        if ($find_column != '' && $find_column_value != '') {
            $query .= " and " . $find_column . " LIKE '%" . $find_column_value . "%'";
        }
        if ($where_in != '') {
            $query .= " and question_id IN (" . $where_in . ") ";
        }
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
//         echo $this->db->last_query(); die;
    }

    function get_all_question_by_tag_count($grp_colmn = '', $grp_val = '', $val='') {
        $query = '';
        $query .= ' select master_question_tags.q_qt_id from master_question_tags';
        $query .= " left join master_tags on master_tags.tag_id=master_question_tags.t_qt_id";
        $query .= " where master_tags.tag_url='" . $val . "'";
        $questions = implode(',', array_column($this->db->query($query)->result_array(), 'q_qt_id'));
        return $this->get_all_question_by_category_count($grp_colmn, $grp_val, '', '', $questions);
    }

    function get_all_question_by_tag_data($limit = '', $grp_colmn = '', $grp_val = '', $val='') {
        $query = '';
        $query .= ' select master_question_tags.q_qt_id from master_question_tags';
        $query .= " left join master_tags on master_tags.tag_id=master_question_tags.t_qt_id";
        $query .= " where master_tags.tag_url='" . $val . "'";
        $questions = implode(',', array_column($this->db->query($query)->result_array(), 'q_qt_id'));
        return $this->get_all_question_by_category_data($limit, $grp_colmn, $grp_val, '', '', $questions);
        print_r($questions);
    }

    function get_all_answer_count($grp_colmn = '', $grp_val = '', $question_url = '') {
        $query = '';
        $query .= " select master_answers.*,master_users.user_name,master_users.user_image,master_users.user_url,";
        $query .= " master_questions.question_name,COALESCE(y.cnt,0) AS like_count,COALESCE(z.cnt,0) AS dislike_count from master_answers";
        $query .= " left join master_users on master_users.user_id=master_answers.answer_user_id";
        $query .= " left join master_questions on master_questions.question_id=master_answers.a_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_answer_id, count(*) cnt FROM answer_reactions where active=1 GROUP BY r_answer_id) y ON master_answers.answer_id = y.r_answer_id";
        $query .= " LEFT OUTER JOIN (SELECT r_answer_id, count(*) cnt FROM answer_reactions where active=2 GROUP BY r_answer_id) z ON master_answers.answer_id = z.r_answer_id";
        $query .= " where master_answers.active!=2 and master_answers._approval_id=1 ";
        if ($question_url != '') {
            $query .= " and master_questions.question_url='" . $question_url . "' ";
        }
        if ($grp_colmn != '')
            $query .= ' order by master_answers.' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        return $this->db->query($query)->num_rows();
    }

    function get_all_answer_data($limit = '', $grp_colmn = '', $grp_val = '', $question_url = '') {
        $query = '';
        $query .= " select master_answers.*,master_users.user_name,master_users.user_image,master_users.user_url,";
        $query .= " master_questions.question_name,COALESCE(y.cnt,0) AS like_count,COALESCE(z.cnt,0) AS dislike_count from master_answers";
        $query .= " left join master_users on master_users.user_id=master_answers.answer_user_id";
        $query .= " left join master_questions on master_questions.question_id=master_answers.a_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_answer_id, count(*) cnt FROM answer_reactions where active=1 GROUP BY r_answer_id) y ON master_answers.answer_id = y.r_answer_id";
        $query .= " LEFT OUTER JOIN (SELECT r_answer_id, count(*) cnt FROM answer_reactions where active=2 GROUP BY r_answer_id) z ON master_answers.answer_id = z.r_answer_id";
        $query .= " where master_answers.active!=2 and master_answers._approval_id=1 ";
        if ($question_url != '') {
            $query .= " and master_questions.question_url ='" . $question_url . "' ";
        }
        if ($grp_colmn != '')
            $query .= ' order by master_answers.' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
    }

    function get_all_question_by_category_data2($limit = '', $grp_colmn = '', $grp_val = '', $find_column = '', $find_column_value = '', $where_in = '') {
        $query = '';
        $query .= " select master_questions.*,master_category.category_url,master_category.category_name,master_users.user_name,master_users.user_image,master_users.user_url,";
        $query .= " COALESCE(x.cnt,0) AS answer_count,COALESCE(y.cnt,0) AS like_count,COALESCE(z.cnt,0) AS dislike_count from master_questions";
        $query .= " left join master_category on master_questions.question_category_id=master_category.category_id";
        $query .= " left join master_users on master_questions.question_user_id=master_users.user_id";
        $query .= " left join master_approvals on master_questions._approval_id=master_approvals.approval_id";
        $query .= " LEFT OUTER JOIN (SELECT a_question_id, count(*) cnt FROM master_answers where master_answers._approval_id=1 and master_answers.active=1 GROUP BY a_question_id) x ON master_questions.question_id = x.a_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_question_id, count(*) cnt FROM question_reactions where active=1 GROUP BY r_question_id) y ON master_questions.question_id = y.r_question_id";
        $query .= " LEFT OUTER JOIN (SELECT r_question_id, count(*) cnt FROM question_reactions where active=2 GROUP BY r_question_id) z ON master_questions.question_id = z.r_question_id";
        $query .= " where master_questions.active=1 and  master_questions._approval_id=1 ";
        if ($find_column != '' && $find_column_value != '') {
            $query .= " and " . $find_column . " = '" . $find_column_value . "'";
        }
        if ($where_in != '') {
            $query .= " and question_id IN (" . $where_in . ") ";
        }
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        return $this->db->query($query)->result_array();
    }

    function get_most_liked_questions($limit = '', $grp_colmn = '', $grp_val = '', $find_column = '', $find_column_value = '', $where_in = '') {
        $query = '';
        $query .= " select master_questions.*,master_category.category_url,master_category.category_name,master_users.user_name,master_users.user_image,master_users.user_url,COALESCE(x.cnt,0) AS like_count from master_questions";
        $query .= " left join master_category on master_questions.question_category_id=master_category.category_id";
        $query .= " left join master_users on master_questions.question_user_id=master_users.user_id";
        $query .= " left join master_approvals on master_questions._approval_id=master_approvals.approval_id";
        $query .= " LEFT OUTER JOIN (SELECT r_question_id, count(*) cnt FROM question_reactions GROUP BY r_question_id) x ON master_questions.question_id = x.r_question_id";
        $query .= " where master_questions.active=1 and  master_questions._approval_id=1";
        if ($find_column != '' && $find_column_value != '') {
            $query .= " and " . $find_column . " LIKE '%" . $find_column_value . "%'";
        }
        if ($where_in != '') {
            $query .= " and question_id IN (" . $where_in . ") ";
        }
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        return $this->db->query($query)->result_array();
    }

    function autosearch($val) {
        $query = '';
        $query .= ' select question_name,question_url from master_questions';
        $query .= " where  active=1 and question_name  LIKE '%" . $val . "%'";
        $query .= " limit 10";
        return $this->db->query($query)->result_array();
    }
    
    function get_product_age($prod_id){
         
        $this->db->select('mst_product_age.*,mst_age.age_id,mst_age.age_title,mst_age.age_url,mst_age.active');
        $this->db->from('mst_product_age');
        $this->db->join('mst_age','mst_age.age_id = mst_product_age.page_age_id');
        $this->db->where('mst_age.active',1);
        $this->db->where('mst_product_age.page_p_id',$prod_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    function get_sell_phone_url($brand_id){
        $this->db->select('mst_brand.brand_id,mst_brand.brand_name,mst_model.m_name,mst_model.m_url,mst_model.m_image,mst_model.active,mst_model.m_brand_id');
        $this->db->from('mst_model');
        $this->db->join('mst_brand','mst_brand.brand_id = mst_model.m_brand_id');
        $this->db->where('mst_model.m_brand_id',$brand_id);
        $this->db->where('mst_model.active',1);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    function get_variant_databyid($model_id){
        $this->db->select('mst_product.*,mst_variant.variant_name,mst_variant.variant_id,mst_variant.active');
        $this->db->from('mst_product');
        $this->db->join('mst_variant','mst_variant.variant_id = mst_product.p_variant_id');
        $this->db->where('mst_product.p_m_id',$model_id);
        $this->db->where('mst_variant.active',1);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    function get_product_question($prod_id){
        $this->db->select('mst_product_question.*,mst_question.q_id,mst_question.q_title,mst_question.q_image,mst_question.q_url,mst_question.active');
        $this->db->from('mst_product_question');
        $this->db->join('mst_question','mst_question.q_id = mst_product_question.pq_q_id');
        $this->db->where('mst_question.active',1);
        $this->db->where('mst_product_question.pq_p_id',$prod_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    function get_store_bycity($city){
        $this->db->select('mst_store.*,mst_city.active,mst_city.city_name,mst_city.city_id');
        $this->db->from('mst_store');
        $this->db->join('mst_city','mst_city.city_id = mst_store.city_id');
        $this->db->where('mst_city.city_name', $city);
        $this->db->where('mst_store.active', 1);
        $result = $this->db->get();
        return $result->result_array();
    }
     function get_product_accessories($prod_id){
         
        $this->db->select('mst_product_accessories.*,mst_accessories.a_id,mst_accessories.a_title,mst_accessories.a_image,mst_accessories.a_url,mst_accessories.active');
        $this->db->from('mst_product_accessories');
        $this->db->join('mst_accessories','mst_accessories.a_id = mst_product_accessories.pa_a_id');
        $this->db->where('mst_accessories.active',1);
        $this->db->where('mst_product_accessories.pa_p_id',$prod_id);
        $result = $this->db->get();
        return $result->result_array();
    }

     // Get Brand Models
	  function get_brand_model($postData){
		$response = array();
	 
		// Select record
		$this->db->select('m_id,m_name,m_url,active');
		$this->db->where('m_brand_id', $postData['brand']);
		$this->db->where('active',1);
		$q = $this->db->get('mst_model');
		$response = $q->result_array();
	
		return $response;
	  }
    
}

?>