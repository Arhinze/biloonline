<?php
ini_set("display_errors", '1'); //for testing purposes..

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

$prod_url = "no-product";

if(isset($_GET["url"])) {
    $prod_url = htmlentities($_GET["url"]);
}

$product_stmt = $pdo->prepare("SELECT * FROM products WHERE product_url = ? LIMIT ?, ?");
$product_stmt->execute([$prod_url, 0, 1]);
$product_data = $product_stmt->fetch(PDO::FETCH_OBJ);

if(!$product_data){
    header("location: /404.php");
}

define("PRODUCT_URL", $prod_url);
define("PRODUCT_IMAGE1", $product_data->image1);
define("PRODUCT_IMAGE2", $product_data->image2);
define("PRODUCT_IMAGE3", $product_data->image3);
define("PRODUCT_DESC", $product_data->description);
define("PRODUCT_PRICE", $product_data->price);
define("PRODUCT_CATEGORY", $product_data->category);


class Product_Segments extends Index_Segments{     
    public static function body(
        $site_name = SITE_NAME_SHORT, 
        $site_url = SITE_URL, 
        $product_url = PRODUCT_URL,
        $image1 = PRODUCT_IMAGE1,
        $image2 = PRODUCT_IMAGE2,
        $image3 = PRODUCT_IMAGE3,
        $description = PRODUCT_DESC,
        $price = PRODUCT_PRICE,
        $category = PRODUCT_CATEGORY
    ){
        $price="N ".number_format($price);
        echo <<<HTML
            <div class="main_body" style="margin:0"><!-- .main_body starts -->
                <div class="product_image_div"><!-- .product_image_div starts -->
                    <img class="product_image" src="/static/images/$image1"/>
                    <div class="upi_top_left">
                        <i class="fa fa-angle-left" style="font-size:18px;padding:6px 12px"></i>
                    </div>
                    <div class="upi_top_right">
                        <i class="fa fa-search" style="margin-right:3px"></i>
                        <i class="fa fa-share-alt"></i>
                    </div>

                    <div class="upi_bottom_left">
                        <div class="upi_bl_contents">
                            <i class="fa fa-star"></i> "High quality"
                        </div>
                        <div class="upi_bl_contents">
                            <i class="fa fa-fire" style="background-color:red"></i> 359 people bought this item
                        </div>

                        <div class="upi_bl_contents" style="background-color:#fff;color:#000">
                            <b>Item 1/6</b> <span style="color:#888">| Color </span>
                        </div>
                    </div>
                    <div class="upi_bottom_right">
                        <i class="fa fa-heart"></i>
                    </div>
                </div><!-- .product_image_div ends -->   

                <div class="below_product_images" style="margin-top:0"><!-- .below_product_images starts -->  
                    <div class="additional_product_images_div_container">
                        <div class="additional_product_images_div">
                            <img class="additional_product_image" src="/static/images/$image1"/>
                        </div>
                        <div class="additional_product_images_div">
                            <img class="additional_product_image" src="/static/images/$image2"/>
                        </div>
                        <div class="additional_product_images_div">
                            <img class="additional_product_image" src="/static/images/$image3"/>
                        </div>
                    </div>
                    <div class="product_description">
                        <!--Original Unlocked Apple iPhone 12 Pro Face ID 5G 6GB RAM 128/256GB ROM 12MP 6.7'' NFC France shipping usd smartphone 99%-->
                        $description
                    </div>

                    <div class="product_fa_star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        &nbsp; 4.8 &nbsp; | &nbsp; 2000+ sold
                    </div>

                    <div class="product_price_div">
                        <div class="product_price_top">
                            <div class="product_price_head">Choice Deals</div>
                            <div class="product_price_img_div">
                                <img class="product_price_img" src="/static/images/tiny_site_logo.png"/>
                            </div>
                        </div>
                        <div class="product_price_bottom">
                            $price
                        </div>
                    </div>
                    <div>
                        <p style="margin-bottom:-7px"><i class="fa fa-address-card-o"></i>&nbsp; Pay in NGN</p>
                        <p><i class="fa fa-ban"></i>&nbsp; Tax excluded</p>
                    </div>
                </div><!-- .below_product_images ends -->

                <div class="below_product_images"><!-- .below_product_images starts again --> 
                    <div class="commitment_container"><!-- .commitment_container starts -->
                        <div class="commitment_head">
                            <b><span style="padding:1px 4px;background-color:#ff9100;border-radius:6px">Choice</span>&nbsp; <span style="font-size:15px">Bilo<span style="color:#ff9100">Online</span> Commitment</span></b>
                        </div>
                        <div class="commitment">
                            <div class="commitment_left">
                                <i class="fa fa-bus"></i> &nbsp; Free shipping to any location.
                            </div>
                            <div class="commitment_right">
                            </div>
                        </div>

                        <div class="commitment">
                            <div class="commitment_left">
                                <i class="fa fa-reply-all"></i>&nbsp; <b>Return & refund policy</b>
                            </div>
                            <div class="commitment_right">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </div>

                        <div class="commitment">
                            <div class="commitment_left">
                                <i class="fa fa-shirtsinbulk"></i>&nbsp; <b>Security & Privacy</b>
                                &nbsp; Safe payments, secure personal...
                            </div>
                            <div class="commitment_right">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div><!-- .commitment_container ends -->
                </div><!-- .below_product_images ends again -->  



                <div class="below_product_images"><!-- .below_product_images starts again (for Related Products) -->  
        
                    <!-- Related Products start -->
                    <div class="mpdc_heading">Related products</div>
                    <div class="multiple_product_div_container"><!-- .multiple_product_div_container starts -->
                    
                    <div class="multiple_product_div"><!-- .flex_div starts(.multiple_product_div) --> 
HTML;
                $obj_array = [];
                $category_array = explode(";", $category);
                foreach($category_array as $cat_arr){
                    $category_array_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products WHERE category LIKE ? ORDER BY product_id DESC LIMIT ?, ?");
                    $category_array_stmt->execute(["%$cat_arr%", 0, 3]);
                    $category_array_data = $category_array_stmt->fetchAll(PDO::FETCH_OBJ);

                    foreach($category_array_data as $cd) {
                        if(!in_array($cd, $obj_array)) {
                            $obj_array[] = $cd;
                        }
                    }
                }

                $main_obj_array = $obj_array;//array_unique($obj_array);

                if (count($main_obj_array)>0) { 
                    foreach ($main_obj_array as $moa) {
                        $moa_price = number_format($moa->price);
                        //$short_desc = substr($l3->description,0,21);
                        echo <<<HTML
                            <!-- multi - 1 to 5 -->
                            <div class="deal_div"><!-- .deal_div starts --> 
                                <a href ="/product/$moa->product_url" style="color:inherit"><!-- start of link to product page -->
                                <img src="/static/images/$moa->image1" class="deal_img"/>   
                                <div class="below_deal_img"><!-- .below_deal_img starts -->
                                    <div class="topselling_choice_and_title">
                                        <span>
                                            $moa->product_name
                                        </span>
                                    </div>
                                    <span class="deal_price_black">
                                        NG N$moa_price
                                    </span>  
                                </div><!-- .below_deal_img ends -->
                                </a><!-- end of link to product page -->
                            </div><!-- .deal_div ends -->
HTML;
                    }
                }

        echo <<<HTML
                    </div><!-- .flex_div(.multiple_product_div) ends -->
                    </div><!-- .multiple_product_div_container ends -->
                    <!-- Related Products end -->
                </div><!-- .below_product_images ends again (for Related Products)-->  

                
                
                
                
                <div id="continue_to_cashout" style="position:fixed;width:100%;margin:0;border-radius:9px 9px 0 0;background-color:#fff;display:block"><!-- .continue to cashout starts -->
                    <div>
                        <img src="/static/images/$image1" style="width:80%;height:auto"/>
                    </div>
                    <div class="product_price_div"><!-- .product_price_div starts -->
                        <div class="product_price_top">
                            <div class="product_price_head">Choice Deals</div>
                            <div class="product_price_img_div">
                                <img class="product_price_img" src="/static/images/tiny_site_logo.png"/>
                            </div>
                        </div>
                        <div class="product_price_bottom">
                            $price
                        </div>
                    </div><!-- .product_price_div ends -->

                    <div><!-- .pay in NGN starts -->
                        <p style="margin-bottom:-7px"><i class="fa fa-address-card-o"></i>&nbsp; Pay in NGN</p>
                        <p><i class="fa fa-ban"></i>&nbsp; Tax excluded</p>
                    </div><!-- .pay in NGN ends -->

                    <div><!-- .product_qty starts -->
                        <b>Qty</b> &nbsp; 
                        <span style="padding:6px 3px">
                            <b>-</b>&nbsp;
                            1 &nbsp;
                            <b>+</b>
                        </span>
                    </div><!-- .product_qty ends -->
                </div><!-- .continue to cashout ends -->



                <div class="add_to_my_picks"><!-- .add_to_my_picks starts -->
                    <div class="long_action_button" onclick="show_div('continue_to_cashout')" style="background-color:#ff9100;box-shadow: 0 0 6px #888 inset">
                        <i class="fa fa-shopping-cart"></i>&nbsp; Add to my picks
                    </div>
                </div><!-- .add_to_my_picks ends -->
            </div><!--.main_body end-->     
HTML;
    }
                                                                
    public static function product_scripts(){
        echo <<<HTML
                                                                
        <!-- Footer - index_scripts -->
        <script>
            function ajax_product_view() {
                obj = new XMLHttpRequest;
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        if (document.getElementById("ajax_product_view_div")){
                            document.getElementById("current_balance_text").innerHTML = obj.responseText;
                        }
                    }
                }
                                                                        
                obj.open("GET","/ajax/ajax_cb.php?total_="+total_amount);
                obj.send(null);
            }
        </script>

        <script>
            function show_div(vari) {
                if (document.getElementById(vari).style.display == "none") {
                    document.getElementById(vari).style.display = "block";
                } else if (document.getElementById(vari).style.display == "block") {
                    document.getElementById(vari).style.display = "none";
                }
            }
                                                                                         
            const collection = document.getElementsByClassName("invalid");
                                                                                                 
            for (let i=0; i < collection.length; i++){
                //collection[i].style = "display:none";
                                                                                                            
                var innerHT = collection[i].innerHTML;
                                                                                            
                var newInnerHT = innerHT + "<span style='float:right;margin:4px 18px'><i class='fa fa-times' onclick='hide_invalid_div()'></i></span>";
                          
                collection[i].innerHTML = newInnerHT;
            }
                                                                                           
            function hide_invalid_div() {
                //const collection = document.getElementsByClassName("invalid");
                i = 0;
                for (i=0; i<collection.length; i++){
                    collection[i].style.display = "none";
                }  
            }
                                                                
            //Implementing multi-line placeholder for textarea html documents
            var textAreas = document.getElementsByTagName('textarea');
                                                                
            Array.prototype.forEach.call(textAreas, function(elem) {
                elem.placeholder = elem.placeholder.replace(/\\n/g, '\\n');
            });
                                                                
            function show_bt_input_div(){
                document.getElementById("bt_input_div").style.display = "block";
            }
                                                                        
            function close_bt_input_div(){
                document.getElementById("bt_input_div").style.display = "none";
            }
                                                                    
            function calculate_total(){
                total_num = document.getElementById("total_number").value;
                amt_for_each = document.getElementById("amount_to_pay_each_person").value;
                total_amount = Number(total_num) * Number(amt_for_each);
                                                                    
                document.getElementById("total_to_transfer_text").innerHTML = "<div style='margin:12px 3px'>Total cost of transaction: <b><i class='fa fa-naira'></i>N "+total_amount.toString()+"</b></div>";
                                                                
                obj = new XMLHttpRequest;
                obj.onreadystatechange = function(){
                    if(obj.readyState == 4){
                        if (document.getElementById("current_balance_text")){
                            document.getElementById("current_balance_text").innerHTML = obj.responseText;
                        }
                    }
                }
                                                                        
                obj.open("GET","/ajax/ajax_cb.php?total_="+total_amount);
                obj.send(null);
                                                                
                //disable button and allow only when total_amount < current balance and amt_for_each > 100
                button_status = document.getElementById("proceed_to_pay_button");
                current_balance_text = document.getElementById("current_balance_text");
                if((Number((current_balance_text.innerHTML).replace("N", "")) >= total_amount) & (amt_for_each >= 10)) {
                    button_status.style="background-color:#333131";
                    button_status.disabled = false;
                } else {
                    button_status.style="background-color:#888";
                    button_status.disabled = true;
                }
                                                                
                //turn current balance text green or red depending on if it's > or < than total_amount
                if(Number((current_balance_text.innerHTML).replace("N", "")) >= total_amount) {
                    current_balance_text.style="color:green";
                } else {
                    current_balance_text.style="color:red";
                }
            }
                                                                
        </script>
HTML;
    }
                                                                
                                                                
    public static function product_footer(){
        
        Index_Segments::footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $additional_scripts = Product_Segments::product_scripts(),$whatsapp_chat = "off");
        echo <<<HTML
            <!-- this div is only meant to bring up the footer section of product page so that it's not covered by the fixed 'add_to_my_picks' div-->
            <div style="margin-top:45px"></div>
HTML;
    }
}
?>