<?php

use App\Models\Lead;

it('shows a message when there are no leads', function () {
    $this->artisan('tres360:leads')
        ->expectsOutputToContain('Todavía no hay leads registrados.')
        ->assertExitCode(0);
});

it('lists the latest leads in a table', function () {
    Lead::factory()->create(['nombre' => 'Juan Pérez']);

    $this->artisan('tres360:leads')
        ->expectsOutputToContain('Juan Pérez')
        ->assertExitCode(0);
});
