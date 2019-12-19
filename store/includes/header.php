<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= isset($PageTitle) ? $PageTitle : "Optima Inventory" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!-- Additional tags here -->
    <?php if (function_exists('customPageHeader')) {
        customPageHeader();
    } ?>
    <link href="<?= $path ?>/main.css" type="text/css" rel="stylesheet">
    <link href="<?= $path ?>/assets/style.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <?php

    if (function_exists('modal')) {
        modal();
    } ?>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"><span></span></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-lg-right text-md-center text-sm-center">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">

                                    <?php echo get_ses('name'); ?>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    <div class="widget-subheading">
                                        <?= get_designation(get_ses('designation')) ?>
                                    </div>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= $path ?>/index.php?page=user" tabindex="0" class="dropdown-item">My Profile</a>
                                    <!-- <button type="button" tabindex="0" class="dropdown-item">Settings</button> -->
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="<?= $path ?>/logout.php" tabindex="0" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li <?php active('home'); ?>>
                                <a href="<?= $path ?>/index.php?page=home">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Dashboard
                                </a>
                            </li>
                            <?php
                            $previlige = get_ses('designation');
                            if ($previlige == 1 || $previlige == 2 || $previlige == 3) { ?>
                                <!-- Merchandising -->
                                
                            <?php
                            }
                            if ($previlige == 1 || $previlige == 2 || $previlige == 4) {
                            ?>
                                <!-- Commercial -->
                              
                            <?php
                            }
                            if ($previlige == 1 || $previlige == 2 || $previlige == 5) {
                            ?>
                                <!-- Production -->
                                
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-server"></i>
                                        Store
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon"></i>
                                                Reports
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul>
                                                <li <?php active('fabric_store'); ?>>
                                                    <a target="_blank" href="<?= $path ?>/index.php?page=fabric_store">
                                                        <i class="metismenu-icon">
                                                        </i>Fabric Store
                                                    </a>
                                                </li>

                                                <li <?php active('accessories_report'); ?>>
                                                    <a target="_blank" href="<?= $path ?>/index.php?page=accessories_report">
                                                        <i class="metismenu-icon">
                                                        </i>Acces Report(Item)
                                                    </a>
                                                </li>
                                                <li <?php active('stationery_report'); ?>>
                                                    <a target="_blank" href="<?= $path ?>/index.php?page=stationery_report">
                                                        <i class="metismenu-icon">
                                                        </i>Stationery Report
                                                    </a>
                                                </li>
                                                <li <?php active('item_stock_report'); ?>>
                                                    <a target="_blank" href="<?= $path ?>/index.php?page=item_stock_report">
                                                        <i class="metismenu-icon">
                                                        </i>Acces Report(Buyer)
                                                    </a>
                                                </li>

                                            </ul>
                                        </li>
                                        <!-- Style -->
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon pe-7s-users"></i>
                                                Style
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul>
                                                <li <?php active('new_style'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=new_style">
                                                        <i class="metismenu-icon">
                                                        </i>New Style
                                                    </a>
                                                </li>
                                                <li <?php active('all_style'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=all_style">
                                                        <i class="metismenu-icon">
                                                        </i>All Style
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- PO -->
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon"></i>
                                                PO
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul>
                                                <li <?php active('new_po'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=new_po">
                                                        <i class="metismenu-icon"></i>
                                                        New PO
                                                    </a>
                                                </li>
                                                <li <?php active('all_po'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=all_po">
                                                        <i class="metismenu-icon"></i>
                                                        All PO
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- Buyer -->
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon pe-7s-users"></i>
                                                Buyer
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul>
                                                <li <?php active('new_buyer'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=new_buyer">
                                                        <i class="metismenu-icon">
                                                        </i>New Buyer
                                                    </a>
                                                </li>
                                                <li <?php active('all_buyer'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=all_buyer">
                                                        <i class="metismenu-icon">
                                                        </i>All Buyer
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li <?php active('color_size'); ?>>
                                            <a href="<?= $path ?>/index.php?page=color_size">
                                                <i class="metismenu-icon">
                                                </i>Color & Size
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon">
                                                </i>Fabric
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>
                                            <ul>
                                                <li <?php active('fabric_stock'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=fabric_stock">
                                                        <i class="metismenu-icon">
                                                        </i>Fabric Stock
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="metismenu-icon">
                                                        </i>Fabric Receive
                                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                    </a>
                                                    <ul>
                                                        <li <?php active('fab_received_register'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=fab_received_register">
                                                                <i class="metismenu-icon">
                                                                </i>Fabric Receive Register
                                                            </a>
                                                        </li>
                                                        <li <?php active('item_received_fab'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=item_received_fab">
                                                                <i class="metismenu-icon">
                                                                </i>Fabric Receive (Style)
                                                            </a>
                                                        </li>
                                                        <li <?php active('item_received_fab_other'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=item_received_fab_other">
                                                                <i class="metismenu-icon">
                                                                </i>Fabric Receive (Other)
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="metismenu-icon">
                                                        </i>Fabric Issue
                                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                    </a>
                                                    <ul>
                                                        <li <?php active('fab_issue_stock'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=fab_issue_stock">
                                                                <i class="metismenu-icon">
                                                                </i>Fabric Issue Register
                                                            </a>
                                                        </li>
                                                        <li <?php active('fab_issue'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=fab_issue">
                                                                <i class="metismenu-icon">
                                                                </i>Fabric Issue (Style)
                                                            </a>
                                                        </li>
                                                        <li <?php active('fab_issue_other'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=fab_issue_other">
                                                                <i class="metismenu-icon">
                                                                </i>Fabric Issue (Other)
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon">
                                                </i>Accessories
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>

                                            <ul>

                                                <!-- Item -->
                                                <li>
                                                    <a href="#">
                                                        <i class="metismenu-icon pe-7s-users"></i>
                                                        Item
                                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                                    </a>
                                                    <ul>
                                                        <li <?php active('new_item'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=new_item">
                                                                <i class="metismenu-icon">
                                                                </i>New Item
                                                            </a>
                                                        </li>
                                                        <li <?php active('all_item'); ?>>
                                                            <a href="<?= $path ?>/index.php?page=all_item">
                                                                <i class="metismenu-icon">
                                                                </i>All Items
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li <?php active('item_stock'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=item_stock">
                                                        <i class="metismenu-icon">
                                                        </i>Item Stock
                                                    </a>
                                                </li>
                                                <li <?php active('item_received'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=item_received">
                                                        <i class="metismenu-icon">
                                                        </i>Item Received
                                                    </a>
                                                </li>
                                                <li <?php active('item_issue_access'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=item_issue_access">
                                                        <i class="metismenu-icon">
                                                        </i>Item Issue
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="metismenu-icon">
                                                </i>Stationery
                                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                            </a>

                                            <ul>
                                                <li <?php active('new_stationary'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=new_stationary">
                                                        <i class="metismenu-icon">
                                                        </i>All Items
                                                    </a>
                                                </li>
                                                <li <?php active('item_issue_stationary'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=item_issue_stationary">
                                                        <i class="metismenu-icon">
                                                        </i>Item Issue
                                                    </a>
                                                </li>
                                                <li <?php active('item_received_stationary'); ?>>
                                                    <a href="<?= $path ?>/index.php?page=item_received_stationary">
                                                        <i class="metismenu-icon">
                                                        </i>Item Received
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="app-main__outer">
                <!-- Notice -->
                <?php
                //notice('error', 'Updated Successfully');
                if (get_ses('notice')) { ?>
                    <div class="alert alert-<?php echo get_ses('notice'); ?> alert-dismissible fade show notification" data-auto-dismiss="7000" role="alert">
                        <?php echo get_ses('notice_content'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                del_ses('notice');
                del_ses('notice_content');
                ?>

                <div id="notice"></div>
                <!-- Notice -->