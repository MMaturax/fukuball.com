
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="Drawer Drag">
        <title>Drawer Drag</title>
        <!-- icon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/public/image/show-case/drawer-drag/touch-icon-144.png">
        <link rel="shortcut icon" href="/public/image/show-case/drawer-drag/favicon.ico">
        <!-- Vendor CSS -->
        <!-- drawer is work without having to load the bootstrap. However, there is a need to adjust the style. -->
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//rawgithub.com/blivesta/ashiba/master/archive/0.3.1/css/ashiba.min.css">
        <!-- drawer CSS -->
        <link rel="stylesheet" href="/public/drawer/dist/css/drawer.css">
        <style>
        .site-masthead {
        background-color: #d90034;
        background-image: -webkit-linear-gradient(45deg, #f56314 0%, #d90034 100%);
        background-image: -o-linear-gradient(45deg, #f56314 0%, #d90034 100%);
        background-image: linear-gradient(45deg, #f56314 0%, #d90034 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#f56314, endColorstr=#d90034, GradientType=0);
        }
        #main-block {
            height: 100vh;
            margin: 0px;
            padding: 0px;
        }
        .image-wrap-rank1 {
            height: 60vh;
        }
        .image-wrap-rank2 {
            height: 20vh;
        }
        .image-wrap-rank3 {
            height: 20vh;
        }
        .image-wrap {
            position: relative;
            overflow: hidden;
            width: 100%;
        }
        .image-inner {
            position: absolute;
            top: -9999px;
            bottom: -9999px;
            left: -9999px;
            right: -9999px;
            margin: auto;
            width: 100%;
        }
        .image-overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
            box-shadow: rgb(9, 8, 9) 2px 2px 50px inset, rgb(9, 8, 9) -1px -1px 70px inset;
        }

        </style>
        <!-- Vendor js -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- drawer js -->
        <script src="/public/drawer/dist/js/drawer.js"></script>
        <script src="/public/javascript/jquery.hammer/jquery.hammer-full.min.js"></script>
        <script>

          var chengeClass = function(valClass) {
            switch(valClass) {
              case 'drawer-left':
                $("#drawer").removeClass("drawer-right drawer-responsive").addClass(valClass).drawer("open");
                $('.js-trigger').attr('disabled', false);
              break;
              case 'drawer-right':
                $("#drawer").removeClass("drawer-left drawer-responsive").addClass(valClass).drawer("open");
                $('.js-trigger').attr('disabled', false);
              break;
              case 'drawer-left drawer-responsive':
                $("#drawer").removeClass("drawer-right drawer-open").addClass(valClass).drawer("resize");
                $('.js-trigger').attr('disabled', true);
              break;
              case 'drawer-right drawer-responsive':
                $("#drawer").removeClass("drawer-left drawer-open").addClass(valClass).drawer("resize");
                $('.js-trigger').attr('disabled', true);
            }
          };

            $(document).ready(function(){

                $('#drawer').drawer();

                function menu_close() {
                    $("#drawer").drawer("close");
                }

                function menu_open() {
                    $("#drawer").drawer("open");
                }

                $('.close-link').click(function(){
                    menu_close();
                });

                var hammer_options = {};
                $("#main-block")
                    .hammer(hammer_options)
                    .on("swipeleft", function(ev) {

                        console.log(ev);
                        console.log('swipeleft');
                        menu_close();

                    })
                    .on("swiperight", function(ev) {

                        console.log(ev);
                        console.log('swiperight');
                        menu_open();

                    });

            });

        </script>
    </head>
    <body class="site-home drawer drawer-left" id="drawer">
        <div class="site-wrapper">
            <button class="drawer-toggle btn btn-outline-white">
                D
            </button>
            <div class="drawer-masta drawer-default drawer-masta-left">
                <nav class="drawer-nav " role="navigation">
                    <div class="drawer-brand">
                        <a href="#" class="close-link">Drawer</a>
                    </div>
                    <ul class="nav drawer-nav-list">
                        <li><a href="#" class="close-link">fukubal.com</a></li>
                        <li><a href="#" class="close-link">Twitter @fukuball</a></li>
                        <li><a href="#" class="close-link">GitHub @fukuball</a></li>
                    </ul>
                </nav>
            </div>
            <div class="drawer-overlay">
                <main id="main-block" class="site-masthead" role="main">
                    <!--<span class="text-icon text-icon-lg text-icon-outline">D</span>-->
                    <div class="image-wrap image-wrap-rank1">
                        <img class="image-inner" src="http://2.bp.blogspot.com/-9BVzWfjZ9ls/ThXn33BxsgI/AAAAAAAAAYY/aJdEf6xHGO0/s1600/IMG_0774.JPG" />
                        <div class="image-overlay"></div>
                    </div>
                    <div class="image-wrap image-wrap-rank2">
                        <img class="image-inner" src="http://1.bp.blogspot.com/-lHlvtP-3BVo/UDnzjd6qmTI/AAAAAAAAB74/xZGFxsUNe1M/s1600/Northern+Irelans+12+011.JPG" />
                        <div class="image-overlay"></div>
                    </div>
                    <div class="image-wrap image-wrap-rank3">
                        <img class="image-inner" src="http://3.bp.blogspot.com/-RyZv8WlFKdk/TiZ4JpI4MZI/AAAAAAAAFoY/nlzNrzO-8ds/s1600/DSC03991.JPG" />
                        <div class="image-overlay"></div>
                    </div>
                </main>
            </div>
        </div><!-- /.site-wrapper -->
    </body>
</html>