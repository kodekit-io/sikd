<?php
namespace App\Service;

trait ReportType {
    protected function getReportNameByCode($reportCode)
    {
        $reportTypes = config('mediawave.reportType');
        foreach ($reportTypes as $reportType) {
            if ($reportType['code'] == $reportCode) {
                return $reportType['name'];
            }
        }

        return '';
    }
}