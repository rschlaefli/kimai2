<?php

use App\Entity\Timesheet;
use App\Export\RendererInterface;
use App\Repository\Query\TimesheetQuery;
use Symfony\Component\HttpFoundation\Response;

final class MatrixRenderer implements RendererInterface
{
    public function render(array $timesheets, TimesheetQuery $query): Response
    {
        $ids = array_map(function (Timesheet $timesheet) {
            return $timesheet->getId();
        }, $timesheets);

        $response = new Response();
        $response->setContent(sprintf('Included IDs: %s', implode(', ', $ids)));

        return $response;
    }

    public function getId(): string
    {
        return 'ext_array_dump';
    }

    public function getIcon(): string
    {
        return 'fas fa-file-code';
    }

    public function getTitle(): string
    {
        return 'Show IDs';
    }
}
