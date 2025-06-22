<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/views/admin_Segments.php");

if(isset($_COOKIE["admin_name"]) && isset($_COOKIE["admin_password"])){
    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE admin_name = ? AND admin_password = ?");
    $stmt->execute([$_COOKIE["admin_name"], $_COOKIE["admin_password"]]);

    $data = $stmt->fetch(PDO::FETCH_OBJ);
    if($data){
        //that means admin is logged in
        admin_Segments::header();
        //To Insert Product:
        if(isset($_POST["new_product"])){
            //check if product already exists
            $add_stmt = $pdo->prepare("SELECT * FROM products WHERE product_url = ?");
            $add_stmt->execute([$_POST["new_url"]]);
    
            $add_data = $add_stmt->fetch(PDO::FETCH_OBJ);
            if(!$add_data){ 
                //then insert:
                $addi_stmt = $pdo->prepare("INSERT INTO products(product_name, product_url, `description`) VALUES(?,?,?)");

                $addi_stmt->execute([htmlentities($_POST["new_product_name"]), htmlentities($_POST["new_url"]), htmlentities($_POST["new_product_description"])]);

                echo "<h4 style='color:green'>Product: ", $_POST["new_product_name"], " has been inserted successfully</h4>";
            } else {
                echo "<h4 style='color:red'>Error, Product:", $add_data->product_name, " already exists</h4>";
            }
        }
?>
        <div class="dashboard_div" style="margin:-30px 3% 10% 3%;">

        <h1 style="margin:12px 6px">Products - <?=$site_name?></h2>

        <!-- Add new product div starts -->
        <div>
            <div onclick="show_div('new_product1')" style="background-color:green;color:#fff;font-weight:bold;padding:9px 12px;border-radius:6px;margin:12px 0 18px 0;width:fit-content"><span>Add New Product</span> <i class="fa fa-angle-down" style="margin-left:12px;font-size:21px"></i></div>

            <div id="new_product1" style="display:block;padding:9px;background-color:#f3f3f3;border-radius:6px;border:1px dotted #000">
                <form method="post" action="">
                    <!-- -->
                    <div style="position:relative"><input type="text" id="product_name<?=$i?>" class="edit_product_input" name="new_product_name" placeholder="Enter Product Name"/>
                    <span style="position:absolute;left:6px;top:6px;color:#fff">Name </span></div> 

                    <div style="position:relative"><input type="text" id="product_url<?=$i?>" class="edit_product_input"  name="new_url" placeholder="Enter Product URL"/>
                    <span style="position:absolute;left:6px;top:6px;color:#fff">Url </span></div> 
                    <span>Only letters, numbers and hyphen (-) allowed.</span>

                    <!-- Add Image Starts -->
                    <div style="font-size:18px;margin:15px 0 9px 0"><b>Add Images:</b> <span style="font-size:12px;color:green">(image1 is required, others are optional)</span></div>
                    <div style="width:100%;overflow-x:scroll"><!-- style .overflow-x:scroll -->
                        <div class="additional_product_images_div_container" style="width:fit-content;overflow:visoble"><!-- .additional_product_images_div_container starts -->
                            <div class="additional_product_images_div"><!-- img1 -->
                                <label for="img_file_upload_tag1"><img src="/static/images/add_image_icon_img1.png" id="img1" class="additional_product_image"/><span class="additional_product_image_number">1</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img2 -->
                                <label for="img_file_upload_tag2"><img src="/static/images/add_image_icon.png" id="img2" class="additional_product_image"/><span class="additional_product_image_number">2</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img3 -->
                                <label for="img_file_upload_tag3"><img src="/static/images/add_image_icon.png" id="img3" class="additional_product_image"/><span class="additional_product_image_number">3</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img4 -->
                                <label for="img_file_upload_tag4"><img src="/static/images/add_image_icon.png" id="img4" class="additional_product_image"/><span class="additional_product_image_number">4</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img5 -->
                                <label for="img_file_upload_tag5"><img src="/static/images/add_image_icon.png" id="img5" class="additional_product_image"/><span class="additional_product_image_number">5</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img6 -->
                                <label for="img_file_upload_tag6"><img src="/static/images/add_image_icon.png" id="img6" class="additional_product_image"/><span class="additional_product_image_number">6</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img7 -->
                                <label for="img_file_upload_tag7"><img src="/static/images/add_image_icon.png" id="img7" class="additional_product_image"/><span class="additional_product_image_number">7</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img8 -->
                                <label for="img_file_upload_tag8"><img src="/static/images/add_image_icon.png" id="img8" class="additional_product_image"/><span class="additional_product_image_number">8</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img9 -->
                                <label for="img_file_upload_tag9"><img src="/static/images/add_image_icon.png" id="img9" class="additional_product_image"/><span class="additional_product_image_number">9</span></label>
                            </div>
                            <div class="additional_product_images_div"><!-- img10 -->
                                <label for="img_file_upload_tag10"><img src="/static/images/add_image_icon.png" id="img10" class="additional_product_image"/><span class="additional_product_image_number" style="padding:2px 3px">10</span></label>
                            </div>
                        </div><!-- .additional_product_images_div_container ends -->
                    </div><!-- style .overflow-x:scroll -->

                    <input type="file" name="img1" id="img_file_upload_tag1" accept="image/*" style="display:none" onchange="loadFile(event, 'img1')" required/><!-- file tag 1 -->
                    <input type="file" name="img2" id="img_file_upload_tag2" accept="image/*" style="display:none" onchange="loadFile(event, 'img2')"/><!-- file tag 2 -->
                    <input type="file" name="img3" id="img_file_upload_tag3" accept="image/*" style="display:none" onchange="loadFile(event, 'img3')"/><!-- file tag 3 -->
                    <input type="file" name="img4" id="img_file_upload_tag4" accept="image/*" style="display:none" onchange="loadFile(event, 'img4')"/><!-- file tag  4-->
                    <input type="file" name="img5" id="img_file_upload_tag5" accept="image/*" style="display:none" onchange="loadFile(event, 'img5')"/><!-- file tag 5 -->
                    <input type="file" name="img6" id="img_file_upload_tag6" accept="image/*" style="display:none" onchange="loadFile(event, 'img6')"/><!-- file tag 6 -->
                    <input type="file" name="img7" id="img_file_upload_tag7" accept="image/*" style="display:none" onchange="loadFile(event, 'img7')"/><!-- file tag 7 -->
                    <input type="file" name="img8" id="img_file_upload_tag8" accept="image/*" style="display:none" onchange="loadFile(event, 'img8')"/><!-- file tag 8 -->
                    <input type="file" name="img9" id="img_file_upload_tag9" accept="image/*" style="display:none" onchange="loadFile(event, 'img9')"/><!-- file tag 9 -->
                    <input type="file" name="img10" id="img_file_upload_tag10" accept="image/*" style="display:none" onchange="loadFile(event, 'img10')"/><!-- file tag 10 -->
                    <!-- Add Image Ends -->

                    <div style="font-size:18px;margin:15px 0 9px 0"><b>Product Description:</b></div>
                    <textarea style="width:75%;height:100px;border-radius:4px" name="new_product_description" placeholder="sell this product in a maximum of 50 words."></textarea>

                    <div style="margin:12px 0">
                        <input type="submit" class="edit_product_action_button" style="background-color:green"/>
                        
                        <span class="edit_product_action_button" style="background-color:#ff9100" onclick="show_div('new_product1')">Cancel</span>
                    </div>
                    <input type="hidden" name="new_product" value="new_product"/>
                </form>
            </div>
        </div>
        <!-- Add new product div ends -->
<?php
        //check if admin is searching for someone:
?>
        <div style="margin-top:18px;padding:12px 9px;border:1px solid #000;border-radius:12px;background-color:#f3f3f3">
            <input type="text" onkeyup="ajax_search()" id="search_input" class="input" placeholder="Enter Product Name: try: abc" style="border:1px solid #000;width:75%"/>
        
            <i class="fa fa-search" onclick ="search_icon()" style="padding:9px;border-radius:4px;font-size:16px;color:#fff;background-color:#000"></i>

            <div id="search" style="position:absolute;width:75%"></div>
        </div>
        
        <div style="margin-top:12px">    <!-- 'main' div starts -->
            <div class="table_row_div" style="margin-bottom:18px">
                <div class="table_row" style="width:8%">#</div>
                <div class="table_row">Name</div>
                <!--<div class="table_row">Status</div>-->
                <div class="table_row">Edit / Delete</div>
            </div>
<?php
        //To Edit Product:
        if(isset($_POST["edit_product"])){
            //check if product still exists
            $edit_stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
            $edit_stmt->execute([$_POST["edit_product"]]);
    
            $edit_data = $edit_stmt->fetch(PDO::FETCH_OBJ);
            if($edit_data){ 
                //then edit:
                $edd_stmt = $pdo->prepare("UPDATE products SET product_name = ?, product_url = ?, `description` = ? WHERE product_id = ?");

                $edd_stmt->execute([$_POST["product_name"], $_POST["url"], $_POST["product_description"], $_POST["edit_product"]]);

                echo "<h4 style='color:green'>Product: ", $edit_data->product_name, " has been Updated successfully</h4>";
            }
        }

        //To Delete Product:
        if(isset($_POST["remove_product"])){
            //check if product still exists
            $ds_stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
            $ds_stmt->execute([$_POST["remove_product"]]);
    
            $ds_data = $ds_stmt->fetch(PDO::FETCH_OBJ);
            if($ds_data){ 
                //then delete
                $dd_stmt = $pdo->prepare("DELETE FROM products WHERE product_id = ?");
                $dd_stmt->execute([$_POST["remove_product"]]);

                echo "<h4 style='color:red'>Product: ", $ds_data->product_name, " has been deleted successfully</h4>";
            } else {
                echo "<h4 style='color:red'>Error: Product not found.</h4>";
            }
        }

        //Mail Customer:


        //Select and view all users for easy decision making:

        //A Simple Pagination Algorithm:
        $p = 1;
        $num_of_rows = 10;

        if(isset($_GET["page"])){
            $p = htmlentities($_GET["page"]);
            if(!is_numeric($p) || $p < 1){
                $p = 1;
            }
        }
        
        $page_to_call = ($p - 1)*$num_of_rows;

        //count entire users:
        $u_search_stmt = $pdo->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT ?, ?");
        $u_search_stmt->execute([0, 1000]);

        $num_of_users = count($u_search_stmt->fetchAll(PDO::FETCH_OBJ));

        $max = ceil($num_of_users/$num_of_rows);
        // -- end of pagination algorithm --

        
        //first check if admin searched for a product in particular
        if(isset($_GET["product"])){
            $search_q = htmlentities($_GET["product"]);

            $u_search_stmt = $pdo->prepare("SELECT * FROM products WHERE product_name LIKE ? ORDER BY product_id DESC LIMIT ?, ?");
            $u_search_stmt->execute(["%$search_q%",$page_to_call, $num_of_rows]);

            $u_data = $u_search_stmt->fetchAll(PDO::FETCH_OBJ);
        }  else {
            //if no particular person is searched for, call out everyone:
            $u_stmt = $pdo->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT ?, ?");
            $u_stmt->execute([$page_to_call, $num_of_rows]);
    
            $u_data = $u_stmt->fetchAll(PDO::FETCH_OBJ);
        }

        if(count($u_data)>0){     
            $i = 0;
            foreach($u_data as $d){
                $i += 1;
?>
        <div class="everything-both-buttons-nd-hidden-divs"> 
                <div class="table_row_div">
                    <div class="table_row" style="width:8%"><?=$i + (($p - 1)*$num_of_rows)?>. </div>
                    
                    <div class="table_row"><b><a href="/product/<?=$d->product_url?>"><?=$d->product_name?> </a></b></div>
                    
                    <div class="table_row" style="font-size:fit-content">
                        <button onclick = "create_content('edit',<?=$i?>)" style="background-color:green"
                    class="table_row_ED">
                            Edit &nbsp; <i class="fa fa-pencil"></i> 
                        </buton>

                        <button onclick = "create_content('remove',<?=$i?>)" style="background-color:red" class="table_row_ED">
                            <i class="fa fa-warning"></i> &nbsp; Remove </buton>
                    </div>
                </div>


            <div class="clear">
            <div style="margin-top:12px;">

            <!-- To make all hidden div content to appear in the same spot on display: -->
            <div id="content_space<?=$i?>" class="calculator" style="display:none"> 
                <!-- style="display:block creates undesirable problems like making the div not to appear even onclick" -->
            </div>

            <!--hidden section 1: Edit -->
            <div id="edit<?=$i?>" style="display:none;border:2px solid #888;border-radius:6px;margin-top:12px;padding:9px;">

                <form method="post" action="">
                    <!-- -->
                    <div style="position:relative"><input type="text" id="product_name<?=$i?>" class="edit_product_input" name="product_name" value="<?=$d->product_name?>"/>
                    <span style="position:absolute;left:6px;top:6px;color:#fff">Name </span></div> 

                    <div style="position:relative"><input type="text" id="product_url<?=$i?>" class="edit_product_input"  name="url" value="<?=$d->product_url?>"/>
                    <span style="position:absolute;left:6px;top:6px;color:#fff">Url </span></div> 

                    <div class="additional_product_images_div_container">
                        <div class="additional_product_images_div">
                            <img src = "/static/images/<?=$d->image1?>" class="additional_product_image"/>
                        </div>
                        <div class="additional_product_images_div">
                            <img class="additional_product_image"/>
                        </div>
                        <div class="additional_product_images_div">
                            <img class="additional_product_image"/>
                        </div>
                    </div>

                    <div style="font-size:18px;margin:15px 0 9px 0"><b>Product Description:</b></div>
                    <textarea style="width:90%;height:100px;border-radius:4px" name="product_description"><?=$d->description?> </textarea>

                    <div style="margin:12px 0">
                        <input type="submit" class="edit_product_action_button" style="background-color:green"/>
                        
                        <span class="edit_product_action_button" style="background-color:#ff9100" onclick="hide_content_space('edit',<?=$i?>)">Cancel</span>
                    </div>
                    <input type="hidden" name="edit_product" value="<?=$d->product_id?>"/>
                </form>
            </div>
            <!--End of Edit div-->



            <!-- hidden section 2: Remove Product -->
            
            <div id="remove<?=$i?>" style="display:none;border:2px solid red;border-radius:6px;margin-top:12px;padding:3px">

            <form method="post" action="" id="message_form<?=$i?>" class="pop_up">
            <span style="text-align:center">Are you sure you want to remove user: <b style="font-size:18px;color:red;border-bottom:2px solid #fff"><?=$d->product_name?>?</b> &nbsp;

            <b>This can't be Undone</b></span><br /><br />

            <input type="hidden"  name="remove_product" value="<?=$d->product_id?>"/>

            <input type="submit" value="Remove" style="background-color:red;
                    padding:3px;margin:3px;border-radius:6px;color:#fff;border:none;height:24px;"/> 

            <!--Cancel "Remove Product" (Don't remove):-->
            <!--onclick = "show_div('remove <= $i >')"-->
            <span onclick="hide_content_space('remove',<?=$i?>)" style="background-color:#ff9100;
                    padding:3px;border-radius:6px;color:#fff;
                    margin-left:6px;text-align:center;height:24px;border:none">
                    Cancel 
            </span>    
            </form>

            </div> <!--End of remove<=i> div-->

            </div><!--End of hidden divs-->
            </div><!--End of hidden divs clear class-->   
        </div> <hr /><br /><!--End of Both Buttons and hidden divs-->
        
        <!--End of all - both buttons hidden divs-->

<?php
            }
        }
?>

        <!--Paginator-->
        <div class="clear" style="font-weight:bold;font-size:18px; margin-bottom:12px">
            <?php if($p > 1) { ?> 
                <div style="float:left">
                    <b>
                       <a href="?page=<?=$p-1?>" style="color:#000;font-weight:bold"><i class="fa fa-angle-left"></i> &nbsp; Previous</a>
                    </b>
                </div> 
            <?php } ?>

            <?php if($p < $max) { ?> 
                <div style="float:right">
                    <b>
                        <a href="?page=<?=$p+1?>" style="color:#000">Next &nbsp;<i class="fa fa-angle-right"></i></a>
                    </b>
                </div> 
            <?php } ?>
        </div> <!-- End of Paginator -->

        </div> <!-- End of class 'main_div' -->

<?php
    }else{
        //redirect
        header("location:/admin");
    }

    echo "</div>"; //end of 'main' div
    admin_Segments::footer();
} else {
    //redirect
    header("location:/admin");
}

?>