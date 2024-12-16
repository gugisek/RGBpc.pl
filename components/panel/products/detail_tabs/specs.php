<div class="divide-y divide-gray-200" data-aos="fade-in" data-aos-delay="100">
            <?php
            $id = $_GET['id'];
            $category = $_GET['category'];
            include '../../../../scripts/conn_db.php';
            $sql = "SELECT product_parameters.id, product_parameters.value AS parameter_value, product_specs.value AS specs_value, product_specs.id as 'specs_id' FROM product_parameters inner JOIN product_specs ON product_specs.parameter_id = product_parameters.id AND product_specs.product_id = $id WHERE product_parameters.filter_category_id = $category ORDER BY CASE WHEN priority IS NULL THEN 1 ELSE 0 END, priority ASC, parameter_value ASC;";

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                while($row4 = mysqli_fetch_assoc($result))
                {
                    echo '<div class=" text-sm grid grid-cols-4 py-2 even:bg-gray-100 odd:bg-white hover:bg-gray-200 duration-100">
                    <span></span>
                    <div class="font-medium">
                        '.$row4['parameter_value'].'
                    </div>
                    <div class="pl-4 col-span-2 flex items-center gap-2 pr-2 border-l border-bray-200">
                        <span class="w-full px-2 focus:outline-violet-600">'.$row4['specs_value'].'</span>
                    </div>
                </div>';
                }
            }
        
                $id = $_GET['id'];
                include '../../../../scripts/conn_db.php';
                $sql = "SELECT product_parameters.id, product_parameters.value AS parameter_value, product_specs.value AS specs_value, product_specs.id as 'specs_id' FROM product_parameters inner JOIN product_specs ON product_specs.parameter_id = product_parameters.id AND product_specs.product_id = $id WHERE product_parameters.filter_category_id = 0";

                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0)
                {
                    while($row4 = mysqli_fetch_assoc($result))
                    {
                        echo '<div class="text-sm grid grid-cols-4 py-2 even:bg-gray-100 odd:bg-white hover:bg-gray-200 duration-100">
                        <span></span>
                        <div class="font-medium">
                            '.$row4['parameter_value'].'
                        </div>
                        <div class="pl-4 col-span-2 flex items-center gap-2 pr-2 border-l border-bray-200">
                            <span class="w-full px-2 focus:outline-violet-600">'.$row4['specs_value'].'</span>
                        </div>
                    </div>';
                    }
                }
            ?>
            </div>