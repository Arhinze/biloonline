<?php
ini_set("display_errors", '1'); //for testing purposes..

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/php/account-manager.php");

class Index_Segments{
    public static function inject($obj) {
        Index_Segments::$pdo = $obj;
    }
    protected static $pdo;

    public static function main_header($site_name = SITE_NAME_SHORT) {
        echo <<<HTML
            <div class="headers"> <!-- start of .headers --> 
                <div class="site_logo_div">
                    <img src="/static/images/tiny_site_logo.png" class="site_logo"/>
                </div>
                <h3 class="site_name">
                    <a href="/">Bilo<span style="color:#ff9100">Online</span><!--site_name--></a>
                </h3>
                <div class="header_search">
                    <input type="text" placeholder="search for .." class="header_input"/>
                </div>                       
                <div class="header_shopping_cart">
                    <a href="/cart"><i class="fa fa-shopping-cart" style="color:#ff9100"></i></a>
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
                    <label for="menu-box"><div class="all_categories"><i class="fa fa-bars"></i>&nbsp; All &nbsp; <i class="fa fa-angle-down"></i></div></label>

                    <div class="menu_item" style="margin-left:99px"><a href="/category/women">Women</a></div>
                    <div class="menu_item"><a href="/category/men">Men</a></div>
                    <div class="menu_item"><a href="/category/xenx">Xenx</a></div>
                    <div class="menu_item"><a href="/category/sports">Sports</a></div>
                    <div class="menu_item"><a href="/category/jewelry">Jewelry</a></div>
                    <div class="menu_item"><a href="/category/industrial">Industrial</a></div>
                    <div class="menu_item"><a href="/category/electronics">Electronics</a></div>
                    <div class="menu_item"><a href="/category/kids">Kids</a></div>
                    <div class="menu_item"><a href="/category/bags">Bags</a></div>
                    <div class="menu_item"><a href="/category/toys">Toy</a></div>
                    <div class="menu_item"><a href="/category/crafts">Crafts</a></div>
                    <div class="menu_item"><a href="/category/beauty">Beauty</a></div>                    
                    <div class="menu_item"><a href="/category/automotive">Automotive</a></div>                    
                    <div class="menu_item"><a href="/category/garden">Garden</a></div>                    
                    <div class="menu_item"><a href="/category/office">Office</a></div>
                    <div class="menu_item"><a href="/category/health">Health</a></div>
                    <div class="menu_item"><a href="/category/baby">Baby</a></div>
                    <div class="menu_item"><a href="/category/household">Household</a></div>
                    <div class="menu_item"><a href="/category/musical-appliances">Musical</a></div>
                    <div class="menu_item"><a href="/category/musical-appliances">Appliances</a></div>
                    <div class="menu_item"><a href="/category/food">Food</a></div>
                    <div class="menu_item"><a href="/category/books">Books</a></div>
                    <div class="menu_item"><a href="/logout" style="color:red">Logout</a></div>

                    <!--<div class="menu_item"><a href=""><i class="fa fa-user"></i>&nbsp; Sign Up</a></div>-->
                </div> 
            </div> <!-- .menu_div ends -->  



            <input type="checkbox" id="menu-box" class="menu-box" style="display:none"/>
            
            <ul class="menu_list"> 
                <li><h3>All Categories</h3></li>
                <li><a href="/my-account" style="color:#fff;font-weight:bold;background-color:green;padding:6px 12px;border-radius:12px"><i class="fa fa-user"></i>&nbsp; My Account</a></li>
                <li><a href="/category/women">Women</a></li>
                <li><a href="/category/men">Men</a></li>
                <li><a href="/category/xenx">Xenx</a></li>
                <li><a href="/category/jewelry">Jewelry</a></li>
                <li><a href="/category/industrial">Industrial</a></li>
                <li><a href="/category/electronics">Electronics</a></li>
                <li><a href="/category/kids">Kids</a></li>
                <li><a href="/category/bags">Bags</a></li>
                <li><a href="/category/toys">Toy</a></li>
                <li><a href="/category/crafts">Crafts</a></li>
                <li><a href="/category/beauty">Beauty</a></li>
                <li><a href="/category/automotive">Automotive</a></li>
                <li><a href="/category/garden">Garden</a></li>
                <li><a href="/category/health">Health</a></li>
                <li><a href="/category/baby">Baby</a></li>
                <li><a href="/category/household">Household</a></li>
                <li><a href="/category/musical-appliances">Musical Appliances</a></li>
                <li><a href="/category/food">Food</a></li>
                <li><a href="/category/books">Books</a></li>
                <li><a href="/logout" style="color:#fff;font-weight:bold;background-color:red;padding:6px;border-radius:12px">Log out</a></li>
                <li style="margin-top:30px"></li>
                <label for="menu-box"><div class="grey_area"></div></label>
            </ul>
HTML;
       }
                
        public static function body($site_name = SITE_NAME_SHORT, $site_url = SITE_URL){
            $site_name_uc = strtoupper($site_name);

            echo <<<HTML
                <div class="main_body">
                    <h2 style="text-align:center">Today's deals</h2>
HTML;

                echo <<<HTML
                    <!-- 1, 2 (Super Deals)-->
                    <div class="deals"><!--.deals start-->
                        <div class="deal_header">Super deals</div> 
                        <center> 
                        <div class="deal_price"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp; 3+ from N5000 &nbsp;&nbsp;<i class="fa fa-angle-right"></i> </div>  
                        </center>            
                        <div class="deal_flex" style="display:flex"><!-- .deal_flex starts -->

HTML;
                        $select_call2_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products WHERE `label` = ? ORDER BY product_id DESC LIMIT ?, ?");
                        $select_call2_stmt->execute(["super-deal",0,2]);
                        $select_call2_data = $select_call2_stmt->fetchAll(PDO::FETCH_OBJ);

                        if (count($select_call2_data)>0) { 
                            $i=0;
                            foreach ($select_call2_data as $sel_c2) {
                                $i++;
                                $short_description = substr($sel_c2->description,0,36);
                                $sel_c2_price = number_format($sel_c2->price);
                                $sel_c2_former_price = number_format($sel_c2->former_price);
                                echo <<<HTML
                                    <div class="deal$i" style="width:50%"><!-- .deal1 starts -->   
                                        <div class="deal_div"><!-- .deal_div starts -->
                                            <a href="/product/$sel_c2->product_url" class="deal_div_link_to_product_page"> <!-- click to see product start tag -->
                                            <img src="/static/images/$sel_c2->image1" class="deal_img"/>   
                                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                                <div class="deal_text">
                                                    $short_description...
                                                </div>    
                                                <div class="deal_price">
                                                    NG N$sel_c2_price
                                                </div>   
                                                <div class="deal_former_price">
                                                    <s>NG N$sel_c2_former_price</s>
                                                </div> 
                                                <div class="star_and_rating">
                                                    <i class="fa fa-star"></i> <b>4.9</b> <span style="color:#888"> | </span> 2000+ sold
                                                </div>
                                            </div><!-- .below_deal_img ends -->
                                            </a> <!-- click to see product end tag -->
                                        </div><!-- .deal_div ends -->
                                    </div><!-- .deal1 ends -->
HTML;  
                            }
                        }
                                                                                                       
                echo <<<HTML
                        </div><!-- .deal_flex ends -->
                    </div><!--.deals end-->
HTML;


                echo <<<HTML
                    <!-- 3, 4 (New Arrivals)-->
                    <div class="deals"><!--.deals start-->
                        <div class="deal_header">New Arrivals</div> 
                        <center> 
                        <div class="deal_price"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp; 3+ from N5000 &nbsp;&nbsp;<i class="fa fa-angle-right"></i> </div>  
                        </center>            
                        <div class="deal_flex" style="display:flex"><!-- .deal_flex starts -->
HTML;

                        $select_call2_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT ?, ?");
                        $select_call2_stmt->execute([0,2]);
                        $select_call2_data = $select_call2_stmt->fetchAll(PDO::FETCH_OBJ);

                        if (count($select_call2_data)>0) { 
                            $i=0;
                            foreach ($select_call2_data as $sel_c2) {
                                $i++;
                                $short_description = substr($sel_c2->description,0,36);
                                $sel_c2_price = number_format($sel_c2->price);
                                $sel_c2_former_price = number_format($sel_c2->former_price);
                                echo <<<HTML
                                    <div class="deal$i" style="width:50%"><!-- .deal1 starts -->   
                                        <div class="deal_div"><!-- .deal_div starts -->
                                            <a href="/product/$sel_c2->product_url" class="deal_div_link_to_product_page"> <!-- click to see product start tag -->
                                            <img src="/static/images/$sel_c2->image1" class="deal_img"/>   
                                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                                <div class="deal_text">
                                                    $short_description...
                                                </div>    
                                                <div class="deal_price">
                                                    NG N$sel_c2_price
                                                </div>   
                                                <div class="deal_former_price">
                                                    <s>NG N$sel_c2_former_price</s>
                                                </div> 
                                                <div class="star_and_rating">
                                                    <i class="fa fa-star"></i> <b>4.9</b> <span style="color:#888"> | </span> 2000+ sold
                                                </div>
                                            </div><!-- .below_deal_img ends -->
                                            </a> <!-- click to see product end tag -->
                                        </div><!-- .deal_div ends -->
                                    </div><!-- .deal1 ends -->
HTML;  
                            }
                        }
                                                                                                       
                echo <<<HTML
                        </div><!-- .deal_flex ends -->
                    </div><!--.deals end-->
HTML;




            echo <<<HTML
                    <!-- 5, 6 (Big Save)-->
                    <div class="deals"><!--.deals start-->
                        <div class="deal_header">Big Save</div> 
                        <center> 
                        <div class="deal_price"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp; 3+ from N5000 &nbsp;&nbsp;<i class="fa fa-angle-right"></i> </div>  
                        </center>            
                        <div class="deal_flex" style="display:flex"><!-- .deal_flex starts -->

HTML;
                        $select_call2_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products WHERE `label` = ? ORDER BY product_id DESC LIMIT ?, ?");
                        $select_call2_stmt->execute(["big-save",0,2]);
                        $select_call2_data = $select_call2_stmt->fetchAll(PDO::FETCH_OBJ);

                        if (count($select_call2_data)>0) { 
                            $i=0;
                            foreach ($select_call2_data as $sel_c2) {
                                $i++;
                                $short_description = substr($sel_c2->description,0,36);
                                $sel_c2_price = number_format($sel_c2->price);
                                $sel_c2_former_price = number_format($sel_c2->former_price);
                                echo <<<HTML
                                    <div class="deal$i" style="width:50%"><!-- .deal1 starts -->   
                                        <div class="deal_div"><!-- .deal_div starts -->
                                            <a href="/product/$sel_c2->product_url" class="deal_div_link_to_product_page"> <!-- click to see product start tag -->
                                            <img src="/static/images/$sel_c2->image1" class="deal_img"/>   
                                            <div class="below_deal_img"><!-- .below_deal_img starts -->
                                                <div class="deal_text">
                                                    $short_description...
                                                </div>    
                                                <div class="deal_price">
                                                    NG N$sel_c2_price
                                                </div>   
                                                <div class="deal_former_price">
                                                    <s>NG N$sel_c2_former_price</s>
                                                </div> 
                                                <div class="star_and_rating">
                                                    <i class="fa fa-star"></i> <b>4.9</b> <span style="color:#888"> | </span> 2000+ sold
                                                </div>
                                            </div><!-- .below_deal_img ends -->
                                            </a> <!-- click to see product end tag -->
                                        </div><!-- .deal_div ends -->
                                    </div><!-- .deal1 ends -->
HTML;  
                            }
                        }
                                                                                                       
                echo <<<HTML
                        </div><!-- .deal_flex ends -->
                    </div><!--.deals end-->
HTML;



                echo <<<HTML
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
HTML;
                    
                echo <<<HTML
                    <!-- All selling on Biloonline starts -->
                    <!-- 1 to 6 -->
                    <div class="topselling_div" style="flex-wrap:wrap"><!-- .flex_div starts(.topselling) --> 
HTML;
                        $select_call2_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT ?, ?");
                        $select_call2_stmt->execute([0,6]);
                        $select_call2_data = $select_call2_stmt->fetchAll(PDO::FETCH_OBJ);

                        if (count($select_call2_data)>0) { 
                            $i=0;
                            foreach ($select_call2_data as $sel_c2) {
                                $i++;
                                $short_description = substr($sel_c2->description,0,36);
                                $sel_c2_price = number_format($sel_c2->price);
                                $sel_c2_former_price = number_format($sel_c2->former_price);
                                echo <<<HTML
                                    <div class="deal_div"><!-- .deal_div starts --> 
                                        <a href="/product/$sel_c2->product_url" style="color:inherit"><!-- link to product page starts -->
                                        <img src="/static/images/$sel_c2->image1" class="deal_img"/>   
                                        <div class="below_deal_img"><!-- .below_deal_img starts -->
                                            <div class="topselling_choice_and_title">
                                                <span class="topselling_choice"> Choice </span> &nbsp;
                                                <span>
                                                    $short_description
                                                </span>
                                            </div>
                                            <span class="deal_price_black">
                                                NG N$sel_c2_price
                                            </span>  &nbsp; 
                                            <span class="deal_former_price">
                                                <s>NG N$sel_c2_former_price</s>
                                            </span> 
                                            <div class="star_and_rating">
                                                <i class="fa fa-star"></i> <b>4.6</b> <span style="color:#888"> | </span> 1,000+ sold
                                            </div>
            
                                            <div class="topselling_text">
                                                <i class="fa fa-fire"></i> Top selling on BiloOnline
                                            </div>
                                            <i class="fa fa-motorcycle"></i> Free shipping
                                        </div><!-- .below_deal_img ends -->
                                        </a><!-- link to product page ends -->
                                    </div><!-- .deal_div ends -->
HTML;
                            }
                        }

                echo <<<HTML
                    </div><!-- .flex_div(.topselling_div) ends -->
                    <!-- All selling on Biloonline ends -->
HTML;

                    

                echo <<<HTML
                    <!-- Top Selling Products start -->
                    <div class="mpdc_heading">Top Selling products</div>
                    <div class="multiple_product_div_container"><!-- .multiple_product_div_container starts --> 
                    <div class="multiple_product_div"><!-- .flex_div starts(.multiple_product_div) --> 
HTML;
                    $select_tops_stmt = Index_Segments::$pdo->prepare("SELECT * FROM orders ORDER BY product_id DESC LIMIT ?, ?");
                    $select_tops_stmt->execute([0,100]);
                    $select_tops_data = $select_tops_stmt->fetchAll(PDO::FETCH_OBJ);

                    $all_orders = [];
                    foreach($select_tops_data as $std) {
                        $all_orders[] = $std->product_id;
                    }
                    rsort($all_orders);
                    array_unique($all_orders);

                    foreach($all_orders as $ao) {
                        $select_ao_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products WHERE product_id = ? LIMIT ?, ?");
                        $select_ao_stmt->execute([$ao,0,1]);
                        $select_ao_data = $select_ao_stmt->fetchAll(PDO::FETCH_OBJ);
                        foreach($select_ao_data as $sel_ao) {
                            $sel_ao_price = number_format($sel_ao->price);
                            //$short_desc = substr($sel_ao->description, 0, 21);
                            echo <<<HTML
                                <!-- multi - 1 to inf. -->
                                <div class="deal_div"><!-- .deal_div starts -->
                                    <a href="/product/$sel_ao->product_url" style="color:inherit"><!-- start of link to product page --> 
                                    <img src="/static/images/$sel_ao->image1" class="deal_img"/>   
                                    <div class="below_deal_img"><!-- .below_deal_img starts -->
                                        <div class="topselling_choice_and_title">
                                            <span>
                                                $sel_ao->product_name
                                            </span>
                                        </div>
                                        <span class="deal_price_black">
                                            NG N$sel_ao_price
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
                    <!-- Top Selling Products end -->
HTML;



                echo <<<HTML
                    <!-- Anniversary Deals start -->
                    <div class="anniversary_deals"><!--- //header for the multiple_product_div below -->
                        <div class="ann_d1"><span style="color:#ff9100">Anniversary</span> Deals</div>
                        <div class="ann_d2">See All</div>
                    </div>

                    <div class="multiple_product_div_container"><!-- .multiple_product_div_container starts -->
                    <div class="multiple_product_div"><!-- .flex_div starts(.multiple_product_div) --> 
HTML;
                $label3_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products WHERE `label` = ? ORDER BY product_id DESC LIMIT ?, ?");
                $label3_stmt->execute(["anniversary-deal",0,5]);
                $label3_data = $label3_stmt->fetchAll(PDO::FETCH_OBJ);

                if (count($label3_data)>0) { 
                    foreach ($label3_data as $l3) {
                        $l3_price = number_format($l3->price);
                        //$short_desc = substr($l3->description,0,21);
                        echo <<<HTML
                            <!-- multi - 1 to 5 -->
                            <div class="deal_div"><!-- .deal_div starts --> 
                                <a href ="/product/$l3->product_url" style="color:inherit"><!-- start of link to product page -->
                                <img src="/static/images/$l3->image1" class="deal_img"/>   
                                <div class="below_deal_img"><!-- .below_deal_img starts -->
                                    <div class="topselling_choice_and_title">
                                        <span>
                                            $l3->product_name
                                        </span>
                                    </div>
                                    <span class="deal_price_black">
                                        NG N$l3_price
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
                    <!-- Anniversary Deals end -->
HTML;



               echo <<<HTML
                    <!-- All selling on Biloonline starts -->
                    <!-- 6 to 12 -->
                    <div class="topselling_div" style="flex-wrap:wrap"><!-- .flex_div starts(.topselling) --> 
HTML;
                        $select_call2_stmt = Index_Segments::$pdo->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT ?, ?");
                        $select_call2_stmt->execute([6,6]);
                        $select_call2_data = $select_call2_stmt->fetchAll(PDO::FETCH_OBJ);

                        if (count($select_call2_data)>0) { 
                            $i=0;
                            foreach ($select_call2_data as $sel_c2) {
                                $i++;
                                $short_description = substr($sel_c2->description,0,36);
                                $sel_c2_price = number_format($sel_c2->price);
                                $sel_c2_former_price = number_format($sel_c2->former_price);
                                echo <<<HTML
                                    <div class="deal_div"><!-- .deal_div starts --> 
                                        <a href="/product/$sel_c2->product_url" style="color:inherit"><!-- link to product page starts -->
                                        <img src="/static/images/$sel_c2->image1" class="deal_img"/>   
                                        <div class="below_deal_img"><!-- .below_deal_img starts -->
                                            <div class="topselling_choice_and_title">
                                                <span class="topselling_choice"> Choice </span> &nbsp;
                                                <span>
                                                    $short_description...
                                                </span>
                                            </div>
                                            <span class="deal_price_black">
                                                NG N$sel_c2_price
                                            </span>  &nbsp; 
                                            <span class="deal_former_price">
                                                <s>NG N$sel_c2_former_price</s>
                                            </span> 
                                            <div class="star_and_rating">
                                                <i class="fa fa-star"></i> <b>4.6</b> <span style="color:#888"> | </span> 1,000+ sold
                                            </div>
            
                                            <div class="topselling_text">
                                                <i class="fa fa-fire"></i> Top selling on BiloOnline
                                            </div>
                                            <i class="fa fa-motorcycle"></i> Free shipping
                                        </div><!-- .below_deal_img ends -->
                                        </a><!-- link to product page ends -->
                                    </div><!-- .deal_div ends -->
HTML;
                            }
                        }
                echo <<<HTML
                    </div><!-- .flex_div(.topselling_div) ends -->
                    <!-- All selling on Biloonline ends -->
HTML;



            echo<<<HTML
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
                                                                
                                                                
        public static function footer($site_name = SITE_NAME_SHORT, $site_url = SITE_URL, $additional_scripts = "", $whatsapp_chat = "on"){ 
                                                                            
            $index_scripts = Index_Segments::index_scripts();    
            if ($whatsapp_chat == "on") {
                echo <<<HTML
                    <!-- .whatsapp_box starts -->
                    <div class="whatsapp_box" id="whatsapp_box" style="display:none;position:fixed;bottom:78px;right:18px;background-color:#fff;border-radius:9px;width:75%;box-shadow:0 0 3px 0 #888">
                        <div class="whatsapp_box_top" style="display:flex;justify-content:space-around;height:30%;padding:12px;background-color:green;color:#fff;border-radius:9px 9px 0 0">
                            <div style="width:10%;margin-right:0"><i class="fa fa-whatsapp" style="font-size:42px;color:#fff"></i></div>
                            <div style="width:80%;text-align:left;margin-left:0">
                                <div style="font-size:21px;margin-bottom:6px">Start a Conversation</div>
                                <div>Hi! Click one of our member below to chat on <b>WhatsApp</b></div>
                            </div>
                        </div>
                        <div class="whatsapp_box_bottom" style="padding:12px">
                            <div style="font-size:12px;color:#888">The team typically replies in a few minutes.</div>
                            <a href="https://wa.me/2348147964486" style="color:#000"><!-- whatsapp link starts -->
                            <div style="display:flex;border-radius:0 6px 6px 0;background-color:#d9eee0;margin-top:15px">
                                <div style="display:flex;border-left:3px solid green">
                                    <div style="color:#fff;font-size:24px;padding:6px 8px;margin:15px 6px;border-radius:100%;background-color:green;"><i class="fa fa-whatsapp" onclick="show_div('whatsapp_box')"></i></div>
                                    <div style="font-size:21px;margin:16px 3">Support</div>
                                </div>
                                <div style="margin-left:42px;margin-top:21px;font-size:18px;color:green"><i class="fa fa-whatsapp"></i></div>
                            </div>
                            </a><!-- whatsapp link ends -->
                        </div>
                    </div>
                    <!-- .whatsapp_box ends -->
    
                    <!-- fixed whatsapp sticker(bottom-right) starts -->
                    <div style="color:#fff;font-size:33px;padding:9px 12px;border-radius:100%;background-color:green;position:fixed;bottom:18px;right:18px"><i class="fa fa-whatsapp" onclick="show_div('whatsapp_box')"></i></div>
                    <!-- fixed whatsapp sticker(bottom-right) ends -->
HTML;
            }
                                                                
        echo <<<HTML
        <br/><br/><br/><br/>
            <div class="footer"><!-- .footer starts --> 
                <div class="footer_site_name">Bilo<span style="color:#ff9100">Online</span></div>

                <div>This is your best online shop. We sell wholesale, retail, and single units to individuals. Enjoy free shipping.</div>

                <div class="footer_fa_links">
                    <a href="https://www.facebook.com/share/19MmpBuEn6/?mibextid=wwXIfr" style="color:#000"><i class="fa fa-facebook"></i></a> &nbsp;
                    <a href="https://www.tiktok.com/@bilo.ng?_t=ZM-8xVIXWH0E21&_r=1"><img src="/static/images/tiktok_logo.png" style="height:24px;width:auto;margin-bottom:-4px"/></a> &nbsp;
                    <a href="" style="color:#000"><i class="fa fa-instagram"></i></a> &nbsp;
                    <a href="https://www.youtube.com/@biloonline" style="color:#000"><i class="fa fa-youtube-play"></i></a> &nbsp;
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

Index_Segments::inject($pdo);
?>