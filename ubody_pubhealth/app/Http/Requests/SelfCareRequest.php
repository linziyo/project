<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class SelfCareRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'meal' => 'required|integer',
            'comb_wash' => 'required|integer',
            'dressing' => 'required|integer',
            'toilets' => 'required|integer',
            'activity' => 'required|integer',
        ];
    }

    public function attributes()
    {
        $attributes =  parent::attributes(); // TODO: Change the autogenerated stub
        $custom = [
            'meal' => '进餐',
            'comb_wash' => '梳洗',
            'dressing' => '穿扮',
            'toilets' => '如厕',
            'activity' => '活动'
        ];
        return array_merge($attributes,$custom);
    }

    public function messages()
    {
        $messages =  parent::messages(); // TODO: Change the autogenerated stub
        $custom = [
            'required' => '请选择:attribute',
        ];
        return array_merge($messages,$custom);
    }

}
