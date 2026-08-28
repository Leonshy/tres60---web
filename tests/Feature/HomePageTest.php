<?php

use App\Models\Lead;

it('renders the home page with the main heading', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('Administración integral de departamentos');
});

it('does not create a lead just by visiting the home page', function () {
    $this->get('/');

    expect(Lead::count())->toBe(0);
});
