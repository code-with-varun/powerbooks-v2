<?php defined('BASEPATH') or exit('No direct script access allowed');
class Pdfcontroller extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
	}


	public function index()
	{
		$data_user = array();

		$data_user['users'] = $this->db->get('user_details')->result();
		$this->load->view('user_list', $data_user);
		$html = $this->output->get_output();
		$this->load->library('Pdf');
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment" => 0));
	}


	public function pb_invoices($one)
	{
        $sessdata = $this->session->userdata('pbk_sess');
		$bwdata['merchant_id']=$data['merchant_id'] = $sessdata['pbk_merchant_id'];

		$data_user = array();
		$data_user['inv_ref_no'] = $one;
		$bwdata['inv_ref_no'] = $one;

		$specific_bill_fetch = $this->Users_model->specific_bill_fetch($bwdata);

		foreach ($specific_bill_fetch as $row) {
			$data['transaction_id'] = $row->sino;

			$bwdata['receipt_date'] = $row->pos_bill_date;
			$bwdata['bill_no'] = $row->bill_no;
			// $bwdata['product_descr'] = $row->product_descr;

			// $bwdata['product_code'] = $row->product_code;
			// $bwdata['product_name'] = $row->product_name;
		
			// $bwdata['price'] = $row->price;
			// $bwdata['tax'] = $row->tax;
			// $bwdata['cgst'] = round(($bwdata['tax'] / 2), 2);
			// $bwdata['sgst'] = round(($bwdata['tax'] / 2), 2);
			// $bwdata['amount'] = $row->amount;
			// $bwdata['paymode'] = $row->paymode;
			// $bwdata['customer_name'] = ucwords($row->customer_name);
			// $bwdata['contact_no'] = $row->contact_no;
			// $bwdata['processed_by'] = $row->processed_by;
		}

		$irn = $bwdata['inv_ref_no'];
		'.pdf';


		//$settlement_queue_fetch= $this->Users_model->settlement_queue_fetch();

		// $data_user['users'] = $this->db->get('user_details')->result();
		// $this->load->view('user_list',$data_user);

		$html = $this->load->view('receipt_view', $bwdata, true);


		// $html = $this->output->get_output();
		$this->load->library('Pdf');
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream($irn, array("Attachment" => 0));
	}
}