<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class yeucauquydoi extends CI_Controller {

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
		if($this->session->userdata('logged_in') != 1){
			redirect('admin/login');
		}
		$this->load->model('yeucauquydoi_model');
		$this->load->model('User_model');
		$this->load->library('pagination');
    }
  
	public function index($row=0)
	{
		$result='';
		if($this->input->post('txtVcoin'))
		{
			$usn=$this->session->userdata('username');
			$uid=$this->User_model->getByUsername($usn);
			$vcoin=$this->input->post('txtVcoin');
			$result = $this->yeucauquydoi_model->checkVcoin($uid,$vcoin);
		}
		$data['result'] = $result;
		$this->load->view('hoivien/yeucauquydoi_view',$data);
		//echo $html;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */