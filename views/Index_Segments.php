<?php
ini_set("display_errors", '1'); //for testing purposes..

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");

class Index_Segments{
    public static function main_header($site_name = SITE_NAME_SHORT) {
        echo <<<HTML
            <div class="headers"> <!-- start of .headers --> 
                <div class="site_logo_div">
                    <img src="/static/images/logo.png" class="site_logo"/>
                </div>
                <h3 class="site_name">
                    <a href="/">Bilo<span style="color:#ff9100">Online</span><!--site_name--></a>
                </h3>
                <div class="header_search">
                    <input type="text" placeholder="search for .." class="header_input"/>
                </div>                       
                <div class="header_shopping_cart">
                    <i class="fa fa-shopping-cart"></i>
                </div> 
            </div> <a name="#top"></a> <!-- end of .headers --> 
HTML;
    }
    
    public static function header($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $Hi_user = "", $title=SITE_NAME){
        
        $main_header = Index_Segments::main_header();
        $css_version = filemtime($_SERVER["DOCUMENT_ROOT"]."/static/style.css");

        if (isset($_GET["ref"])) {
            $ref = htmlentities($_GET["ref"]);

            if(isset($_COOKIE["ref"])){
                //delete existing referer cookie
                setcookie("ref", $ref, time()-(24*3600), "/");
            }

            //set new referer cookie:
            setcookie("ref", $ref, time()+(12*3600), "/");
        }

        echo <<<HTML
        <!doctype html>
        <html lang="en">
        <head>
          
            <link rel="stylesheet" href="/static/style.css?$css_version"/>
            <link rel="icon" type="image/x-icon" href="/static/images/favicon.png"/>
            <link rel="stylesheet" href="/static/font-awesome-4.7.0/css/font-awesome.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito|Hammersmith+One|Trirong|Arimo|Prompt"/>
            
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
            <title>$title</title>
              
        </head>
        <body>
            $main_header
            <div class="menu_div"><!-- .menu_div starts -->  
                <div class="menu">
                    <div class="all_categories"><i class="fa fa-bars"></i>&nbsp; All Categories &nbsp; <i class="fa fa-angle-down"></i></div>

                    <div class="menu_item" style="margin-left:180px"><a href="">Women</a></div>

                    <div class="menu_item"><a href="">Men</a></div>

                    <div class="menu_item"><a href="">Home</a></div>

                    <div class="menu_item"><a href="">Xenx</a></div>

                    <div class="menu_item"><a href="">Sports</a></div>

                    <div class="menu_item"><a href="">Jewelry</a></div>

                    <div class="menu_item"><a href="">Industrial</a></div>

                    <div class="menu_item"><a href="">Electronics</a></div>

                    <div class="menu_item"><a href="">Kids</a></div>

                    <div class="menu_item"><a href="">Bags</a></div>

                    <div class="menu_item"><a href="">Toy</a></div>

                    <div class="menu_item"><a href="">Crafts</a></div>

                    <div class="menu_item"><a href="">Beauty</a></div>
                    
                    <div class="menu_item"><a href="">Automotive</a></div>
                    
                    <div class="menu_item"><a href="">Garden</a></div>
                    
                    <div class="menu_item"><a href="">Office</a></div>

                    <div class="menu_item"><a href="">Health</a></div>

                    <div class="menu_item"><a href="">Baby</a></div>

                    <div class="menu_item"><a href="">Household</a></div>

                    <div class="menu_item"><a href="">Musical</a></div>

                    <div class="menu_item"><a href="">Appliances</a></div>

                    <div class="menu_item"><a href="">Food</a></div>

                    <div class="menu_item"><a href="">Books</a></div>

                    <div class="menu_item"><a href="">More &nbsp; <i class="fa fa-angle-down"></i></a></div>

                    <!--<div class="menu_item"><a href=""><i class="fa fa-user"></i>&nbsp; Sign Up</a></div>-->
                </div> 
            </div> <!-- .menu_div ends -->  
HTML;
       }
                
        public static function body($site_name = SITE_NAME_SHORT, $site_url = SITE_URL){
            $site_name_uc = strtoupper($site_name);
            echo <<<HTML
                <div class="main_body">
                    <h2 style="text-align:center">Today's deals</h2>


                    <!-- 1, 2 -->
                    <div class="deals"><!--.deals start-->
                        <div class="deal_header">Bundle deals</div> 
                        <center> 
                        <div class="deal_price"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp; 3+ from N5000 &nbsp;&nbsp;<i class="fa fa-angle-right"></i> </div>  
                        </center>            
                        <div class="deal_flex" style="display:flex"><!-- .deal_flex starts -->
                            
                            <div class="deal1" style="width:50%"><!-- .deal1 starts -->   
                                <div class="deal_div"><!-- .deal_div starts -->
                                    <a href="/product/iphone12" class="deal_div_link_to_product_page"> <!-- click to see product start tag -->
                                    <img src="/static/images/iphone12.png" class="deal_img"/>   
                                    <div class="below_deal_img"><!-- .below_deal_img starts -->
                                        <div class="deal_text">
                                           Original Unlocked Apple iPhone 12 Pro Face ID...
                                        </div>    
                                        <div class="deal_price">
                                            NG N420,000
                                        </div>   
                                        <div class="deal_former_price">
                                            <s>NG N630,000</s>
                                        </div> 
                                        <div class="star_and_rating">
                                            <i class="fa fa-star"></i> <b>4.9</b> <span style="color:#888"> | </span> 2000+ sold
                                        </div>
                                    </div><!-- .below_deal_img ends -->
                                    </a> <!-- click to see product end tag -->
                                </div><!-- .deal_div ends -->
                            </div><!-- .deal1 ends -->
                                                
                                                
                                                
                            <div class="deal2" style="width:50%"><!-- .deal2 starts -->   
                                <div class="deal_div"><!-- .deal_div starts -->
                                    <a href="/product/comfy-bed" class="deal_div_link_to_product_page"> <!-- click to see product start tag --> 
                                    <img src="/static/images/comfy_bed.png" class="deal_img"/>  
                                    <div class="below_deal_img"><!-- .below_deal_img starts --> 
                                        <div class="deal_text">
                                           Size 6 Stylish Comfy Bed Soft Foam...
                                        </div>    
                                        <div class="deal_price">
                                            NG N350,000
                                        </div>   
                                        <div class="deal_former_price">
                                            <s>NG N700,000</s>
                                        </div> 
                                        <div class="star_and_rating">
                                            <i class="fa fa-star"></i> <b>4.2</b> <span style="color:#888"> | </span> 1,000+ sold
                                        </div>
                                    </div><!-- .below_deal_img ends -->
                                    </a><!-- click to see product end tag --> 
                                </div><!-- .deal_div ends -->
                            </div><!-- .deal2 ends -->
                        </div><!-- .deal_flex ends -->
                    </div><!--.deals end-->



                    <!-- 3, 4 -->
                    <div class="deals"><!--.deals start-->
                        <div class="deal_header">Super deals</div> 
                        <center> 
                        <div class="deal_price"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp; 3+ from N5000 &nbsp;&nbsp;<i class="fa fa-angle-right"></i> </div>  
                        </center>            
                        <div class="deal_flex" style="display:flex"><!-- .deal_flex starts -->
                            <div class="deal1" style="width:50%"><!-- .deal1 starts -->   
                                <div class="deal_div"><!-- .deal_div starts --> 
                                    <a href="/product/footwear" class="deal_div_link_to_product_page"> <!-- click to see product start tag --> 
                                    <img src="/static/images/footwear.png" class="deal_img"/>   
                                    <div class="below_deal_img"><!-- .below_deal_img starts -->
                                        <div class="deal_text">
                                           Beautiful footwear, made from pure leathe...
                                        </div>    
                                        <div class="deal_price">
                                            NG N25,000
                                        </div>   
                                        <div class="deal_former_price">
                                            <s>NG N60,000</s>
                                        </div> 
                                        <div class="star_and_rating">
                                            <i class="fa fa-star"></i> <b>4.8</b> <span style="color:#888"> | </span> 5,000+ sold
                                        </div>
                                    </div><!-- .below_deal_img ends -->
                                    </a> <!-- click to see product end tag --> 
                                </div><!-- .deal_div ends -->
                            </div><!-- .deal1 ends -->
                                                
                                                
                                                
                            <div class="deal2" style="width:50%"><!-- .deal2 starts -->   
                                <div class="deal_div"><!-- .deal_div starts --> 
                                    <a href="/product/laptop-desk" class="deal_div_link_to_product_page"> <!-- click to see product start tag --> 
                                    <img src="/static/images/laptop_desk.png" class="deal_img"/>  
                                    <div class="below_deal_img"><!-- .below_deal_img starts --> 
                                        <div class="deal_text">
                                           Bedside Laptop Desk, portable and easy to use...
                                        </div>    
                                        <div class="deal_price">
                                            NG N75,000
                                        </div>   
                                        <div class="deal_former_price">
                                            <s>NG N160,000</s>
                                        </div> 
                                        <div class="star_and_rating">
                                            <i class="fa fa-star"></i> <b>4.8</b> <span style="color:#888"> | </span> 2,000+ sold
                                        </div>
                                    </div><!-- .below_deal_img ends -->
                                    </a> <!-- click to see product end tag --> 
                                </div><!-- .deal_div ends -->
                            </div><!-- .deal2 ends -->
                        </div><!-- .deal_flex ends -->
                    </div><!--.deals end-->



                    <!-- 5, 6 -->
                    <div class="deals"><!--.deals start-->
                        <div class="deal_header">Big Save</div> 
                        <center> 
                        <div class="deal_price"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp; 3+ from N5000 &nbsp;&nbsp;<i class="fa fa-angle-right"></i> </div>  
                        </center>            
                        <div class="deal_flex" style="display:flex"><!-- .deal_flex starts -->
                            <div class="deal1" style="width:50%"><!-- .deal1 starts -->   
                                <div class="deal_div"><!-- .deal_div starts --> 
                                    <img src="/static/images/iphone12.png" class="deal_img"/>   
                                    <div class="below_deal_img"><!-- .below_deal_img starts -->
                                        <div class="deal_text">
                                           iPhone 12 Pro, 5G smart phone 1 sim...
                                        </div>    
                                        <div class="deal_price">
                                            NG N450,000
                                        </div>   
                                        <div class="deal_former_price">
                                            <s>NG N700,000</s>
                                        </div> 
                                        <div class="star_and_rating">
                                            <i class="fa fa-star"></i> <b>4.5</b> <span style="color:#888"> | </span> 2,000+ sold
                                        </div>
                                    </div><!-- .below_deal_img ends -->
                                </div><!-- .deal_div ends -->
                            </div><!-- .deal1 ends -->
                                                
                                                
                                                
                            <div class="deal2" style="width:50%"><!-- .deal2 starts -->   
                                <div class="deal_div"><!-- .deal_div starts --> 
                                    <img src="/static/images/stylish_chair.png" class="deal_img"/>  
                                    <div class="below_deal_img"><!-- .below_deal_img starts --> 
                                        <div class="deal_text">
                                           Stylish indoor chair, sit comfortaby on...
                                        </div>    
                                        <div class="deal_price">
                                            NG N150,000
                                        </div>   
                                        <div class="deal_former_price">
                                            <s>NG N190,000</s>
                                        </div> 
                                        <div class="star_and_rating">
                                            <i class="fa fa-star"></i> <b>4.9</b> <span style="color:#888"> | </span> 1,200+ sold
                                        </div>
                                    </div><!-- .below_deal_img ends -->
                                </div><!-- .deal_div ends -->
                            </div><!-- .deal2 ends -->
                        </div><!-- .deal_flex ends -->
                    </div><!--.deals end-->




                    <div class="fashion_choice"><!-- .fashion_choice starts --> 
                        <div class="fashion_choice_header"><i>Viva</i></div>

                        <div class="fashion_choice_text">Your fashion choice</div>

                        <div class="shop_now_div"><a href="" class="shop_now">Shop now</a></div>

                        <div class="flex_div"><!-- .flex_div starts --> 
                            <div class="deal_div"><!-- .deal_div starts --> 
                                <img src="/static/images/comfy_bed.png" class="deal_img"/>   
                                <div class="below_deal_img"><!-- .below_deal_img starts -->
                                    <div class="deal_price_black">
                                        NG N450,000
                                    </div>   
                                    <div class="deal_former_price">
                                        <s>NG N700,000</s>
                                    </div> 
                                    <div class="star_and_rating">
                                        <i class="fa fa-star"></i> <b>4.5</b> <span style="color:#888"> | </span> 2,000+ sold
                                    </div>
                                </div><!-- .below_deal_img ends -->
                            </div><!-- .deal_div ends -->


                            <div class="deal_div"><!-- .deal_div starts --> 
                                <img src="/static/images/footwear.png" class="deal_img"/>   
                                <div class="below_deal_img"><!-- .below_deal_img starts -->
                                    <div class="deal_price_black">
                                        NG N25,000
                                    </div>   
                                    <div class="deal_former_price">
                                        <s>NG N35,000</s>
                                    </div> 
                                    <div class="star_and_rating">
                                        <i class="fa fa-star"></i> <b>4.8</b> <span style="color:#888"> | </span> 1,000+ sold
                                    </div>
                                </div><!-- .below_deal_img ends -->
                            </div><!-- .deal_div ends -->



                            <div class="deal_div"><!-- .deal_div starts --> 
                                <img src="/static/images/laptop_desk.png" class="deal_img"/>   
                                <div class="below_deal_img"><!-- .below_deal_img starts -->
                                    <div class="deal_price_black">
                                        NG N90,000
                                    </div>   
                                    <div class="deal_former_price">
                                        <s>NG N170,000</s>
                                    </div> 
                                    <div class="star_and_rating">
                                        <i class="fa fa-star"></i> <b>4.7</b> <span style="color:#888"> | </span> 1,500+ sold
                                    </div>
                                </div><!-- .below_deal_img ends -->
                            </div><!-- .deal_div ends -->


                        </div><!-- .flex_div ends --> 
                    </div><!-- .fashion_choice ends --> 

                    
                    
                    <!-- Top selling on Biloonline starts -->
                    <!-- 1, 2 -->
                    <div class="topselling_div"><!-- .flex_div starts(.topselling) --> 


                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/air_fryer.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span class="topselling_choice"> Choice </span> &nbsp;
                                    <span>
                                        Hot sale Luxury Fashio...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N150,000
                                </span>  &nbsp; 
                                <span class="deal_former_price">
                                    <s>NG N270,000</s>
                                </span> 
                                <div class="star_and_rating">
                                    <i class="fa fa-star"></i> <b>4.6</b> <span style="color:#888"> | </span> 1,000+ sold
                                </div>

                                <div class="topselling_text">
                                    <i class="fa fa-fire"></i> Top selling on BiloOnline
                                </div>
                                <i class="fa fa-motorcycle"></i> Free shipping
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/footwear.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span class="topselling_choice"> Choice </span> &nbsp;
                                    <span>
                                        Hot sale Luxury Fashio...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N25,000
                                </span>  &nbsp; 
                                <span class="deal_former_price">
                                    <s>NG N35,000</s>
                                </span> 
                                <div class="star_and_rating">
                                    <i class="fa fa-star"></i> <b>4.5</b> <span style="color:#888"> | </span> 1,200+ sold
                                </div>

                                <div class="topselling_text">
                                    <i class="fa fa-fire"></i> Top selling on BiloOnline
                                </div>
                                <i class="fa fa-motorcycle"></i> Free shipping
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->
                    </div><!-- .flex_div(.topselling_div) ends -->


                    <!-- Top selling on Biloonline starts -->
                    <!-- 3, 4 -->
                    <div class="topselling_div"><!-- .flex_div starts(.topselling) --> 


                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/cooking_pot.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span class="topselling_choice"> Choice </span> &nbsp;
                                    <span>
                                        Hot sale Luxury Fashio...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N50,000
                                </span>  &nbsp; 
                                <span class="deal_former_price">
                                    <s>NG N70,000</s>
                                </span> 
                                <div class="star_and_rating">
                                    <i class="fa fa-star"></i> <b>4.8</b> <span style="color:#888"> | </span> 1,300+ sold
                                </div>

                                <div class="topselling_text">
                                    <i class="fa fa-fire"></i> Top selling on BiloOnline
                                </div>
                                <i class="fa fa-motorcycle"></i> Free shipping
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/belt.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span class="topselling_choice"> Choice </span> &nbsp;
                                    <span>
                                        Hot sale Luxury Fashio...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N10,000
                                </span>  &nbsp; 
                                <span class="deal_former_price">
                                    <s>NG N15,000</s>
                                </span> 
                                <div class="star_and_rating">
                                    <i class="fa fa-star"></i> <b>4.2</b> <span style="color:#888"> | </span> 3,000+ sold
                                </div>

                                <div class="topselling_text">
                                    <i class="fa fa-fire"></i> Top selling on BiloOnline
                                </div>
                                <i class="fa fa-motorcycle"></i> Free shipping
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->
                    </div><!-- .flex_div(.topselling_div) ends -->


                    <!-- Top selling on Biloonline starts -->
                    <!-- 5, 6 -->
                    <div class="topselling_div"><!-- .flex_div starts(.topselling) --> 


                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/electric_iron.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span class="topselling_choice"> Choice </span> &nbsp;
                                    <span>
                                        Hot sale Luxury Fashio...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N25,000
                                </span>  &nbsp; 
                                <span class="deal_former_price">
                                    <s>NG N42,000</s>
                                </span> 
                                <div class="star_and_rating">
                                    <i class="fa fa-star"></i> <b>4.4</b> <span style="color:#888"> | </span> 1,800+ sold
                                </div>

                                <div class="topselling_text">
                                    <i class="fa fa-fire"></i> Top selling on BiloOnline
                                </div>
                                <i class="fa fa-motorcycle"></i> Free shipping
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/tv.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span class="topselling_choice"> Choice </span> &nbsp;
                                    <span>
                                        Hot sale Luxury Fashio...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N500,000
                                </span>  &nbsp; 
                                <span class="deal_former_price">
                                    <s>NG N650,000</s>
                                </span> 
                                <div class="star_and_rating">
                                    <i class="fa fa-star"></i> <b>4.9</b> <span style="color:#888"> | </span> 500+ sold
                                </div>

                                <div class="topselling_text">
                                    <i class="fa fa-fire"></i> Top selling on BiloOnline
                                </div>
                                <i class="fa fa-motorcycle"></i> Free shipping
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->
                    </div><!-- .flex_div(.topselling_div) ends -->
                    <!-- Top selling on Biloonline ends -->




                    <!-- Sponsored Products start -->
                    <div class="mpdc_heading">Sponsored products</div>
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
                    <!-- Sponsored Products end -->





                    <!-- Anniversary Deals start -->
                    <div class="anniversary_deals"><!--- //header for the multiple_product_div below -->
                        <div class="ann_d1"><span style="color:#ff9100">Anniversary</span> Deals</div>
                        <div class="ann_d2">See All</div>
                    </div>

                    <div class="multiple_product_div_container"><!-- .multiple_product_div_container starts -->
                    <div class="multiple_product_div"><!-- .flex_div starts(.multiple_product_div) --> 

                        <!-- multi - 1 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/milo.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Milo Energizing Morning Tea...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N7,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 2 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/stylish_chair.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Stylish Comfortable Chair...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N120,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 3 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/washing_machine.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Household Washing Machine...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N390,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 4 -->

                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/tv.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Flat Screen TV Set...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N400,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->


                        <!-- multi - 5 -->
                        <div class="deal_div"><!-- .deal_div starts --> 
                            <img src="/static/images/work_setup.png" class="deal_img"/>   
                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                <div class="topselling_choice_and_title">
                                    <span>
                                        Laptop Work Setup Area...
                                    </span>
                                </div>
                                <span class="deal_price_black">
                                    NG N750,000
                                </span>  
                            </div><!-- .below_deal_img ends -->
                        </div><!-- .deal_div ends -->
                    
                    </div><!-- .flex_div(.multiple_product_div) ends -->
                    
                    </div><!-- .multiple_product_div_container ends -->
                    <!-- Anniversary Deals end -->
                </div><!--.main_body end-->
HTML;
       }
                                                                
       public static function index_scripts(){
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
                                                                
                                                                
        public static function footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $additional_scripts = ""){ 
                                                                            
            $index_scripts = Index_Segments::index_scripts();    
                                                                
        echo <<<HTML
        <br/><br/><br/><br/><br/>
            <div class="footer"><!-- .footer starts --> 
                <div class="footer_site_name">Bilo<span style="color:#ff9100">Online</span></div>

                <div>This is your best online shop. We sell wholesale, retail, and single units to individuals. Enjoy free shipping.</div>
                
                <div class="footer_fa_links">
                    <i class="fa fa-facebook"></i> &nbsp;
                    <i class="fa-brands fa-tiktok"></i> &nbsp;
                    <i class="fa fa-instagram"></i> &nbsp;
                    <i class="fa fa-youtube-play"></i> &nbsp;
                </div>

                <div class="footer_heading">Shop</div>
                Terms & Conditions
                Sitemap
                Press

                <div class="footer_heading">Support</div>
                Documentation
                Help Center
                General FAQs
                
                <div class="footer_heading">Newsletter</div>
                Get 20% off for your first order by joining to our newsletter.
                
                 
                
                <div style="border-top:1px dotted #888;margin-top:15px;padding:15px 0;text-align:center">© 2025 Bilo Privacy Policy All rights reserved. Designed & developed by BILO Tech Team</div>
            </div><!-- .footer ends -->                                                          
            $index_scripts
            $additional_scripts
        </body>
        </html>    
HTML;
    }
}
?>