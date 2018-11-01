<?php 
 
if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Our_Chart extends CI_Controller 
 
    { 
    function __construct() 
        { 
        parent::__construct(); 
        $this->load->model('Our_chart_model'); 
 
        // $this->load->library('form_validation'); 
 
        $this->load->helper('string'); 
        } 
 
    public 
 
    function index() 
        {
            $this->template->load('template','Chart_view');
            //$this->load->view('Chart_view'); 
        } 
 
    public 
 
    function getdata() 
        { 
        $data = $this->Our_chart_model->get_all_fruits(); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->fruits_name", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->quantity, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce); 
        } 
    }