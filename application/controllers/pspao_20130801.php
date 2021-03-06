<?php

class Pspao extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
   		$this->load->library('pagination');
    	$this->load->library('table','download');
		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('function_helper');
		
		$this->load->model('pspao_akhir_model');
				
		$this->output->enable_profiler(FALSE); //display query statement
		
		if(!$this->aauth->is_loggedin()){
			echo '<script>';
			echo 'alert("Belum Login");';
			echo 'window.location = "'.site_url('auth').'"';
			echo '</script>';
		}
		
	}


	function index()
	{
		// DATA-DATA YG BOLEH GUNA BILA LOGIN!
		
		//$this->aauth->is_loggedin();
		//$this->aauth->logout();
		
		if($this->aauth->is_loggedin()){
			$node_id = '1';
			$menu_name = 'front';
			$menu_link = 'main';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			$this->load->view('template/default', $data);
		}else{
			redirect('auth');
		}
		
	}
	
///////////////// -PSPAO Akhir- -START- //////////////
        
        function kusang()
        {
			$node_id = '33';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/kusang';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);         
        }
        
        function pspao_akhir()
        {
			$node_id = '33';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/default';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            //$this->load->view('template/default',$data); 
			
			
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
			
			        
        }
        
        function arahan_sedia_pspao_akhir()
        {
			$node_id = '33';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/arahan_sedia_pspao_akhir';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);         
        }
        
        function senarai_template_pspao_awal()
        {
			$node_id = '34';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_template_pspao_awal';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
        function senarai_notifikasi_pspao_akhir()
        {
			$node_id = '35';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_notifikasi_pspao_akhir';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
        function pspao_akhir_baru()
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
		
        function pspao_akhir_baru_2()
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
		
        function pspao_akhir_baru_3()
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_3';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_baru_3');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
        }
		
        function pspao_akhir_baru_4()
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
		
		
        function pspao_akhir_baru_5()
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_5';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_baru_5');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION pspao_akhir_jkrpata2a_ptf
		


        function pspao_akhir_sunting_pp()
        {
			$node_id = '37';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_sunting_pp';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
        function pspao_akhir_sunting_ptf()
        {
			$node_id = '38';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_sunting_ptf';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
        function senarai_pspao_akhir_ptf()
        {
			$node_id = '39';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ptf';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION senarai_pspao_akhir_ptf


        function senarai_pspao_akhir_ptf_2()
        {
			$node_id = '39';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ptf_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/senarai_pspao_akhir_ptf_2');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION senarai_pspao_akhir_ptf_2


        function senarai_pspao_akhir_ketuajab_2()
        {
			$node_id = '39';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ketuajab_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/senarai_pspao_akhir_ketuajab_2');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION senarai_pspao_akhir_ketuajab_2



		
        function senarai_pspao_akhir_pp()
        {
			$node_id = '39';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_pp';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/senarai_pspao_akhir_pp');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION senarai_pspao_akhir_pp
		
        
        function senarai_pspao_akhir_ketuajab()
        {
			$node_id = '40';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ketuajab';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_ketua_jabatan(), $start, $quantity);

			$config['base_url'] = site_url('pspao/senarai_pspao_akhir_ketuajab');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_ketua_jabatan());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                 'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
//end table	
        }
		

        function pspao_akhir_jkrpata2a_pp()
        {
			$node_id = '157';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_jkrpata2a_pp';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			//$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_jkrpata2a_pp');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION pspao_akhir_jkrpata2a_pp
		

        function pspao_akhir_jkrpata2a_ptf()
        {
			$node_id = '158';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_jkrpata2a_ptf';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_jkrpata2a_ptf');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION pspao_akhir_jkrpata2a_ptf
		
				
        
///////////////// -PSPAO Akhir- -END- ////////////////	 

	
	
}