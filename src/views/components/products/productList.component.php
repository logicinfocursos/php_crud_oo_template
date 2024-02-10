<?php
include_once "src/views/components/products/productListItem.component.php";
function productList($products)
{ ?>

    <div style="height: 300px; overflow-y: scroll;">
        <table class="table table-hover m-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">preço</th>
                    <th scope="col">categoria</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($products as $item) {

                    productListItem($item);

                } ?>
            </tbody>
        </table>
    </div>

<?php }