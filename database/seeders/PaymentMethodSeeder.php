<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items=[
            ['method'=>'Bkash',
             'percentage'=>	1.5
            ],
            ['method'=>'Nogod',
             'percentage'=>	1.2
            ],
            ['method'=>'Upay',
             'percentage'=>	1.2
            ],
            ['method'=>'Rocket',
             'percentage'=>	1.2
            ],
            ['method'=>'Cash',
             'percentage'=>	0
            ],
            ['method'=>'Bank',
             'percentage'=>	0
            ],
        ];
        foreach($items as $item){
            PaymentMethod::create([
                'method' =>  $item['method'],
                'percentage'   =>  $item['percentage']
            ]);
        }
    }
}
