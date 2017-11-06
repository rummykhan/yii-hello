<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use tebazil\yii2seeder\Seeder;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SeederController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionPerson($message = 'hello world')
    {
        $seeder = new Seeder();
        $generator = $seeder->getGeneratorConfigurator();
        $faker = $generator->getFakerConfigurator();

        $seeder->table('person')->columns([
            'name' => $faker->name,
            'age' => $faker->numberBetween(20, 50),
            'city' => $faker->city,
            'country' => $faker->country,
        ])->rowQuantity(200);

        $seeder->refill();
    }

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionUser($message = 'hello world')
    {
        echo $message . "\n";
    }

    public function actionPosts()
    {
    }

    public function actionCountries()
    {
    }
}
