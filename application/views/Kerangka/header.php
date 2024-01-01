<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/') ?>img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url('assets/') ?>img/favicon.png">
  <title>
    Terasco
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/') ?>css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url('assets/') ?>css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/24bb2e48ac.js" crossorigin="anonymous"></script> 

  <link href="<?= base_url('assets/') ?>css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/') ?>css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="<?= base_url('assets/') ?>img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Terasco</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <?php if ($user['role'] == 'Owner') : ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Beranda/') ?>">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url('Beranda/history_report') ?>">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">History Report</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url('Beranda/info_barista') ?>">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-users text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Info Barista</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?= base_url('Beranda/info_menu') ?>">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-list-ul text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Info Menu</span>
            </a>
          </li>
        <?php elseif ($user['role'] == 'Barista') : ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url('Beranda/tambah_report') ?>">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Tambah Report</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?= base_url('Beranda/edit_report') ?>">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-app text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Edit Report</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./pages/rtl.html">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">RTL</span>
              </a>
            </li>
          </ul>
        <?php endif; ?>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?php echo $judul ?></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0"><?php echo $judul ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item  ">
            <a href="" class="nav-link text-white font-weight-bold px-0" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none"><?= $user['role'] ?></span>
            </a>
          </li>
          <ul class="navbar-nav px-2">
            <li class="nav-item">
              <a href="javascript:void(0);" class="nav-link text-white font-weight-bold px-0">
                <span>|</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
              <a href="<?php echo base_url('Auth/logout'); ?>" class="nav-link text-white font-weight-bold px-0" id="userDropdown">
                <span>Logout</span>
              </a>
            </li>

          </ul>


          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
          </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
          </li>
        </ul>
      </div>
      </div>
    </nav>
    <!-- End Navbar -->