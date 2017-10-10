<?php

namespace App\Listeners;

use App\Events\HealthCreatedEvent;
use App\Models\HealthMember;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthMemberListener
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
     * @param  HealthCreatedEvent  $event
     * @return void
     */
    public function handle(HealthCreatedEvent $event)
    {
        $json = json_decode($event->getHealth()->content);
        if (array_key_exists('Member', $json) && !empty($json->Member)) {

            $member = $json->Member;

            $model = new HealthMember();
            $model->health_id = $event->getHealth()->id;
            $model->Name = isset($member->Name) ? $member->Name : null;
            $model->Mobile = isset($member->Mobile) ? $member->Mobile : null;
            $model->IdCode = isset($member->IdCode) ? $member->IdCode : null;
            $model->Age = isset($member->Age) ? $member->Age : null;
            $model->Sex = isset($member->Sex) ? $member->Sex : null;
            $model->Address = isset($member->Address) ? $member->Address : null;
            $model->Birthday = isset($member->Birthday) ? $member->Birthday : null;
            $model->UserIcon = isset($member->UserIcon) ? $member->UserIcon : null;
            $model->Nation = isset($member->Nation) ? $member->Nation : null;
            $model->StartDate = isset($member->StartDate) ? $member->StartDate : null;
            $model->EndDate = isset($member->EndDate) ? $member->EndDate : null;
            $model->Department = isset($member->Department) ? $member->Department : null;
            $model->BarCode = isset($member->BarCode) ? $member->BarCode : null;
            $model->IcCode = isset($member->IcCode) ? $member->IcCode : null;
            $model->SocialCode = isset($member->SocialCode) ? $member->SocialCode : null;
            $model->UserID = isset($member->UserID) ? $member->UserID : null;
            $model->save();
        }
    }
}