<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $cars = auth()->user()->cars;
        $cars = Car::all();
        return view('admin.cars.index',['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.cars.create')->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'user_id' => 'required',
            'license_number' => 'required',
            'vin' => 'required',
            'year' => 'required',
            'model' => 'required',
            'manufacturer' => 'required'
        ]);



        Car::create($inputs);

        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $user = User::where($car->user_id);
        return view('admin.cars.edit')->withCar($car)->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $inputs = \request()->validate([
            'user_id' => 'required',
            'license_number' => 'required',
            'vin' => 'required',
            'year' => 'required',
            'model' => 'required',
            'manufacturer' => 'required'
        ]);


        $car->user_id = $inputs['user_id'];
        $car->license_number = $inputs['license_number'];
        $car->vin = $inputs['vin'];
        $car->year = $inputs['year'];
        $car->model = $inputs['model'];
        $car->manufacturer = $inputs['manufacturer'];

        $car->save();
        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        Session::flash('message', 'Car was deleted');

        return back();
    }
}
