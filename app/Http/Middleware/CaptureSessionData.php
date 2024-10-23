<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Sessions;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class CaptureSessionData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
                // Capturar datos del cliente
                $sessionData = [
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'visited_pages' => [],
                    'interaction_time' => []
                ];

                // Obtener la ruta actual
                $currentPath = $request->path();

                // Almacenar la página visitada en la sesión
                if (!session()->has('visited_pages')) {
                    session(['visited_pages' => []]);
                }
                $visitedPages = session('visited_pages');

                // Añadir la ruta actual al historial de páginas visitadas
                $visitedPages[] = $currentPath;

                // Limitar el número de páginas visitadas a 5
                if (count($visitedPages) > 5) {
                    array_shift($visitedPages); // Elimina el primer elemento (el más antiguo)
                }

                session(['visited_pages' => $visitedPages]);

                // Obtener o crear la sesión en la base de datos
                $session = Sessions::where('ip_address', $sessionData['ip_address'])->first();

                //Producción
                //$locationData = $this->getLocation($sessionData['ip_address']);
                //Desarrollo
                $locationData = $this->getLocation("152.203.18.162");
                if ($session) {
                    
                    // Obtener el historial existente
                    $payloadData = json_decode($session->history, true);

                    // Actualizar el historial con las páginas visitadas
                    $payloadData['visited_pages'] = $visitedPages;
                    
                    // Añadir el tiempo de interacción actual
                    $payloadData['interaction_time'][] = Carbon::now()->toDateTimeString();

                    // Añadir latitud y longitud al historial
                    if ($locationData) {
                        $payloadData['location'] = [
                            'country'=>$locationData['country'],
                            'state'=>$locationData['region'],
                            'zip'=>$locationData['zip'],
                            'latitude' => $locationData['lat'],
                            'longitude' => $locationData['lon'],
                        ];
                    }

                    // Limitar el número de interacciones a 5
                    if (count($payloadData['interaction_time']) > 5) {
                        array_shift($payloadData['interaction_time']); // Elimina el primer elemento
                    }

                    $session->history = json_encode($payloadData);
                    $session->save();
                }    
                return $next($request);
    }
    private function getLocation($ip)
    {
        // Realizar una solicitud a la API para obtener la ubicación
        $response = Http::get("http://ip-api.com/json/{$ip}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
