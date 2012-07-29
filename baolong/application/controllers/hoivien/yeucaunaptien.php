<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class yeucaunaptien extends CI_Controller {

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
		$this->load->model('yeucaunaptien_model');
		$this->load->model('User_model');
		$this->load->library('pagination');
    }
  
	public function index($row=0)
	{
		$result='';
		if($this->input->post('txtVcoin'))
		{
			$vcoin=$this->input->post('txtVcoin');
			if($vcoin>0)
			{
			$usn=$this->session->userdata('username');
			$uid=$this->User_model->getByUsername($usn);
			$vcoin=$this->input->post('txtVcoin');
			$result = $this->yeucaunaptien_model->add($vcoin,$uid,'',$this->common->getStatus('choxuly'));
			$result='true';
			}
			else
			{
			$result='false';
			}
		}
		else
		{
			$result='false';
		}
		$data['result'] = $result;
		$this->load->view('hoivien/yeucaunaptien_view',$data);
		//echo $html;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */