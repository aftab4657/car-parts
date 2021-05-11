    <!-- partial:../../partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <h3 class="text-white">eSync</h3>
<!--             <a class="navbar-brand brand-logo" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images/logo-white.svg') ?>" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images/logo-mini.svg')?>" alt="logo"/></a> -->
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end justify-content-lg-start">

            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="<?php echo base_url('uploads/').$_SESSION['ProfilePicture'];?>" alt="profile"/>
                  <span class="nav-profile-name"><?php echo $_SESSION['name'];  ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a href="<?php echo base_url('Setting')?>" class="dropdown-item">
                    <i class="mdi mdi-settings text-primary"></i>
                    Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo(base_url('Home/logout')) ?>">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">Home</span>
              </a>
            </li>
            <li class="nav-item mega-menu">
              <a href="#" class="nav-link">
                <i class="mdi mdi-codepen menu-icon"></i>
                <span class="menu-title">Menu</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <div class="col-group-wrapper row">
                  <div class="col-group col-md-3">
                    <p class="category-heading">URLs Listing</p>
                    <ul class="submenu-item">
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Home/UploadNewUrls')?>">Upload URLs</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>">All URLs Listing</a></li>
                    </ul>
                  </div>
                  <div class="col-group col-md-3">
                    <p class="category-heading">Scraped Data</p>
                    <ul class="submenu-item">
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('CompatibilityList/ScrapedData')?>">Compatibility List</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('EbayImportVorlage/ScrapedData')?>">Ebay Import Vorlage</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('EigenesFeldFahrzeugListeImportVorlage/ScrapedData')?>">Eigenes Feld Fahrzeug Liste Import Vorlage</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('MerkmaleImportVorlage/ScrapedData')?>">Merkmale Import Vorlage</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Restrictions/ScrapedData')?>">Restrictions</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Vorlage1TitelEanKurzbeschreibung/ScrapedData')?>">Vorlage1 Titel Ean Kurzbeschreibung</a></li>
                      
                    </ul>
                  </div>
                  <div class="col-group col-md-3">
                    <p class="category-heading">Link Scraper</p>
                    <ul class="submenu-item">
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Sellers/AddNewSeller')?>">Add New Seller</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Sellers/ScrapedData')?>">All Sellers</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('KeepaData/ScrapedData')?>">KeepaData</a></li>
                    </ul>
                  </div>
                  <div class="col-group col-md-3">
                    <p class="category-heading">Export</p>
                    <ul class="submenu-item">
                      <!--<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Logs/Scraper') ?>">Scraper Logs</a></li>-->
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Export/ScrapedData') ?>">Export Data</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>