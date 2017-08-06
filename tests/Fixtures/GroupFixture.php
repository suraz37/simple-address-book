<?php
namespace App\Tests\Fixtures;

use App\Group;
use App\Person;

class GroupFixture
{
    public function getGroup(): Group
    {
        $group = new Group('public');

        $persons = [
            ['Percy', 'Faith'],
            ['Tammy', 'Faye'],
            ['Arlene', 'Francis'],
            ['Hank', 'Francis'],
            ['Hank', 'Aaron'],
            ['Donna', 'karen'],
            ['Ralph', 'Lauren'],
            ['Jim', 'Lee'],
            ['Jerry', 'Lewis'],
            ['Connie', 'Mack'],
        ];

        foreach ($persons as $per) {
            $person = new Person($per[0], $per[1]);
            $group->add($person);
        }

        return $group;
    }
}
