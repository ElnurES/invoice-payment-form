<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function invoice()
    {
        $user = User::inRandomOrder()->first();
        $service = Service::inRandomOrder()->first();
        return view('invoice', compact('user', 'service'));
    }

    public function viewPayment($user_id, $service_id)
    {
        return view('payment', compact('user_id', 'service_id'));
    }

    public function processPayment(PaymentRequest $request)
    {
        $request->validated();

        // Генерация случайного числа (1, 2 или 3) для определения успешности платежа
        $resultStatus = rand(1, 3);

        // Определение статуса платежа на основе случайного числа
        if ($resultStatus == 1) {
            $status = 'Успешно';
        } elseif ($resultStatus == 2) {
            $status = 'Недостаточно денег';
        } else {
            $status = 'Банк отклонил платеж';
        }

        // Используем транзакцию для записи информации о платеже в базу данных
        DB::transaction(function () use ($resultStatus, $request) {
            $payment = new Payment();
            $payment->user_id = $request['user_id'];
            $payment->service_id = $request['service_id'];
            $payment->status = $resultStatus;
            $payment->save();
        });

        // Возвращаем ответ пользователю
        return response()->json(['status' => $status]);
    }
}
