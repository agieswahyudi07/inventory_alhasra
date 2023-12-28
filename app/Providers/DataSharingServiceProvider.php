<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;


class DataSharingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $room_yayasan = DB::table('ms_room')->where('institution_id', '=', '1')->where('room_type_id', '=', '1')->get();
        $yayasan = [];
        foreach ($room_yayasan as $yys) {
            $yayasan[] = [
                'room_id' => $yys->room_id,
                'room_name' => $yys->room_name,
                'room_code' => $yys->room_code,
            ];
        }

        $room_smp = DB::table('ms_room')->where('institution_id', '=', '2')->get();
        $smp = [];
        foreach ($room_smp as $mp) {
            $smp[] = [
                'room_id' => $mp->room_id,
                'room_name' => $mp->room_name,
                'room_code' => $mp->room_code,
            ];
        }

        $room_sma = DB::table('ms_room')->where('institution_id', '=', '3')->get();
        $sma = [];
        foreach ($room_sma as $ma) {
            $sma[] = [
                'room_id' => $ma->room_id,
                'room_name' => $ma->room_name,
                'room_code' => $ma->room_code,
            ];
        }

        $room_smk = DB::table('ms_room')->where('institution_id', '=', '4')->get();
        $smk = [];
        foreach ($room_smk as $mk) {
            $smk[] = [
                'room_id' => $mk->room_id,
                'room_name' => $mk->room_name,
                'room_code' => $mk->room_code,
            ];
        }

        $room_facilities = DB::table('ms_room')->where('room_type_id', '=', '3')->get();
        $facilities = [];
        foreach ($room_facilities as $fct) {
            $facilities[] = [
                'room_id' => $fct->room_id,
                'room_name' => $fct->room_name,
                'room_code' => $fct->room_code,
            ];
        }
        // dd($yayasan);

        $data2 = [
            'yayasan' => $yayasan,
            'smp' => $smp,
            'sma' => $sma,
            'smk' => $smk,
            'facilities' => $facilities,
        ];

        app()->instance('data2', $data2);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
