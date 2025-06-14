<?php

namespace Database\Factories;

use App\Models\Model;
use App\SmStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmStudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public $i=1;
    public function definition()
    {
        $i=$this->i++;
        return [   
                'admission_no'            => $this->faker->numberBetween($min = 10000, $max = 90000),
                'roll_no'                 => $this->faker->numberBetween($min = 10000, $max = 90000),          
                'student_category_id'     => 1,  
                'session_id'              => 1,
                'caste'                   => 'Asian',
                'bloodgroup_id'           => 3,
                //transport section
                'religion_id'             => rand(1,2),
                'height'                  => 56,
                'weight'                  => 45,

                'first_name'              => $this->faker->firstName($gender = 'male'|'female'),
                'last_name'               => $this->faker->lastName,
                'full_name'               => 'first_name'.' '.'last_name',

                'date_of_birth'           => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'admission_date'          => $this->faker->date($format = 'Y-m-d', $max = 'now'),

                'gender_id'               => rand(1,2),
                'role_id'                 => 2,
                'email'                   => 'student_'. uniqid() .'@infinia.com',
                'mobile'                  => '+8801234567' . $i,
                'bank_account_no'         => '+8801234567' . $i,

                'bank_name'               => 'DBBL',               
                'current_address'         => 'Nairobi',
                'previous_school_details' => 'Nairobi',
                'aditional_notes'         => 'Nairobi',

                'permanent_address'       => 'Nairobi',
                'created_at'              => date('Y-m-d h:i:s')
        ];
    }
}
