<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE_URL('assets/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="<?= BASE_URL('assets/main.css')?>">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    
    <title>Document</title>
</head>
<body>
<?php
$alldata = $this->session->userdata('alldata');
if(empty($alldata)){
  redirect('Home');
}
?>
<!-- <nav class="navbar navbar-expand-lg navbar-dark mybg text-light">
  <a class="navbar-brand" href="#">Dashboard</a>
  <span style="margin-left: 50%;"><?= $alldata[0]->name; ?></span>
  <a class="btn btn-outline-danger my-2 my-sm-0 ml-auto " href="<?= base_url('home/log_out') ?>">Logout</a>
</nav> -->

<div class="sidenav myvertibg ">
  
  <a href="<?= base_url('dashboard/'.$alldata[0]->id)?>">Dashboard</a>
  <a href="<?= base_url('calender')?>">Calender</a>
  <a href="<?= base_url('AllToDos')?>">All ToDos</a>
  <div class="bottom">
  <span class="name_style"><?= $alldata[0]->name; ?></span>
  <a class="btn btn-outline-danger logoffbtn float-right" href="<?= base_url('home/log_out') ?>"><img class="logoff" src="<?= base_url('assets/off.png') ?>"></a>
  </div>
</div>

