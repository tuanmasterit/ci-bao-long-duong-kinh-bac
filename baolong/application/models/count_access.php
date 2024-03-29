<?php
class Count_access extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		session_start();				
    }
    
    public function countAccess()
    {    	
    	if(! isset($_SESSION['online'])){
			$online = session_id();
			$_SESSION['online'] = $online;
	    	$this->db->select('option_name,option_value');
	    	$this->db->from('ci_options');
	    	$this->db->where('option_name','count_visit');
	    	$query = $this->db->get();
	    	if($query->num_rows()>0)
	    	{
	    		 $count = $query->first_row();
	    		 $tg = (int)$count->option_value;
	    		 $tg = $tg+1;
	    		 $array = array(
	    		 	'option_value'=>$tg,
	    		 );	    
	    		 $this->db->where('option_name','count_visit');		  	
	    		 $this->db->update('ci_options',$array);
	    		 
	    	}
	    	else 
	    	{
	    		array(
	    			'option_value'=>1,
	    			'option_name'=>'count_visit'
	    		);
	    		$this->db->insert('ci_options',$array);
	    		$tg=1;
	    	}
    	}
    	else 
    	{
    		$this->db->select('option_name,option_value');
	    	$this->db->from('ci_options');
	    	$this->db->where('option_name','count_visit');
	    	$query = $this->db->get();
	    	if($query->num_rows()>0)
	    	{
	    		 $count = $query->first_row();
	    		 $tg = (int)$count->option_value;	    		 
	    	}
	    	else 
	    	{
	    		$array = array(
	    			'option_value'=>1,
	    			'option_name'=>'count_visit'
	    		);
	    		$this->db->insert('ci_options',$array);
	    		$tg=1;
	    	}
    	}
    	return  $tg;
    }
    
    function countOnline()
    {
    	$query = $this->db->query("SELECT COUNT(session_id) As UserOnline FROM `ci_sessions` WHERE last_activity > UNIX_TIMESTAMP(now()-interval 10 minute)");

		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
			  return $row->UserOnline;
		   }
		}
		return 0;
    }
}
?>