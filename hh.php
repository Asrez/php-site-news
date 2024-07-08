<?php
                $link=mysqli_connect("localhost","root","","news"); 
                $categoryn_parent="SELECT * FROM `categorys` WHERE parent_id=0 ";
                $result_category_parent=mysqli_query($link,$categoryn_parent);
                while($row_category_parent=mysqli_fetch_array($result_category_parent)) {?>
                <li>
                    <a href="#">
                         <?php  echo $row_category_parent["title"]; ?>
                     </a> 
                    <?php
                    $id_category_parent=$row_category_parent['id'];
                    $category_down_query="SELECT * FROM categorys WHERE parent_id=$id_category_parent"; 
                    $result_category_down=mysqli_query($link,$category_down_query);?>
                    
                    <ul class="submenu">

                                <?php  while($row_category_down=mysqli_fetch_array($result_category_down)) { ?>
                        <li>
                            <a href="category.html">
                            <?php echo $row_category_down ['title']; ?>
                             </a> 
                        </li>
                    
                    
                    <?php } ?>
                    </ul>
                </li>
                    <?php }  ?>
                    