<?php

use App\Mail\NuevoLead;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;

function firmaValida(int $antiguedadSegundos = 5): array
{
    $ts = time() - $antiguedadSegundos;

    return [
        '_ts' => $ts,
        '_sig' => hash_hmac('sha256', (string) $ts, config('app.key')),
    ];
}

it('creates a lead and queues the notification email on a valid submission', function () {
    Mail::fake();

    $response = $this->post('/contacto', [
        'nombre' => 'Juan Pérez',
        'telefono' => '0981123456',
        'ubicacion' => 'Villa Morra, Asunción',
        'email' => 'juan@example.com',
        ...firmaValida(),
    ]);

    $response->assertRedirect('/#contacto');
    $response->assertSessionHas('ok', true);

    expect(Lead::count())->toBe(1);

    $lead = Lead::first();
    expect($lead->nombre)->toBe('Juan Pérez');
    expect($lead->telefono)->toBe('0981123456');
    expect($lead->email)->toBe('juan@example.com');

    Mail::assertSent(NuevoLead::class, fn ($mail) => $mail->lead->is($lead));
});

it('creates a lead without an optional email', function () {
    Mail::fake();

    $this->post('/contacto', [
        'nombre' => 'Ana López',
        'telefono' => '0971222333',
        'ubicacion' => 'Encarnación',
        ...firmaValida(),
    ]);

    expect(Lead::count())->toBe(1);
    expect(Lead::first()->email)->toBeNull();
});

it('returns validation errors on an invalid submission', function () {
    $response = $this->post('/contacto', [
        'nombre' => '',
        'telefono' => '',
        'ubicacion' => '',
        ...firmaValida(),
    ]);

    $response->assertSessionHasErrors(['nombre', 'telefono', 'ubicacion']);
    expect(Lead::count())->toBe(0);
});

it('silently discards a submission with the honeypot filled', function () {
    Mail::fake();

    $response = $this->post('/contacto', [
        'nombre' => 'Bot Malicioso',
        'telefono' => '0981000000',
        'ubicacion' => 'Asunción',
        'empresa_web' => 'https://spam.example',
        ...firmaValida(),
    ]);

    $response->assertRedirect('/#contacto');
    $response->assertSessionHas('ok', true);
    expect(Lead::count())->toBe(0);
    Mail::assertNothingSent();
});

it('silently discards a submission sent too fast for a human', function () {
    $response = $this->post('/contacto', [
        'nombre' => 'Envío Instantáneo',
        'telefono' => '0981000000',
        'ubicacion' => 'Asunción',
        ...firmaValida(0),
    ]);

    $response->assertRedirect('/#contacto');
    expect(Lead::count())->toBe(0);
});

it('cuts off after the sixth submission in a minute', function () {
    for ($i = 0; $i < 5; $i++) {
        $this->post('/contacto', [
            'nombre' => "Persona $i",
            'telefono' => '0981000000',
            'ubicacion' => 'Asunción',
            ...firmaValida(),
        ]);
    }

    $response = $this->post('/contacto', [
        'nombre' => 'Sexto Envío',
        'telefono' => '0981000000',
        'ubicacion' => 'Asunción',
        ...firmaValida(),
    ]);

    $response->assertStatus(429);
});
