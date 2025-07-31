<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{
    //use Carbon\Carbon;

    public function index(Request $request)
    {
        try {

            return $request->user()
                            ->appointments()
                            ->with('healthcareProfessional')->get();
         } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching appointments'], 500);
        }
    }

    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                    'healthcare_professional_id' => 'required|exists:healthcare_professionals,id',
                    'appointment_start_time' => 'required|date|after:now',
                    'appointment_end_time' => 'required|date|after:appointment_start_time',
                ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $overlap = Appointment::where('healthcare_professional_id', $request->healthcare_professional_id)
                ->where('status', 'booked')
                ->where(function($query) use ($request) {
                    $query->whereBetween('appointment_start_time', [$request->appointment_start_time, $request->appointment_end_time])
                        ->orWhereBetween('appointment_end_time', [$request->appointment_start_time, $request->appointment_end_time]);
                })->exists();

            if ($overlap) {
                return response()->json(['message' => 'Slot not available. Professional already booked.'], 403);
            }


            $appointment = Appointment::create([
                'user_id' => $request->user()->id,
                'healthcare_professional_id' => $request->healthcare_professional_id,
                'appointment_start_time' => $request->appointment_start_time,
                'appointment_end_time' => $request->appointment_end_time,
            ]);

            
            return response()->json([
                'message' => 'Appointment added successful',
                'data' => $appointment
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 403);
        }

        
    }

    public function cancel($id, Request $request)
    {
        
        try {
        $appointment = Appointment::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        if (Carbon::now()->diffInHours($appointment->appointment_start_time, false) < 24) {
            return response()->json(['message' => 'Cannot cancel within 24 hours'], 403);
        }

     
   
        $appointment->update(['status' => 'cancelled']); 
       
        return response()->json(['message' => 'Appointment cancelled']);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Appointment not found or cannot be cancelled'], 404);
        }
    }

    public function complete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'completed']);

        return response()->json(['message' => 'Appointment marked completed']);
    }

}
