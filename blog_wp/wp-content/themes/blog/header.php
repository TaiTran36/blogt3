<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 */

?>
<!DOCTYPE html>
    <html lang="en" <?php if(!is_home()){ echo('style="height:100%"'); } ?>>
        <head>
            <title>Blog</title>
            <meta charset="<?php bloginfo('charset'); ?>">
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-7QZPS6543B"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-7QZPS6543B');
            </script>
            </script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="Cache-control" content="no-cache">
            <?php wp_head(); ?>


            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Arima+Madurai|Alegreya|Amatic+SC|Big+Shoulders+Text|Lobster|Noto+Serif|Patrick+Hand|Mitr|Cormorant|Jura|Noto+Serif|PattayaEncode+Sans+Semi+Expanded&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>
        <body <?php body_class(); ?>>
