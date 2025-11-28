<?php

namespace App\Http\Requests\Task;

use App\Models\User;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_id' => ['required', 'integer', 'gt:0', 'exists:companies,id'],
            'user_id' => [
                'required',
                'integer',
                'gt:0',
                'exists:users,id',
                function (string $attribute, mixed $value, Closure $fail) { // Validates user has no more than 5 pending tasks
                    $user = User::where('id', $value)->first();

                    if ($user->tasks()->where('is_completed', 0)->count() >= 5) {
                        $fail('The user already has five pending tasks');
                    }
                }
            ],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }

    /**
     * Attributes
     *
     * @return array<string, string>
     */
    public function attributes()
    {
        return [
            'company_id' => 'Company',
            'user_id' => 'User',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
