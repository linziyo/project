<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 17:26
 */

namespace Sonka\Importer\Handler;


use Sonka\Importer\Contract\ArchiveImporterContract;

class Nanning implements ArchiveImporterContract
{

    public function syncArchives()
    {
        // TODO: Implement syncArchives() method.
    }

    public function authenticate()
    {
        // TODO: Implement authenticate() method.
        $this->showLoginForm();
    }

    private function showLoginForm()
    {

    }
}