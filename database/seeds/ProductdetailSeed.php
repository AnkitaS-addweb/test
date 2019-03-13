<?php

use Illuminate\Database\Seeder;

class ProductdetailSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Ruger 10/22', 'type' => 'Rifle', 'parent_product_id' => null,],
            ['id' => 2, 'name' => 'BX-25 Magazine', 'type' => 'Magazine', 'parent_product_id' => 1,],
            ['id' => 3, 'name' => 'BARSKA 3-9x32 Plinker-22 Riflescope', 'type' => 'Scopes', 'parent_product_id' => 1,],
            ['id' => 4, 'name' => 'Nikon 6729 ProStaff 4-12 x 40', 'type' => 'Scopes', 'parent_product_id' => 1,],
            ['id' => 5, 'name' => 'Product 1', 'type' => 'Magazine', 'parent_product_id' => 2,],

        ];

        foreach ($items as $item) {
            \App\Productdetail::create($item);
        }
    }
}
