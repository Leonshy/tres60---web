<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Mail\NuevoLead;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (! empty($data['empresa_web']) || ! $this->timestampValido($request->input('_ts'), $request->input('_sig'))) {
            return redirect('/#contacto')->with('ok', true);
        }

        $lead = Lead::create([
            'nombre' => trim($data['nombre']),
            'telefono' => trim($data['telefono']),
            'ubicacion' => trim($data['ubicacion']),
            'email' => ! empty($data['email']) ? trim($data['email']) : null,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        try {
            Mail::to(config('tres360.lead_to'))->send(new NuevoLead($lead));
        } catch (\Throwable $e) {
            Log::error('Error al enviar lead por correo', ['lead_id' => $lead->id, 'error' => $e->getMessage()]);
        }

        return redirect('/#contacto')->with('ok', true);
    }

    protected function timestampValido(?string $ts, ?string $sig): bool
    {
        if (! is_numeric($ts) || ! is_string($sig) || empty($sig)) {
            return false;
        }

        $now = time();
        $enviado = (int) $ts;

        if ($enviado <= 0 || $enviado > $now || ($now - $enviado) < 3) {
            return false;
        }

        $esperado = hash_hmac('sha256', (string) $ts, config('app.key'));

        return hash_equals($esperado, $sig);
    }
}
