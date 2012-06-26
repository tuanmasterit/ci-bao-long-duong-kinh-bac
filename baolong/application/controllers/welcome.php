<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Post_model');
		$this->load->model('Term_model');
    }
	public function index()
	{
		$data['title'] = 'Công ty cổ phần Bảo Long Đường Kinh Bắc';
		//Tin tức nổi bật
		$news = $this->Term_model->getCategoryByName('Tin tức nổi bật');
		$list_news = $this->Post_model->get(0,'post',5,0,'DESC','post_date',$news);		
		$data['list_news'] = $list_news;
		$arr_img = array();
		foreach ($list_news as $new)
		{
			$arr_img[] = $this->Post_model->get_featured_image($new->id);			
		}
		$data['arr_img'] = $arr_img;

		//Tin tức tiêu biểu
		$tieubieu_id = $this->Term_model->getCategoryByName('Tin tức tiêu biểu');
		$list_tieubieu  = $this->Post_model->get(0,'post',3,0,'DESC','post_date',$tieubieu_id);
		$data['list_tieubieu'] = $list_tieubieu;
		$array_img = array();
		foreach ($list_tieubieu as $tieubieu)
		{
			$array_img[] = $this->Post_model->get_featured_image($tieubieu->id);			
		}
		$data['array_img'] = $array_img;
		
		//Sản phẩm
		$this->load->view('front_end/template',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */