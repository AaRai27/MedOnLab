<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/icon.png') ?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.10/dist/sweetalert2.min.css">
    
    <!-- DataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <title><?= $title ?></title>
</head>

<body>

    <!-- ----------------------------------- Navbar ----------------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1eb2a6;">
        <a class="navbar-brand text-light logo-navbar" href="<?= base_url() ?>"><img src="<?= base_url('assets/img/logo-lands.png') ?>" width="120"></a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link text-white active" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item text-white nav-link" href="<?= base_url('user/daftar') ?>">Pendaftaran</a>
                <a class="nav-item text-white nav-link" href="<?= base_url('user/infosehat') ?>">Info Kesehatan</a>
            </div>
        </div>
        <form class="form-inline">
            <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
            <a href="<?= base_url('user/login') ?>" class="btn btn-outline-primary my-2 my-sm-0 mx-2 text-white" type="button">Login</a>
            <a href="<?= base_url('user/register') ?>" class="btn btn-outline-primary my-2 my-sm-0 text-white" type="button">Register</a>
        </form>
    </nav>
    <!-- ----------------------------------- Navbar ----------------------------------- -->