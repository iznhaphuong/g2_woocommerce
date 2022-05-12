<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php wp_head(); ?>


    <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap');
    .gradient-custom {
        /* fallback for old browsers */
        background: #5ee7df;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(94, 231, 223, 0.5), rgba(180, 144, 202, 0.5));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(94, 231, 223, 0.5), rgba(180, 144, 202, 0.5))
    }
    .title-cart {
        transform: translateY(50%)!important;
    }
    .start-0-fix {
        left: 12px;
    }
    .btn-fix {
        margin-left: 5%;
    }
    </style>
</head>

<body <?php body_class(); 
?>>
    <!--container-->
    <div id="container">
        <?php get_template_part( 'template-parts/header/site-header' ); ?>