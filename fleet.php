<?php
//To select the type of datda structure I will use I'am answering severals questions.
//Is my data set small? Is my amont of datd predictible? and finally Is my search spead more important then my insertion speed?
//The answer of those questions is yes, so I suppose that an ordered Array is the best way to structure my Data Set.


abstract class Fleet{
    public $fleet;

    function __construct()
    {
        $this->fleet = [
            'Offencive' => [
                'Battleship' => [
                    'weapon' => '24 canons',
                    'defence' => 'shield',
                    'orders' => [
                        '1' => 'Fire',
                        '2' => 'rise shield',
                        '3' => 'move',
                    ],
                    'workforce' => 
                        [
                            '0' => 'CommenderBattleship',
                            '1' => 'Battl1',
                            '2' => 'Battl2',
                            '3' => 'Battl3',
                            '4' => 'Battl4',
                            '5' => 'Battl5',
                            '6' => 'Battl6',
                            '7' => 'Battl7',
                        ],
                
                ],

                'Destroyer' => [
                    'weapon' => '12 canons',
                    'defence' => 'shield',
                    'orders' => [
                        '1' => 'Fire',
                        '2' => 'rise shield',
                        '3' => 'move',
                    ],
                    'workforce' => 
                        [
                            '8' => 'dest1',
                            '9' => 'dest2',
                            '10' => 'dest3',
                            '11' => 'dest4',
                            '12' => 'dest5',
                            '13' => 'dest6',
                            '14' => 'dest7',
                            '15' => 'dest8',
                        ],
                ],

                'Cruiser' => [
                    'weapon' => '6 canons', 
                    'defence' => 'shield',
                    'orders' => [
                        '1' => 'Fire',
                        '2' => 'rise shield',
                        '3' => 'move',
                    ],
                    'workforce' => 
                        [
                            '16' => 'cruis1',
                            '17' => 'cruis2',
                            '18' => 'cruis3',
                            '19' => 'cruis4',
                            '20' => 'cruis5',
                            '21' => 'cruis6',
                            '22' => 'cruis7',
                            '23' => 'cruis8',
                            '24' => 'cruis9',
                        ],
                ],
            ],

            'Support' => [
                'Refueling' => [
                    'capacity' => 'medical unit',
                    'orders' => [
                        '1' => 'refuel',
                        '2' => 'heal',
                        '3' => 'move',
                    ],
                    'workforce' => 
                        [
                            '25' => 'ref1',
                            '26' => 'ref2',
                            '27' => 'ref3',
                            '28' => 'ref4',
                            '29' => 'ref5',
                            '30' => 'ref6',
                            '31' => 'ref7',
                            '32' => 'ref8',
                        ],
                ],

                'Mechanical assistance' => [
                    'capacity' => 'medical unit',
                    'orders' => [
                        '1' => 'repare',
                        '2' => 'heal',
                        '3' => 'move',
                    ],
                    'workforce' => 
                        [
                            '33' => 'mech1',
                            '34' => 'mech2',
                            '35' => 'mech3',
                            '36' => 'mech4',
                            '37' => 'mech5',
                            '38' => 'mech6',
                            '39' => 'mech7',
                            '40' => 'mech8',
                        ],
                ],

                'Cargo' => [
                    'capacity' => 'medical unit',
                    'orders' => [
                        '1' => 'transport',
                        '2' => 'heal',
                        '3' => 'move',
                    ],
                    'workforce' => 
                        [
                            '41' => 'cargo1',
                            '42' => 'cargo2',
                            '43' => 'cargo3',
                            '44' => 'cargo4',
                            '45' => 'cargo5',
                            '46' => 'cargo6',
                            '47' => 'cargo7',
                            '48' => 'cargo8',
                            '49' => 'cargo9',
                        ],
                ],
            ],
        ];
        return $this->fleet;
    }

} 





?>