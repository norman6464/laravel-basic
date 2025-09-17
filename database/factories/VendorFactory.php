<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory {
    // ファクトリーとはシーダーと同じくダミーデータをつくるクラスになる 
    // ファクトリークラスとシーだークラスはほぼ同じ目的で作られているがより多くのダミーデータを
    // 作るのであればこのファクトリークラスでデータの作成をするのがいい
    
    public function definition(): array // array（配列）が戻り値になる
    {
        // 教材ではcompany()メソッドだったが、今回は明示的にしている
        return [
            'vendor_code' => fake()->unique()->randomNumber(5, true),
            'vendor_name' => fake()->randomElement([
                '山田商事', '佐藤工業', '鈴木貿易', '高橋物産', '伊藤商会', '株式会社侍', '有限会社武士'
            ])
        ];
    }
    
}    

