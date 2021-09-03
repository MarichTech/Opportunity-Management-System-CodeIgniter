<!doctype html>
<html lang="en">
    <head>
        <title>O.M</title>
        
        <!-- Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <!-- Datatables CSS-->

        
       
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
        <!-- Assets/Css -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #112E48;">
        <div class="container-fluid">

            <a class="navbar-brand" href="<?php echo base_url(); ?>">Opportunity-Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <!-- Display all the time -->
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
                </li>

                 <!-- Display when user is [ logged in ] -->
                <?php if($this->session->userdata('logged_in')) : ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>accounts">Accounts</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>opportuinity">Opportuinities</a>
                </li>
                <?php endif; ?>
            </ul>

               
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
                <!-- Display when user is [ logged in ] -->
                <?php if($this->session->userdata('logged_in')) : ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>accounts/create">Create Account</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>opportuinity/create">Create Opportunity</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
                </li>
                <?php endif; ?>

                <!-- Display when user is has [ not logged in ] -->
                <?php if(!$this->session->userdata('logged_in')) : ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
                </li>
                <?php endif; ?> 

            </ul>
            
            </div>
        </div>
    </nav>
    <div class="container">

    <br>

    
    <!-- Adding Alert icons -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    <!-- End of Alert icons -->


    <!-- Stand by flash data ready for display -->
   
    <!-- account_updated flash data ready for display [Info] -->
    <?php if($this->session->flashdata('account_updated')): ?>
        <?php echo 
       '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info::"><use xlink:href="#info-fill"/></svg>
        '.$this->session->flashdata('account_updated').'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'  ?>
    <?php endif; ?>

    <!-- account_deleted flash data ready for display [Warning] -->
    <?php if($this->session->flashdata('account_deleted')): ?>
        <?php echo 
       '<div class="alert alert-warning  alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        '.$this->session->flashdata('account_deleted').'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'  ?>
    <?php endif; ?>

    <!-- account_created flash data ready for display [success]-->
    <?php if($this->session->flashdata('account_created')): ?>
        <?php echo 
       '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        '.$this->session->flashdata('account_created').'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'  ?>
    <?php endif; ?>

    <!-- user_registered flash data ready for display [success]-->
    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo 
       '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        '.$this->session->flashdata('user_registered').'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'  ?>
    <?php endif; ?>
  
     <!-- login_failed flash data ready for display [danger]-->
    <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo 
       '<div class="alert alert-danger  alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        '.$this->session->flashdata('login_failed').'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'  ?>
    <?php endif; ?>

     <!-- user_loggedin flash data ready for display [success]-->
    <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo 
       '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        '.$this->session->flashdata('user_loggedin').'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'  ?>
    <?php endif; ?>

    <!-- user_loggedout flash data ready for display [Warning] -->
    <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo 
       '<div class="alert alert-warning  alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        '.$this->session->flashdata('user_loggedout').'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>'  ?>
    <?php endif; ?>


    
