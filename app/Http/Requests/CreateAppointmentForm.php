<?php

namespace App\Http\Requests;

use App\Appointment;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateAppointmentForm extends FormRequest
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
            'titel' => 'required',
            'start' => '',
            'eind' => '',
            'hele_dag' => '',
            'hex_color' => 'required',
        ];
    }

    public function persist()
    {
        $appointment = Appointment::create([
            'titel' => request('titel'),
            'start' => Carbon::parse(request('start')),
            'eind' => Carbon::parse(request('eind')),
            'hele_dag' => $this->has('hele_dag'),
            'hex_color' => request('hex_color'),
        ]);
    }
}
