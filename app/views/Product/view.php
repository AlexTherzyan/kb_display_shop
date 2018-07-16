
<!--start-breadcrumbs-->

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">

                <?=$breadcrumbs; ?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="container">
<div class="single contact">
    <div class="container">
        <div class="single-main">


            <div class="col-md-9 single-main-left">
                <div class="sngl-top">



                    <div class="col-md-5 single-top-left">

                        <?php if ($gallery): ?>
                            <div class="flexslider">
                                <ul class="slides">
                                   <?foreach ($gallery as $item): ?>
                                        <li data-thumb="images/<?=$item->img;?>">
                                            <div class="thumb-image"> <img src="images/<?=$item->img?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                        </li>
                                   <? endforeach; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <img src="images/<?=$product->img;?>" alt="">
                        <?php endif; ?>

                    </div>


                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?=$product->title ?></h2>
                            <!--                            <div class="star-on">-->
                            <!--                                <ul class="star-footer">-->
                            <!--                                    <li><a href="#"><i> </i></a></li>-->
                            <!--                                    <li><a href="#"><i> </i></a></li>-->
                            <!--                                    <li><a href="#"><i> </i></a></li>-->
                            <!--                                    <li><a href="#"><i> </i></a></li>-->
                            <!--                                    <li><a href="#"><i> </i></a></li>-->
                            <!--                                </ul>-->
                            <!--                                <div class="review">-->
                            <!--                                    <a href="#"> 1 customer review </a>-->
                            <!---->
                            <!--                                </div>-->
                            <!--                                <div class="clearfix"> </div>-->
                            <!--                            </div>-->

                            <!--                            <h5 class="item_price">$ 95.00</h5>-->
                            <p><?=$product->content?></p>
                            <div class="available">
                                <ul>
                                    <li>Color
                                        <select>
                                            <option>Silver</option>
                                            <option>Black</option>
                                            <option>Dark Black</option>
                                            <option>Red</option>
                                        </select></li>
                                    <li class="size-in">Size<select>
                                            <option>Large</option>
                                            <option>Medium</option>
                                            <option>small</option>
                                            <option>Large</option>
                                            <option>small</option>
                                        </select></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>

                            <div class="quantity">
                                <a id="productAdd" data-id="<?=$product->id;?>" href="cart/add?id=<?=$product->id;?>" class="add-cart item_add">В корзину</a>
                                <input type="number" size="4" value="1" name="quantity" min="1" step="1">

                            </div>
                        </div>
                    </div>



                    <div class="clearfix"> </div>
                </div>





                <div class="tabs">
                    <ul class="menu_drop">
                        <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Описание</a>
                        <ul>
                            <li class="subitem2" style="background-color: white">

                                <?=$product->characteristics;?>

                            </li>
                        </ul>

                        </li>
                        <li class="item2"><a href="#"><img src="images/arrow.png" alt="">Технические характеристики</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#"><img src="images/arrow.png" alt="">Документация</a>
                            <ul>
                                <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="#"><img src="images/arrow.png" alt="">Комплектность</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
<!--====================================================== Похожие товары   =========================================-->
                <?php if ($related): ?>
                <div class="latestproducts">
                    <div class="product-one">
                        <h3>ПОХОЖИЕ ТОВАРЫ:</h3>
                        <?php foreach ($related as $item): ;?>
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$item['img'];?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3>
                                        <a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a>
                                    </h3>

                                    <h4>
                                        <a class="item_add add-to-cart-link" href="cart/add?id=<?=$item['id'];?>" data-id="<?=$item['id'];?>"><i></i></a>
<!--                                        <span class=" item_price">$ 329</span>-->
                                    </h4>
                                </div>
<!--                                <div class="srch">-->
<!--                                    <span>-50%</span>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endif; ?>
<!--=================================================================================================================-->
<!--====================================================== Просмотренные товары =====================================-->
                <?php if ($recentlyViewed): ?>
                <div class="latestproducts">
                    <div class="product-one">
                        <h3>ПРОСМОТРЕННЫЕ ТОВАРЫ:</h3>
                        <?php foreach ($recentlyViewed as $item): ;?>
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="/product/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$item['img'];?>" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3>
                                            <a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a>
                                        </h3>

                                        <h4>
                                            <a class="item_add add-to-cart-link" href="cart/add?id=<?=$item['id'];?>" data-id="<?=$item['id'];?>"><i></i></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            </div>

<!--=================================================================================================================-->

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
</div>
<!--end-single-->