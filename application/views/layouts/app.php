<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <!-- apakah ada variable $title ?, jika ada tampilkan $title, jika tidak ada tampilkan data STRING 'CIShop -->
    <title><?= isset($title) ? $title : 'CIShop' ?> - Codeigniter E-Commerce</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/libs/bootstrap-4.5.0/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/libs/fontawesome/css/all.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <!-- Custom styles for this template -->
    <link href="/assets/libs/bootstrap-4.5.0/examples/navbar-fixed/navbar-top-fixed.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/libs/bootstrap-4.5.0/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/assets/libs/bootstrap-4.5.0/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/assets/libs/bootstrap-4.5.0/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/assets/libs/bootstrap-4.5.0/img/favicons/manifest.json">
    <link rel="mask-icon" href="/assets/libs/bootstrap-4.5.0/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/assets/libs/bootstrap-4.5.0/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/assets/libs/bootstrap-4.5.0/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('layouts/_navbar'); ?>
    <!-- End Navbar -->

    <!-- Content -->
    <!-- Variable $page ini diambil dari Controller Home.php pada $data['page'] -->
    <?php $this->load->view($page); ?>
    <!-- End Conten -->

    <script src="/assets/libs/jquery/jquery-3.5.1.min.js"></script>
    <script src="/assets/libs/bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app.js"></script>

</body>

</html>