<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Http\Attributes\FailOnUnknownFields;
use Illuminate\Validation\Rule;

#[FailOnUnknownFields]
class StoreExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'numeric', 'min:1'],
            'track_id' => ['required', 'numeric', 'min:1'],
            'listen_at' => ['required'],
            'source_type' => ['required', Rule::in(['selection', 'artist', 'album'])],
            'source_id' => ['required', 'numeric', 'min:1'],
            'is_offline' => ['required', 'boolean'],
            'duration' => ['required', 'numeric', 'min:0']
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Требуется ввести id пользователя',
            'user_id.numeric' => 'id пользователя должно быть представлено числом',
            'user_id.min' => 'id пользователя должно быть неотрицательным и ненулевым',

            'track_id.required' => 'Требуется ввести id трека',
            'track_id.numeric' => 'id трека должно быть представлено числом',
            'track_id.min' => 'id трека должно быть неотрицательным и ненулевым',

            'listen_at.required' => 'Требуется ввести дату\время начала прослушивания',

            'source_type.required' => 'Требуется ввести место воспроизведения',
            'source_type.in' => 'Место воспроизведения может иметь значения: selection, artist или album',

            'source_id.required' => 'Требуется ввести id источника',
            'source_id.numeric' => 'id источника должно быть представлено числом',
            'source_id.min' => 'id источника должно быть неотрицательным и ненулевым',

            'is_offline.required' => 'Требуется ввести статус прослушивания',
            'is_offline.boolean' => 'Статус прослушивания должен быть представлен логическим значением',

            'duration.required' => 'Требуется ввести количество секунд прослушивания',
            'duration.numeric' => 'Количество секунд прослушивания должно быть представлено числом',
            'duration.min' => 'Количество секунд прослушивания должно быть неотрицательным и ненулевым'
        ];
    }
}
