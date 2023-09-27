<?php

it('login a successful response', function () {
    $response = $this->get('/profile');

    $response->assertStatus(302);
});
