<?php
namespace App\Tests\DataProviders;

class CommonDataProvider
{
    public function getDataForNameSearch(): array
    {
        return [
            ['Hank', 2],
            ['HaNk', 2],
            ['francis', 2],
            ['Francis', 2],
            ['Tammy', 1],
            ['Suraj', 0],
            ['', 0],
            ['    ', 0],
            ['Jim', 1],
            ['Jim Lee', 1],
            ['Jim   Lee', 1],
            ['Jer Lewis', 0],
            ['Karen Donna', 0],
            ['jim', 1],
            ['mack', 1],
            ['RALPH LAUREN', 1],
        ];
    }
}
