<?php

use App\Company;
use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Company
        $company1 = Company::create(['name' => 'Apple', 'email' => 'apple@gmail.com', 'website' => 'www.apple.com']);
        $company2 = Company::create(['name' => 'Samsung', 'email' => 'samsung@gmail.com', 'website' => 'www.samsung.com']);
        $company3 = Company::create(['name' => 'Microsoft', 'email' => 'microsoft@gmail.com', 'website' => 'www.microsoft.com']);
        $company4 = Company::create(['name' => 'Huawei', 'email' => 'huawei@gmail.com', 'website' => 'www.huawei.com']);
        $company5 = Company::create(['name' => 'Nokia', 'email' => 'nokia@gmail.com', 'website' => 'www.nokia.com']);
        $company6 = Company::create(['name' => 'Vivo', 'email' => 'vivo@gmail.com', 'website' => 'www.vivo.com']);
        $company7 = Company::create(['name' => 'Oppo', 'email' => 'oppo@gmail.com', 'website' => 'www.oppo.com']);
        $company8 = Company::create(['name' => 'Xiaomi', 'email' => 'xiaomi@gmail.com', 'website' => 'www.xiaomi.com']);
        $company9 = Company::create(['name' => 'Advan', 'email' => 'advan@gmail.com', 'website' => 'www.advan.com']);
        $company10 = Company::create(['name' => 'Tesla', 'email' => 'tesla@gmail.com', 'website' => 'www.tesla.com']);
        $company11 = Company::create(['name' => 'Tesla11', 'email' => 'tesla11@gmail.com', 'website' => 'www.tesla11.com']);
        $company12 = Company::create(['name' => 'Tesla12', 'email' => 'tesla12@gmail.com', 'website' => 'www.tesla12.com']);
        $company13 = Company::create(['name' => 'Tesla13', 'email' => 'tesla13@gmail.com', 'website' => 'www.tesla13.com']);
        $company14 = Company::create(['name' => 'Tesla14', 'email' => 'tesla14@gmail.com', 'website' => 'www.tesla14.com']);
        $company15 = Company::create(['name' => 'Tesla15', 'email' => 'tesla15@gmail.com', 'website' => 'www.tesla15.com']);

        // Employee
        $employee1 = Employee::create(['name' => 'John1', 'email' => 'john1@gmail.com', 'phone' => '0898989898', 'company_id' => $company1->id]);
        $employee2 = Employee::create(['name' => 'John2', 'email' => 'john2@gmail.com', 'phone' => '0898989898', 'company_id' => $company2->id]);
        $employee3 = Employee::create(['name' => 'John3', 'email' => 'john3@gmail.com', 'phone' => '0898989898', 'company_id' => $company3->id]);
        $employee4 = Employee::create(['name' => 'John4', 'email' => 'john4@gmail.com', 'phone' => '0898989898', 'company_id' => $company4->id]);
        $employee5 = Employee::create(['name' => 'John5', 'email' => 'john5@gmail.com', 'phone' => '0898989898', 'company_id' => $company5->id]);
        $employee6 = Employee::create(['name' => 'John6', 'email' => 'john6@gmail.com', 'phone' => '0898989898', 'company_id' => $company6->id]);
        $employee7 = Employee::create(['name' => 'John7', 'email' => 'john7@gmail.com', 'phone' => '0898989898', 'company_id' => $company7->id]);
        $employee8 = Employee::create(['name' => 'John8', 'email' => 'john8@gmail.com', 'phone' => '0898989898', 'company_id' => $company9->id]);
        $employee9 = Employee::create(['name' => 'John9', 'email' => 'john9@gmail.com', 'phone' => '0898989898', 'company_id' => $company9->id]);
        $employee10 = Employee::create(['name' => 'John10', 'email' => 'john10@gmail.com', 'phone' => '0898989898', 'company_id' => $company9->id]);
        
    }
}
