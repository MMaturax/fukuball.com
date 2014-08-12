
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
        </style>
        <!-- Vendor js -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- drawer js -->
        <script src="/public/drawer/dist/js/drawer.js"></script>
        <script src="http://hammerjs.github.io/dist/hammer.min.js"></script>
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

            function mainSwipeLeft () {

                console.log('mainSwipeLeft');

            }

            function mainSwipeRight () {

                console.log('mainSwipeRight');

            }

            $(document).ready(function(){

                $('#drawer').drawer();

                $('.js-trigger').click(function(){
                  var selectVal = $('.js-select').val();
                  chengeClass(selectVal);
                });
                $('.js-select').change(function(){
                  var valClass = $(this).val();
                  chengeClass(valClass);
                });

                var main_block = Hammer($('#main-block'));
                main_block.on("swipeleft", mainSwipeLeft);
                main_block.on("swiperight", mainSwipeRight);

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
                        <a href="#">Drawer</a>
                    </div>
                    <ul class="nav drawer-nav-list">
                        <li><a href="#">fukubal.com</a></li>
                        <li><a href="#">Twitter @fukuball</a></li>
                        <li><a href="#">GitHub @fukuball</a></li>
                    </ul>
                </nav>
            </div>
            <div class="drawer-overlay">
                <main id="main-block" class="site-masthead" role="main">
                    <div class="container">
                        <span class="text-icon text-icon-lg text-icon-outline">D</span>
                        <h1>drawer</h1>
                        <p class="lead">jQuery plugin for displaying the drawer menu using CSS animations in the event of a trigger. Setting the position can be selected either the right or left. And also supports Responsive design.</p>
                        <p class="center-block form-inline" style="max-width:480px">
                            <select class="form-control input-lg js-select">
                                <optgroup label="Basic">
                                    <option value="drawer-left">Left Drawer</option>
                                    <option value="drawer-right">Right Drawer</option>
                                </optgroup>
                                <optgroup label="Responsive">
                                    <option value="drawer-left drawer-responsive">Left Drawer</option>
                                    <option value="drawer-right drawer-responsive">Right Drawer</option>
                                </optgroup>
                            </select>
                            <button class="btn btn-lg js-trigger" style="padding:10px 16px; background-color:#fff;color:#666;">Open</button>
                        </p>
                    </div><!-- /.container -->
                </main>
                <div class="site-body">
                    <div class="site-body-inner container">
                        <div class="site-section">
                        </div>
                    </div><!-- /.container -->
                </div><!-- /.site-body -->
                <footer class="site-footer">
                    <div class="site-footer-inner container">
                        <h2>Drawer Drag</h2>
                    </div>
                </footer>
            </div>
        </div><!-- /.site-wrapper -->
    </body>
</html>