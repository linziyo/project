<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12 0012
 * Time: 下午 7:26
 */

namespace App\Models\Observers;


use App\Events\VisitCreatedEvent;
use App\Models\Community;
use App\Models\Visit;
use App\Models\VisitChineseMedicine;
use App\Models\VisitDiabete;
use App\Models\VisitHypertension;
use App\Models\VisitKid;
use App\Models\VisitMentalPatient;
use App\Models\VisitNewborn;
use App\Models\VisitSelfCareAbility;
use App\Models\VisitTuberculosisFirstRecord;
use App\Models\VisitTuberculosisPatient;
use DB;

class VisitObserver
{

    /**
     * ArchiveCodeObserver constructor.
     */
    public function __construct()
    {

    }

    public function creating($model)
    {
        if ($model instanceof VisitNewborn || $model instanceof VisitChineseMedicine || $model instanceof VisitSelfCareAbility || $model instanceof VisitHypertension || $model instanceof VisitDiabete || $model instanceof VisitMentalPatient
            || $model instanceof VisitTuberculosisPatient || $model instanceof VisitTuberculosisFirstRecord || $model instanceof VisitKid) {
            $visit = new Visit(['archive_id' => $model->archive_id, 'visited_at' => $model->visited_at?$model->visited_at:date('Y-m-d'), 'next_visited_at' => $model->next_visited_at, 'doctor_id' => $model->doctor_id, 'visit_type' => $model->getMorphClass(),'visit_mode' => $model->visit_mode?$model->visit_mode:null ]);
            if ($visit->save()) {
                $model->visit_id = $visit->id;
            }
        }

    }

    public function created($model)
    {
        \Event::fire(new VisitCreatedEvent($model->visit));
    }
}