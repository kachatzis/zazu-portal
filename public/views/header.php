<!DOCTYPE html>
<html lang="en">
<head>

    <?php require_once 'utils/RestrictLogin.php'; $restrict_login_o = new RestrictLogin(); if(isset($restrict_login)&&$restrict_login){ $restrict_login_o->handle(); $restrict_login=true; }else{ $restrict_login=$restrict_login_o->get_logged_in_state(); }?>

    <?php require 'utils/Config.php'; ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <!--<link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">-->
    <title><?php echo $config['header_title']; ?></title>

    <?php if(isset($page_include)&&$page_include=='index'){ ?>
      <link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap4/bootstrap.min.css">
      <link href="/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/animate.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/main_styles.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/responsive.css">
    <?php } ?>

    <?php if(isset($page_include)&&$page_include=='single'){ ?>
      <link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap4/bootstrap.min.css">
      <link href="/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/animate.css">
      <link rel="stylesheet" href="/assets/plugins/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/single_styles.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/single_responsive.css">
    <?php } ?>

    <?php if(isset($page_include)&&$page_include=='contact'){ ?>
      <link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap4/bootstrap.min.css">
      <link href="/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/animate.css">
      <link rel="stylesheet" href="/assets/plugins/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/contact_styles.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/contact_responsive.css">
    <?php } ?>

    <?php if(isset($page_include)&&$page_include=='categories'){ ?>
      <link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap4/bootstrap.min.css">
      <link href="/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/animate.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/categories_styles.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/categories_responsive.css">
    <?php } ?>

    <?php if(isset($page_include)&&$page_include=='material'){ ?>
      <link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap4/bootstrap.min.css">
      <link href="/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/OwlCarousel2-2.2.1/animate.css">
      <link rel="stylesheet" href="/assets/plugins/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/contact_styles.css">
      <link rel="stylesheet" type="text/css" href="/assets/styles/contact_responsive.css">

      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

      <link rel="stylesheet" href="/assets/styles/fix_mdl.css">

    <?php } ?>


</head>

<body>

<div class="super_container">

		<!-- Top Navigation -->

        <?php include 'utils/Menu.php';
          show_menu($restrict_login);
        ?>
