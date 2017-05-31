<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webhook extends MY_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	/**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('shopifyclient');
        $this->shopifyclient->init(SHOPIFY_SHOP_URL,SHOPIFY_ACCESS_TOKEN,SHOPIFY_API_KEY,SHOPIFY_SECRET);
    }

	public function index()
	{
		//echo "<pre>";
		$webh = $this->shopifyclient->call('GET', '/admin/webhooks.json');
		//print_r($webh);exit;
		$data['webhook']=$webh;
		$this->load->view('webhook/index',$data);
	}
	public function add()
	{
		if($this->input->post())
		{	

			$webhook= array(	"webhook" =>array( 
							    "topic"=> $this->input->post('topic'),
							    "address"=> $this->input->post('address'),
							    "format"=> $this->input->post('format')
						    )
						 );


			$this->shopifyclient->call('POST', '/admin/webhooks.json', $webhook);
			redirect('webhook');
		}
		
		$this->load->view('webhook/add');
	}
	public function edit($id)
	{

		if($this->input->post())
		{	

			$webhook= array(	"webhook" =>array( 
							    "id"=> $id,
							    "address"=> $this->input->post('address')
							    
						    )
						 );

			$this->shopifyclient->call('PUT', '/admin/webhooks/'.$id.'.json', $webhook);
			redirect('webhook');
		}

		$webh = $this->shopifyclient->call('GET', '/admin/webhooks/'.$id.'.json',array('since_id'=>$id));
		
		
		$data['webhook']=$webh;
		$this->load->view('webhook/edit',$data);
	}
	public function delete($id)
	{

		$this->shopifyclient->call('DELETE', '/admin/webhooks/'.$id.'.json');

		redirect('webhook');
	}
}
