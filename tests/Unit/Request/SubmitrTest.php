<?php
namespace Request;
use Faker\Factory;
use Illuminate\Support\Facades\App;

class SubmitrTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $faker = Factory::create('en_GB'); //App/HolidayRequest
        $start = $faker->date('Y-m-d','now');
        $end = $faker->date('Y-m-d','now');
        $type = $faker->regexify('paid');
        $status = $faker->regexify('pending');
        $created_by = $faker->numberBetween(1,50);
        $updated_at = $faker->date('Y-m-d','now');
        $created_at = $faker->date('Y-m-d','now');


        $this->tester->haveRecord(
          'holiday_requests',
          ['start'=>$start, 'end'=>$end, 'type'=>$type, 'status'=>$status, 'created_by'=>$created_by, 'updated_at'=>$updated_at, 'created_at'=>$created_at]
        );

        $this->tester->seeRecord(
            'holiday_requests',
            ['start'=>$start, 'end'=>$end, 'type'=>$type, 'status'=>$status, 'created_by'=>$created_by, 'updated_at'=>$updated_at, 'created_at'=>$created_at]
        );
    }
}