<?php
/**
* 
*/
class Mymodel extends CI_Model
{
	
/**************CRUD***********/


	public function __construct() {
        parent::__construct();
    }

	function add($table,$data)
	{
		$this->db->insert($table,$data);
		$insert_id= $this->db->insert_id();
		return $insert_id;
	}

    public function Update($table,$where,$data)
      {
            $query=$this->db->where($where);  
            $query=$this->db->update($table,$data);  
            return $query;
      }

      public function delete($where,$table)
      {
            $query=$this->db->where($where);
            $query=$this->db->delete($table);    
            return $query;
      }

      public function checkOldPass($table,$where)
        {
            $this->db->where($where);
            $query = $this->db->get($table);
            if($query->num_rows() > 0)
            return 1;
            else
            return 0;
        }


//**********end**********************/
 /*************Admin Login ************/
 function adminauth($table, $username, $password)
   {
      $username=$this->db->escape_str($username);
      $password=$this->db->escape_str($password);
      $this -> db -> select('*');
      $this -> db -> from($table);
      $this -> db -> where('email', $username);
      $this -> db -> where('password', $password);
      $this -> db -> limit(1);
      $query = $this -> db -> get();
      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
   }
     

    function get_result($table,$where="",$limit="",$start="",$orderby="",$type="")
    {
        $this->db->select('*');
        $this->db->from($table);
        if(!empty($where)){
            $this->db->where($where);
        }
        
        if($orderby!="" && $type!="")
        {
            $this->db->order_by($orderby,$type);
        }
        if($limit!="" && $start!="")
        {
            $this->db->limit($limit,$start);
        }
        else if($limit!="")
        {
             $this->db->limit($limit);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return array();
        }
    }
// **********pagination****************/

    public function get_count($table) {
        return $this->db->count_all($table);
    }

    public function get_pagination_details($table,$limit, $start,$where="",$orderby="") {
        $this->db->limit($limit, $start);

        if(!empty($where)){
            $this->db->where($where);
        }
        
        if($orderby!="")
        {
            $this->db->order_by($orderby);
        }

        $query = $this->db->get($table);
        return $query->result_array();
    }
    /**********end pagination*********/
    // get_record

    function get_record($table,$where="")
    {
         $this->db->select('*');
         $this->db->from($table);
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return array();
        }

    }
    




}


 ?>