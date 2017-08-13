<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            'title' => 'Nissan: всегда на высоте!',
            'brand_id' => 1,
            'status_id' => 4,
            'city_id' => 1,
            'description' => 'Покупай новый Nissan X-Trail со скидкой 30% или обменяй свой старый автомобиль 
                на любой Nissan по выгодному курсу.',
            'shop_link' => 'https://nissan.forever.com',
            'active_from' => '2017-08-08',
            'active_to' => '2017-08-31',
            'type_id' => 2,
            'category_id' => 6,
        ]);

        DB::table('actions')->insert([
            'title' => 'Nike: просто оставайся собой',
            'brand_id' => 3,
            'status_id' => 3,
            'city_id' => 2,
            'description' => 'Спортивные костюмы Nike по выгодной цене со скидкой до 50%.
                Обувь Nike со скидкой до 40%.',
            'active_from' => '2017-08-15',
            'active_to' => '2017-09-15',
            'type_id' => 2,
            'category_id' => 3,
        ]);

        DB::table('actions')->insert([
            'title' => '"Якитория": наши суши самые вкусные в городе!',
            'brand_id' => 2,
            'status_id' => 1,
            'city_id' => 2,
            'description' => 'Сеть ресторанов японской и итальянской кухни "Якитория" приглашает гостей!
                При заказе фирменного суши-сета - вино в подарок! Работает круглосуточная доставка.
                Мы ценим наших дорогих клиентов!',
            'active_from' => '2017-08-09',
            'active_to' => '2017-09-01',
            'type_id' => 1,
            'category_id' => 2,
        ]);

        DB::table('actions')->insert([
            'title' => 'Проводи лето здорово!',
            'brand_id' => 4,
            'status_id' => 1,
            'city_id' => 1,
            'description' => 'Сеть аптек "Самсон-фарма" поможет вам выгодно собрать аптечку на летний период.
                Мы предлагаем вам квалифицированную консультацию специалиста, широкий ассортимент препаратов 
                хорошего качества и скидки 50% на каждый третий препарат в чеке.',
            'active_from' => '2017-08-01',
            'active_to' => '2017-09-01',
            'type_id' => 1,
            'category_id' => 3,
        ]);

        DB::table('actions')->insert([
            'title' => 'Неделя скидок от "Магнита"',
            'brand_id' => 5,
            'status_id' => 2,
            'city_id' => 1,
            'description' => 'Только в магазинах нашей сети: скидки до 20% на продукцию рыбного и мясного отделов,
                до 30% на кондитерские изделия и до 40% на выпечку собственного производства!',
            'active_from' => '2017-08-23',
            'active_to' => '2017-08-30',
            'type_id' => 2,
            'category_id' => 5,
        ]);
    }
}
