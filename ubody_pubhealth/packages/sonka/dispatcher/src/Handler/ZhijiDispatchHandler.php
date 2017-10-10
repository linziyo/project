<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 上午 10:08
 */

namespace Sonka\Dispatcher\Handler;


use App\Models\Archive;
use App\Models\AuthDispatch;
use App\Models\Device;
use App\Models\Health;
use App\Models\Visit;
use Sonka\Dispatcher\Contract\ArchiveDispatcher;
use Sonka\Dispatcher\Contract\HealthDispatcher;
use Sonka\Dispatcher\Contract\VisitDispatcher;
use GuzzleHttp\Psr7\Request as guzzelRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ZhijiDispatchHandler implements HealthDispatcher, ArchiveDispatcher, VisitDispatcher
{
    protected $tenantId = 1;
    protected $client;
    protected $visitUrl = [
    'App\Models\VisitChineseMedicine' => 'http://115.182.204.16:8087/healthcare/neonu/returnOutInvoke?DoSomething=platPostDataTransfer&type=CnAppraiseHandleProc',
     'App\Models\VisitSelfCareAbility' => 'http://115.182.204.16:8087/healthcare/neonu/returnOutInvoke?DoSomething=platPostDataTransfer&type=AbilityAppraiseHandleProc'
    ];
    protected $healthUrl = 'http://115.182.204.16:8087/healthcare/neonu/returnOutInvoke?DoSomething=platPostDataTransfer&type=CheckHandleProc';
    protected $archiveUrl = 'http://115.182.204.16:8087/healthcare/neonu/returnOutInvoke?DoSomething=platPostDataTransfer&type=ArchiveHandleProc';
    public function __construct()
    {
        $this->client = new Client();
    }

    /**转发体检数据
     * @param Health $health
     */
    function dispatchHealth(Health $health)
    {
        $list = Device::where('code',$health->MachineId)->withoutGlobalScopes()->with('authDispatch')->get();
        $authCompany = [];
        if(!$list->isEmpty())
        {
            foreach($list as $model)
            {
                if($model->authDispatch)
                {
                    $authCompany = array_merge($authCompany,$model->authDispatch->auth_list);
                }
            }
            $authCompany = array_unique($authCompany);
            if(in_array(1,$authCompany))
            {
                $guzzelRequest = new guzzelRequest('POST',$this->healthUrl,['content-type'=>'application/json'],$health->content);
                $promise = $this->client->sendAsync($guzzelRequest)->then(function($response){
                    $responseContent = $response->getBody()->getContents();
                    Log::info('send health data to zhiji:'.$responseContent);
                });
                $promise->wait();
                return;
            }
        }
        return;
    }

    function dispatchArchive(Archive $archive)
    {
        // TODO: Implement dispatchArchive() method.
        $authDispatch = AuthDispatch::where('tenant_id',$archive->tenant_id)->where('type','archive')->first();
        if($authDispatch)
        {
            if(in_array(1,$authDispatch->auth_list))
            {
                $data = Archive::details($archive->id);
                $content = json_encode($data->toArray(),JSON_UNESCAPED_UNICODE);
                $guzzelRequest = new guzzelRequest('POST',$this->archiveUrl,['content-type'=>'application/json'],$content);
                $promise = $this->client->sendAsync($guzzelRequest)->then(function($response){
                    $responseContent = $response->getBody()->getContents();
                    Log::info('send archive data to zhiji:'.$responseContent);
                });
                $promise->wait();
                return;
            }
        }
        return;


    }

    function dispatchVisitNewborn($visitNewborn)
    {
        // TODO: Implement dispatchVisitNewborn() method.
    }

    function dispatchVisitKids($visitKids)
    {
        // TODO: Implement dispatchVisitKids() method.
    }

    function dispatchVisit(Visit $visit)
    {
        // TODO: Implement dispatchVisit() method.
        $authDispatch = AuthDispatch::where('tenant_id',$visit->archive->tenant_id)->where('type','archive')->first();
        if($authDispatch)
        {
            if(in_array(1,$authDispatch->auth_list))
            {
                $model = new $visit->visit_type;
                $data = $model->where('visit_id',$visit->id)->first()->toArray();
                $data['visit_name'] = Visit::$visit_name[$visit->visit_type];
                $data['id_code'] = $visit->archive->id_code;
                $visitUrl = key_exists($visit->visit_type,$this->visitUrl)?$this->visitUrl[$visit->visit_type]:'';
                if($visitUrl ){
                    $guzzelRequest = new guzzelRequest('POST',$visitUrl,['content-type'=>'application/json'],json_encode($data,JSON_UNESCAPED_UNICODE));
                    $promise = $this->client->sendAsync($guzzelRequest)->then(function($response){
                        $responseContent = $response->getBody()->getContents();
                        Log::info('send visit data to zhiji:'.$responseContent);
                    });
                    $promise->wait();
                }
                return;
            }
        }
        return;

    }
}