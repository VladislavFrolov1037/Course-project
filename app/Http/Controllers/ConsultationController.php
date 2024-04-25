<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consultation\StoreRequest;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Consultation::create($data);

        return redirect()->route('main')->with('success_message', 'Форма успешно отправлена!');
    }
}
