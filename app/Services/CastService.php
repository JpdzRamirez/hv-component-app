<?php

namespace App\Services;

use App\Contracts\CastServiceInterface;
use Illuminate\Support\Facades\Log;

class CastService implements CastServiceInterface
{
    /**
     * Castea y transforma un arreglo de habilidades.
     *
     * @param string $skill
     * @param string $description
     * @return array
     */
    public function transformSkill(string $skill, string $description): array
    {
        return [
            'name' => strtoupper($skill),
            'description' => ucfirst($description),
        ];
    }
    /**
     * Castea y transforma un arreglo de habilidades.
     *
     * @param string $type
     * @param string $case
     * @return array
     */
    public function transformMessage(string $type, string $case): array
    {
        // Validar que el caso sea 'tag'
        // Inicializa un array vacío para el mensaje
        $message = [
            'message' => '',
            'type' => $type,
            'date' => now()->format('d-m-Y H:i:s'),
        ];
        if ($case === 'tag') {
            switch ($type) {
                case 'success':
                    $message['message'] = __('sessions.success-tag.added');
                    break;

                case 'warning':
                    $message['message'] = __('sessions.warning-tag.deleted-all');
                    break;

                case 'info':
                    $message['message'] = __('sessions.info-tag.deleted');
                    break;

                case 'error-empty':
                    $message['message'] = __('sessions.error-tag.empty');
                    break;

                case 'error-limit':
                    $message['message'] = __('sessions.error-tag.limit');
                    break;

                default:
                    // Registrar en log el tipo no reconocido
                    Log::warning("Tipo de mensaje no reconocido: {$type}");
                    $message['message'] = __('sessions.error-tag.general');
                    $message['type'] = 'default';
                    break; // Se puede omitir ya que está al final
            }
        } else {
            // Mensaje por defecto si no se cumplen las condiciones anteriores
            Log::warning(__('exceptions.error') . __('exceptions.not_found') . __('exceptions.type') . $type);
            $message['message'] = __('sessions.error-tag.general');
            $message['type'] = 'default';
        }

        return $message;
    }
}
