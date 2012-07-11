<?php 
	class Cart_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}	
		
		function getSumCart()
		{
			$sum = 0;
			if(isset($_SESSION['cart']))
			{						
				foreach($_SESSION['cart'] as $key=>$value)
				{
					$lstProduct = $this->Post_model->get($key,'product');
					foreach ($lstProduct as $product)
					{
						$giathitruong = (int)$this->Post_model->get_meta_value($key,'giathitruong');
						$sum = $sum + $giathitruong*$value;
					}
				}				
			}
			return $sum;
		}
	}	
?>