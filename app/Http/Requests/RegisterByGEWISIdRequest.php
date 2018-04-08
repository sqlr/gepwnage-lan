<?php

namespace App\Http\Requests;

use Sqlr\GEWIS\GEWIS;
use Sqlr\GEWIS\Model\Member;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

/**
 * Class RegisterByGEWISIdRequest
 *
 * @package App\Http\Requests
 *
 * @property int gewis_id
 */
class RegisterByGEWISIdRequest extends FormRequest
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
            'gewis_id' => [
                'required',
                Rule::unique('users', 'gewis_id'),
            ],
            'date_of_birth' => [
                'required',
                'date',
                'before_or_equal:16 years ago',
                'matches_gewis_member:gewis_id',
            ],
        ];
    }

    /**
     * @param Validator $validator
     */
    public function withValidator(Validator $validator)
    {
        /**
         * @param string $attribute
         * @param string $value
         * @param array $parameters
         * @param Validator $validator
         * @return bool
         */
        $extension = function ($attribute, $value, $parameters, $validator) {
            /** @var int $gewis_id */
            $gewis_id = $validator->getData()[$parameters[0]];

            /** @var null|Member $gewisMember */
            $gewisMember = app(GEWIS::class)->findMemberById($gewis_id);

            return !is_null($gewisMember) && $gewisMember->birth->equalTo(new Carbon($value));
        };

        $validator->addExtension('matches_gewis_member', $extension);
    }
}
