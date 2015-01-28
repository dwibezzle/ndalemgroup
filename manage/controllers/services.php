<?php
class Services extends CI_Controller {
    private $menu ;
    public function __construct()
       {
            parent::__construct();
            $this->load->helper(array('url','form','html'));
            $this->load->library(array('session','form_validation'));
            $this->load->model(array('Operasional_mod','Laporan_mod','Biayahpp_mod'));
            // if(!$this->Auth_n_menu->get_auth(1000)) redirect("/login");
            // $this->menu['menu_headers']=$this->Auth_n_menu->get_menu();
            
            // $link = $this->uri->segment(1)."/".$this->uri->segment(2);
            
       }
       
    public function index()
    {    
        exit();
    }

    function piutang_konsumen($idppjb=null)
    {
        $this->db->join('ppjb','pembayaran_ppjb.idppjb=ppjb.idppjb');
        $this->db->where('pembayaran_ppjb.idppjb',$idppjb);
        $this->db->group_by('pembayaran_ppjb.tanggal');
        $data['te']=$this->db->get('pembayaran_ppjb')->result_array();
        $ret = json_encode($data['te']);

        echo $ret;
        die();


    }    
}
?>