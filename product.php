<?php require_once 'views/inc/header.php';?>

<?php 

function genKey(){
    $length = 8;
    $str = 'abcdefghijklmnopqrstuvwxyz123456789';
    $random_str = substr(str_shuffle($str), 0, $length);
    return $random_str;
}


$product = new Product;
$items = $product->getAllProducts();


foreach($items as $item){
?>


<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-2 col-lg-3">
            <div>
                <div class="card m-50" style="width: 18rem;">
                    <img class="card-img-top" src="" alt="Card image cap" height="400px">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $item->product_name;?> </h5>
                        <p class="card-text"><?php echo $item->description?></p>

                        <form action="./charge/save_order.php" method="POST">
                            <input type="hidden" name="email" value="aotuegeme@gmail.com">
                            <input type="hidden" name="amount" value="15000">
                            <input type="hidden" name="cartid" value="<?php echo genKey()?>">
                            <button class="btn btn-outline-success" type="submit" name="save_order" id="save-order"
                                title="Save Order">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php } ?>

<?php require_once 'views/inc/footer.php';?>