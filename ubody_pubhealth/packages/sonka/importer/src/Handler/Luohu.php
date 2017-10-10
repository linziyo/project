<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16 0016
 * Time: 下午 4:37
 * 健康罗湖管理系统数据导入
 */

namespace Sonka\Importer\Handler;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as SynchronousRequest;
use Sonka\Importer\Contract\ArchiveImporterContract;

class Luohu implements ArchiveImporterContract
{
    private $username;
    private $password;

    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    private function login()
    {
        // todo 模拟登陆获取orgid
        $url = 'http://183.237.234.162:8063/admin/Login.ashx';
        $param = ['username'=>$this->username,'password'=>$this->password];

        $SynchronousRequest = new SynchronousRequest('POST',$url,['content-type'=>'application/json'],json_encode($param,JSON_UNESCAPED_UNICODE));


    }

    /*
     * 获取所有机构
     */
    private function getOrganizations($page=1, $limit=50)
    {
        $baseUrl = "http://183.237.234.162:8063/admin/OrgInfoManage.ashx?paramtype=search&OrgName=&_dc=1502873681273&page=%d&start=0&limit=%d";

        $totalPages = -1;
        $list = [];
        while ($totalPages == -1 || $totalPages > $page) {
            $url = sprintf($baseUrl, $page, $limit);
            $result = $this->request($url, "GET");
            $json = json_decode($result);
            if($json){
                foreach ($json->rows as $item) {
                    array_push($list, $item);
                }
            }
            $totalPages = $json->total % $limit == 0 ? $json->total / $limit : $json->total / $limit + 1;
            $page++;
        }
        return $list;
    }

    /**
     * 获取医生信息
     * @param $orgId
     * @param $page
     * @return mixed
     */
    private function getDoctors($orgId, $page, $limit)
    {
        $baseUrl = "http://183.237.234.162:8063/admin/DoctorInformation.ashx?paramtype=list&orgId=%d&_dc=1502873723911&page=%d&start=0&limit={$limit}";

        $list = [];
        $url = sprintf($baseUrl, $orgId, $page);
        $result = $this->request($url, "GET");
        $doctor_list = json_decode($result);
        if ($doctor_list) {
            foreach ($doctor_list->rows as $item) {
                array_push($list, $item);
            }
        }
        $totalPages = $doctor_list->total % $limit == 0 ? $doctor_list->total / $limit : $doctor_list->total / $limit + 1;
        $totalPages = (int)$totalPages;

        return json_encode(['doctor_list' => $list, 'totalPages' => $totalPages]);
    }

    /**
     *
     * 获取医组信息
     * @param $orgId
     */
    private function getTeams($orgId, $page=1, $limit=100)
    {
        $baseUrl = "http://183.237.234.162:8063/admin/SignGroup.ashx?paramtype=list&OrgId=%d&_dc=1502872736203&page=%d&start=0&limit=%d";

        $totalPages = -1;
        $list = [];
        while($totalPages == -1 || $totalPages > $page) {
            $url = sprintf($baseUrl, $orgId, $page, $limit);
            $result = $this->request($url, 'GET');
            $json = json_decode($result);
            if($json){
                foreach($json->rows as $item){
                    array_push($list, $item);
                }
            }
            $totalPages = $json->total % $limit == 0 ? $json->total / $limit : $json->total / $limit + 1;
            $page++;
        }
        return $list;
    }

    /**
     * 获取医组成员信息
     * @param $orgId
     * @param $teamId
     */
    private function getTeamMembers($orgId, $teamId=0, $page=1, $limit=100)
    {
        $baseUrl = "http://183.237.234.162:8063/admin/SignTeam.ashx?paramtype=list&OrgId=%d&TeamId=%d&IdCard=&PatiName=&_dc=1502873804923&page=%d&start=0&limit=%d";

        $list = [];
        $url = sprintf($baseUrl, $orgId, $teamId, $page, $limit);
        $result = $this->request($url, "GET");
        $json = json_decode($result);
        if ($json) {
            foreach ($json->rows as $item) {
                array_push($list, $item);
            }
            $totalPages = $json->total % $limit == 0 ? $json->total / $limit : $json->total / $limit + 1;
            $page++;
        }
        return $list;

    }

    /**
     * 获取医组下面的建档信息
     * @param $orgId
     * @param int $teamId
     * @return string
     */
    private function getArchives($orgId, $teamId=0, $page=1, $limit=100)
    {
        //teamid=0 表示未分组的医组
        $baseUrl = "http://183.237.234.162:8063/admin/SignPatient.ashx?paramtype=list&OrgId=%d&TeamId=%d&IdCard=&PatiName=&_dc=1502873839302&page=%d&start=0&limit=%d";

        $list = [];
        $totalPages = -1;
        while($totalPages == -1 || $totalPages > $page) {
            $url = sprintf($baseUrl, $orgId, $teamId, $page, $limit);
            $result = $this->request($url, "GET");
            $json = json_decode($result);
            if($json){
                foreach($json->rows as $item){
                    array_push($list, $item);
                }
            }
            $totalPages = $json->total % $limit == 0 ? $json->total / $limit : $json->total / $limit + 1;
            $page++;
        }
        return $list;
    }




    private function request($url, $method)
    {
        $client = new Client();
        $response = $client->request($method, $url, ['User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
            'Accept-Language' => 'zh-CN,zh;q=0.8']);

        return $response->getStatusCode() == 200 ? $response->getBody()->getContents() : null;
    }

    public function syncArchives()
    {
        $list = [];
        $loginCookie = $this->login();
        //$orgId = $this->getOrgId($loginCookie);
        $orgId = 10;
        $teams = $this->getTeams($orgId);
        if($teams){
            $archives = [];
            foreach ($teams as $key=>$team) {
                $archives = $this->getArchives($orgId, $team->ti_iid);
                if($archives){
                    foreach ($archives as $key=>$archive) {
                        $list[$archive->UserId]['real_name'] = $archive->PatiName;
                        $list[$archive->UserId]['sex'] = ($archive->PatiSex == '男')?1:2;
                        $list[$archive->UserId]['birthday'] = date('Y-m-d', strtotime($archive->PatiBrithday));
                        $list[$archive->UserId]['id_code'] = $archive->PatiIDNumber;
                        $list[$archive->UserId]['mobile'] = $archive->PatiMobile;
                        $list[$archive->UserId]['address'] = $archive->PatiAddress;
                    }
                }
            }
        }
        return json_encode($list);
    }

    public function authenticate()
    {
        // TODO: Implement authenticate() method.
    }
}