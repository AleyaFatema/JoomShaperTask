<!DOCTYPE html>
<html>
    <head>
        <title>IMAGEFOLIO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="The media library page">
        <meta name="author" content="Aleya Fatema">
        <link rel="stylesheet" href="css/header-fixed.css">
        <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">-->
        <style type="text/css">
        <!--
        html, body {height: 100%;}
        body {
            background-color: #F6F7FB;
            padding-bottom: 30px;
        }
        #container {
           position:relative;
           min-height: 100%;
           height: auto !important;
           height: 100%;
        }
        .sub-title {
            margin: 2% auto;
            width: 60%;
            font-size: x-large;
        }
        
        .footer-fixed {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #fff;          
            text-align: center;
            border: 0.0657em solid #C8D2DE;
            padding: 2px 4px;
            height: 55px;
            box-sizing: border-box;
        }
        
        #btn-back {
            width: 80px;
            height: 32px;
            color: #267BE8;            
            margin: 5px;
            border: 1px solid #E4E9EF;
            background-color: #fff; 
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            font-weight: bold;
            font-size: 12px;
            box-shadow:0 1px 1px #ccc;
            position: absolute;
            right: 365px;
        }
        #btn-save {
            width: 100px;
            height: 32px;
            padding: 5px 10px;
            margin: 5px;
            border: none;
            background-color: #267BE8; 
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            font-weight: bold;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            position: absolute;
            right: 260px;
        }
        
        .Row {
            display: table;
            /* optional */
            border-spacing: 0;            
            background-color: #ffffff;
            padding: 5px 40px;
            margin: 0 auto;
            width: 55%;            
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            box-shadow: 5px 5px 10px #ECEDF2;
            
            height: auto;
            position:relative;
        }
        
        .Row:last-child {
            padding-bottom: 20px;
        }

        .Col {
            display: table-cell;
            width:100%;
            border:  none;
            background-color: #ffffff;
            color: #7EACF7;
            font-weight: 550;
        }
        
        .Group {display: table-row-group;  width: 100%;}
        
        .TopCenter {                
            padding-left : 0;
            padding-right: 0;
            text-align: center;
            align-items: center;
            vertical-align: top;
            margin: 0 auto;            
            padding: 5px;
            width: auto;
            height: auto;
            border: 1px solid #C8D2DE;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        
        .TopCenter img {
            
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        
        .middle-group { 
            
            border: 1px solid #C8D2DE;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }  
        
        .MiddleCenter {
            text-align: center;
            align-items: center;
            vertical-align: middle;
            width: 33%;
            border: none;
            margin: 0 auto;
            width: auto;
            height: auto;
        }
       
        
        .MiddleCenter input[type='button'] {
            width: 33%;
            float: left;
            margin: 0;
            background-color: #ffffff;
            color: #7F8386;
            border: 1px solid #C8D2DE;
            padding: 8px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            font-weight: 540;
            
        }
        
        .MiddleCenter input[type='button']:after {
            clear:both;
            content: "";
        }
        
        .MiddleCenter input[type='button']:first-child {
            background-color: #E8F0FD;
        }
        
        .MiddleCenter input[type='button']:active, 
        .MiddleCenter input[type='button']:visited,
        .MiddleCenter input[type='button']:focus,
        .MiddleCenter input[type='button']:focus-within {
            border: none;            
           
        }
        .MiddleCenter input[type='button']:hover {
            background-color: #E8F0FD;
            color:#3E7FF3;
            font-weight: 700;
        }
        
        .BottomCenter {
            text-align: center;
            align-items: center;
            vertical-align: bottom;
            width: 100%;
            height: auto;
            
        }
        
        .btn-highlight {
            background-color: #E8F0FD;
        }
        .grid-container {
          display: grid;
          grid-template-columns: 1fr 1fr 1fr 1fr;
          grid-template-rows: 1fr 1fr;
          gap: 2px 2px;
          grid-template-areas: "filter1" "filter2" "filter3" "filter4",
                                "filter5" "filter6" "filter7" "filter8";
          object-fit: cover;
          width: 100%;
        }
        .filter1 { grid-area: "filter1"; border: 1px solid #C8D2DE; filter: none;}
        .filter2 { grid-area: "filter2"; filter: grayscale(100%);}
        .filter3 { grid-area: "filter3"; filter:sepia(100%);}
        .filter4 { grid-area: "filter4"; filter:invert(100%);} 
        .filter5 { grid-area: "filter5"; }
        .filter6 { grid-area: "filter6"; -webkit-filter: saturate(200%); /* Chrome, Safari, Opera */ filter: saturate(200%);}
        .filter7 { grid-area: "filter7"; filter:hue-rotate(200deg);}
        .filter8 { grid-area: "filter8"; filter:opacity(75%);}
        
        .filter1, .filter2, .filter3, .filter4,
        .filter5, .filter6, .filter7, .filter8 {
            
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        
        -->
        </style>
    </head>
    <body>
    <div id="container">
        <?php
        $img_src = urldecode($_POST['img_src']);
        $p = urldecode($_POST['p']);
        $img_id = urldecode($_POST['img_id']);
        ?>
        <!-- Header goes here       -->
        <header class="header-fixed">
            <div class="header-limiter">
                <h1><a href="#">Imagefolio</a></h1>
            </div>
        </header>

        <!-- need this element to prevent the content of the page from jumping up -->
        <div class="header-fixed-placeholder"></div>
        <div class="sub-title"><?php echo basename($img_src); ?></div>
        
        <!--<img src="default.jpg" onerror="this.src='ImageNotFound.jpg'" />-->
        
        <!-- The content of the page would goes here. -->
        
            <!-- Image goes here -->
            <div class="Row">
                <div class="Col TopCenter">
                    <img src="<?php echo $img_src; ?>" width="400px" height="200px" />
                </div>
            </div>
            <!-- Action buttons goes here -->
            <div class="Row">
                <div class="Col MiddleCenter middle-group">
                    <input type="button" value="Filter" id="btn-filter" name="btn-filter" class="btn-highlight" />
                    <input type="button" value="Adjust" id="btn-adjust" name="btn-adjust" />
                    <input type="button" value="Crop" id="btn-crop" name="btn-crop" />
                </div>
            </div>
            <!-- Filter image goes here -->
            <div class="Row">
                <div class="Col BottomCenter">
                    <!--<input type="button" value="BottomCenter">-->
                    <div class="grid-container">
                        <div class="filter1">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="original" onclick="changeTopImg(this);" />
                        </div>
                        <div class="filter2">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="greyscale" onclick="changeTopImg(this);" />
                        </div>
                        <div class="filter3">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="sepia" onclick="changeTopImg(this);" />
                        </div>
                        <div class="filter4">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="invert" onclick="changeTopImg(this);" />
                        </div>
                        <div class="filter5">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="duotone" onclick="changeTopImg(this);" />
                        </div>
                        <div class="filter6">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="warm" onclick="changeTopImg(this);" />
                        </div>
                        <div class="filter7">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="cool" onclick="changeTopImg(this);" />
                        </div>
                        <div class="filter8">
                            <img src="<?php echo $img_src; ?>" width="100px" height="80px" id="dramatic" onclick="changeTopImg(this);" />
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
        
        
        <!-- Footer goes here -->
        <footer class="footer-fixed">
            <input type="button" id="btn-back" value="Back" onclick="goBack();" />
            <input type="button" id="btn-save" value="Save" onclick="saveFilteredImage();" />
        </footer>
        </div>
        
        <script type="text/javascript" src="js/script-editor.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>