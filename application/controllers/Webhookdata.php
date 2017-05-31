<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webhookdata extends MY_Controller {

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

	public function productpost()
	{
		$data = file_get_contents('php://input');
		if($this->vefiry($data))
		{
			$data=json_decode($data);
			log_message('error', $data);
		}else
		{
			log_message('error', 'verify false');
		}
	}

	public 	function vefiry($data)
	{
		
		$hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
		$calculated_hmac = base64_encode(hash_hmac('sha256', $data, SHOPIFY_ADMIN_APP_SECRET, true));
		return ($hmac_header == $calculated_hmac);
	}
	
	
}
