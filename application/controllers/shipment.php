<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipment extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if(isset($_POST['compute'])){
            $params = (object)$this->input->post();

            $dimension = 5000;
            $shipFee = 0;
            
            // Step 1
            $actualWeight = round(intval($params->item_weight));

            $length = round(intval($params->item_length));
            $width = round(intval($params->item_width));
            $height = round(intval($params->item_height));

            //$girth = (($width * 2) + ($height * 2));

            // Step 2
            $cubicSize = ($length * $width * $height);

            // Step 3
            $dimWeight = round($cubicSize / $dimension);
            
            // get billable weight
            $bWeight = max($actualWeight, $dimWeight);

            if($bWeight > 100 && $bWeight < 299){
                $shipFee = ($bWeight * 6.52);
            }

            $output = "Actual Weight : ".number_format($actualWeight)." kg<br />";
            $output.= "Length : ".number_format($length)." cm<br />";
            $output.= "Width : ".number_format($width)." cm<br />";
            $output.= "Height : ".number_format($height)." cm<br />";
            $output.= "Cubic Size : ".number_format($cubicSize)." cm<br />";
            $output.= "Dimensional Weight : ".number_format($dimWeight)." kg<br />";
            $output.= "Billable Weight : ".number_format($bWeight)." kg<br />";
            $output.= "Shipment Fee : $ ".number_format($shipFee);

            echo $output;
        }

        $this->load->view('page/shipment_form');
    }
}
