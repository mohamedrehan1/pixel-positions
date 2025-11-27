<?php

use App\Models\Employer;
use App\Models\Job;

test('it be long to an employer', function () {
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id'=> $employer->id,
    ]);

    // Act and assert
    expect($job->employer->is($employer))->toBeTrue(true);
});

test('it can have tags', function () {
    $job = Job::factory()->create();
    $job->tag('frontend');
    
    expect($job->tags)->toHaveCount(1);
});
