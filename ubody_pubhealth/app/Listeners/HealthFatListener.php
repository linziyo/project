<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthFat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthFatListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  HealthCreatedEvent $event
     * @return void
     */
    public function handle(HealthCreatedEvent $event)
    {
        $json = json_decode($event->getHealth()->content);
        if (array_key_exists('Fat', $json) && !empty($json->Fat)) {

            $fat = $json->Fat;

            $model = new HealthFat();
            $model->health_id = $event->getHealth()->id;
//            $model->FatRate = $fat->FatRate;
//            $model->Fat = $fat->Fat;
//            $model->ExceptFat = $fat->ExceptFat;
//            $model->WaterRate = $fat->WaterRate;
//            $model->Water = $fat->Water;
//            $model->Minerals = $fat->Minerals;
//            $model->Protein = $fat->Protein;
//            $model->Fic = $fat->Fic;
//            $model->Foc = $fat->Foc;
//            $model->Muscle = $fat->Muscle;
//            $model->FatAdjust = $fat->FatAdjust;
//            $model->WeightAdjust = $fat->WeightAdjust;
//            $model->MuscleAdjust = $fat->MuscleAdjust;
//            $model->BasicMetabolism = $fat->BasicMetabolism;
//            $model->Viscera = $fat->Viscera;
//            $model->Bmc = $fat->Bmc;
//            $model->MuscleRate = $fat->MuscleRate;
//            $model->QuganMuscle = $fat->QuganMuscle;
//            $model->QuganFat = $fat->QuganFat;
//            $model->ZuotuiMuscle = $fat->ZuotuiMuscle;
//            $model->ZuobiMuscle = $fat->ZuobiMuscle;
//            $model->YoubiMuscle = $fat->YoubiMuscle;
//            $model->YoutuiMuscle = $fat->YoutuiMuscle;
//            $model->ZuobiFat = $fat->ZuobiFat;
//            $model->ZuotuiFat = $fat->ZuotuiFat;
//            $model->YoubiFat = $fat->YoubiFat;
//            $model->YoutuiFat = $fat->YoutuiFat;
            $model->FatRate = isset($fat->FatRate) ? $fat->FatRate : null;
            $model->Fat = isset($fat->Fat) ? $fat->Fat : null;
            $model->ExceptFat = isset($fat->ExceptFat) ? $fat->ExceptFat : null;
            $model->WaterRate = isset($fat->WaterRate) ? $fat->WaterRate : null;
            $model->Water = isset($fat->Water) ? $fat->Water : null;
            $model->Minerals = isset($fat->Minerals) ? $fat->Minerals : null;
            $model->Protein = isset($fat->Protein) ? $fat->Protein : null;
            $model->Fic = isset($fat->Fic) ? $fat->Fic : null;
            $model->Foc = isset($fat->Foc) ? $fat->Foc : null;
            $model->Muscle = isset($fat->Muscle) ? $fat->Muscle : null;
            $model->FatAdjust = isset($fat->FatAdjust) ? $fat->FatAdjust : null;
            $model->WeightAdjust = isset($fat->WeightAdjust) ? $fat->WeightAdjust : null;
            $model->MuscleAdjust = isset($fat->MuscleAdjust) ? $fat->MuscleAdjust : null;
            $model->BasicMetabolism = isset($fat->BasicMetabolism) ? $fat->BasicMetabolism : null;
            $model->Viscera = isset($fat->Viscera) ? $fat->Viscera : null;
            $model->Bmc = isset($fat->Bmc) ? $fat->Bmc : null;
            $model->MuscleRate = isset($fat->MuscleRate) ? $fat->MuscleRate : null;
            $model->QuganMuscle = isset($fat->QuganMuscle) ? $fat->QuganMuscle : null;
            $model->QuganFat = isset($fat->QuganFat) ? $fat->QuganFat : null;
            $model->ZuotuiMuscle = isset($fat->ZuotuiMuscle) ? $fat->ZuotuiMuscle : null;
            $model->ZuobiMuscle = isset($fat->ZuobiMuscle) ? $fat->ZuobiMuscle : null;
            $model->YoubiMuscle = isset($fat->YoubiMuscle) ? $fat->YoubiMuscle : null;
            $model->YoutuiMuscle = isset($fat->YoutuiMuscle) ? $fat->YoutuiMuscle : null;
            $model->ZuobiFat = isset($fat->ZuobiFat) ? $fat->ZuobiFat : null;
            $model->ZuotuiFat = isset($fat->ZuotuiFat) ? $fat->ZuotuiFat : null;
            $model->YoubiFat = isset($fat->YoubiFat) ? $fat->YoubiFat : null;
            $model->YoutuiFat = isset($fat->YoutuiFat) ? $fat->YoutuiFat : null;
            $model->Result = isset($fat->Result) ? $fat->Result : null;
            $model->save();
        }
    }
}
