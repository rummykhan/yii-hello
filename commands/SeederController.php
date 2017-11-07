<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use tebazil\yii2seeder\Seeder;
use yii\base\Security;
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
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {

            if (!$this->confirm('Are you sure??')) {
                exit;
            }

            return true;
        }

        return false;
    }

    /**
     * This command echoes what you have entered as the message.
     */
    public function actionPerson()
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
     */
    public function actionUser()
    {
        $seeder = new Seeder();
        $generator = $seeder->getGeneratorConfigurator();
        $faker = $generator->getFakerConfigurator();

        $security = new Security();

        $seeder->table('users')->columns([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $security->generatePasswordHash('123456'),
            'auth_key' => $security->generateRandomString(32),
        ])->rowQuantity(5);

        $seeder->refill();
    }
}
