<?php
class Laporan_mod extends CI_Model {
    private $psjb='psjb';
    private $pembayaran_kbf='pembayaran_kbf';
    private $pembayaran_kbk='pembayaran_kbk';
    private $pembayaran_psjb='pembayaran_psjb';
    private $pembayaran_ppjb='pembayaran_ppjb';
    private $ppjb='ppjb';
    private $spmb='spmb';
    private $kbf='kbf';
    private $kbk='kbk';
    private $ajb='ajb';
    private $stp='stp';
    private $bast='bast';
    private $acl_counter='acl_counter';

    private $adm_menurole='adm_menurole';
    private $adm_menu='adm_menu';
    private $adm_project='adm_project';
    private $adm_role='adm_role';
    private $adm_session='adm_session';
    private $adm_user='adm_user';
    private $data_kota='data_kota';
    private $data_bank='data_bank';
    private $data_kavling='data_kavling';
    private $data_perumahan='data_perumahan';
    private $setting_app='setting';
    private $pengumuman='pengumuman';
    
    private $var_umum='var_umum';
    
    private $penerimaan='penerimaan';
    private $penerimaan_lain='penerimaan_lain';
    
    private $hpp_tanah='hpp_tanah';
    private $hpp_prasarana_sarana='hpp_prasarana_sarana';
    private $hpp_perijinan_proyek='hpp_perijinan_proyek';
    private $hpp_pengolahan_lahan='hpp_pengolahan_lahan';
    private $hpp_manajemen='hpp_manajemen';
    private $hpp_legalitas_proyek='hpp_legalitas_proyek';
    private $hpp_legalitas_penjualan='hpp_legalitas_penjualan';
    private $hpp_lain_lain='hpp_lain_lain';
    private $hpp_konstruksi_rumah='hpp_konstruksi_rumah';
    private $hpp_administrasi_umum='hpp_administrasi_umum';
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    //opererator hpp
    function hpp_operator_dropdown(){
        return $this->db->get_where($this->var_umum,array('name_var'=>'hpp'));
    }
    //opererator pricelist
    function pricelist_operator_dropdown(){
        return $this->db->get_where($this->var_umum,array('name_var'=>'pricelist'));
    }
    
    
    // Tabulasi data all
    function ambil_data_psjb(){
        $this->db->select('psjb.*');
        $this->db->distinct('psjb.idpsjb');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = psjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');        
        $this->db->group_by('psjb.idno');
        $this->db->order_by('psjb.idno', 'DESC');
        $this->db->where('psjb.status','psjb');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('psjb.tanggal >=',$tglaw);
        $this->db->where('psjb.tanggal <=',$tglak);
        }
        
        $this->db->or_where('psjb.status','dom');

        if($this->session->userdata('id_role') =='6')
        {
            return $this->db->get($this->psjb);    
        }
        return $this->db->get_where($this->psjb,array('psjb.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_ppjb(){
        $this->db->select('ppjb.*');
        $this->db->distinct('ppjb.idppjb');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->where('ppjb.status','tutup');
        $this->db->or_where('ppjb.status','dom');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('ppjb.tanggal >=',$tglaw);
        $this->db->where('ppjb.tanggal <=',$tglak);
        }
        
        $this->db->order_by('ppjb.idppjb','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('ppjb');    
        }
        
        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_ajb(){
        $this->db->select('ajb.*');
        $this->db->distinct('ajb.idajb');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = ajb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('ajb.tanggal >=',$tglaw);
        $this->db->where('ajb.tanggal <=',$tglak);
        }
        
        $this->db->order_by('ajb.idajb','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('ajb');
        }

        return $this->db->get_where($this->ajb,array('ajb.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_spmb(){
        $this->db->select('spmb.*');
        $this->db->distinct('spmb.idspmb');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = spmb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('spmb.tanggal >=',$tglaw);
        $this->db->where('spmb.tanggal <=',$tglak);
        }
        
        $this->db->order_by('spmb.idspmb','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('spmb');    
        }
        
        return $this->db->get_where($this->spmb,array('spmb.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_kbk(){
        $this->db->select('kbk.*');
        $this->db->distinct('kbk.idkbk');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = kbk.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('kbk.tanggal >=',$tglaw);
        $this->db->where('kbk.tanggal <=',$tglak);
        }
        
        $this->db->order_by('kbk.idkbk','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('kbk');    
        }
        
        return $this->db->get_where($this->kbk,array('kbk.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_kbf(){
        $this->db->select('kbf.*');
        $this->db->distinct('kbf.idkbf');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = kbf.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('kbf.tanggal >=',$tglaw);
        $this->db->where('kbf.tanggal <=',$tglak);
        }
        
        $this->db->order_by('kbf.idkbf','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('kbf');    
        }
        return $this->db->get_where($this->kbf,array('kbf.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_stp(){
        $this->db->select('stp.*');
        $this->db->distinct('stp.idstp');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = stp.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('stp.tanggal >=',$tglaw);
        $this->db->where('stp.tanggal <=',$tglak);
        }
        
        $this->db->order_by('stp.idstp','DESC');
        
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('stp');    
        }
        return $this->db->get_where($this->stp,array('stp.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_bast(){
        $this->db->select('bast.*');
        $this->db->distinct('bast.idbast');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = bast.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('bast.tanggal >=',$tglaw);
        $this->db->where('bast.tanggal <=',$tglak);
        }
        
        $this->db->order_by('bast.idbast','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('bast');    
        }
        
        return $this->db->get_where($this->bast,array('bast.idperum'=>$this->session->userdata('idperum')));
    }
    
//Laporan Penerimaan
//========================

    //Cash Keras dan bertahap
    function ambil_data_penerimaan_cash_bank(){
        $this->db->select('ppjb.*');
        $this->db->distinct('ppjb.idppjb');
        $this->db->select('penerimaan.nokwitansi AS nokwitansi');
        $this->db->select('penerimaan.tanggal_bayar AS ptanggal');
        $this->db->select('penerimaan.akunting AS pakunting');
        $this->db->select('penerimaan.penjual AS ppenjual');
        $this->db->select('penerimaan.pimpinan AS ppimpinan');
        $this->db->select('penerimaan.keterangan AS pketerangan');
        $this->db->select('penerimaan.norek AS pnorek');
        $this->db->select('penerimaan.jenis');
        $this->db->select('penerimaan.namakonsumen AS pnamakonsumen');
        $this->db->select('penerimaan.nilaipenerimaan AS pnilaipenerimaan');
        $this->db->join('penerimaan','penerimaan.idppjb=ppjb.idppjb','left');
        $this->db->select('data_bank.namabank AS namabank');
        $this->db->join('data_bank','data_bank.idbank=penerimaan.idbank','left');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
            $this->db->where('penerimaan.idperum',$this->session->userdata('idperum'));
        }
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan.tanggal_bayar >=',$tglaw);
        $this->db->where('penerimaan.tanggal_bayar <=',$tglak);
        }
        
        //$this->db->where('penerimaan.status','dom');
        $this->db->where_in('penerimaan.jenis',array('Cash Keras','Cash Bertahap','dp'));
        $this->db->order_by('penerimaan.tanggal_bayar','DESC');
        
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('ppjb');    
        }
        
        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
    }
    
    //Penerimaan KPR
    function ambil_data_penerimaan_kpr(){
        $this->db->select('ppjb.*');
        $this->db->distinct('ppjb.idppjb');
        $this->db->select('penerimaan.nokwitansi AS nokwitansi');
        $this->db->select('penerimaan.tanggal_bayar AS ptanggal');
        $this->db->select('penerimaan.akunting AS pakunting');
        $this->db->select('penerimaan.penjual AS ppenjual');
        $this->db->select('penerimaan.pimpinan AS ppimpinan');
        $this->db->select('penerimaan.keterangan AS pketerangan');
        $this->db->select('penerimaan.norek AS pnorek');
        $this->db->select('penerimaan.namakonsumen AS pnamakonsumen');
        $this->db->select('penerimaan.nilaipenerimaan AS pnilaipenerimaan');
        $this->db->join('penerimaan','penerimaan.idppjb=ppjb.idppjb','left');
        $this->db->select('data_bank.namabank AS namabank');
        $this->db->join('data_bank','data_bank.idbank=penerimaan.idbank','left');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
            $this->db->where('penerimaan.idperum',$this->session->userdata('idperum'));    
        }
        
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan.tanggal_bayar >=',$tglaw);
        $this->db->where('penerimaan.tanggal_bayar <=',$tglak);
        }
        
        //$this->db->where('penerimaan.status','dom');
        $this->db->where('penerimaan.jenis','KPR');
        $this->db->order_by('penerimaan.tanggal_bayar','DESC');
        if($this->session->userdata('id_role')!='6')
        {
            return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
        }
        
        return $this->db->get('ppjb');
    }
    
    //Penerimaan Lain
    function ambil_data_penerimaan_lain(){
        $this->db->select('penerimaan_lain.*');
        $this->db->select('data_bank.namabank AS namabank');


        $this->db->join('data_bank','data_bank.idbank=penerimaan_lain.idbank','left');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan_lain.tanggal >=',$tglaw);
        $this->db->where('penerimaan_lain.tanggal <=',$tglak);
        }
        //$this->db->where('penerimaan_lain.status','dom');
        $this->db->where('penerimaan_lain.jenis !=','modal');
        $this->db->order_by('penerimaan_lain.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return($this->db->get($this->penerimaan_lain));
        }
        return $this->db->get_where($this->penerimaan_lain,array('penerimaan_lain.idperum'=>$this->session->userdata('idperum')));

    }
    function ambil_data_penerimaan_modal(){
        $this->db->select('penerimaan_lain.*');
        $this->db->select('data_bank.namabank AS namabank');
        $this->db->join('data_bank','data_bank.idbank=penerimaan_lain.idbank','left');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan_lain.tanggal >=',$tglaw);
        $this->db->where('penerimaan_lain.tanggal <=',$tglak);
        }
        //$this->db->where('penerimaan_lain.status','dom');
        $this->db->where('penerimaan_lain.jenis','modal');//diselect yang berjenis modal
        $this->db->order_by('penerimaan_lain.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return($this->db->get($this->penerimaan_lain));
        }
        return $this->db->get_where($this->penerimaan_lain,array('penerimaan_lain.idperum'=>$this->session->userdata('idperum')));

    }
    function sum_data_penerimaan_lain() {
        $this->db->select_sum('nilaipenerimaan');
        $this->db->where('status','dom');
        $this->db->where('idperum',$this->session->userdata('idperum'));
        return $this->db->get($this->penerimaan_lain); 
    }
    
    //Laporan HPP
    function laporan_data_hpp_tanah($datak=null){
        $this->db->select('hpp_tanah.*');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_tanah.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_tanah.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_tanah.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_tanah.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_tanah.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.tanah');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_tanah.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('setting_anggaran','hpp_tanah.idperum=setting_anggaran.perumahan');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->order_by('hpp_tanah.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_tanah.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_tanah');
    }
    function laporan_data_hpp_lahan($datak=null){
        $this->db->select('hpp_pengolahan_lahan.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_pengolahan_lahan.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_pengolahan_lahan.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_pengolahan_lahan.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_pengolahan_lahan.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_pengolahan_lahan.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.pengolahan_lahan');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_pengolahan_lahan.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('setting_anggaran','hpp_pengolahan_lahan.idperum=setting_anggaran.perumahan');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->order_by('hpp_pengolahan_lahan.tanggal','DESC');
        
        
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_pengolahan_lahan.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_pengolahan_lahan');
        //print_r($a->result());exit();
    }
    function laporan_data_hpp_sarana($datak=null){
        $this->db->select('hpp_prasarana_sarana.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_prasarana_sarana.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_prasarana_sarana.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_prasarana_sarana.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_prasarana_sarana.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_prasarana_sarana.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.prasarana');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_prasarana_sarana.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_prasarana_sarana.idperum=setting_anggaran.perumahan');
        $this->db->order_by('hpp_prasarana_sarana.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_prasarana_sarana.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_prasarana_sarana');
    }
    function laporan_data_hpp_konstruksi($datak=null){
        $this->db->select('hpp_konstruksi_rumah.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_konstruksi_rumah.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_konstruksi_rumah.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_konstruksi_rumah.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_konstruksi_rumah.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_konstruksi_rumah.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.konstruksi');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_konstruksi_rumah.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_konstruksi_rumah.idperum=setting_anggaran.perumahan');
        $this->db->order_by('hpp_konstruksi_rumah.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_konstruksi_rumah.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_konstruksi_rumah');
    }
    function laporan_data_hpp_perijinan($datak=null){
        $this->db->select('hpp_perijinan_proyek.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_perijinan_proyek.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_perijinan_proyek.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_perijinan_proyek.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_perijinan_proyek.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_perijinan_proyek.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.perijinan');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_perijinan_proyek.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_perijinan_proyek.idperum=setting_anggaran.perumahan');
        $this->db->order_by('hpp_perijinan_proyek.tanggal','DESC');

        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_perijinan_proyek.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_perijinan_proyek');

    }
    function laporan_data_hpp_legproyek($datak=null){
        $this->db->select('hpp_legalitas_proyek.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_legalitas_proyek.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_legalitas_proyek.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_legalitas_proyek.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_legalitas_proyek.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_legalitas_proyek.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.legalitas_proyek');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_legalitas_proyek.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_legalitas_proyek.idperum=setting_anggaran.perumahan');
        $this->db->order_by('hpp_legalitas_proyek.tanggal','DESC');
        
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_legalitas_proyek.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_legalitas_proyek');
        
    }
    function laporan_data_hpp_legpenjualan($datak=null){
        $this->db->select('hpp_legalitas_penjualan.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_legalitas_penjualan.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_legalitas_penjualan.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_legalitas_penjualan.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_legalitas_penjualan.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_legalitas_penjualan.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.legalitas_penjualan');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_legalitas_penjualan.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_legalitas_penjualan.idperum=setting_anggaran.perumahan');    
        $this->db->order_by('hpp_legalitas_penjualan.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_legalitas_penjualan.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_legalitas_penjualan');
        
    }
    function laporan_data_hpp_managemen($datak=null){
        $this->db->select('hpp_manajemen.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_manajemen.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_manajemen.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_manajemen.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_manajemen.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.royalty');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_manajemen.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_manajemen.idperum=setting_anggaran.perumahan');
        $this->db->order_by('hpp_manajemen.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_manajemen.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_manajemen');
    }
    function laporan_data_hpp_adumum($datak=null){
        $this->db->select('hpp_administrasi_umum.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_administrasi_umum.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_administrasi_umum.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_administrasi_umum.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_administrasi_umum.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_administrasi_umum.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.inventaris,setting_anggaran.operasional_kantor,setting_anggaran.operasional_proyek,setting_anggaran.operasional_pemasaran');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_administrasi_umum.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_administrasi_umum.idperum=setting_anggaran.perumahan');

        $this->db->order_by('hpp_administrasi_umum.tanggal','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_administrasi_umum.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_administrasi_umum');
        
        
    }
    function laporan_data_hpp_lain($datak=null){
        $this->db->select('hpp_lain_lain.*');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
            $tempoaw = $this->uri->segment(5);
            $tempoak = $this->uri->segment(6);
            $status = $this->uri->segment(7);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
            $tempoaw = $this->input->post('tempoaw');
            $tempoak = $this->input->post('tempoak');
            $status = $this->input->post('status');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
            if($tglaw !='a'){$this->db->where('hpp_lain_lain.tanggal >=',$tglaw);}
            if($tglak !='a'){$this->db->where('hpp_lain_lain.tanggal <=',$tglak);}
        }
        
        if($tempoaw != NULL OR $tempoak != NULL){
            if($tempoaw !='a'){$this->db->where('hpp_lain_lain.jatuhtempo >=',$tempoaw);}
            if($tempoak !='a'){$this->db->where('hpp_lain_lain.jatuhtempo <=',$tempoak);}
        }
        if($status != NULL){
            if($status !='a'){$this->db->where('hpp_lain_lain.status',$status);}
        }
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->select('setting_anggaran.retur_penjualan,setting_anggaran.tarik_modal,setting_anggaran.tarik_modal,setting_anggaran.mutasi_bank,setting_anggaran.lain_lain');
        $this->db->join('data_kavling','data_kavling.idkavling = hpp_lain_lain.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('setting_anggaran','hpp_lain_lain.idperum=setting_anggaran.perumahan');
        
        $this->db->order_by('hpp_lain_lain.tanggal','DESC');

        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('hpp_lain_lain.idperum',$datak);
        }
        elseif($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get('hpp_lain_lain');
    }
    
    function ambil_data_sales_pricelist(){
        $this->db->select('data_kavling.*');
        
        if($this->uri->segment(3) != NULL){
            $status = $this->uri->segment(3);
        }else{
            $status = $this->input->post('status');
        }
        if($status != NULL){
        $this->db->where('data_kavling.status',$status);
        }
        $this->db->select('data_kota.judul_kota AS kota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project,adm_project.judul AS namaproject');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));    
        }        
        
        $this->db->order_by('data_kavling.status','DESC');
        
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('data_kavling');    
        }
        
        return $this->db->get_where($this->data_kavling,array('data_kavling.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_sales_penjualan()
    {
        $this->db->select('ppjb.*');
        $this->db->select('data_kavling.*');
        $this->db->distinct('ppjb.idppjb');
        
        $this->db->select('ppjb.totalkpr AS totalkpr');
        $this->db->select('ppjb.hargasepakat AS hargasepakat');
        $this->db->select('ppjb.tandajadi AS tandajadi');
        $this->db->select('ppjb.carabayar AS carabayar');
        $this->db->select('ppjb.luasatanah_t AS luastanah_t');
        $this->db->select('ppjb.luasbangunan_t AS luasbangunan_t');
        $this->db->select('data_kavling.luastanah AS luastanah');
        $this->db->select('data_kavling.harga AS harga');
        $this->db->select('data_kavling.luasbangunan AS luasbangunan');
        $this->db->select('data_bank.namabank AS namabank');
        $this->db->join('data_bank','data_bank.idbank=ppjb.idbank','left');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project, adm_project.judul AS namaproject');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('ppjb.tanggal >=',$tglaw);
        $this->db->where('ppjb.tanggal <=',$tglak);
        }
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
        }

        $this->db->where('ppjb.status','tutup');
        $this->db->or_where('ppjb.status','dom');
        $this->db->order_by('ppjb.tanggal, ppjb.idppjb','DESC');

        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('ppjb');
        }

        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
    }
    function ambil_data_sales_konsumen(){
        $this->db->select('ppjb.*');
        $this->db->distinct('ppjb.idppjb');
        $this->db->select('ppjb.carabayar AS carabayar');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
        $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
        $this->db->where('ppjb.status','tutup');
        $this->db->or_where('ppjb.status','dom');
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('ppjb.tanggal >=',$tglaw);
        $this->db->where('ppjb.tanggal <=',$tglak);
        }
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));    
        }
        $this->db->order_by('ppjb.tanggal, ppjb.idppjb','DESC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('ppjb');    
        }
        
        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
    }
    
    //SKU
    function sku_penerimaan_penjualan() {
        $this->db->select_sum('jumlah');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->where('idperum',$this->session->userdata('idperum'));    
        }
        return $this->db->get($this->pembayaran_ppjb); 
    }
    function sku_penerimaan_penjualan_tandajadi() {
        $this->db->select_sum('tandajadi');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
    
        $this->db->where('idperum',$this->session->userdata('idperum'));
        return $this->db->get($this->ppjb); 
    }
    function sku_rencana_biaya_hpp_tanah() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        //$this->db->where('status','dom');
        
        $this->db->join('setting_anggaran','hpp_tanah.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get($this->hpp_tanah); 
    }
    function sku_rencana_biaya_hpp_lahan() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        //$this->db->where('status','dom');
        $this->db->join('setting_anggaran','hpp_pengolahan_lahan.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get($this->hpp_pengolahan_lahan); 
    }
    function sku_rencana_biaya_hpp_prasarana() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        $this->db->join('setting_anggaran','hpp_prasarana_sarana.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }

        return $this->db->get($this->hpp_prasarana_sarana); 
    }
    function sku_rencana_biaya_hpp_konstruksi() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        $this->db->join('setting_anggaran','hpp_konstruksi_rumah.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get($this->hpp_konstruksi_rumah); 
    }
    function sku_rencana_biaya_hpp_izinproyek() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        $this->db->join('setting_anggaran','hpp_perijinan_proyek.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get($this->hpp_perijinan_proyek); 
    }
    function sku_rencana_biaya_hpp_legproyek() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        $this->db->join('setting_anggaran','hpp_legalitas_proyek.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        
        return $this->db->get($this->hpp_legalitas_proyek); 
    }
    function sku_rencana_biaya_hpp_legpenjualan() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        $this->db->join('setting_anggaran','hpp_legalitas_penjualan.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get($this->hpp_legalitas_penjualan); 
    }
    function sku_rencana_biaya_hpp_manajemen() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }

        $this->db->join('setting_anggaran','hpp_manajemen.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        
        return $this->db->get($this->hpp_manajemen); 
    }
    function sku_rencana_biaya_hpp_admum() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        $this->db->join('setting_anggaran','hpp_administrasi_umum.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get($this->hpp_administrasi_umum); 
    }
    function sku_rencana_biaya_hpp_lain() {
        $this->db->select_sum('totalbayar');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        $this->db->join('setting_anggaran','hpp_lain_lain.idperum=setting_anggaran.perumahan');
        
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('setting_anggaran.user',$this->session->userdata('iduser'));
        }
        return $this->db->get($this->hpp_lain_lain); 
    }
    //end SKU
    
    
    //kbk kbf
    function ambil_data_id_kbkpembayaran_lunas($id){        
        $this->db->select('kbk.*');
        $this->db->distinct('kbk.idkbk');
        $this->db->select('pembayaran_kbk.*');
        $this->db->select('ppjb.hargasepakat AS hargasepakat');
        $this->db->select('ppjb.tandajadi AS tandajadi');
        $this->db->select('ppjb.carabayar AS carabayar');
        $this->db->select('ppjb.tanggal AS tglppjb');        
        $this->db->select('spmb.nilaikbk AS nilaikbk');
        $this->db->select('data_kavling.luastanah AS luastanah');
        $this->db->select('data_kavling.luasbangunan AS luasbangunan');
        $this->db->select('ppjb.luasatanah_t AS luastanah_t');
        $this->db->select('ppjb.luasbangunan_t AS luasbangunan_t');        
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');    
        $this->db->join('pembayaran_kbk','pembayaran_kbk.idkbk=kbk.idkbk','left');        
        $this->db->join('spmb','spmb.idppjb=kbk.idppjb','left');    
        $this->db->join('data_kavling','data_kavling.idkavling = kbk.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('ppjb','ppjb.idppjb=kbk.idppjb','left');
        $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
        $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
        $this->db->where('kbk.idkbk',$id);
        $this->db->where('pembayaran_kbk.idperum',$this->session->userdata('idperum'));
        $this->db->where('ppjb.idperum',$this->session->userdata('idperum'));
        $this->db->where('pembayaran_kbk.status','lunas');
        $this->db->order_by('pembayaran_kbk.tanggal','ASC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->get('kbk');
        }
        return $this->db->get_where($this->kbk,array('kbk.idperum'=>$this->session->userdata('idperum')));
    }
    
    function ambil_data_id_kbfpembayaran_lunas($id){        
        $this->db->select('kbf.*');
        $this->db->distinct('kbf.idkbf');
        $this->db->select('pembayaran_kbf.*');
        $this->db->select('ppjb.hargasepakat AS hargasepakat');
        $this->db->select('ppjb.tandajadi AS tandajadi');        
        $this->db->select('spmb.nilaikbk AS nilaikbk');
        $this->db->select('data_kavling.luastanah AS luastanah');
        $this->db->select('data_kavling.luasbangunan AS luasbangunan');
        $this->db->select('ppjb.carabayar AS carabayar');
        $this->db->select('ppjb.luasatanah_t AS luastanah_t');
        $this->db->select('ppjb.luasbangunan_t AS luasbangunan_t');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');        
        $this->db->join('pembayaran_kbf','pembayaran_kbf.idkbf=kbf.idkbf','left');        
        $this->db->join('spmb','spmb.idppjb=kbf.idppjb','left');
        $this->db->join('data_kavling','data_kavling.idkavling = kbf.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        $this->db->join('ppjb','ppjb.idppjb=kbf.idppjb','left');
        $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
        $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
        $this->db->where('pembayaran_kbf.idperum',$this->session->userdata('idperum'));
        $this->db->where('kbf.idkbf',$id);
        $this->db->where('ppjb.idperum',$this->session->userdata('idperum'));
        $this->db->where('pembayaran_kbf.status','lunas');
        $this->db->order_by('pembayaran_kbf.tanggal','ASC');
        if($this->session->userdata('id_role')=='6')
        {
            $this->db->get('kbf');
        }
        return $this->db->get_where($this->kbf,array('kbf.idperum'=>$this->session->userdata('idperum')));
    }
    
    //piutang kavling
    function ambil_data_id_kartupiutang($id){        
        $this->db->select('ppjb.*');
        $this->db->select('pembayaran_ppjb.*');
        $this->db->select('ppjb.tanggal AS tglppjb');
        $this->db->select('ppjb.namasertifikat AS pembeli');
        $this->db->select('spmb.nilaikbk AS nilaikbk');
        $this->db->select('data_kavling.luastanah AS luastanah');
        $this->db->select('data_kavling.luasbangunan AS luasbangunan');
        $this->db->join('pembayaran_ppjb','pembayaran_ppjb.idppjb=ppjb.idppjb','left');
        $this->db->select('pembayaran_ppjb.tanggal AS tglpemppjb');
        
        $this->db->join('spmb','spmb.idppjb=ppjb.idppjb','left');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        if($this->session->userdata('id_role')!="6")
        {
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
        }
        $this->db->where('ppjb.idppjb',$id);
        if($this->session->userdata('id_role')!="6")
        {
            $this->db->where('pembayaran_ppjb.idperum',$this->session->userdata('idperum'));
            $this->db->where('spmb.idperum',$this->session->userdata('idperum'));
        }        
        $this->db->group_by('ppjb.idppjb');
        $this->db->order_by('pembayaran_ppjb.tanggal','ASC');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get($this->ppjb);    
        }
        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
    }
    function ambil_tgl_bayar_kpr($id)
    {
        $this->db->select('pembayaran_ppjb.tanggal');
        $this->db->where('pembayaran_ppjb.idppjb',$id);
        $this->db->where('pembayaran_ppjb.jenisbayar','kpr');

        return $this->db->get('pembayaran_ppjb');
    }
    function ambil_data_id_kartupiutang_terbayar($id){        
        $this->db->select('ppjb.*');
        $this->db->select('pembayaran_ppjb.*');
        $this->db->select('ppjb.namasertifikat AS pembeli');
        $this->db->select('spmb.nilaikbk AS nilaikbk');
        $this->db->select('data_kavling.luastanah AS luastanah');
        $this->db->select('data_kavling.luasbangunan AS luasbangunan');
        $this->db->select('data_bank.namabank AS namabank');
        $this->db->select('penerimaan.nilaipenerimaan');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('pembayaran_ppjb','pembayaran_ppjb.idppjb=ppjb.idppjb','left');    
        $this->db->join('penerimaan','pembayaran_ppjb.idppjb=penerimaan.idppjb');    
        $this->db->join('data_bank','data_bank.idbank=ppjb.bankpemesan','left');
        $this->db->join('spmb','spmb.idppjb=ppjb.idppjb','left');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');

        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
        }
        $this->db->where('ppjb.idppjb',$id);
        if($this->session->userdata('id_role')!="6")
        {
            $this->db->where('pembayaran_ppjb.idperum',$this->session->userdata('idperum'));
            $this->db->where('ppjb.idperum',$this->session->userdata('idperum'));
        }
        $this->db->group_by('ppjb.idppjb');
        $this->db->where('pembayaran_ppjb.lunas','lunas');
        $this->db->or_where('pembayaran_ppjb.lunas','proses');
        $this->db->order_by('pembayaran_ppjb.tanggal','ASC');

        if($this->session->userdata('id_role')=="6")
        {
            return $this->db->get($this->ppjb);
        }
        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
    }
    
    //cashflow
    function cashbank_cashflow() {
        /*$this->db->select_sum('penerimaan.nilaipenerimaan');

        $this->db->join('penerimaan','penerimaan.idppjb=ppjb.idppjb','left');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan.tanggal_bayar >=',$tglaw);
        $this->db->where('penerimaan.tanggal_bayar <=',$tglak);
        }
        $this->db->where('penerimaan.jenis','Cash Keras');
        $this->db->or_where('penerimaan.jenis','Cash Bertahap');
        //$this->db->where('penerimaan.status','dom');
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('ppjb');    
        }
        
        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));*/

        $this->db->select_sum('penerimaan.nilaipenerimaan');
        $this->db->select('ppjb.*');
        $this->db->distinct('ppjb.idppjb');
        $this->db->select('penerimaan.nokwitansi AS nokwitansi');
        $this->db->select('penerimaan.tanggal_bayar AS ptanggal');
        $this->db->select('penerimaan.akunting AS pakunting');
        $this->db->select('penerimaan.penjual AS ppenjual');
        $this->db->select('penerimaan.pimpinan AS ppimpinan');
        $this->db->select('penerimaan.keterangan AS pketerangan');
        $this->db->select('penerimaan.norek AS pnorek');
        $this->db->select('penerimaan.jenis');
        $this->db->select('penerimaan.namakonsumen AS pnamakonsumen');
        $this->db->select('penerimaan.nilaipenerimaan AS pnilaipenerimaan');
        $this->db->join('penerimaan','penerimaan.idppjb=ppjb.idppjb','left');
        $this->db->select('data_bank.namabank AS namabank');
        $this->db->join('data_bank','data_bank.idbank=penerimaan.idbank','left');
        $this->db->select('data_kavling.nama AS namakavling');
        $this->db->select('data_kota.judul_kota AS namakota,data_kota.kode_kota');
        $this->db->select('data_perumahan.judul_perum AS namaperum,data_perumahan.kode_perum');
        $this->db->select('adm_project.kode_project AS kode_project');
        $this->db->join('data_kavling','data_kavling.idkavling = ppjb.idkavling','left');
        $this->db->join('data_perumahan','data_perumahan.idperum = data_kavling.idperum','left');
        $this->db->join('adm_project','adm_project.idproject = data_perumahan.idproject','left');
        $this->db->join('data_kota','data_kota.idkota = adm_project.idkota','left');
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('data_perumahan.idperum',$this->session->userdata('idperum'));
            $this->db->where('data_kavling.idperum',$this->session->userdata('idperum'));
            $this->db->where('penerimaan.idperum',$this->session->userdata('idperum'));
        }
        
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan.tanggal_bayar >=',$tglaw);
        $this->db->where('penerimaan.tanggal_bayar <=',$tglak);
        }
        
        //$this->db->where('penerimaan.status','dom');
        $this->db->where_in('penerimaan.jenis',array('Cash Keras','Cash Bertahap'));
        $this->db->order_by('penerimaan.tanggal_bayar','DESC');
        
        if($this->session->userdata('id_role')=='6')
        {
            return $this->db->get('ppjb');    
        }
        
        return $this->db->get_where($this->ppjb,array('ppjb.idperum'=>$this->session->userdata('idperum')));
    }
    function kpr_cashflow() {
        $this->db->select_sum('penerimaan.nilaipenerimaan');
        $this->db->join('penerimaan','penerimaan.idppjb=ppjb.idppjb','left');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan.tanggal_bayar >=',$tglaw);
        $this->db->where('penerimaan.tanggal_bayar <=',$tglak);
        }
        $this->db->where('penerimaan.jenis','KPR');
        //$this->db->where('penerimaan.status','dom');
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('penerimaan.idperum',$this->session->userdata('idperum'));
            $this->db->where('ppjb.idperum',$this->session->userdata('idperum'));
        }
            return $this->db->get($this->ppjb); 
    }
    function dp_cashflow() {
        $this->db->select_sum('penerimaan.nilaipenerimaan');
        $this->db->join('penerimaan','penerimaan.idppjb=ppjb.idppjb','left');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('penerimaan.tanggal_bayar >=',$tglaw);
        $this->db->where('penerimaan.tanggal_bayar <=',$tglak);
        }
        $this->db->where('penerimaan.jenis','dp');
        //$this->db->where('penerimaan.status','dom');
        if($this->session->userdata('id_role')!='6')
        {

            $this->db->where('penerimaan.idperum',$this->session->userdata('idperum'));
            $this->db->where('ppjb.idperum',$this->session->userdata('idperum'));
        }
        return $this->db->get($this->ppjb); 
    }
    function ppjb_cashflow() {
        $this->db->select_sum('tandajadi');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        
        //$this->db->where('status','dom');
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('idperum',$this->session->userdata('idperum'));    
        }
        return $this->db->get($this->ppjb); 
    }
    function penlain_cashflow() {
        $this->db->select_sum('nilaipenerimaan');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        $this->db->where('jenis !=','modal');
        //$this->db->where('status','dom');
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('idperum',$this->session->userdata('idperum'));    
        }
        return $this->db->get($this->penerimaan_lain); 
    }
    function penmod_cashflow() {
        $this->db->select_sum('nilaipenerimaan');
        if($this->uri->segment(3) != NULL OR $this->uri->segment(4) != NULL){
            $tglaw = $this->uri->segment(3);
            $tglak = $this->uri->segment(4);
        }else{
            $tglaw = $this->input->post('tglaw');
            $tglak = $this->input->post('tglak');
        }
        
        if($tglaw != NULL OR $tglak != NULL){
        $this->db->where('tanggal >=',$tglaw);
        $this->db->where('tanggal <=',$tglak);
        }
        $this->db->where('jenis','modal');
        //$this->db->where('status','dom');
        if($this->session->userdata('id_role')!='6')
        {
            $this->db->where('idperum',$this->session->userdata('idperum'));    
        }
        
        return $this->db->get($this->penerimaan_lain); 
    }
}
?>