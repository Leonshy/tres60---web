<!DOCTYPE html>
<html lang="es-PY">
<head>
    <meta charset="utf-8">
    <title>Nuevo lead 360</title>
</head>
<body style="margin:0; padding:24px; background:#FBF9EF; font-family: Arial, Helvetica, sans-serif; color:#373C05;">
    <table role="presentation" width="100%" style="max-width:480px; margin:0 auto; background:#ffffff; border-radius:16px; overflow:hidden;">
        <tr>
            <td style="background:#232703; padding:24px; text-align:center;">
                <span style="color:#FFD905; font-size:20px; font-weight:bold;">Nuevo lead — 360 by METRIKA SA</span>
            </td>
        </tr>
        <tr>
            <td style="padding:24px;">
                <p style="margin:0 0 16px; font-size:16px;">Un propietario dejó sus datos en la landing:</p>

                <table role="presentation" width="100%" style="font-size:15px; line-height:1.6;">
                    <tr>
                        <td style="padding:6px 0; color:#5E6330; width:120px;">Nombre</td>
                        <td style="padding:6px 0; font-weight:bold;">{{ $lead->nombre }}</td>
                    </tr>
                    <tr>
                        <td style="padding:6px 0; color:#5E6330;">Teléfono</td>
                        <td style="padding:6px 0; font-weight:bold;">{{ $lead->telefono }}</td>
                    </tr>
                    <tr>
                        <td style="padding:6px 0; color:#5E6330;">Ubicación</td>
                        <td style="padding:6px 0; font-weight:bold;">{{ $lead->ubicacion }}</td>
                    </tr>
                    @if ($lead->email)
                        <tr>
                            <td style="padding:6px 0; color:#5E6330;">Correo</td>
                            <td style="padding:6px 0; font-weight:bold;">{{ $lead->email }}</td>
                        </tr>
                    @endif
                </table>

                <p style="margin:24px 0 0; font-size:13px; color:#5E6330;">Recibido el {{ $lead->created_at->translatedFormat('d/m/Y H:i') }}.</p>
            </td>
        </tr>
    </table>
</body>
</html>
