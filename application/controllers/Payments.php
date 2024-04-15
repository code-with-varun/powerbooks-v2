<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(FCPATH . 'vendor/autoload.php');

use Stripe\Stripe;
use Stripe\Checkout\Session;

class Payments extends CI_Controller {

    public function __construct() {
        parent::__construct();
	
    }

    public function create_checkout_session() {
		$data['to_pay'] = ($this->input->post('to_pay'))*100;
		$data['item_name'] = $this->input->post('item_name');
		$data['sino'] = $this->input->post('sino');
		$data['merchant_id'] = $this->input->post('merchant_id');
		$data['bill_no'] = $this->input->post('bill_no');
		$this->load->helper('url');
		$encodedBillNo = str_replace('/', '_', $data['bill_no']);

		// Set your Stripe secret key
		$stripe_secret_key = "sk_test_51NsI6YSAZydjRKpENQTmmLwlTeBMCzvBu4FxliorztOpb3FTEiJFZKCOniyLg8at4EOVBq6oTkWsNOk53pGzjOW400L4TtnuBB";
		Stripe::setApiKey($stripe_secret_key);
	
		// Create a checkout session
		$checkout_session = Session::create([
			"mode" => "payment",
			"success_url" => site_url("stripe-success/{CHECKOUT_SESSION_ID}/{$data['sino']}/{$encodedBillNo}"),
			"cancel_url" => site_url('powerbooks-subscriptions'),
			"line_items" => [
				[
					"quantity" => 1,
					"price_data" => [
						"currency" => "inr",
						"unit_amount" => $data['to_pay'],
						"product_data" => [
							"name" => $data['item_name']
						]
					]
				]
			]
		]);
	
		// Redirect the user to the checkout session URL
		redirect($checkout_session->url, 'location', 303);
	}
	

	public function success($one,$two,$three) {
        // Retrieve the session ID from the query parameters
        $session_id = $one;
		$sino = $two;
		$bill_no = str_replace('_', '/', $three);

        // Set your Stripe secret key
        $stripe_secret_key = $_ENV['STRIPE_SECRET_KEY'];
        Stripe::setApiKey($stripe_secret_key);

		$sessdata = $this->session->userdata('pbk_sess');
		$merchant_id=$data['merchant_id'] = $sessdata['pbk_merchant_id'];
		
        // Retrieve the checkout session
        $session = Session::retrieve($session_id);

        // Retrieve all line items for the session
        $session_line_items = Session::allLineItems($session_id);

        // You can handle the retrieved data as needed
        // For example, you can pass it to a view to display
        $data['session'] = $session;
        $data['session_line_items'] = $session_line_items;

// Extracting required fields from $data['session']
$sessionId = $data['session']['id'];
$paymentMethodType = $data['session']['payment_method_types'][0]; // Assuming there's only one payment method type
$amountTotal = ($data['session']['amount_total'])/100;
$paymentStatus = $data['session']['payment_status'];
$paymentIntent = $data['session']['payment_intent'];
$email = $data['session']['email'];
$name = $data['session']['name'];
$currency = $data['session']['currency'];
$livemode = $data['session']['livemode'];

// Extracting required fields from $data['session_line_items']
$lineItems = $data['session_line_items']->data;
if (!empty($lineItems)) {
    $lineItem = $lineItems[0]; // Assuming there's only one line item
    $lineItemId = $lineItem->id;
    $description = $lineItem->description;
} else {
    // Handle case where line items are empty
}// Creating an array for insertion into the database
$insertData = array(
	'merchant_id' => $merchant_id,
	'sino' => $sino,
	'bill_no' => $bill_no,
	'livemode' => $livemode,
    'session_id' => $sessionId,
    'payment_method_type' => $paymentMethodType,
    'amount_total' => $amountTotal,
    'payment_status' => $paymentStatus,
    'payment_intent' => $paymentIntent,
    'email' => $email,
    'name' => $name,
    'currency' => $currency,
    'line_item_id' => $lineItemId,
    'description' => $description
);


// Now you can use $insertData to insert into your database using CodeIgniter's database query methods
$new_stripe_payments_insert = $this->Users_model->new_stripe_payments_insert($insertData);
if($paymentStatus=='paid'){
	$new_stripe_payments_update = $this->Users_model->new_stripe_payments_update($insertData);
	
}

redirect('powerbooks-subscriptions', 'location');



    }


}
