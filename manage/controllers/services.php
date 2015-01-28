<?php
class Services extends CI_Controller {
    private $menu ;
    public function __construct()
       {
            parent::__construct();
            $this->load->helper(array('url','form','html'));
            $this->load->library(array('session','form_validation'));
            $this->load->model(array('Operasional_mod','Laporan_mod','Biayahpp_mod'));            
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
    // http://localhost:8080/ndalemgroup/services/piutang_konsumen/001

    function piutang_borongan_kavling($idkbk=null)
    {
        $this->db->join('kbk','pembayaran_kbk.idkbk=kbk.idkbk');
        $this->db->join('ppjb','kbk.idppjb=ppjb.idppjb');
        $this->db->join('data_kavling','data_kavling.idkavling = kbk.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->order_by('pembayaran_kbk.target','ASC');
        $this->db->where('kbk.idkbk',$idkbk);
        $this->db->where('pembayaran_kbk.status',"Hutang");

        $gut= $this->db->get('pembayaran_kbk')->result_array();
        $ret = json_encode($gut);

        echo $ret;
        die();
    }  
    // http://localhost:8080/ndalemgroup/services/piutang_borongan_kavling/001

    function piutang_borongan_falum($idkbf=null)
    {
        $this->db->join('kbf','pembayaran_kbf.idkbf=kbf.idkbf');
        $this->db->join('ppjb','kbf.idppjb=ppjb.idppjb');
        $this->db->join('data_kavling','data_kavling.idkavling = kbf.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->where('kbf.idkbf',$idkbf);
        // $this->db->where('status',"Hutang");
        $this->db->order_by('pembayaran_kbf.target','ASC');
        $gut= $this->db->get('pembayaran_kbf')->result_array();
        $ret = json_encode($gut);

        echo $ret;
        die();
    } 
    // http://localhost:8080/ndalemgroup/services/piutang_borongan_falum/001

    function piutang_borongan_lain($id_hutang_lain=null)
    {
        // $this->db->select('id_bayar, tgl_rencana, jumlah');
        $this->db->join('hutang_lain','pembayaran_hutang_lain.id_hutang_lain=hutang_lain.id_hutang_lain');
        $this->db->join('data_perumahan','data_perumahan.idperum = hutang_lain.id_perum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->where('hutang_lain.id_hutang_lain',$id_hutang_lain);
        $this->db->where('status',"Hutang");

        $gut= $this->db->get('pembayaran_hutang_lain')->result_array();
        $ret = json_encode($gut);

        echo $ret;
        die();
    }    
    // http://localhost:8080/ndalemgroup/services/piutang_borongan_lain/2
}
?>