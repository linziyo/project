<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/25
 * Time: 16:57
 */

namespace Sonka\Importer\Contract;


interface ArchiveImporterContract
{
    public function syncArchives();

    public function authenticate();
}