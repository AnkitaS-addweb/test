<?php

use Illuminate\Database\Seeder;

class ProductdetailSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'vendor' => [],
            ],
            2 => [
                'vendor' => [1],
            ],
            3 => [
                'vendor' => [],
            ],
            4 => [
                'vendor' => [],
            ],
            5 => [
                'vendor' => [1],
            ],

        ];

        foreach ($items as $id => $item) {
            $productdetail = \App\Productdetail::find($id);

            foreach ($item as $key => $ids) {
                $productdetail->{$key}()->sync($ids);
            }
        }
    }
}
