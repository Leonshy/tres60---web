<?php

namespace App\Console\Commands;

use App\Models\Lead;
use Illuminate\Console\Command;

class ListarLeads extends Command
{
    protected $signature = 'tres360:leads';

    protected $description = 'Muestra los últimos 20 leads recibidos por el formulario de contacto';

    public function handle(): void
    {
        $leads = Lead::latest()->take(20)->get();

        if ($leads->isEmpty()) {
            $this->info('Todavía no hay leads registrados.');

            return;
        }

        $this->table(
            ['ID', 'Nombre', 'Teléfono', 'Ubicación', 'Correo', 'Recibido'],
            $leads->map(fn (Lead $lead) => [
                $lead->id,
                $lead->nombre,
                $lead->telefono,
                $lead->ubicacion,
                $lead->email ?? '—',
                $lead->created_at->translatedFormat('d/m/Y H:i'),
            ])
        );
    }
}
