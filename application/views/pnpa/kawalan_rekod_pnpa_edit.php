
  <!--breadcrumb-->
    <div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
                        Fungsi
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        Perangcangan
                      </a>  
                    </li>
                    <li>
                      <a href="#">
                        Pelan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        PSPA(O)
                      </a>   
                    </li>
                    <li>
                      <a href="#">
                        PNPA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
     <br />
      <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                     <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class="active"><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
    <!--breadcrumb-->
         <div class="tab-content" id="myTabContent">
         <div id="home" class="tab-pane fade active in">
         <p>
           <form class="form-horizontal no-margin">
               <div class="widget-body"> 
             
       			<div class="row-fluid">
            	<div class="span12">
              	<div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>  Kawalan Rekod Penilaian Aset</div></div>
                     <div class="widget-body">
              
                  <ul class="icomoon-icons-container"   >
                          <li><a href="#myModal"  data-toggle="modal">
                    <span class="fs1" data-icon="&#xe102;" aria-hidden="true">  </span></a>
                  </li>
                          
                        </ul>
                      <label class="tambah">Tambah Kawalan Rekod</label>
                    <div class="controls2">
                    
                     </div>
                     
                     
                          <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Kawalan Rekod Penilaian Aset
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                    	<div class="control-group">
                      <label class="control-label">Jenis Rekod
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    	<div class="control-group">
                      <label class="control-label">Lokasi
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                      <hr>
                    	<div class="control-group">
                      <label class="control-label">Tempoh Penyimpanan
                      </label>
                    <div class="controls">
                        
                    </div>
                    </div>
                    	<div class="control-group">
                      <label class="control-label">Tarikh Mula
                      </label>
                    <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                   
                  	<div class="control-group">
                      <label class="control-label">Tarikh Tamat
                      </label>
                   <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    	
                      </p>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan Deraf</a></div>
                  </div>
                     
                              
                  	<table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th width="2%" rowspan="2" >Bil</th>
                        <th width="20%" rowspan="2" class="hidden-phone" ><span class="hidden-phone" >Jenis Rekod</span></th>
                        <th width="20%" rowspan="2" class="hidden-phone" ><span class="hidden-phone" >Lokasi</span></th>
                        <th colspan="2" class="hidden-phone" >Tempoh Penyimpanan</th>
                        <th width="8%" rowspan="2" class="hidden-phone" >Tindakan</th>
                      </tr>
                      <tr>
                        <th width="8%" class="hidden-phone" >Tarikh Mula</th>
                        <th width="8%" class="hidden-phone" >Tarikh Tamat</th>
                        </tr>
                   </thead>
                    <tbody>
                      <tr>
                        <td><span class="name">1.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone">Dokumen A</td>
                        <td class="hidden-phone">Lokasi A</td>
                        <td class="hidden-phone">12/2/2012</td>
                        <td class="hidden-phone">12/2/2013</td>
                        <td class="hidden-phone">
                          <ul class="icomoon-icons-container">
                            <a href="#myModal2"  data-toggle="modal"><li class="rounded">
                              <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li></a>
                          </ul>
 <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Kawalan Rekod Penilaian Aset
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      <div class="control-group">
                      <label class="control-label">Jenis Rekod
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" placeholder="Dokumen A">
                    </div>
                    </div>
                      <div class="control-group">
                      <label class="control-label">Lokasi
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" placeholder="Lokasi A" >
                    </div>
                    </div>
                      <hr>
                      <div class="control-group">
                      <label class="control-label">Tempoh Penyimpanan
                      </label>
                    <div class="controls">
                        
                    </div>
                    </div>
                      <div class="control-group">
                      <label class="control-label">Tarikh Mula
                      </label>
                    <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="12/2/2012">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                   
                    <div class="control-group">
                      <label class="control-label">Tarikh Tamat
                      </label>
                   <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="12/2/2013">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                      
                      </p>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a></div>
                  </div>
                        </td>
					</tr>
                     <tr>
                        <td><span class="name">2.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone">Dokumen B</td>
                        <td class="hidden-phone">Lokasi B</td>
                        <td class="hidden-phone">22/1/2012</td>
                        <td class="hidden-phone">22/1/2013</td>
                        <td class="hidden-phone">
                          <ul class="icomoon-icons-container">
                            <a href="#myModal3"  data-toggle="modal"><li class="rounded">
                              <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li></a>
                          </ul>
                        <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Kawalan Rekod Penilaian Aset
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      <div class="control-group">
                      <label class="control-label">Jenis Rekod
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" placeholder="Dokumen B">
                    </div>
                    </div>
                      <div class="control-group">
                      <label class="control-label">Lokasi
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" placeholder="Lokasi B" >
                    </div>
                    </div>
                      <hr>
                      <div class="control-group">
                      <label class="control-label">Tempoh Penyimpanan
                      </label>
                    <div class="controls">
                        
                    </div>
                    </div>
                      <div class="control-group">
                      <label class="control-label">Tarikh Mula
                      </label>
                    <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="22/1/2012">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                   
                    <div class="control-group">
                      <label class="control-label">Tarikh Tamat
                      </label>
                   <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="22/1/2013">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                      
                      </p>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a></div>
                  </div></td>
					</tr>
                       <tr>
                        <td><span class="name">3.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">Dokumen C</td>
                        <td class="hidden-phone">Lokasi C</td>
                        <td class="hidden-phone">15/5/2012</td>
                        <td class="hidden-phone">15/5/2013</td>
                        <td class="hidden-phone">
                          <ul class="icomoon-icons-container">
                            <a href="#myModal3"  data-toggle="modal"><li class="rounded">
                              <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li></a>
                            </ul>
                        <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Kawalan Rekod Penilaian Aset
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      <div class="control-group">
                      <label class="control-label">Jenis Rekod
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" placeholder="Dokumen c">
                    </div>
                    </div>
                      <div class="control-group">
                      <label class="control-label">Lokasi
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" placeholder="Lokasi c" >
                    </div>
                    </div>
                      <hr>
                      <div class="control-group">
                      <label class="control-label">Tempoh Penyimpanan
                      </label>
                    <div class="controls">
                        
                    </div>
                    </div>
                      <div class="control-group">
                      <label class="control-label">Tarikh Mula
                      </label>
                    <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="15/5/2012">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                   
                    <div class="control-group">
                      <label class="control-label">Tarikh Tamat
                      </label>
                   <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="15/5/2013">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                      
                      </p>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a></div>
                  </div></td>
					</tr>
                     </tbody>
                  </table>

                  
                  <p>&nbsp;</p>
                  <p>Memaparkan 5 dari 20 senarai</p>
                  <div class="pagination no-margin" align="right">
                    <ul>
                      <li><a href="#" data-original-title="">Pertama</a></li>
                      <li><a href="#" data-original-title="">Sebelum</a></li>
                      <li class="active"><a href="#" data-original-title="">1</a></li>
                      <li><a href="#" data-original-title="">2</a></li>
                      <li><a href="#" data-original-title="">3</a></li>
                      <li><a href="#" data-original-title="">4</a></li>
                      <li class="hidden-phone"><a href="#" data-original-title=""> Akhir</a></li>
                    </ul>
                  </div>

                </div>
              	</div>
            	</div>
                </div>
            
          
            
            	<div align="right">
            		<a href="<?php echo site_url('pnpa/summary_ptf_pnpa_edit') ?>"><button class="btn btn-danger input-top-margin" type="button">
                        Batal
                  </button></a>
                     
                      <a href="<?php echo site_url('pnpa/summary_ptf_pnpa_edit') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Simpan
                      </button></a> </form>
           	  </div>
                
                
             </div>
      </div>
   		   </div>
		</div>