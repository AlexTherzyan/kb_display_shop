<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>

    <script>
        var path = '<?=PATH;?>'
    </script>

    <!--  нужен для подтяжки скриптов и стилей в другие странички  -->
    <base href="/">

    <?=$this->getMeta();?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="../../../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="megamenu/css/ionicons.min.css">
    <link rel="stylesheet" href="megamenu/css/style.css">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--    search-->
    <style>

        .input-wrapper {
            width: 500px;
            margin: 50px auto;
            position: relative;
        }

        .input-wrapper::after {
            content: attr(data-text);
            font-size: 1.5rem;
            line-height: 0;
            height: 0;
            max-width: 100%;
            font-family: Roboto, Arial, sans-serif;
            border-bottom: 3px solid #fff;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            overflow: hidden;
            user-select: none;
            color: transparent;
        }

        .my-search {
            color: #000;
            border: none;
            padding: 0;
            border-radius: 0;
            outline: none;
            width: auto;
            min-width: 100%;
            font-size: 1.5rem;
            line-height: 3em;
            font-family: Roboto, Arial, sans-serif;
            border-bottom: 3px solid #333333;
            background-color: transparent;
        }

    </style>

    <script>

        const wrapper = document.querySelector(".input-wrapper"),
            textInput = document.querySelector("input[type='text']");

        textInput.addEventListener("keyup", event => {
            wrapper.setAttribute("data-text", event.target.value);
        });

    </script>
    <!--    search-->





</head>
<body>
<!--top-header-->
<!--<div class="top-header">-->
<!--    <div class="container">-->
<!--        <div class="top-header-main">-->
<!--            <div class="col-md-6 top-header-left">-->
<!--                <div class="drop">-->
<!--                    <div class="box">-->
<!--                        <select tabindex="4" class="dropdown drop">-->
<!--                            <option value="" class="label">Dollar :</option>-->
<!--                            <option value="1">Dollar</option>-->
<!--                            <option value="2">Euro</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="box1">-->
<!--                        <select tabindex="4" class="dropdown">-->
<!--                            <option value="" class="label">English :</option>-->
<!--                            <option value="1">English</option>-->
<!--                            <option value="2">French</option>-->
<!--                            <option value="3">German</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 top-header-left">-->
<!--                <div class="cart box_1">-->
<!--                    <a href="checkout.html">-->
<!--                        <div class="total">-->
<!--                            <span class="simpleCart_total"></span></div>-->
<!--                        <img src="images/cart-1.png" alt="" />-->
<!--                    </a>-->
<!--                    <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>-->
<!--                    <div class="clearfix"> </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="clearfix"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--top-header-->
<!--start-logo-->
<div class="logo  ">
    <a href="<?=PATH?>"><h1>Продукция</h1></a>
</div>
<!--start-logo-->

<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header" >
            <div class=" header-left">

                <div class="menu-container " style="background-color: white;">
                    <div class="menu" ">
                        <?php  new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/menu.php'
                        ]);
                        ?>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>



            <div class=" header-right" style="margin-top: 30px;">
<!--                <div class="search-bar">-->
<!--                    <input type="text" value="Поиск..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Поиск...';}">-->
<!--                    <input type="submit" value="">-->
<!--                </div>-->
<!--                <div class="input-wrapper" data-text="">-->
<!--                    <input class="my-search" type="text" placeholder="Search…">-->
<!--                </div>-->
                <form class="search-bar  action="search"autocomplete="off">
                    <input name="s" class="typeahead" id="typeahead" type="text" placeholder="Search…">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


<div class="content">
    <?=$content;?>
</div>


<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Information</h3>
                <ul>
                    <li><a href="#"><p>Specials</p></a></li>
                    <li><a href="#"><p>New Products</p></a></li>
                    <li><a href="#"><p>Our Stores</p></a></li>
                    <li><a href="contact.html"><p>Contact Us</p></a></li>
                    <li><a href="#"><p>Top Sellers</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>My Account</h3>
                <ul>
                    <li><a href="account.html"><p>My Account</p></a></li>
                    <li><a href="#"><p>My Credit slips</p></a></li>
                    <li><a href="#"><p>My Merchandise returns</p></a></li>
                    <li><a href="#"><p>My Personal info</p></a></li>
                    <li><a href="#"><p>My Addresses</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Store Information</h3>
                <h4>The company name,
                    <span>Lorem ipsum dolor,</span>
                    Glasglow Dr 40 Fe 72.</h4>
                <h5>+955 123 4567</h5>
                <p><a href="mailto:example@email.com">contact@example.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
                <form>
                    <input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="col-md-6 footer-right">
                <p>© 2015 Luxury Watches. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->





<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/simpleCart.min.js"> </script>
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<!--dropdown-->
<script src="megamenu/js/megamenu.js"></script>
<script src="js/jquery.easydropdown.js"></script>
<script type="text/javascript" src="js/memenu.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- FlexSlider -->
<script src="js/imagezoom.js"></script>
<script defer src="js/jquery.flexslider.js"></script>


<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>

<!--dropdown-->
<script src="../../../public/js/jquery.easydropdown.js"></script>
<script type="text/javascript">
    $(function() {

        var menu_ul = $('.menu_drop > li > ul'),
            menu_a  = $('.menu_drop > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="../../../public/js/main.js"></script>
<!-- search script -->
<script src="../../../public/js/typeahead.bundle.js"></script>

</body>
</html>

