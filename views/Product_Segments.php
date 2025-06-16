<?php
ini_set("display_errors", '1'); //for testing purposes..

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/views/Index_Segments.php");

$product_url = "no-product";
if(isset($_GET["product_name"])) {
    $product_url = htmlentities($_GET["product_name"]);
}

define("PRODUCT_URL", $product_url);

class Product_Segments extends Index_Segments{     
    public static function body($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $product_url = PRODUCT_URL){
        echo <<<HTML
            <!--<head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/static/font-awesome-4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="/static/style.css"/>
            </head>-->

            <div class="main_body" style="margin:0"><!-- .main_body starts -->
                <div class="product_image_div"><!-- .product_image_div starts -->
                    <img class="product_image" src="/static/images/iphone12.png"/>
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
                            <img class="additional_product_image" src="/static/images/iphone12.png"/>
                        </div>
                        <div class="additional_product_images_div">
                            <img class="additional_product_image" src="/static/images/alt_image1.png"/>
                        </div>
                        <div class="additional_product_images_div">
                            <img class="additional_product_image" src="/static/images/alt_image2.png"/>
                        </div>
                    </div>
                    <div class="product_description">
                        Original Unlocked Apple iPhone 12 Pro Face ID 5G 6GB RAM 128/256GB ROM 12MP 6.7'' NFC France shipping usd smartphone 99%
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
                            N420,000
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

                        <!-- multi - 1 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/iphone12.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        iPhone12 Pro 5G...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N420,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 2 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/belt.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Premium quality leather belt...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N10,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 3 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/comfy_bed.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Soft comfy bed 6 x 4.5...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N350,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 4 -->

                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/cooking_pot.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        High Heat-Resistant Cooking Po...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N50,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 5 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/footwear.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Black Stylish Footwear...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N25,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->
                    
                    </div><!-- .flex_div(.multiple_product_div) ends -->
                    
                    </div><!-- .multiple_product_div_container ends -->
                    <!-- Related Products end -->
                </div><!-- .below_product_images ends again (for Related Products)-->  

                <div class="add_to_my_picks"><!-- .add_to_my_picks starts -->
                    <div class="long_action_button">
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
        
        Index_Segments::footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $additional_scripts = Product_Segments::product_scripts());
        echo <<<HTML
            <!-- this div is only meant to bring up the footer section of product page so that it's not covered by the fixed 'add_to_my_picks' div-->
            <div style="margin-top:45px"></div>
HTML;
    }
}
?>