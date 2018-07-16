<!-- Здесь находится динамическая часть страницы -->
<div class="container">

</div>
<!--about-starts-->

<style>

    .ss{
        width: 960px;
        margin: 0 auto;
    }

    .q {
        position: relative;
        margin-top: 50px;
        width: 500px;
        height: 300px;

    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0);
        transition: background 0.5s ease;
    }

    .q:hover .overlay {
        display: block;
        background: rgba(0, 0, 0, .3);
    }

    .img1 {
        position: absolute;
        width: 500px;
        height: 300px;
        left: 0;
    }

    .titlee {
        position: absolute;
        width: 500px;
        left: 0;
        top: 120px;
        font-weight: 700;
        font-size: 30px;
        text-align: center;
        text-transform: uppercase;
        color: white;
        z-index: 1;
        transition: top .5s ease;
    }

    .q:hover .titlee {
        top: 90px;
    }

    .button1 {
        position: absolute;
        width: 500px;
        left:0;
        top: 180px;
        text-align: center;
        opacity: 0;
        transition: opacity .35s ease;
    }

    .button1 a {
        width: 200px;
        padding: 12px 48px;
        text-align: center;
        color: white;
        border: solid 2px white;
        z-index: 1;
    }

    .q:hover .button1 {
        opacity: 1;
    }

</style>

<?php if ($brands): ?>
  <?php foreach ($brands as $brand):?>

    <div class="container col-sm-4">
    <div class="  ">

        <div class="container-fluid q" >
            <img class="img1" src="images/<?= $brand->image;?>" alt="" />
            <p class="titlee"><?= $brand->title;?></p>
            <div class="overlay"></div>
            <div class="button1"><a href="#"> BUTTON </a></div>
        </div>

    </div>
    </div>
    <?php endforeach;?>
<?php endif; ?>

<?php //if ($brands): ?>
<!---->
<!--<div class="about">-->
<!--    <div class="container">-->
<!--        <div class="about-top grid-1">-->
<!---->
<!--            --><?php //foreach ($brands as $brand):?>
<!--            <div  class="col-md-4 about-left">-->
<!--                <figure class="effect-bubba">-->
<!--                    <img class="img-responsive"  src="images/--><?//= $brand->image;?><!--" alt=""/>-->
<!--                    <figcaption>-->
<!--                        <h2>--><?//= $brand->title;?><!--</h2>-->
<!---->
<!--<!--                        <button type="button" class="btn btn-success">Success</button>-->
<!--                        <p>--><?//= $brand->description;?><!--</p>-->
<!--                    </figcaption>-->
<!--                </figure>-->
<!--            </div>-->
<!--            --><?php //endforeach;?>
<!--            <div class="clearfix"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<?php //endif; ?>

<!--about-end-->
<!--product-starts-->
<?php if($hits):?>
    <div class="product">
        <div class="container">
            <div class="product-top">
                <div class="product-one">

                    <?php foreach ( $hits as $hit): ?>
                    <div class="col-md-3 product-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="product/<?=$hit->alias ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$hit->img ?>" alt="" /></a>
                            <div class="product-bottom">
                                <h3> <?=$hit->title;?></h3>

<!--                                <p>Explore Now</p>-->
                                <h4>
                                    <a class="add-to-cart-link" href="cart/add?id=<?=$hit->id; ?>"><i></i></a>
<!--                                    <span class=" item_price">$ --><?//=$hit->price ?><!--</span>-->
<!--                                    --><?php //if($hit->old_price):?>
<!--                                        <smal><del>--><?//=$hit->old_price; ?><!--</del></smal>-->
<!--                                    --><?php //endif; ?>
                                </h4>
                            </div>
                            <div class="srch">
<!--                                <span>-50%</span>-->
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>


                    <div class="clearfix"></div>
                </div>


            </div>
        </div>
    </div>
<?php endif;?>
<!--product-end-->



























