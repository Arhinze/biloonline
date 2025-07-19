<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");

if(isset($_GET["search_query"])){
    if(!empty($_GET["search_query"])){
        $search_q = htmlentities($_GET["search_query"]);
       
        $search_stmt = $pdo->prepare("SELECT * FROM products WHERE product_name LIKE ? LIMIT ?, ?");
        $search_stmt->execute(["%$search_q%", 0, 100]);
        $search_data = $search_stmt->fetchAll(PDO::FETCH_OBJ);

        echo "<div style='border-radius:9px;padding:12px'>";
        foreach($search_data as $sd){
?>
            <div style="border-bottom:1px solid #888;padding:12px 6px;background-color:#fff">
                <a href ="/search/<?=$sd->product_url?>" style="color:#2b8eeb"><?=substr($sd->product_name, 0, 15)?></a>
            </div>
<?php 
       }
       echo "</div>";
    }
}

?>