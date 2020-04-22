<!doctype html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <?php
    if (!empty($meta_tags)) {
        foreach ($meta_tags as $meta_tag) {
            echo $meta_tag;
        }
    }
    ?>

    <?php
    if (!empty($stylesheets)) {
        foreach ($stylesheets as $stylesheet) {
            echo $stylesheet;
        }
    }
    ?>
    <script>
        var _base_url = "<?php echo base_url(); ?>";
        var base_url = "<?php echo base_url(); ?>";
    </script>
    

</head>

<body>
    <!-- begin::page loader-->
    <div class="page-loader">
        <div class="spinner-border"></div>
        <span>Loading</span>
    </div>
    <!-- end::page loader -->