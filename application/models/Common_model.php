<?php

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function get_all_selected_by_condition($table, $where = '', $group_by = '', $group_by_value = '') {
        $this->db->where('active!=', '2');
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

    public function get_single_row2($table, $where = '') {
        $this->db->where('active=', '1');
        if ($where != '') {
            $this->db->where($where);
        }
        return $this->db->get($table)->row();
//        echo $this->db->last_query(); die;
    }

    public function get_single_row3($table, $where = '') {
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
    
   

    function get_all_count($table, $grp_colmn = '', $grp_val = '', $search_column = '', $where = '', $wherein_id = '', $where_in = '') {
        $query = '';
        $query .= " select * from " . $table;
        $query .= " where active!=2 ";
        if ($where != '')
            $query .= $where;
        if ($where_in != '') {
            $query .= " and " . $wherein_id . " IN (" . $where_in . ") ";
        }
        if ($this->input->get('search_val') != '')
            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        return $this->db->query($query)->num_rows();
    }

    function get_all_data($table, $limit = '', $grp_colmn = '', $grp_val = '', $search_column = '', $where = '', $wherein_id = '', $where_in = '') {
        $query = '';
        $query .= " select * from " . $table;
        $query .= " where active!=2 ";
        if ($where != '')
            $query .= $where;
        if ($where_in != '') {
            $query .= " and " . $wherein_id . " IN (" . $where_in . ") ";
        }
        if ($this->input->get('search_val') != '')
            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
        if ($grp_colmn != '')
            $query .= ' order by ' . $grp_colmn;
        if ($grp_val != '')
            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;
    }

    function check_value($table, $col, $val) {
        $query = '';
        $query .= ' select * from ' . $table . ' where ' . $col . "='" . $val . "'";
        return $this->db->query($query)->row();
    }

    function autosearch($val, $where = '') {
        $query = '';
        $query .= ' select c_title,c_url from master_coupons';
        $query .= " where  active=1 and c_title  LIKE '%" . $val . "%'";
        if ($where != '')
            $query .= $where;
        $query .= " limit 10";
        return $this->db->query($query)->result_array();
    }

    function autosearch_deal($val, $where = '') {
        $query = '';
        $query .= ' select d_title,d_url from master_deals';
        $query .= " where  active=1 and d_title  LIKE '%" . $val . "%'";
        if ($where != '')
            $query .= $where;
        $query .= " limit 10";
        return $this->db->query($query)->result_array();
    }

    function get_packages_by_user($user) {

        $d1 = date("m/d/Y");
        $query = "";
        $query .= " select master_user_package.up_id,master_user_package.up_package_id,master_package.package_name,COALESCE(x.cnt,0) as cnt from master_user_package";
        $query .= " left join master_package on master_package.package_id=master_user_package.up_package_id";
        $query .= " LEFT OUTER JOIN (SELECT pr_up_id, count(*) cnt FROM master_pr where pr_ps_id=1 GROUP BY pr_up_id) x ON master_user_package.up_id = x.pr_up_id ";
        $query .= " where (master_user_package.up_start_date IS NULL or master_user_package.up_end_date >='" . $d1 . "')"; //get credit count by packages
        $query .= " and master_user_package.up_user_id=" . $user . " and COALESCE(x.cnt,0)< master_package.package_credits"; //check user and credit count
        return $this->db->query($query)->result_array();
//         echo  $this->db->last_query(); die;
    }

    public function get_rss_feed_by_network($id = '') {
        $query = " ";
        $query = " select master_pr.*,master_company.* from master_pr";
        $query .= " left join master_package on master_package.package_id=master_pr.pr_package_id";
        $query .= " left join master_package_network on master_package_network.pn_package_id=master_package.package_id";
        $query .= " left join master_company on master_company.company_id=master_pr.pr_company_id";
        $query .= " where master_pr.pr_ps_id=1 and master_package_network.pn_network_id=" . $id;
        $query .= " group by master_pr.pr_id desc";
        return $this->db->query($query)->result_array();
    }

    function get_all_virtual_number_leads_count() {
        $query = '';
        $query .= " select vn.* from master_virtual_number_enquiry as vn";
        $query .= " left join master_campaign on master_campaign.c_id=vn.vne_c_id";
        $query .= " where vn.active =1 ";
//        if ($where != '')
//            $query .= $where;
//        if ($where_in != '') {
//            $query .= " and " . $wherein_id . " IN (" . $where_in . ") ";
//        }
        if ($this->input->get('search_val') != '')
            $query .= " and master_campaign.c_campaign_name like '%" . $this->input->get('search_val') . "%'";
        $query .= " order by vn.vne_id desc ";
        return $this->db->query($query)->num_rows();
    }

    function get_all_virtual_number_leads_data($limit = '') {
        $query = '';
        $query .= " select vn.* from master_virtual_number_enquiry as vn";
        $query .= " left join master_campaign on master_campaign.c_id=vn.vne_c_id";
        $query .= " where vn.active =1 ";
        if ($this->input->get('search_val') != '')
            $query .= " and master_campaign.c_campaign_name like '%" . $this->input->get('search_val') . "%'";
        $query .= " order by vn.vne_id desc ";
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');
//        echo $this->db->last_query();
//        die;
        return $this->db->query($query)->result_array();
    }

    function get_all_website_leads_count() {
        $query = '';
        $query .= " select * from master_lead as vn";
        $query .= " left join master_campaign on master_campaign.c_id=vn.l_c_id";
        $query .= " where vn.active =1 ";
        if ($this->input->get('search_val') != '')
            $query .= " and master_campaign.c_campaign_name like '%" . $this->input->get('search_val') . "%'";
        $query .= " order by l_id desc ";
        return $this->db->query($query)->num_rows();
    }

    function get_all_website_leads_data($limit = '') {
        $query = '';
        $query .= " select * from master_lead as vn";
        $query .= " left join master_campaign on master_campaign.c_id=vn.l_c_id";
        $query .= " where vn.active =1 ";
        if ($this->input->get('search_val') != '')
            $query .= " and master_campaign.c_campaign_name like '%" . $this->input->get('search_val') . "%'";
        $query .= " order by l_id desc ";
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;
    }

    function get_all_campaign_report_count() {
        $query = '';
        $query .= " select * from master_campaign_report";
        $query .= " where active!=2 ";
        $query .= " order by cr_id desc ";
//        if ($where != '')
//            $query .= $where;
//        if ($where_in != '') {
//            $query .= " and " . $wherein_id . " IN (" . $where_in . ") ";
//        }
//        if ($this->input->get('search_val') != '')
//            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
//        if ($grp_colmn != '')
//            $query .= ' order by ' . $grp_colmn;
//        if ($grp_val != '')
//            $query .= '  ' . $grp_val;
        return $this->db->query($query)->num_rows();
    }

    function get_all_campaign_report_data($limit = '') {
        $query = '';
        $query .= " select * from master_campaign_report";
        $query .= " where active!=2 ";
        $query .= " order by cr_adword_campaign_id desc ";
//        if ($where != '')
//            $query .= $where;
//        if ($where_in != '') {
//            $query .= " and " . $wherein_id . " IN (" . $where_in . ") ";
//        }
//        if ($this->input->get('search_val') != '')
//            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
//        if ($grp_colmn != '')
//            $query .= ' order by ' . $grp_colmn;
//        if ($grp_val != '')
//            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;
    }

    function get_all_campaign_keyword_report_count() {
        $query = '';
        $query .= " select * from master_campaign_keyword_report";
        $query .= " where active!=2 ";
        $query .= " order by ckr_adword_campaign_id desc ";
//        if ($where != '')
//            $query .= $where;
//        if ($where_in != '') {
//            $query .= " and " . $wherein_id . " IN (" . $where_in . ") ";
//        }
//        if ($this->input->get('search_val') != '')
//            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
//        if ($grp_colmn != '')
//            $query .= ' order by ' . $grp_colmn;
//        if ($grp_val != '')
//            $query .= '  ' . $grp_val;
        return $this->db->query($query)->num_rows();
    }

    function get_all_campaign_keyword_report_data($limit = '') {
        $query = '';
        $query .= " select * from master_campaign_keyword_report";
        $query .= " where active!=2 ";
        $query .= " order by ckr_id desc ";
//        if ($where != '')
//            $query .= $where;
//        if ($where_in != '') {
//            $query .= " and " . $wherein_id . " IN (" . $where_in . ") ";
//        }
//        if ($this->input->get('search_val') != '')
//            $query .= ' and ' . $search_column . " like '%" . $this->input->get('search_val') . "%'";
//        if ($grp_colmn != '')
//            $query .= ' order by ' . $grp_colmn;
//        if ($grp_val != '')
//            $query .= '  ' . $grp_val;
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;
    }

    function get_all_virtual_number_count() {
        $query = '';
        $query .= " select * from master_virtual_number";
        $query .= " where active!=2 ";
        if ($this->input->get('search_val') != '')
            $query .= " and vn_number  like '%" . $this->input->get('search_val') . "%' OR  vn_campaign_name like '%" . $this->input->get('search_val') . "%' ";
        $query .= ' order by vn_c_id asc';
        return $this->db->query($query)->num_rows();
    }

    function get_all_virtual_number_data($limit = '') {
        $query = '';
        $query .= " select * from master_virtual_number";
        $query .= " where active!=2 ";
        if ($this->input->get('search_val') != '')
            $query .= " and vn_number  like '%" . $this->input->get('search_val') . "%' OR  vn_campaign_name like '%" . $this->input->get('search_val') . "%' ";
        $query .= ' order by vn_c_id asc';
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;
    }

    function get_all_campaign_count() {
        $query = '';
        $query .= " select * from master_campaign";
        $query .= " where active!=2 ";
        if ($this->input->get('active') != '')
            $query .= " and active=" . $this->input->get('active');
        if ($this->input->get('status') != '')
            $query .= " and c_campaign_status=" . $this->input->get('status');
        if ($this->input->get('manager') != '')
            $query .= " and c_adword_account_manager_id=" . $this->input->get('manager');
        if ($this->input->get('search_val') != '')
            $query .= " and c_campaign_name  like '%" . $this->input->get('search_val') . "%' ";
        $query .= " or c_owner_name  like '%" . $this->input->get('search_val') . "%' ";
        $query .= ' order by c_id desc';
        return $this->db->query($query)->num_rows();
    }

    function get_all_campaign_data($limit = '') {
        $query = '';
        $query .= " select * from master_campaign";
        $query .= " where active!=2 ";
        if ($this->input->get('status') != '')
            $query .= " and c_campaign_status=" . $this->input->get('status');
        if ($this->input->get('manager') != '')
            $query .= " and c_adword_account_manager_id=" . $this->input->get('manager');
        if ($this->input->get('active') != '')
            $query .= " and active=" . $this->input->get('active');
        if ($this->input->get('search_val') != '')
            $query .= " and c_campaign_name  like '%" . $this->input->get('search_val') . "%' ";
        $query .= " or c_owner_name  like '%" . $this->input->get('search_val') . "%' ";
        $query .= ' order by c_id desc';
        if ($limit != '')
            $query .= ' limit ' . $limit;
        if ($this->input->get('per_page') != '')
            $query .= ' offset ' . $this->input->get('per_page');

        return $this->db->query($query)->result_array();
//        echo $this->db->last_query(); die;
    }

    function get_all_data_sell_order($excu_id=null){
        $this->db->select('mst_sell_order.*,mst_user.user_id,mst_user.user_name,mst_user.user_phone,mst_user.user_email,mst_user.alt_no');
        $this->db->from('mst_sell_order');
        $this->db->join('mst_user','mst_user.user_id = mst_sell_order.user_id');
        if($excu_id){
            $this->db->where('mst_sell_order.executive_id',$excu_id);
        }
        $result = $this->db->get();
        return $result->result_array();
    }

    function get_single_sell_order($id){
        $this->db->select('mst_sell_order.*,mst_user.user_id,mst_user.user_name,mst_user.user_phone,mst_user.user_email,mst_user.alt_no');
        $this->db->from('mst_sell_order');
        $this->db->join('mst_user','mst_user.user_id = mst_sell_order.user_id');
        $this->db->where('mst_sell_order.id',$id);
        $result = $this->db->get();
        return $result->row();
    }

    function get_exicutive_bypin($postData){
		$response = array();
	 
		// Select record
		$this->db->select('mst_executive_pincode.*,mst_staff.staff_id,mst_staff.staff_fullname,mst_staff.active,mst_staff.staff_type');
        $this->db->from('mst_executive_pincode');
        $this->db->join('mst_staff','mst_staff.staff_id = mst_executive_pincode.ep_e_id');
		$this->db->where('mst_executive_pincode.ep_pincode_id', $postData['pincode']);
		$this->db->where('mst_staff.active',1);
		$this->db->where('mst_staff.staff_type',1);
		$result = $this->db->get();
		$response = $result->result_array();
		return $response;
	  }


}

?>