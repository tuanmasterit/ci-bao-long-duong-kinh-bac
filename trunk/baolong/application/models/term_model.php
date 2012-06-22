<?php 
//include('class.php');
class Term_model extends CI_Model{
	//Properties
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();		
    }
	
	//List Categories
	function list_categories($limit, $offset){		
		$this->db->select('ci_terms.term_id,name,slug,description');
		$this->db->limit($limit,$offset);
		$this->db->from('ci_terms');
		$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');		
		$this->db->where('taxonomy','category');
		$query = $this->db->get();
        return $query->result();
	}
	//Get id last record
	function get_id_last_row(){
		$query = $this->db->get('ci_posts');			
		$last_row = $query->last_row();
		return $last_row->ID;
	}
	
	//Get Category ID
	function getCategory($id)
	{
		$data= array();
		$option = array('term_id'=>$id);
		$Q = $this->db->get_where('ci_terms',$option,1);
		if($Q->num_rows()>0)
			{
				$data = $Q->row_array();
			}			
		$Q->free_result();
		return $data;		
	}
	
	//Get Term Taxonomy
	function getTermTaxonomy($id)
	{
		$data= array();
		$option = array('term_id'=>$id);
		$Q = $this->db->get_where('ci_term_taxonomy',$option,1);
		if($Q->num_rows()>0)
			{
				$data = $Q->row_array();
			}			
		$Q->free_result();
		return $data;	
	}
	
	//Get Top Category Parent
	function getTopCategories(){
		$data[0] = 'Không có cha';		
		$Q = $this-> db-> get('ci_terms');
		if ($Q-> num_rows() > 0){
			foreach ($Q-> result_array() as $row){
				$data[$row['term_id']] = $row['name'];
			}
		}
		$Q-> free_result();
		return $data;
	}

	//Add Category
	function addCategory($name,$slug,$taxonomy,$description,$parent)
	{
		//Add Category
		$cat = array(
				'name' => $name,
				'slug' => $slug,				
				);
		$Q = $this-> db-> insert('ci_terms', $cat);
		
		//Add Term Taxonomy
		$query = $this->db->get('ci_terms');			
		$last_row = $query->last_row('array');
		
		$termTaxonomy = array(
			'term_id' => $last_row['term_id'],
			'taxonomy ' => $taxonomy,
			'description' => $description,
			'parent' =>$parent
		);
		$this->db->insert('ci_term_taxonomy',$termTaxonomy);					
	}
	
	//Delete Category
	function delete_term($id)
	{
		if($id != 1){
			//update post to category 1
			$taxonomy_id = get_taxonomy_by_term($id);
			$this->db->where('term_taxonomy_id',$taxonomy_id);
			$this->db->update('ci_term_relationships',array('term_taxonomy_id'=>$taxonomy_id));			
			//Delete Category
			$this->db->delete('ci_term_taxonomy',array('term_id'=>$id));
			$this->db->delete('ci_terms',array('term_id'=>$id));						
		}
	}
	//get term_taxonomy_by_term_id
	function get_taxonomy_by_term($term_id){
		$query = $this->db->get_where('ci_term_taxonomy',array('term_id' => $term_id));
		$row = $query->first_row();
		return $row->term_taxonomy_id;
	}
	
	function updateCategory($id,$name,$slug,$description,$parent)
	{
		//Update Category
		$cat = array(
				'name' => $name,
				'slug' => $slug,				
				);
		$this-> db-> where('term_id', $id);
		$this-> db-> update('ci_terms', $cat);

		//Update Term Taxonomy
		$termTaxonomy = array(			
			
			'description' => $description,
			'parent' =>$parent
		);
		$this-> db-> where('term_id', $id);
		$this-> db-> update('ci_term_taxonomy', $termTaxonomy);
	}
}
?>