<?php
class Laporan extends CI_Controller {
    private $menu ;
    public function __construct()
       {
            parent::__construct();
            $this->load->helper(array('url','form','html'));
            $this->load->library(array('session','form_validation'));
            $this->load->model(array('Auth_n_menu','Operasional_mod','Laporan_mod','Biayahpp_mod'));
            if(!$this->Auth_n_menu->get_auth(1000)) redirect("/login");
            $this->menu['menu_headers']=$this->Auth_n_menu->get_menu();
            
            $link = $this->uri->segment(1)."/".$this->uri->segment(2);
            if(!$this->input->post()){
                $cek=$this->db->get_where('adm_menu',array('url'=>$link))->num_rows();
                if($cek > 0){
                    if($link==TRUE AND $this->uri->segment(3)==""){ if(!$this->Auth_n_menu->cek_permision_menu($link)) redirect("/");}
                }
            }
       }
       
    public function index()
    {    
        redirect('/home');
    }

//Laporan Operasional
//===================================    
    public function ajb()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['ajb']=$this->Laporan_mod->ambil_data_ajb()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $hasil['ajb']=$this->Laporan_mod->ambil_data_ajb()->result();
                $this->load->view('laporan/ajb/view',$hasil);
            }else{
                $this->load->view('laporan/ajb/view',$hasil);
            }
        }else{
            $this->load->view('laporan/ajb/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function ajb_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['ajb']=$this->Laporan_mod->ambil_data_ajb()->result();
        $this->load->view('laporan/ajb/detail',$hasil);
    }
    
//tabel laporan     
    public function psjb()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['psjb']=$this->Laporan_mod->ambil_data_psjb()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $hasil['psjb']=$this->Laporan_mod->ambil_data_psjb()->result();
                $this->load->view('laporan/psjb/view',$hasil);
            }else{
                $this->load->view('laporan/psjb/view',$hasil);
            }
        }else{
            $this->load->view('laporan/psjb/view',$hasil);
        }
        
        $this->load->view('footer');
    }
    
    public function psjb_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['psjb']=$this->Laporan_mod->ambil_data_psjb()->result();
        $this->load->view('laporan/psjb/detail',$hasil);
    }
    
    public function ppjb()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['ppjb']=$this->Laporan_mod->ambil_data_ppjb()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) 
            {
                $hasil['ppjb']=$this->Laporan_mod->ambil_data_ppjb()->result();
                $this->load->view('laporan/ppjb/view',$hasil);
            }
            else
            {
                $this->load->view('laporan/ppjb/view',$hasil);
            }
        }else{
            $this->load->view('laporan/ppjb/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function ppjb_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['ppjb']=$this->Laporan_mod->ambil_data_ppjb()->result();
        $this->load->view('laporan/ppjb/detail',$hasil);
    }

    public function spmb()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['spmb']=$this->Laporan_mod->ambil_data_spmb()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $hasil['spmb']=$this->Laporan_mod->ambil_data_spmb()->result();
                $this->load->view('laporan/spmb/view',$hasil);
            }else{
                $this->load->view('laporan/spmb/view',$hasil);
            }
        }else{
            $this->load->view('laporan/spmb/view',$hasil);
        }
        
        $this->load->view('footer');
    }
    
    public function spmb_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['spmb']=$this->Laporan_mod->ambil_data_spmb()->result();
        $this->load->view('laporan/spmb/detail',$hasil);
    }
    
    public function kbk()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['kbk']=$this->Laporan_mod->ambil_data_kbk()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $hasil['kbk']=$this->Laporan_mod->ambil_data_kbk()->result();
                $this->load->view('laporan/kbk/view',$hasil);
            }else{
                $this->load->view('laporan/kbk/view',$hasil);
            }
        }else{
            $this->load->view('laporan/kbk/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function kbk_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['kbk']=$this->Laporan_mod->ambil_data_kbk()->result();
        $this->load->view('laporan/kbk/detail',$hasil);
    }
    
    public function kbf()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['kbf']=$this->Laporan_mod->ambil_data_kbf()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $hasil['kbf']=$this->Laporan_mod->ambil_data_kbf()->result();
                $this->load->view('laporan/kbf/view',$hasil);
            }else{
                $this->load->view('laporan/kbf/view',$hasil);
            }
        }else{
            $this->load->view('laporan/kbf/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function kbf_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['kbf']=$this->Laporan_mod->ambil_data_kbf()->result();
        $this->load->view('laporan/kbf/detail',$hasil);
    }
    
    public function stp()
    {    
        $this->load->view('head',$this->menu);
        
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['stp']=$this->Laporan_mod->ambil_data_stp()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $hasil['stp']=$this->Laporan_mod->ambil_data_stp()->result();
                $this->load->view('laporan/stp/view',$hasil);
            }else{
                $this->load->view('laporan/stp/view',$hasil);
            }
        }else{
            $this->load->view('laporan/stp/view',$hasil);
        }
        
        $this->load->view('footer');
    }
    
    public function stp_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['stp']=$this->Laporan_mod->ambil_data_stp()->result();
        $this->load->view('laporan/stp/detail',$hasil);
    }
    
    public function bast()
    {    
        $this->load->view('head',$this->menu);
        
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['bast']=$this->Laporan_mod->ambil_data_bast()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $hasil['bast']=$this->Laporan_mod->ambil_data_bast()->result();
                $this->load->view('laporan/bast/view',$hasil);
            }else{
                $this->load->view('laporan/bast/view',$hasil);
            }
        }else{
            $this->load->view('laporan/bast/view',$hasil);
        }
        
        $this->load->view('footer');
    }
    
    public function bast_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['bast']=$this->Laporan_mod->ambil_data_bast()->result();
        $this->load->view('laporan/bast/detail',$hasil);
    }
    
    
    
//Laporan Keuangan
//===================================
    public function penerimaan_modal()
    {
        $this->load->view('head',$this->menu);
        
        //$hasil['sumpenerimaan']=$this->Laporan_mod->sum_data_penerimaan_lain()->row();
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_modal']=$this->Laporan_mod->ambil_data_penerimaan_modal()->result();
        
        if($this->input->post('view_laporan'))
        {

            $this->load->view('laporan/penerimaan_modal/view',$hasil);
        }
        else
        {
            $this->load->view('laporan/penerimaan_modal/view',$hasil);
        }
        
        $this->load->view('footer');
    }
    public function penerimaan_modal_print()
    {
        //$hasil['sumpenerimaan']=$this->Laporan_mod->sum_data_penerimaan_lain()->row();
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_modal']=$this->Laporan_mod->ambil_data_penerimaan_modal()->result();

        $this->load->view('laporan/penerimaan_modal/detail',$hasil);
    }
    public function penerimaan_cash_bank()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_cash_bank']=$this->Laporan_mod->ambil_data_penerimaan_cash_bank()->result();
        
        if($this->input->post('view_laporan'))
        {
            $this->load->view('laporan/penerimaan_cash_bank/view',$hasil);
        }
        else
        {
            //print_r($hasil['penerimaan_cash_bank']);exit();
            $this->load->view('laporan/penerimaan_cash_bank/view',$hasil);
        }
            
        $this->load->view('footer');
    }

    public function penerimaan_cash_bank_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_cash_bank']=$this->Laporan_mod->ambil_data_penerimaan_cash_bank()->result();
        $this->load->view('laporan/penerimaan_cash_bank/detail',$hasil);
    }
    public function penerimaan_kpr()
    {
        $this->load->view('head',$this->menu);
        
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_kpr']=$this->Laporan_mod->ambil_data_penerimaan_kpr()->result();
        
        if($this->input->post('view_laporan')){
            $this->load->view('laporan/penerimaan_kpr/view',$hasil);
        }else{
            $this->load->view('laporan/penerimaan_kpr/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function penerimaan_kpr_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_kpr']=$this->Laporan_mod->ambil_data_penerimaan_kpr()->result();
        $this->load->view('laporan/penerimaan_kpr/detail',$hasil);
    }
    
    
    public function penerimaan_lain()
    {
        $this->load->view('head',$this->menu);
        
        //$hasil['sumpenerimaan']=$this->Laporan_mod->sum_data_penerimaan_lain()->row();
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_lain']=$this->Laporan_mod->ambil_data_penerimaan_lain()->result();
        
        if($this->input->post('view_laporan'))
        {

            $this->load->view('laporan/penerimaan_lain/view',$hasil);
        }
        else
        {
            $this->load->view('laporan/penerimaan_lain/view',$hasil);
        }
        
        $this->load->view('footer');
    }
    function dropdown($table,$txt=NULL,$value,$name,$where=NULL, $separator=NULL, $order_by=NULL, $order_sort=NULL)
    {
        if($order_by !=NULL)
            $this->db->order_by($order_by, $order_sort);

        if($where == NULL)
        {
            $get = $this->db->get($table)->result();
        }
        else
        {
            $get = $this->db->get_where($table,$where)->result();
        }

        $dropdown = $txt != NULL ? is_array($txt) ? $txt : array("" => $txt) : array();
        $nama = "";

        foreach($get as $key)
        {
            if(is_array($name))
            {
                foreach($name as $val)
                {
                    $nama .= $key->$val.$separator;
                }
                $nama = rtrim($nama, $separator);
            }
            else
            {
                $nama = $key->$name;
            }

            $dropdown[$key->$value] = $nama;
            $nama = "";
        }
        return $dropdown;
    }
    public function penerimaan_lain_print()
    {
        //$hasil['sumpenerimaan']=$this->Laporan_mod->sum_data_penerimaan_lain()->row();
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['penerimaan_lain']=$this->Laporan_mod->ambil_data_penerimaan_lain()->result();

        $this->load->view('laporan/penerimaan_lain/detail',$hasil);
    }
    
    
    public function hpp()
    {
        $this->load->view('head',$this->menu);
    /*if($_POST)
        {
            print_r($_POST);exit();
        }*/
        $hasil['hhp_op']=$this->Laporan_mod->hpp_operator_dropdown()->result();
        $hasil['drop_perumahan']= $this->dropdown('data_perumahan','-pilih perumahan','idperum','judul_perum');
        $datak=$this->input->post('perum');
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                if ($this->input->post('jenishpp')=='1') { //tanah
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_tanah($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='2') { //Pengolahan Lahan
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_lahan($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='3') { //Prasarana Sarana
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_sarana($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='4') { //Konstruksi Rumah
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_konstruksi($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='5') { //Perinjinan Proyek
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_perijinan($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='6') { //Legalitas Proyek
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_legproyek($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='7') { //Legalitas Penjualan
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_legpenjualan($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='8') { //Manajemen
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_managemen($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='9') { //Administrasi Umum
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_adumum($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }elseif ($this->input->post('jenishpp')=='10') { //Lain-Lain
                    $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_lain($datak)->result();
                    $this->load->view('laporan/hpp/view_report',$hasil);
                }else{
                    $hasil['hpptanah']=$this->Laporan_mod->laporan_data_hpp_tanah()->result();
                    $hasil['hpplahan']=$this->Laporan_mod->laporan_data_hpp_lahan()->result();
                    $hasil['hppsarana']=$this->Laporan_mod->laporan_data_hpp_sarana()->result();
                    $hasil['hppkonstruksi']=$this->Laporan_mod->laporan_data_hpp_konstruksi()->result();
                    $hasil['hppperinjinan']=$this->Laporan_mod->laporan_data_hpp_perijinan()->result();
                    $hasil['hpplegproyek']=$this->Laporan_mod->laporan_data_hpp_legproyek()->result();
                    $hasil['hpplegpenjualan']=$this->Laporan_mod->laporan_data_hpp_legpenjualan()->result();
                    $hasil['hppmanagemen']=$this->Laporan_mod->laporan_data_hpp_managemen()->result();
                    $hasil['hppadumum']=$this->Laporan_mod->laporan_data_hpp_adumum()->result();
                    $hasil['hpplain']=$this->Laporan_mod->laporan_data_hpp_lain()->result();

                    $this->load->view('laporan/hpp/view_report',$hasil);
                }
            }else{
                redirect('/laporan/hpp');
            }
        }else{
            $hasil['hpptanah']=$this->Laporan_mod->laporan_data_hpp_tanah()->result();
            $hasil['hpplahan']=$this->Laporan_mod->laporan_data_hpp_lahan()->result();
            $hasil['hppsarana']=$this->Laporan_mod->laporan_data_hpp_sarana()->result();
            $hasil['hppkonstruksi']=$this->Laporan_mod->laporan_data_hpp_konstruksi()->result();
            $hasil['hppperinjinan']=$this->Laporan_mod->laporan_data_hpp_perijinan()->result();
            $hasil['hpplegproyek']=$this->Laporan_mod->laporan_data_hpp_legproyek()->result();
            $hasil['hpplegpenjualan']=$this->Laporan_mod->laporan_data_hpp_legpenjualan()->result();
            $hasil['hppmanagemen']=$this->Laporan_mod->laporan_data_hpp_managemen()->result();
            $hasil['hppadumum']=$this->Laporan_mod->laporan_data_hpp_adumum()->result();
            $hasil['hpplain']=$this->Laporan_mod->laporan_data_hpp_lain()->result();

            $this->load->view('laporan/hpp/view_report',$hasil);
        }
        
        $this->load->view('footer');
    }
    
    public function hpp_print()
    {
        $hasil['hhp_op']=$this->Laporan_mod->hpp_operator_dropdown()->result();
        $jenishpp = $this->uri->segment(8);
        $datak=$this->uri->segment(9);

        if ($jenishpp=='1') { //tanah
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_tanah($datak)->result();
            $this->load->view('laporan/hpp/print_report_tanah',$hasil);
        }elseif ($jenishpp=='2') { //Pengolahan Lahan
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_lahan($datak)->result();
            $this->load->view('laporan/hpp/print_report_lahan',$hasil);
        }elseif ($jenishpp=='3') { //Prasarana Sarana
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_sarana($datak)->result();
            $this->load->view('laporan/hpp/print_report_sarana',$hasil);
        }elseif ($jenishpp=='4') { //Konstruksi Rumah
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_konstruksi($datak)->result();
            $this->load->view('laporan/hpp/print_report_konstruksi',$hasil);
        }elseif ($jenishpp=='5') { //Perinjinan Proyek
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_perijinan($datak)->result();
            $this->load->view('laporan/hpp/print_report_perijinan',$hasil);
        }elseif ($jenishpp=='6') { //Legalitas Proyek
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_legproyek($datak)->result();
            $this->load->view('laporan/hpp/print_report_legproyek',$hasil);
        }elseif ($jenishpp=='7') { //Legalitas Penjualan
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_legpenjualan($datak)->result();
            $this->load->view('laporan/hpp/print_report_legpenjualan',$hasil);
        }elseif ($jenishpp=='8') { //Manajemen
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_managemen($datak)->result();
            $this->load->view('laporan/hpp/print_report_managemen',$hasil);
        }elseif ($jenishpp=='9') { //Administrasi Umum
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_adumum($datak)->result();
            $this->load->view('laporan/hpp/print_report_adumum',$hasil);
        }elseif ($jenishpp=='10') { //Lain-Lain
            $hasil['reporthpppilihan']=$this->Laporan_mod->laporan_data_hpp_lain($datak)->result();
            $this->load->view('laporan/hpp/print_report_lain',$hasil);
        }else{
            redirect('/laporan/hpp');
        }
    }
    function piutang2()
    {
        $this->load->view('head',$this->menu);
        $this->db->join('ppjb','pembayaran_ppjb.idppjb=ppjb.idppjb');
        $this->db->join('data_perumahan','ppjb.idperum=data_perumahan.idperum');
        $this->db->join('data_kavling','ppjb.idkavling=data_kavling.idkavling');
        $this->db->where('ppjb.status','dom');
        $this->db->where('ppjb.pimpinan !=','menunggu');
        $this->db->group_by('ppjb.idppjb');
        if($this->session->userdata('id_role') != '6')
        {
            $this->db->where('ppjb.idperum',$this->session->userdata('idperum'));
        }
        $data['list']=$this->db->get('pembayaran_ppjb')->result();
        $this->load->view('laporan/piutang/view2',$data);
        $this->load->view('footer');
    }
    function rekap_hutang_kbk()
    {

        $this->load->view('head',$this->menu);
        //echo "<pre>";print_r ($this->session->all_userdata());exit();
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL)
        {
            $this->db->where('pembayaran_kbk.tglapprove >=',$tglaw);
            $this->db->where('pembayaran_kbk.tglapprove <=',$tglak);
        }
                        $this->db->select('pembayaran_kbk.*,data_perumahan.judul_perum');
                        $this->db->join('kbk','pembayaran_kbk.idkbk=kbk.idkbk');
                        $this->db->join('data_perumahan','kbk.idperum=data_perumahan.idperum');
                        $this->db->join('data_bank','pembayaran_kbk.idbank=data_bank.idbank');
                        if($this->session->userdata('id_role') != '6')
                        {
                            $this->db->where('kbk.idperum',$this->session->userdata('idperum'));
                        }
                        $this->db->where('pembayaran_kbk.status','lunas');
                        $this->db->or_where('pembayaran_kbk.status','proses');
                        $this->db->order_by('pembayaran_kbk.tglapprove','DESC');

        $data['list'] = $this->db->get('pembayaran_kbk')->result();

        //echo "<pre>"; print_r($data['list']);exit();
        $this->load->view('laporan/hutang/rekap_hutang_kbk',$data);
        $this->load->view('footer');
    }
    function cetak_rekap_hutang_kbk()
    {
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL)
        {
            $this->db->where('pembayaran_kbk.tglapprove >=',$tglaw);
            $this->db->where('pembayaran_kbk.tglapprove <=',$tglak);
        }
                        $this->db->join('data_bank','pembayaran_kbk.idbank=data_bank.idbank');
                        $this->db->where('pembayaran_kbk.status','lunas');
                        $this->db->or_where('pembayaran_kbk.status','proses');
                        $this->db->order_by('pembayaran_kbk.tglapprove','DESC');

        $data['list'] = $this->db->get('pembayaran_kbk')->result();

        //echo "<pre>"; print_r($data['list']);exit();
        $this->load->view('laporan/hutang/cetak_rekap_hutang_kbk',$data);
        
    }
    function rekap_hutang_kbf()
    {

        $this->load->view('head',$this->menu);
        //echo "<pre>";print_r ($this->session->all_userdata());exit();
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL)
        {
            $this->db->where('pembayaran_kbf.tglapprove >=',$tglaw);
            $this->db->where('pembayaran_kbf.tglapprove <=',$tglak);
        }
                        $this->db->select('pembayaran_kbf.*,data_perumahan.judul_perum,kbf.jenispekerjaan');
                        $this->db->join('kbf','pembayaran_kbf.idkbf=kbf.idkbf');
                        $this->db->join('data_perumahan','kbf.idperum=data_perumahan.idperum');
                        $this->db->join('data_bank','pembayaran_kbf.idbank=data_bank.idbank');
                        if($this->session->userdata('id_role') != '6')
                        {
                            $this->db->where('kbf.idperum',$this->session->userdata('idperum'));
                        }
                        $this->db->where('pembayaran_kbf.status','lunas');
                        $this->db->or_where('pembayaran_kbf.status','proses');
                        $this->db->order_by('pembayaran_kbf.tglapprove','DESC');

        $data['list'] = $this->db->get('pembayaran_kbf')->result();

        //echo "<pre>"; print_r($data['list']);exit();
        $this->load->view('laporan/hutang/rekap_hutang_kbf',$data);
        $this->load->view('footer');
    }
    function cetak_rekap_hutang_kbf()
    {
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL)
        {
            $this->db->where('pembayaran_kbf.tglapprove >=',$tglaw);
            $this->db->where('pembayaran_kbf.tglapprove <=',$tglak);
        }
                        //$this->db->join('kbf','pembayaran_kbf.idkbf=kbf.idkbf');
                        $this->db->join('data_bank','pembayaran_kbf.idbank=data_bank.idbank');
                        $this->db->where('pembayaran_kbf.status','lunas');
                        $this->db->or_where('pembayaran_kbf.status','proses');
                        $this->db->order_by('pembayaran_kbf.tglapprove','DESC');

        $data['list'] = $this->db->get('pembayaran_kbf')->result();

        //echo "<pre>"; print_r($data['list']);exit();
        $this->load->view('laporan/hutang/cetak_rekap_hutang_kbf',$data);
        
    }
    function rekap_hutang_lain_lain()
    {

        $this->load->view('head',$this->menu);
        //echo "<pre>";print_r ($this->session->all_userdata());exit();
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL)
        {
            $this->db->where('pembayaran_hutang_lain.tgl_realisasi >=',$tglaw);
            $this->db->where('pembayaran_hutang_lain.tgl_realisasi <=',$tglak);
        }
                        $this->db->join('hutang_lain','pembayaran_hutang_lain.id_hutang_lain=hutang_lain.id_hutang_lain');
                        $this->db->join('data_perumahan','hutang_lain.id_perum=data_perumahan.idperum');
                        $this->db->join('data_bank','pembayaran_hutang_lain.id_bank=data_bank.idbank');
                        if($this->session->userdata('id_role') !='6')
                        {
                            $this->db->where('hutang_lain.id_perum',$this->session->userdata('idperum'));
                        }
                        $this->db->where('pembayaran_hutang_lain.status','lunas');
                        $this->db->or_where('pembayaran_hutang_lain.status','proses');
                        $this->db->order_by('pembayaran_hutang_lain.tgl_realisasi','DESC');

        $data['list'] = $this->db->get('pembayaran_hutang_lain')->result();

        //echo "<pre>"; print_r($data['list']);exit();
        $this->load->view('laporan/hutang/rekap_hutang_lain_lain',$data);
        $this->load->view('footer');
    }
    function cetak_rekap_hutang_lain_lain()
    {
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL)
        {
            $this->db->where('pembayaran_hutang_lain.tgl_realisasi >=',$tglaw);
            $this->db->where('pembayaran_hutang_lain.tgl_realisasi <=',$tglak);
        }
                        $this->db->join('hutang_lain','pembayaran_hutang_lain.id_hutang_lain=hutang_lain.id_hutang_lain');
                        $this->db->join('data_bank','pembayaran_hutang_lain.id_bank=data_bank.idbank');
                        $this->db->where('pembayaran_hutang_lain.status','lunas');
                        $this->db->or_where('pembayaran_hutang_lain.status','proses');
                        $this->db->order_by('pembayaran_hutang_lain.tgl_realisasi','DESC');

        $data['list'] = $this->db->get('pembayaran_hutang_lain')->result();

        //echo "<pre>"; print_r($data['list']);exit();
        $this->load->view('laporan/hutang/cetak_rekap_hutang_lain_lain',$data);
        
    } 
    function cek_tanggal_rencana_bayar($idbayar)
    {
        $this->db->select('tanggal');
        $this->db->where('idbayar',$idbayar);
        $ret = $this->db->get('pembayaran_ppjb')->row('tanggal');

        return $ret;
    }
    function cetak_kpk($idppjb=null)
    {
        $this->db->join('pembayaran_ppjb','penerimaan.idbayar=pembayaran_ppjb.idbayar');
        $this->db->join('ppjb','pembayaran_ppjb.idppjb=ppjb.idppjb');
        $this->db->join('data_perumahan','ppjb.idperum=data_perumahan.idperum');
        $this->db->join('data_kavling','ppjb.idkavling=data_kavling.idkavling');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->where('ppjb.status','dom');
        $this->db->where('ppjb.pimpinan !=','menunggu');
        $this->db->where('pembayaran_ppjb.idppjb',$idppjb);
        $this->db->order_by('penerimaan.tanggal_bayar','ASC');
        $det=$this->db->get('penerimaan');
        // Clear any existing output (optional) ob_clean(); 
        // echo '<pre>'; echo $this->db->last_query(); 
        // Stop PHP from doing anything else (optional) 
        // exit(); 
        $data['cek'] = $det->row();
        $data['li']  = $det->result();

        /*rencana*/
        $this->db->join('ppjb','pembayaran_ppjb.idppjb=ppjb.idppjb');
        $this->db->where('pembayaran_ppjb.idppjb',$idppjb);
        $this->db->group_by('pembayaran_ppjb.tanggal');
        $data['te']=$this->db->get('pembayaran_ppjb')->result();
        //echo "<pre>";print_r($data['tt']);exit();
        $this->load->view('laporan/piutang/detail2',$data);
    }
    function jumlah_dp($idppjb=null)
    {
        $this->db->select_sum('pembayaran_ppjb.jumlah');
        $this->db->where('pembayaran_ppjb.idppjb',$idppjb);
        $data= $this->db->get('pembayaran_ppjb')->row();
        return $data;
    }
    public function piutang()
    {
        $this->load->view('head',$this->menu);
            
        if($this->input->post('submit_form')){
            $dtno = $this->input->post('formppjb');
            if($dtno != NULL){
                $no_ppjb = explode('/',strtolower($dtno));
                $id = $no_ppjb[0];
                
                $hasil['cek']      = $this->Laporan_mod->ambil_data_id_kartupiutang($id)->row();
                $hasil['terbayar'] = $this->Laporan_mod->ambil_data_id_kartupiutang_terbayar($id)->result();
                $hasil['rencana']  = $this->Laporan_mod->ambil_data_id_kartupiutang($id)->result();
                if($hasil['cek']== TRUE)
                {
                    //echo "<pre>"; print_r($hasil['cek']);echo"</pre>";
                    $this->load->view('laporan/piutang/view',$hasil);
                }
                else
                {
                    redirect('laporan/piutang');
                }
                }else{
                redirect('laporan/piutang');
            }
        }elseif($this->input->post('print_form')){
            $dtno = $this->input->post('nomor');
            if($dtno != NULL){
                $no_ppjb = explode('/',strtolower($dtno));
                $id = $no_ppjb[0];
                $hasil['tanggalbayarkpr']= $this->Laporan_mod->ambil_tgl_bayar_kpr($id)->row();
                $hasil['cek']            = $this->Laporan_mod->ambil_data_id_kartupiutang($id)->row();
                $hasil['terbayar']       = $this->Laporan_mod->ambil_data_id_kartupiutang_terbayar($id)->result();
                $hasil['rencana']        = $this->Laporan_mod->ambil_data_id_kartupiutang($id)->result();
                if($hasil['cek']== TRUE){
                    $this->load->view('laporan/piutang/detail',$hasil);
                }else{
                    redirect('laporan/piutang');
                }
            }else{
                redirect('laporan/piutang');
            }
        }else{
            $this->load->view('laporan/piutang/view');
        }
        
        $this->load->view('footer');
    }
    function hutang_general()
    {    
        $this->load->view('head',$this->menu);
        $this->load->view('laporan/hutang/general_view');
        $this->load->view('footer');
    }
    function hutang_lain_lain()
    {
        $this->load->view('head',$this->menu);

                        $this->db->join('data_perumahan','hutang_lain.id_perum=data_perumahan.idperum');
                        if($this->session->userdata('id_role') !='6')
                        {
                            $this->db->where('hutang_lain.id_perum',$this->session->userdata('idperum'));
                        }
        $data['list'] = $this->db->get('hutang_lain')->result();
        $this->load->view('laporan/hutang/view_lain_lain',$data);
        $this->load->view('footer');
    }
    function cetak_lain_lain($id_hutang_lain)
    {
                        $this->db->join('hutang_lain','pembayaran_hutang_lain.id_hutang_lain=hutang_lain.id_hutang_lain');
                        $this->db->join('data_perumahan','data_perumahan.idperum = hutang_lain.id_perum','left');
                        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
                        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
                        $this->db->where('hutang_lain.id_hutang_lain',$id_hutang_lain);

        $gut= $this->db->get('pembayaran_hutang_lain');
        // echo '<pre>'; echo $this->db->last_query(); exit();
        $data['cek']     = $gut->row();
        $data['rencana'] = $gut->result();
                           
                           $this->db->where('pembayaran_hutang_lain.id_hutang_lain',$id_hutang_lain);
                           $this->db->where_in('pembayaran_hutang_lain.status',array('lunas','proses'));
        $data['terbayar']= $this->db->get('pembayaran_hutang_lain')->result();
        
        $this->load->view('laporan/hutang/cetak_lain_lain',$data);
    }
    function hutang_kbf()
    {
        $this->load->view('head',$this->menu);

                        $this->db->join('data_perumahan','kbf.idperum=.data_perumahan.idperum');
                        if($this->session->userdata('id_role')!='6')
                        {
                            $this->db->where('kbf.idperum',$this->session->userdata('idperum'));
                        }
        $data['list'] = $this->db->get('kbf')->result();
        $this->load->view('laporan/hutang/view_kbf',$data);
        $this->load->view('footer');
    }
    function cetak_kbf($idkbf)
    {
            
                        $this->db->join('kbf','pembayaran_kbf.idkbf=kbf.idkbf');
                        $this->db->join('ppjb','kbf.idppjb=ppjb.idppjb');
                        $this->db->join('data_kavling','data_kavling.idkavling = kbf.idkavling','left');
                        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
                        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
                        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
                        $this->db->where('kbf.idkbf',$idkbf);
                        $this->db->order_by('pembayaran_kbf.target','ASC');
        $gut= $this->db->get('pembayaran_kbf');
        $data['cek']     = $gut->row();
        $data['rencana'] = $gut->result();

                           $this->db->where('pembayaran_kbf.idkbf',$idkbf);
                           $this->db->where_in('pembayaran_kbf.status',array('lunas','proses'));
                           $this->db->order_by('pembayaran_kbf.target','ASC');
        $data['terbayar']= $this->db->get('pembayaran_kbf')->result();
        // echo '<pre>'; echo $this->db->last_query(); exit();
    
        $this->load->view('laporan/hutang/cetak_kbf',$data);
    }
    function cek_rencana_kbf($idbayar)
    {
            $this->db->select('tanggal');
            $this->db->where('idbayar',$idbayar);
        $ct=$this->db->get('pembayaran_kbf')->row('tanggal');


        return $ct;

    }
    function hutang_kbk()
    {
        $this->load->view('head',$this->menu);

                        $this->db->join('data_perumahan','kbk.idperum=.data_perumahan.idperum');
                        if($this->session->userdata('id_role')!='6')
                        {
                            $this->db->where('kbk.idperum',$this->session->userdata('idperum'));
                        }
                        
        $data['list'] = $this->db->get('kbk')->result();
        $this->load->view('laporan/hutang/view_kbk',$data);
        $this->load->view('footer');
    }
    function cetak_kbk($idkbk)
    {
            
                        $this->db->join('kbk','pembayaran_kbk.idkbk=kbk.idkbk');
                        $this->db->join('ppjb','kbk.idppjb=ppjb.idppjb');
                        $this->db->join('data_kavling','data_kavling.idkavling = kbk.idkavling','left');
                        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
                        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
                        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
                        $this->db->order_by('pembayaran_kbk.target','ASC');
                        $this->db->where('kbk.idkbk',$idkbk);

        $gut= $this->db->get('pembayaran_kbk');


        $data['cek']     = $gut->row();
        $data['rencana'] = $gut->result();
        // echo "<pre>";print_r($data['cek']);exit();
      /*$this->db->select('pembayaran_kbk.pimpinan,pembayaran_kbk.tglapprove,pembayaran_kbk.jumlah');*/
                           

                           $this->db->where('pembayaran_kbk.idkbk',$idkbk);
                           $this->db->where_in('pembayaran_kbk.status',array('proses','lunas'));
                           $this->db->order_by('pembayaran_kbk.target','ASC');
        $data['terbayar']= $this->db->get('pembayaran_kbk')->result();
        //echo "<pre>";print_r($data['terbayar']);exit();

        $this->load->view('laporan/hutang/cetak_kbk',$data);
    }
    function cek_rencana_kbk($idbayar)
    {
            $this->db->select('tanggal');
            $this->db->where('idbayar',$idbayar);
        $ct=$this->db->get('pembayaran_kbk')->row('tanggal');


        return $ct;

    }
    public function hutang()
    {
        $this->load->view('head',$this->menu);
            
        if($this->input->post('submit_form')){
            $jeniskbs = $this->input->post('jeniskb');
            $dtno = $this->input->post('nokbkkbf');
            if($dtno != NULL){
                $no_ppjb = explode('/',strtolower($dtno));
                $id = $no_ppjb[0];
                if($jeniskbs=='KBK'){
                    $hasil['cek'] = $this->Operasional_mod->ambil_data_id_kbkpembayaran($id)->row();
                    $hasil['terbayar'] = $this->Operasional_mod->ambil_data_id_kbkpembayaran($id)->result();
                }elseif($jeniskbs=='KBF'){
                    $hasil['cek'] = $this->Operasional_mod->ambil_data_id_kbfpembayaran($id)->row();
                    $hasil['terbayar'] = $this->Operasional_mod->ambil_data_id_kbfpembayaran($id)->result();
                }elseif($jeniskbs=='1'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_1($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_1($id)->result();
                }elseif($jeniskbs=='2'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_2($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_2($id)->result();
                }elseif($jeniskbs=='3'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_3($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_3($id)->result();
                }elseif($jeniskbs=='4'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_4($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_4($id)->result();
                }elseif($jeniskbs=='5'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_5($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_5($id)->result();
                }elseif($jeniskbs=='6'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_6($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_6($id)->result();
                }elseif($jeniskbs=='7'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_7($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_7($id)->result();
                }elseif($jeniskbs=='8'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_8($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_8($id)->result();
                }elseif($jeniskbs=='9'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_9($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_9($id)->result();
                }elseif($jeniskbs=='10'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_10($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_10($id)->result();
                }
                
                if($hasil['cek']== TRUE){
                    $this->load->view('laporan/hutang/view',$hasil);
                }else{
                    redirect('laporan/hutang');
                }
            }else{
                redirect('laporan/hutang');
            }
        }elseif($this->input->post('print_form')){
            $jeniskbs = $this->input->post('jeniskb');
            $dtno = $this->input->post('nokbkkbf');
            if($dtno != NULL){
                $no_ppjb = explode('/',strtolower($dtno));
                $id = $no_ppjb[0];
                if($jeniskbs=='KBK'){
                    $hasil['cek'] = $this->Operasional_mod->ambil_data_id_kbkpembayaran($id)->row();
                    $hasil['terbayar'] = $this->Laporan_mod->ambil_data_id_kbkpembayaran_lunas($id)->result();
                    $hasil['rencana'] = $this->Operasional_mod->ambil_data_id_kbkpembayaran($id)->result();
                }elseif($jeniskbs=='KBF'){
                    $hasil['cek'] = $this->Operasional_mod->ambil_data_id_kbfpembayaran($id)->row();
                    $hasil['terbayar'] = $this->Laporan_mod->ambil_data_id_kbfpembayaran_lunas($id)->result();
                    $hasil['rencana'] = $this->Operasional_mod->ambil_data_id_kbfpembayaran($id)->result();
                }elseif($jeniskbs=='1'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_1($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_1_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_1($id)->result();
                }elseif($jeniskbs=='2'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_2($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_2_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_2($id)->result();
                }elseif($jeniskbs=='3'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_3($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_3_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_3($id)->result();
                }elseif($jeniskbs=='4'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_4($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_4_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_4($id)->result();
                }elseif($jeniskbs=='5'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_5($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_5_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_5($id)->result();
                }elseif($jeniskbs=='6'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_6($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_6_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_6($id)->result();
                }elseif($jeniskbs=='7'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_7($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_7_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_7($id)->result();
                }elseif($jeniskbs=='8'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_8($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_8_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_8($id)->result();
                }elseif($jeniskbs=='9'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_9($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_9_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_9($id)->result();
                }elseif($jeniskbs=='10'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_10($id)->row();
                    $hasil['terbayar'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_10_lunas($id)->result();
                    $hasil['rencana'] = $this->Biayahpp_mod->hppget_all_data_pembayaranhpp_10($id)->result();
                }
                
                if($hasil['cek']== TRUE){
                    $hasil['jeniskb'] = $jeniskbs;
                    if($jeniskbs=='KBK' OR $jeniskbs=='KBF'){
                        $this->load->view('laporan/hutang/detail',$hasil);
                    }else{
                        $this->load->view('laporan/hutang/hpp',$hasil);
                    }
                }else{
                    redirect('laporan/hutang');
                }
            }else{
                redirect('laporan/hutang');
            }
        }else{
            $this->load->view('laporan/hutang/view');
        }
        
        $this->load->view('footer');
    }
    
    
    public function cash_flow()
    {
        $this->load->view('head',$this->menu);
        
        $hasil['cashbank']=$this->Laporan_mod->cashbank_cashflow()->row();
        $hasil['kpr']=$this->Laporan_mod->kpr_cashflow()->row();
        $hasil['dp']=$this->Laporan_mod->dp_cashflow()->row();
        $hasil['ppjb']=$this->Laporan_mod->ppjb_cashflow()->row();
        $hasil['penlain']=$this->Laporan_mod->penlain_cashflow()->row();
        $hasil['penmod']=$this->Laporan_mod->penmod_cashflow()->row();
        $hasil['skuhpp_tanah']=$this->Laporan_mod->sku_rencana_biaya_hpp_tanah()->row();
        $hasil['skuhpp_lahan']=$this->Laporan_mod->sku_rencana_biaya_hpp_lahan()->row();
        $hasil['skuhpp_prasarana']=$this->Laporan_mod->sku_rencana_biaya_hpp_prasarana()->row();
        $hasil['skuhpp_konstruksi']=$this->Laporan_mod->sku_rencana_biaya_hpp_konstruksi()->row();
        $hasil['skuhpp_izinproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_izinproyek()->row();
        $hasil['skuhpp_legproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_legproyek()->row();
        $hasil['skuhpp_legpenjualan']=$this->Laporan_mod->sku_rencana_biaya_hpp_legpenjualan()->row();
        $hasil['skuhpp_manajemen']=$this->Laporan_mod->sku_rencana_biaya_hpp_manajemen()->row();
        $hasil['skuhpp_admum']=$this->Laporan_mod->sku_rencana_biaya_hpp_admum()->row();
        $hasil['skuhpp_lain']=$this->Laporan_mod->sku_rencana_biaya_hpp_lain()->row();
        
        if($this->input->post('view_laporan'))
        {
            
            $this->load->view('laporan/cash_flow/view',$hasil);
        }
        else
        {
            //print_r($hasil['kpr']->nilaipenerimaan);
            $this->load->view('laporan/cash_flow/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function cash_flow_print()
    {
        $hasil['cashbank']=$this->Laporan_mod->cashbank_cashflow()->row();
        $hasil['kpr']=$this->Laporan_mod->kpr_cashflow()->row();
        $hasil['dp']=$this->Laporan_mod->dp_cashflow()->row();
        $hasil['ppjb']=$this->Laporan_mod->ppjb_cashflow()->row();
        $hasil['penlain']=$this->Laporan_mod->penlain_cashflow()->row();
        $hasil['penmod']=$this->Laporan_mod->penmod_cashflow()->row();
        $hasil['skuhpp_tanah']=$this->Laporan_mod->sku_rencana_biaya_hpp_tanah()->row();
        $hasil['skuhpp_lahan']=$this->Laporan_mod->sku_rencana_biaya_hpp_lahan()->row();
        $hasil['skuhpp_prasarana']=$this->Laporan_mod->sku_rencana_biaya_hpp_prasarana()->row();
        $hasil['skuhpp_konstruksi']=$this->Laporan_mod->sku_rencana_biaya_hpp_konstruksi()->row();
        $hasil['skuhpp_izinproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_izinproyek()->row();
        $hasil['skuhpp_legproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_legproyek()->row();
        $hasil['skuhpp_legpenjualan']=$this->Laporan_mod->sku_rencana_biaya_hpp_legpenjualan()->row();
        $hasil['skuhpp_manajemen']=$this->Laporan_mod->sku_rencana_biaya_hpp_manajemen()->row();
        $hasil['skuhpp_admum']=$this->Laporan_mod->sku_rencana_biaya_hpp_admum()->row();
        $hasil['skuhpp_lain']=$this->Laporan_mod->sku_rencana_biaya_hpp_lain()->row();
        
        $this->load->view('laporan/cash_flow/detail',$hasil);
    }
    
    
    public function sku()
    {    
        $this->load->view('head',$this->menu);
            
        $hasil['sku_pembayaran_ppjb']=$this->Laporan_mod->sku_penerimaan_penjualan()->row();
        $hasil['sku_pembayaran_ppjb_tj']=$this->Laporan_mod->sku_penerimaan_penjualan_tandajadi()->row();
        $hasil['skuhpp_tanah']=$this->Laporan_mod->sku_rencana_biaya_hpp_tanah()->row();
        $hasil['skuhpp_lahan']=$this->Laporan_mod->sku_rencana_biaya_hpp_lahan()->row();
        $hasil['skuhpp_prasarana']=$this->Laporan_mod->sku_rencana_biaya_hpp_prasarana()->row();
        $hasil['skuhpp_konstruksi']=$this->Laporan_mod->sku_rencana_biaya_hpp_konstruksi()->row();
        $hasil['skuhpp_izinproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_izinproyek()->row();
        $hasil['skuhpp_legproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_legproyek()->row();
        $hasil['skuhpp_legpenjualan']=$this->Laporan_mod->sku_rencana_biaya_hpp_legpenjualan()->row();
        $hasil['skuhpp_manajemen']=$this->Laporan_mod->sku_rencana_biaya_hpp_manajemen()->row();
        $hasil['skuhpp_admum']=$this->Laporan_mod->sku_rencana_biaya_hpp_admum()->row();
        $hasil['skuhpp_lain']=$this->Laporan_mod->sku_rencana_biaya_hpp_lain()->row();
        
        if($this->input->post('view_laporan')){
            $this->load->view('laporan/sku/view',$hasil);
        }else{
            $this->load->view('laporan/sku/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function sku_print()
    {
        $hasil['sku_pembayaran_ppjb']=$this->Laporan_mod->sku_penerimaan_penjualan()->row();
        $hasil['sku_pembayaran_ppjb_tj']=$this->Laporan_mod->sku_penerimaan_penjualan_tandajadi()->row();
        $hasil['skuhpp_tanah']=$this->Laporan_mod->sku_rencana_biaya_hpp_tanah()->row();
        $hasil['skuhpp_lahan']=$this->Laporan_mod->sku_rencana_biaya_hpp_lahan()->row();
        $hasil['skuhpp_prasarana']=$this->Laporan_mod->sku_rencana_biaya_hpp_prasarana()->row();
        $hasil['skuhpp_konstruksi']=$this->Laporan_mod->sku_rencana_biaya_hpp_konstruksi()->row();
        $hasil['skuhpp_izinproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_izinproyek()->row();
        $hasil['skuhpp_legproyek']=$this->Laporan_mod->sku_rencana_biaya_hpp_legproyek()->row();
        $hasil['skuhpp_legpenjualan']=$this->Laporan_mod->sku_rencana_biaya_hpp_legpenjualan()->row();
        $hasil['skuhpp_manajemen']=$this->Laporan_mod->sku_rencana_biaya_hpp_manajemen()->row();
        $hasil['skuhpp_admum']=$this->Laporan_mod->sku_rencana_biaya_hpp_admum()->row();
        $hasil['skuhpp_lain']=$this->Laporan_mod->sku_rencana_biaya_hpp_lain()->row();
        
        $this->load->view('laporan/sku/detail',$hasil);
    }
    
    
//Laporan Sales
//===================================

    public function sales_penjualan()
    {
        $this->load->view('head',$this->menu);
        
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['sales_penjualan']=$this->Laporan_mod->ambil_data_sales_penjualan()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $this->load->view('laporan/sales_penjualan/view',$hasil);
            }else{
                $this->load->view('laporan/sales_penjualan/view',$hasil);
            }
        }else{
            $this->load->view('laporan/sales_penjualan/view',$hasil);
        }
        
        $this->load->view('footer');
    }
    
    public function sales_penjualan_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['sales_penjualan']=$this->Laporan_mod->ambil_data_sales_penjualan()->result();
        $this->load->view('laporan/sales_penjualan/detail',$hasil);
    }
    
    
    public function sales_konsumen()
    {
        $this->load->view('head',$this->menu);
        
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['sales_konsumen']=$this->Laporan_mod->ambil_data_sales_konsumen()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $this->load->view('laporan/sales_konsumen/view',$hasil);
            }else{
                $this->load->view('laporan/sales_konsumen/view',$hasil);
            }
        }else{
            $this->load->view('laporan/sales_konsumen/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    
    public function sales_konsumen_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['sales_konsumen']=$this->Laporan_mod->ambil_data_sales_konsumen()->result();
        $this->load->view('laporan/sales_konsumen/detail',$hasil);
    }
    
    
    public function sales_pricelist()
    {
        $this->load->view('head',$this->menu);
            
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['sales_pricelist']=$this->Laporan_mod->ambil_data_sales_pricelist()->result();
        $hasil['opt_pricelist']=$this->Laporan_mod->pricelist_operator_dropdown()->result();
        
        if($this->input->post('view_laporan')){
            if ($this->input->post()!=NULL) {
                $this->load->view('laporan/sales_pricelist/view',$hasil);
            }else{
                $this->load->view('laporan/sales_pricelist/view',$hasil);
            }
        }else{
            $this->load->view('laporan/sales_pricelist/view',$hasil);
        }
            
        $this->load->view('footer');
    }
    public function sales_pricelist_print()
    {
        $hasil['databank']=$this->Operasional_mod->get_all_data_bank()->result();
        $hasil['sales_pricelist']=$this->Laporan_mod->ambil_data_sales_pricelist()->result();
        $hasil['opt_pricelist']=$this->Laporan_mod->pricelist_operator_dropdown()->result();
        
        $this->load->view('laporan/sales_pricelist/detail',$hasil);
    }
    
    //Tambahan - Simulasi
    public function buku_manual()
    {
        $this->load->view('head',$this->menu);
            
        if($this->input->post('submit_form')){
            $jeniskbs = $this->input->post('jeniskb');
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            if($tglaw != NULL OR $tglak != NULL){
                /*if($jeniskbs=='KBK'){
                    $hasil['cek'] = $this->Operasional_mod->ambil_data_tgl_kbkpembayaran($tglaw,$tglak)->result();
                }elseif($jeniskbs=='KBF'){
                    $hasil['cek'] = $this->Operasional_mod->ambil_data_tgl_kbfpembayaran($tglaw,$tglak)->result();
                }elseif($jeniskbs=='piutang'){
                    $hasil['cek'] = $this->Biayahpp_mod->ambil_data_tgl_piutang($tglaw,$tglak)->result();
                }else*/if($jeniskbs=='1'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_1($tglaw,$tglak)->result();
                }elseif($jeniskbs=='2'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_2($tglaw,$tglak)->result();
                }elseif($jeniskbs=='3'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_3($tglaw,$tglak)->result();
                }elseif($jeniskbs=='4'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_4($tglaw,$tglak)->result();
                }elseif($jeniskbs=='5'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_5($tglaw,$tglak)->result();
                }elseif($jeniskbs=='6'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_6($tglaw,$tglak)->result();
                }elseif($jeniskbs=='7'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_7($tglaw,$tglak)->result();
                }elseif($jeniskbs=='8'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_8($tglaw,$tglak)->result();
                }elseif($jeniskbs=='9'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_9($tglaw,$tglak)->result();
                }elseif($jeniskbs=='10'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_10($tglaw,$tglak)->result();
                }
                
                if($hasil['cek']== TRUE){
                    $this->load->view('laporan/buku_manual/view',$hasil); //all include
                }else{
                    redirect('laporan/buku_manual');
                }
            }else{
                redirect('laporan/buku_manual');
            }
        }elseif($this->input->post('print_form')){
            $jeniskbs = $this->input->post('jeniskb');
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            if($tglaw != NULL OR $tglak != NULL){
                if($jeniskbs=='KBK'){
                    $hasil['cek'] = $this->Biayahpp_mod->ambil_data_tgl_kbkpembayaran($tglaw,$tglak)->result();
                }elseif($jeniskbs=='KBF'){
                    $hasil['cek'] = $this->Biayahpp_mod->ambil_data_tgl_kbfpembayaran($tglaw,$tglak)->result();
                }elseif($jeniskbs=='piutang'){
                    $hasil['cek'] = $this->Biayahpp_mod->ambil_data_tgl_piutang($tglaw,$tglak)->result();
                }elseif($jeniskbs=='1'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_1($tglaw,$tglak)->result();
                }elseif($jeniskbs=='2'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_2($tglaw,$tglak)->result();
                }elseif($jeniskbs=='3'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_3($tglaw,$tglak)->result();
                }elseif($jeniskbs=='4'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_4($tglaw,$tglak)->result();
                }elseif($jeniskbs=='5'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_5($tglaw,$tglak)->result();
                }elseif($jeniskbs=='6'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_6($tglaw,$tglak)->result();
                }elseif($jeniskbs=='7'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_7($tglaw,$tglak)->result();
                }elseif($jeniskbs=='8'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_8($tglaw,$tglak)->result();
                }elseif($jeniskbs=='9'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_9($tglaw,$tglak)->result();
                }elseif($jeniskbs=='10'){
                    $hasil['cek'] = $this->Biayahpp_mod->hppget_tgl_data_pembayaranhpp_10($tglaw,$tglak)->result();
                }
                
                if($hasil['cek']== TRUE){
                    $hasil['jeniskb'] = $jeniskbs;
                    if($jeniskbs=='KBK' OR $jeniskbs=='KBF'){
                        $this->load->view('laporan/buku_manual/detail',$hasil);
                    }else{
                        $this->load->view('laporan/buku_manual/hpp',$hasil);
                    }
                }else{
                    redirect('laporan/buku_manual');
                }
            }else{
                redirect('laporan/buku_manual');
            }
        }else{
            $this->load->view('laporan/buku_manual/view');
        }
        
        $this->load->view('footer');
    }
    
}
?>