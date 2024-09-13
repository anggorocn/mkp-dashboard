<style type="text/css">
     /* Style the list */
    ul.breadcrumb {
      padding: 6px 10px;
      list-style: none;
      background-color: #eee;
    }

    /* Display list items side by side */
    ul.breadcrumb li {
      display: inline;
      font-size: 12px;
    }

    /* Add a slash symbol (/) before/behind each list item */
    ul.breadcrumb li+li:before {
      padding: 8px;
      color: black;
      content: "/\00a0";
    }

    /* Add a color to all links inside the list */
    ul.breadcrumb li a {
      color: #0275d8;
      text-decoration: none;
    }

    /* Add a color on mouse-over */
    ul.breadcrumb li a:hover {
      color: #01447e;
      text-decoration: underline;
    } 
</style>


 <ul class="breadcrumb">
  <li><a href="app/">Home</a></li>
  <li><a href="app/index/bod_note">BOD Notes</a></li>
  <!-- <li><a href="#">Pictures</a></li>
  <li><a href="#">Summer 15</a></li> -->
  <li>BOD Notes</li>
</ul> 
<div class="row">
  <div class="col-md-3">
    <div class="area-treeview-kiri">
      <div class="judul">Dashboard</div>
      <ul>
          <li><a href="#">-   KPI                                 <span>(1)</span></a></li>
          <li><a href="app/index/bod_note_financial" class="active">-   Financial                           <span>(3)</span></a></li>
          <li><a href="#">-   Stakeholder                     <span>(3)</span></a></li>
          <li><a href="#">-   Business Process                <span>(0)</span></a></li>
          <li><a href="#">-   Learning and Growth         <span>(0)</span></a></li>
      </ul>
      
      <div class="judul">Finance</div>
      <ul>
          <li><a href="#">-   Rasio Keuangan                  <span>(0)</span></a></li>
          <li><a href="#">-   Income Statement                <span>(1)</span></a></li>
          <li><a href="#">-   Balance Sheet                   <span>(5)</span></a></li>
          <li><a href="#">-   Cash Flow                           <span>(1)</span></a></li>
          <li><a href="#">-   Asset                               <span>(2)</span></a></li>
          <li><a href="#">-   Investasi                           <span>(0)</span></a></li>
      </ul>
      <div class="judul">SDM</div>
      <ul>
          <li><a href="#">-   HR Overview                     <span>(4)</span></a></li>
          <li><a href="#">-   Pelatihan                           <span>(1)</span></a></li>
          <li><a href="#">-   Sertifikasi                         <span>(0)</span></a></li>
          <li><a href="#">-   Recruitment                     <span>(0)</span></a></li>
      </ul>
    </div>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tulis BOD Notes</a> -->
  </div>
  <div class="col-md-9">

    <div class="card card-10 card-konten">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">BOD Notes : <span class="nama-modul">FINANCIAL</span></h6>
          <div class="card-filter">
            <label>Status : </label>
            <select>
              <option>Selesai</option>
              <option>Berkelanjutan</option>
              <option>Tindak Lanjut</option>
            </select>  
          </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="area-bod-note">
          <div class="row">
            <div class="col-md-4">
              <div class="item">
                <div class="header">
                    <div class="foto">
                      <div class="inner"><img src="images/img-user-note.jpg"></div>
                    </div>
                    <div class="info-nama">
                        <div class="nama">Julian Roberts</div>
                        <div class="jabatan">Direktur Umum</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="isi">
                    <div class="isi-info">
                        <div class="modul">Note untuk Finance</div>
                        <div class="waktu">27 Juni 2024, 11:21 AM</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="isi-keterangan">
                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item">
                <div class="header">
                    <div class="foto">
                      <div class="inner"><img src="images/img-user-note.jpg"></div>
                    </div>
                    <div class="info-nama">
                        <div class="nama">Laura Schellen</div>
                        <div class="jabatan">Direktur Keuangan</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="isi">
                    <div class="isi-info">
                        <div class="modul">Note untuk Finance</div>
                        <div class="waktu">27 Juni 2024, 11:21 AM</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="isi-keterangan">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item">
                <div class="header">
                    <div class="foto">
                      <div class="inner"><img src="images/img-user-note.jpg"></div>
                    </div>
                    <div class="info-nama">
                        <div class="nama">Alexander Indra Putra</div>
                        <div class="jabatan">Direktur Teknik</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="isi">
                    <div class="isi-info">
                        <div class="modul">Note untuk Finance</div>
                        <div class="waktu">27 Juni 2024, 11:21 AM</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="isi-keterangan">
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                    </div>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
          <!-- <div class="row">
              <div class="col-md-7 padding-left-none">
                  <div class="title">KPI</div>
                  <div class="nilai-info">
                      102,11
                      <span><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                  </div>
              </div>
              <div class="col-md-5 padding-left-none padding-right-none">
                  <div class="item-data-angka">
                      <div class="title">Last month</div>
                      <div class="nilai">99,31</div>
                  </div>
                  <div class="item-data-angka">
                      <div class="title">YoY</div>
                      <div class="nilai">97,97%</div>
                  </div>
              </div>
          </div> -->
      </div>
  </div>

    

  </div>
</div>

<!-- <script type="text/javascript">
    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
      toggler[i].addEventListener("click", function() {
        this.parentElement.querySelector(".nested").classList.toggle("active");
        this.classList.toggle("caret-down");
      });
    } 
</script> -->