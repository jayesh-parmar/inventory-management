<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Feature\UserLogin;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,UserLogin;
}
