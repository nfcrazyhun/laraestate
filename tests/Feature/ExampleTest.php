<?php

it('returns a successful response', function () {
    $response = $this->get('/listing');

    $response->assertStatus(200);
});
