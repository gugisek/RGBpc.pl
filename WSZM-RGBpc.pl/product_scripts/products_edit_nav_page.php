<div class="flex items-center">
            <?php if(isset($_GET['page_id'])) {
                $page_id = $_GET['page_id'];
            }else {
                $page_id = 1;
            } 
            include './scripts/conn_db.php';
            $sql = "SELECT count(id) FROM logs where object_id='$id' and object_type='products'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_row($result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / 10);
            ?>
        
            <form action="panel.php" method="GET" class="flex items-center">
                <input type="hidden" name="page" value="produkty">
                <input type="hidden" name="action" value="edit">
                
            </form>
            <form action="panel.php" method="GET" class="flex items-center">
                <input type="hidden" name="page" value="produkty">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="page_id" value="<?php if($page_id > 1) {
                    echo $page_id - 1;
                }else {
                    echo $page_id;
                } ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
            </form>
            <form action="panel.php" method="GET">
                <input type="hidden" name="page" value="produkty">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="number" class=" px-2 rounded-md mx-1 text-center font-light outline-none focus:drop-shadow-[0_3px_10px_rgba(74,106,231,1)] transition-all duration-300" name="page_id" value="<?=$page_id?>" max="<?=$total_pages?>" min="1"> 
            </form>
            <form action="panel.php" method="GET" class="flex items-center">
                <input type="hidden" name="page" value="produkty">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="page_id" value="<?php if($page_id < $total_pages) {
                    echo $page_id + 1;
                }else {
                    echo $page_id;
                } ?>">
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </form>
        </div>