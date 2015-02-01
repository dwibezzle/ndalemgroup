<?php
class Reminders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('input');
    }

    public function index()
    {
        if(!$this->input->is_cli_request())
        {
            echo "cobain command line" . PHP_EOL;
            return;
        }
    }
}