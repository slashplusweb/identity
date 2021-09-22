<?php
namespace Slashplus\IdentityGermany\Tests;

use Slashplus\IdentityGermany\Validation\PassportValidation\Validator as Validator;

it('validates correct data', function ($inputData) {
    // autogenerated with https://www.perso.xyz/
    $validator = new Validator($inputData);
    $this->assertTrue($validator->passes(), implode('; ', $validator->errors()->all()));
})->with([
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    [['serial' => '4399412970', 'birth' => '9601293', 'gender' => 'F', 'expire' => '4611185', 'nationality' => 'D', 'checksum' => '6']],
    [['serial' => '4001050550', 'birth' => '9602234', 'gender' => 'M', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '2']],
    [['serial' => '5783807983', 'birth' => '9605224', 'gender' => 'F', 'expire' => '4611129', 'nationality' => 'D', 'checksum' => '2']],
    [['serial' => '4608677095', 'birth' => '9510087', 'gender' => 'F', 'expire' => '4706104', 'nationality' => 'D', 'checksum' => '6']],
    [['serial' => '3491039407', 'birth' => '9603080', 'gender' => 'M', 'expire' => '4707145', 'nationality' => 'D', 'checksum' => '8']],
    [['serial' => '1087601249', 'birth' => '9604249', 'gender' => 'M', 'expire' => '4612241', 'nationality' => 'D', 'checksum' => '2']],
    [['serial' => '9620118966', 'birth' => '9607170', 'gender' => 'F', 'expire' => '4701110', 'nationality' => 'D', 'checksum' => '6']],
]);

it('validates size as incorrect', function ($inputData) {
    // autogenerated with https://www.perso.xyz/
    $validator = new Validator($inputData);
    $this->assertFalse($validator->passes(), implode('; ', $validator->errors()->all()));
})->with([
    //serial to long
    [['serial' => '54841975989', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    //serial to short
    [['serial' => '548419759', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    //birth to long
    [['serial' => '5484197598', 'birth' => '95122101', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    //birth to short
    [['serial' => '5484197598', 'birth' => '951221', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    //expire to long
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '47020251', 'nationality' => 'D', 'checksum' => '4']],
    //expire to short
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '470202', 'nationality' => 'D', 'checksum' => '4']],
    //nationality to long
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'DA', 'checksum' => '4']],
    //nationality to short
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => '', 'checksum' => '4']],
    //gender to long
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'FM', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    //gender to short
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => '', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    //gender not in F, M
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'D', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
    //checksum to long
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '41']],
    //checksum to short
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '']],
    //full_size correct, but individual fields invalid (serial, birth)
    [['serial' => '54841975981', 'birth' => '951221', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4']],
]);

it('validates blacklisted data as incorrect', function($data) {
    $validator = new Validator($data);
    $this->assertFalse($validator->passes(), implode('; ', $validator->errors()->all()));
})->with([
    [['serial' => '1220001297', 'birth' => '6408125', 'gender' => 'F', 'expire' => '1710319', 'nationality' => 'D', 'checksum' => '8']],
    [['serial' => 'L01X00T471', 'birth' => '8308126', 'gender' => 'F', 'expire' => '3108011', 'nationality' => 'D', 'checksum' => '7']],
    [['serial' => 'T220001293', 'birth' => '6408125', 'gender' => 'F', 'expire' => '2010315', 'nationality' => 'D', 'checksum' => '4']],
    [['serial' => 'TTTT000013', 'birth' => '6412087', 'gender' => 'F', 'expire' => '1010318', 'nationality' => 'D', 'checksum' => '2']],
    [['serial' => 'L0L0016W74', 'birth' => '6408125', 'gender' => 'F', 'expire' => '1010318', 'nationality' => 'D', 'checksum' => '4']],
    [['serial' => 'T220001293', 'birth' => '6408125', 'gender' => 'F', 'expire' => '2010315', 'nationality' => 'D', 'checksum' => '4']],
    [['serial' => '1220001297', 'birth' => '6408125', 'gender' => 'M', 'expire' => '1710319', 'nationality' => 'D', 'checksum' => '8']],
    [['serial' => 'L01X00T471', 'birth' => '8308126', 'gender' => 'M', 'expire' => '3108011', 'nationality' => 'D', 'checksum' => '7']],
    [['serial' => 'T220001293', 'birth' => '6408125', 'gender' => 'M', 'expire' => '2010315', 'nationality' => 'D', 'checksum' => '4']],
    [['serial' => 'TTTT000013', 'birth' => '6412087', 'gender' => 'M', 'expire' => '1010318', 'nationality' => 'D', 'checksum' => '2']],
    [['serial' => 'L0L0016W74', 'birth' => '6408125', 'gender' => 'M', 'expire' => '1010318', 'nationality' => 'D', 'checksum' => '4']],
    [['serial' => 'T220001293', 'birth' => '6408125', 'gender' => 'M', 'expire' => '2010315', 'nationality' => 'D', 'checksum' => '4']],
]);


it('validates checksum', function () {
    $validator = new Validator(
        [
            'serial' => '5484197598',
            'birth' => '9512210',
            'expire' => '4702025',
            'nationality' => 'D',
            'gender' => 'F',
            'checksum' => '4',
        ]
    );
    $this->assertTrue($validator->passes(), implode('; ', $validator->errors()->all()));
});

it('returns the correct birthdate', function($data, $expectation) {
    $validator = new Validator($data);
    $birthDate = $validator->validatedBirthDate();
    expect($birthDate)->toBeInstanceOf(\DateTime::class);
    expect($birthDate->format('Y-m-d'))->toBe($expectation);
})->with([
    [['serial' => '5484197598', 'birth' => '9512210', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '4'], '1995-12-21'],
    [['serial' => '4399412970', 'birth' => '9601293', 'gender' => 'F', 'expire' => '4611185', 'nationality' => 'D', 'checksum' => '6'], '1996-01-29'],
    [['serial' => '4001050550', 'birth' => '9602234', 'gender' => 'F', 'expire' => '4702025', 'nationality' => 'D', 'checksum' => '2'], '1996-02-23'],
    [['serial' => '5783807983', 'birth' => '9605224', 'gender' => 'F', 'expire' => '4611129', 'nationality' => 'D', 'checksum' => '2'], '1996-05-22'],
    [['serial' => '4608677095', 'birth' => '9510087', 'gender' => 'F', 'expire' => '4706104', 'nationality' => 'D', 'checksum' => '6'], '1995-10-08'],
    [['serial' => '3491039407', 'birth' => '9603080', 'gender' => 'F', 'expire' => '4707145', 'nationality' => 'D', 'checksum' => '8'], '1996-03-08'],
    [['serial' => '1087601249', 'birth' => '9604249', 'gender' => 'F', 'expire' => '4612241', 'nationality' => 'D', 'checksum' => '2'], '1996-04-24'],
    [['serial' => '9620118966', 'birth' => '9607170', 'gender' => 'F', 'expire' => '4701110', 'nationality' => 'D', 'checksum' => '6'], '1996-07-17'],
]);
