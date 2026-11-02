<?php 

require_once 'Element.php';
require_once 'Visitor.php';
require_once 'Student.php';
require_once 'Faculty.php';
require_once 'Alumni.php';
require_once 'CSVExportVisitor.php';
require_once 'ReportVisitor.php';
require_once 'StatisticsVisitor.php';
require_once 'PDFReportVisitor.php';

/** @var Element[] $records */
$records = [
    new Student('2026-001', 'Juan Dela Cruz', 'BSIT', 3),
    new Faculty('F-100', 'Prof. Santos', 'ICT'),
    new Alumni('A-2020-15', 'Maria Reyes', 2020),
];

function run (string $title, Visitor $visitor, array $records): void {
     echo "$title\n";
    foreach ($records as $record) {
        $record->accept($visitor);
    }
    echo "\n";
}

$csv = new CSVExportVisitor();
run('CSV Export Visitor', $csv, $records);
echo "CSV contents:\n" . $csv->getCsv() . "\n";

run('Report Visitor', new ReportVisitor(), $records);

$stats = new StatisticsVisitor();
run('Statistics Visitor', $stats, $records);
$stats->printSummary();

echo "\n";

run('PDF Report Visitor (challenge)', new PDFReportVisitor(), $records);
