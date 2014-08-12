
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
        html, body {margin: 0; padding: 0; overflow: hidden}
        body {
            background-color: #eee;
            background-image: url('/public/image/background/linen.jpg');
            background-repeat: repeat;
        }
        #main-block {
            height: 100vh;
            margin: 0px;
            padding: 0px;
        }
        .image-wrap-rank-top {
            height: 0vh;
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
        .image-wrap-rank-bottom {
            height: 0vh;
        }
        .image-wrap-rank70 {
            height: 70vh;
        }
        .image-wrap-rank30 {
            height: 30vh;
        }
        .image-wrap-rank100 {
            height: 100vh;
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
        .height-transition {
            -webkit-transition: height 1s; /* For Safari 3.1 to 6.0 */
            transition: height 1s;
        }

        </style>
        <!-- Vendor js -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- drawer js -->
        <script src="/public/drawer/dist/js/drawer.js"></script>
        <script src="/public/javascript/jquery.hammer/jquery.hammer-full.min.js"></script>
        <script>

            document.ontouchmove = function(event){
                event.preventDefault();
            }

            $(document).ready(function(){

                var current_card = 1;
                var card_num = 4;

                function menu_close() {
                    $("#drawer").drawer("close");
                }

                function menu_open() {
                    $("#drawer").drawer("open");
                }

                function photo_swipeup() {

                    if ((card_num-current_card)==2) {

                        $(".image-wrap-rank1").removeClass('image-wrap-rank1').addClass('image-wrap-rank-top');
                        $(".image-wrap-rank2").removeClass('image-wrap-rank2').addClass('image-wrap-rank70');
                        $(".image-wrap-rank3").removeClass('image-wrap-rank3').addClass('image-wrap-rank30');
                        current_card = current_card+1;

                    } else if ((card_num-current_card)==1) {

                        $(".image-wrap-rank70").removeClass('image-wrap-rank70').addClass('image-wrap-rank-top');
                        $(".image-wrap-rank30").removeClass('image-wrap-rank30').addClass('image-wrap-rank100');
                        current_card = current_card+1;

                    } else if ((card_num-current_card)==0) {

                    } else {

                        $(".image-wrap-rank1").removeClass('image-wrap-rank1').addClass('image-wrap-rank-top');
                        $(".image-wrap-rank2").removeClass('image-wrap-rank2').addClass('image-wrap-rank1');
                        $(".image-wrap-rank3").removeClass('image-wrap-rank3').addClass('image-wrap-rank2');
                        $(".image-wrap-rank-bottom").first().removeClass('image-wrap-rank-bottom').addClass('image-wrap-rank3');
                        current_card = current_card+1;

                    }

                }

                function photo_swipedown() {

                    if (current_card==1) {

                    } else if ((card_num-current_card)==0) {

                        $(".image-wrap-rank100").removeClass('image-wrap-rank100').addClass('image-wrap-rank30');
                        $(".image-wrap-rank-top").last().removeClass('image-wrap-rank-top').addClass('image-wrap-rank70');
                        current_card = current_card-1;

                    } else if ((card_num-current_card)==1) {

                        $(".image-wrap-rank30").removeClass('image-wrap-rank30').addClass('image-wrap-rank3');
                        $(".image-wrap-rank70").removeClass('image-wrap-rank70').addClass('image-wrap-rank2');
                        $(".image-wrap-rank-top").last().removeClass('image-wrap-rank-top').addClass('image-wrap-rank1');
                        current_card = current_card-1;

                    } else {

                        $(".image-wrap-rank3").removeClass('image-wrap-rank3').addClass('image-wrap-rank-bottom');
                        $(".image-wrap-rank2").removeClass('image-wrap-rank2').addClass('image-wrap-rank3');
                        $(".image-wrap-rank1").removeClass('image-wrap-rank1').addClass('image-wrap-rank2');
                        $(".image-wrap-rank-top").last().removeClass('image-wrap-rank-top').addClass('image-wrap-rank1');
                        current_card = current_card-1;

                    }

                }

                $('#drawer').drawer();

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

                    })
                    .on("swipeup", function(ev) {

                        console.log(ev);
                        console.log('swipeup');
                        photo_swipeup();

                    })
                    .on("swipedown", function(ev) {

                        console.log(ev);
                        console.log('swipedown');
                        photo_swipedown();

                    })

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
                        <a href="#" class="close-link">Drawer Drag</a>
                    </div>
                    <ul class="nav drawer-nav-list">
                        <li><a href="/" class="close-link">fukubal.com</a></li>
                        <li><a href="http://blog.fukuball.com/" class="close-link">Blog @fukuball</a></li>
                        <li><a href="https://www.facebook.com/fukuball" class="close-link">Facebook @fukuball</a></li>
                        <li><a href="https://twitter.com/fukuball" class="close-link">Twitter @fukuball</a></li>
                        <li><a href="https://www.linkedin.com/in/fukuball" class="close-link">Linkedin @fukuball</a></li>
                        <li><a href="https://github.com/fukuball" class="close-link">Github @fukuball</a></li>
                        <li><a href="https://coderwall.com/fukuball" class="close-link">Coderwall @fukuball</a></li>
                    </ul>
                    <p>
                        Please Swipe Up / Down To Change Image Display
                    </p>
                </nav>
            </div>
            <div class="drawer-overlay">
                <main id="main-block" class="site-masthead" role="main">
                    <!--<span class="text-icon text-icon-lg text-icon-outline">D</span>-->
                    <div class="image-wrap image-wrap-rank1 height-transition" data-card="1">
                        <img class="image-inner" src="http://2.bp.blogspot.com/-9BVzWfjZ9ls/ThXn33BxsgI/AAAAAAAAAYY/aJdEf6xHGO0/s1600/IMG_0774.JPG" />
                        <div class="image-overlay"></div>
                    </div>
                    <div class="image-wrap image-wrap-rank2 height-transition" data-card="2">
                        <img class="image-inner" src="http://1.bp.blogspot.com/-lHlvtP-3BVo/UDnzjd6qmTI/AAAAAAAAB74/xZGFxsUNe1M/s1600/Northern+Irelans+12+011.JPG" />
                        <div class="image-overlay"></div>
                    </div>
                    <div class="image-wrap image-wrap-rank3 height-transition" data-card="3">
                        <img class="image-inner" src="http://3.bp.blogspot.com/-RyZv8WlFKdk/TiZ4JpI4MZI/AAAAAAAAFoY/nlzNrzO-8ds/s1600/DSC03991.JPG" />
                        <div class="image-overlay"></div>
                    </div>
                    <div class="image-wrap image-wrap-rank-bottom height-transition" data-card="4">
                        <img class="image-inner" src="http://www.maisonminervois.com/wp-content/gallery/local-scenery/160520092492.jpg" />
                        <div class="image-overlay"></div>
                    </div>
                </main>
            </div>
        </div><!-- /.site-wrapper -->
    </body>
</html>