<?php
namespace App\Service;

trait ReportType {
    protected function getReportNameByCode($reportCode)
    {
        $reportTypes = config('sikd.reportType');
        foreach ($reportTypes as $reportType) {
            if ($reportType['code'] == $reportCode) {
                return $reportType['name'];
            }
        }

        return '';
    }
}