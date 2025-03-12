<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => 'sometimes|required|integer|exists:products,id',
            'amount' => 'sometimes|required|integer',
            'customer_name' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|in:new,completed',
            'comment' => 'sometimes|nullable|string',
        ];
    }
}
