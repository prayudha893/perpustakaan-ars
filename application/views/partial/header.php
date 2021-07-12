<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
	<title>Home - Perpustakaan</title>
</head>

<body class="d-flex flex-column h-100">
    
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="<?=base_url();?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Perpustakaan ARS</span>
    </a>
    
			<ul class="nav nav-pills">
				<li class="nav-item"><a href="<?=base_url();?>" class="nav-link active" aria-current="page">Home</a></li>
				<li class="nav-item"><a href="<?=site_url('buku');?>" class="nav-link">Daftar Buku</a></li>
				<li class="nav-item"><a href="<?=site_url('anggota');?>" class="nav-link">Daftar Anggota</a></li>
				<li class="nav-item"><a href="<?=site_url('pinjam');?>" class="nav-link">Peminjaman</a></li>
				<li class="nav-item"><a href="<?=site_url('kembali');?>" class="nav-link">Pengembalian</a></li>
			</ul>
        
		</header>
        <main class="flex-shrink-0">
            <div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#"><?=$title;?></a></li>
					<li class="breadcrumb-item active" aria-current="page"><?=$sub_title;?></li>
				</ol>
			</nav>