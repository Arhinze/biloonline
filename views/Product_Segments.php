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
            <head>
                <link rel="stylesheet" href="/static/font-awesome-4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="/static/style.css"/>
            </head>

            <div class="main_body" style="margin:0"><!-- .main_body starts -->
                <div class="product_image_div" style="font-size:36px"><!-- .product_image_div starts -->
                    <img class="product_image" src="/static/images/iphone12.png"/>
                    <div class="upi_top_left">
                        <i class="fa fa-angle-left" style="font-size:18px;padding:6px 12px"></i>
                    </div>
                    <div class="upi_top_right">
                        <i class="fa fa-search"></i>
                        &nbsp;
                        <i class="fa fa-share"></i>
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

                <div>
                    <h1>Please buy for me na</h1>
                </div>
            
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
    }
}
?>