<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <title><?php echo $title?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.0/datatables.min.css"/>

        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.0/datatables.min.js"></script>
<!--
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/'?>DataTables/datatables.min.css"/>

        <script type="text/javascript" src="<?php echo base_url().'/'?>DataTables/datatables.min.js"></script>
-->
        <style>
            
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
            table{font-family: "Times New Roman", Times, serif;}
            .w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
            .w3-third img:hover{opacity: 1}

            .w3-col img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
            .w3-col img:hover{opacity: 1}
            
            .circle {
              position: relative;
              display: inline-block;
              line-height: 0;
              width: 30px;
              height: 30px;
              padding: 15px 0px 0px 0px;
              border-radius: 50%;

              background: #38a9e4;
              color: white;
              font-family: "Times New Roman", Times, serif;
              font-size: 12px;
              text-align: center;

            }
            .circle_atual {
              position: relative;
              display: inline-block;
              line-height: 0;
              width: 50px;
              height: 50px;
              padding: 25px 0px 0px 0px;
              border-radius: 50%;

              background: #38a9e4;
              color: white;
              font-family: "Times New Roman", Times, serif;
              font-size: 12px;
              text-align: center;

            }
            .w3-modal{
                z-index: 10;
            }

        </style>
    </head>