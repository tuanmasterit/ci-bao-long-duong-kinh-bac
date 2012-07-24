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
	//Phạm Văn Hưng
	//List Categories
	function get($id=0,$limit=-1,$offset=10,$taxonomy='category',$term_group=0){		
		if($id == 0){
			$this->db->select('ci_terms.term_id,name,slug,description,parent');
			if($limit > 0)
			{
				$this->db->limit($limit,$offset);
			}
			$this->db->from('ci_terms');
			$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');		
			$this->db->where('taxonomy',$taxonomy);
			$this->db->where('term_group',$term_group);
			
			$query = $this->db->get();
			return $query->result();
		}elseif($id > 0){
			$this->db->select('ci_terms.term_id,name,slug,description,parent');
			$this->db->from('ci_terms');
			$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');		
			$this->db->where('ci_terms.term_id',$id);
			$this->db->where('taxonomy',$taxonomy);
			$query = $this->db->get();
			$data = array();
			$data = $query->row_array();
			return $data;	
		}
	}					
	//Add Term
	function add($name,$slug,$taxonomy,$description,$parent,$term_group=0)
	{
		//Add Category
		$cat = array(
				'name' => $name,
				'slug' => $slug,
				'term_group'=>$term_group				
				);
		$Q = $this-> db-> insert('ci_terms', $cat);
		
		//Add Term Taxonomy
			
		$last_row_id = $this->getLastID();
		
		$termTaxonomy = array(
			'term_id' => $last_row_id,
			'taxonomy ' => $taxonomy,
			'description' => $description,
			'parent' =>$parent
		);
		$this->db->insert('ci_term_taxonomy',$termTaxonomy);					
	}
	
	//Delete Category
	function delete($term_id)
	{
		if($term_id != 0){
			//update post to category 1
			$taxonomy_id = $this->get_taxonomy_by_term($term_id);
			$this->db->where('term_taxonomy_id',$taxonomy_id);
			$this->db->update('ci_term_relationships',array('term_taxonomy_id'=>$taxonomy_id));			
			//Delete Category
			$this->db->delete('ci_term_taxonomy',array('term_id'=>$term_id));
			$this->db->delete('ci_terms',array('term_id'=>$term_id));						
		}
	}
	//get term_taxonomy_by_term_id
	function get_taxonomy_by_term($term_id){
		$query = $this->db->get_where('ci_term_taxonomy',array('term_id' => $term_id));
		$row = $query->first_row();
		return $row->term_taxonomy_id;
	}
	
	function update($term_id,$name,$slug,$description,$parent)
	{
		//Update Category
		$cat = array(
				'name' => $name,
				'slug' => $slug,				
				);
		$this-> db-> where('term_id', $term_id);
		$this-> db-> update('ci_terms', $cat);

		//Update Term Taxonomy
		$termTaxonomy = array(			
			
			'description' => $description,
			'parent' =>$parent
		);
		$this-> db-> where('term_id', $term_id);
		$this-> db-> update('ci_term_taxonomy', $termTaxonomy);
	}
	
	function getCount($taxonomy,$term_group=0)
	{		
		$this->db->from('ci_terms');
		$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');		
		$this->db->where('taxonomy',$taxonomy);	
		if($term_group!=0)
		{
			$this->db->where('term_group',$term_group);
		}			
		return $this->db->count_all_results();
	}
	
	function getCategoryByName($name)
	{
		$query = $this->db->get_where('ci_terms',array('name'=>$name));
		if($query->num_rows>0)
		{
			$row = $query->first_row();
			return $row->term_id;
		}
		return false;
	}
	
	function getCatProNav($taxonomy='catpro',$term_group=0)
	{			
		$this->db->select('ci_terms.term_id,name,slug,description');
		$this->db->from('ci_terms');
		$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');
		$this->db->where('taxonomy',$taxonomy);
		$this->db->where('parent',0);
		
			$this->db->where('term_group',$term_group);
		
		$query = $this->db->get();	
		return $query->result();
	}
		
	function getListProduct($term_id,$limit=0,$offset=0)
	{
		$childrens = $this->getSubCatProNav($term_id);
		if(!count($childrens))
		{
			$this->db->select('ci_posts.id,post_title,post_excerpt,post_content,post_date');
			$this->db->from('ci_posts');
			$this->db->join('ci_term_relationships', 'ci_term_relationships.object_id = ci_posts.id');
			$this->db->join('ci_term_taxonomy','ci_term_relationships.term_taxonomy_id = ci_term_taxonomy.term_taxonomy_id');							
			$this->db->where('ci_term_taxonomy.term_id',$term_id);
			$this->db->order_by('post_date','DESC');
			if($limit>0)
			{
				$this->db->limit($limit,$offset);				
			}
			$query = $this->db->get();
			return $query->result_array();
		}
		else {
			$list = array();
			foreach ($childrens as $children)
			{
				$this->db->select('ci_posts.id,post_title,post_excerpt,post_content');
				$this->db->from('ci_posts');
				$this->db->join('ci_term_relationships', 'ci_term_relationships.object_id = ci_posts.id');
				$this->db->join('ci_term_taxonomy','ci_term_relationships.term_taxonomy_id = ci_term_taxonomy.term_taxonomy_id');	
				$this->db->where('ci_term_taxonomy.term_id',$children->term_id);
				$query = $this->db->get();
				$kq = $query->result_array();
				$list = array_merge($list,$kq);
			}
			return $list;
		}
	}

	function getSubCatProNav($term_id,$taxonomy='catpro')
	{
		$this->db->select('ci_terms.term_id,name,slug,description');
		$this->db->from('ci_terms');
		$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');
		$this->db->where('taxonomy',$taxonomy);
		$this->db->where('parent',$term_id);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function getCatProTopFirst()
	{			
		$this->db->select('ci_terms.term_id,name,slug,description');		
		$this->db->from('ci_terms');
		$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');
		$this->db->where('taxonomy','catpro');
		$this->db->where('parent',0);
		$query = $this->db->get();	
		$row = $query->first_row();
		return $row->term_id;
	}
	
	function getCategoryByTaxonomyID($term_taxonomy_id,$taxonomy='catpro')
	{
		$this->db->select('ci_terms.term_id,name,slug,description,parent');
		$this->db->from('ci_terms');
		$this->db->join('ci_term_taxonomy','ci_terms.term_id=ci_term_taxonomy.term_id');
		$this->db->where('taxonomy',$taxonomy);
		$this->db->where('term_taxonomy_id',$term_taxonomy_id);
		$query = $this->db->get();
		return $query->first_row();
	}
	
	function getLastID()
	{
		$this->db->select('term_id');
		$this->db->from('ci_terms');
		$this->db->order_by('term_id','DESC');
		$query = $this->db->get();			
		$last_row = $query->first_row();
		return $last_row->term_id;		
	}
}
?>