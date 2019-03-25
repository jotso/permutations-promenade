<?php
namespace Oefenweb;

class Promenade
{
    const PROGRAMS_START = 'abcdefghijklmnop';

    private $_programs;

    public function __construct()
    {
        $this->_programs = self::PROGRAMS_START;
    }

    public function dance(string $permutations)
    {
        $this->_programs = self::PROGRAMS_START;

        foreach (explode(',', $permutations) as $permutation) {
            switch (trim($permutation[0])) {
                case 's':
                    $this->_spin(substr($permutation, 1, strlen($permutation) - 1));
                    break;
                case 'x':
                    $params = explode('/', substr($permutation, 1, strlen($permutation) - 1));
                    $this->_exchange($params[0], $params[1]);
                    break;
                case 'p':
                    $params = explode('/', substr($permutation, 1, strlen($permutation) - 1));
                    $this->_partner($params[0], $params[1]);
                    break;
            }
        }
    }

    private function _spin(int $n)
    {
        $this->_programs = substr($this->_programs, (-1 * $n), $n) . substr($this->_programs, 0, (16 - $n));
    }

    private function _exchange(int $a, int $b)
    {
        $progA = substr($this->_programs, $a, 1);
        $progB = substr($this->_programs, $b, 1);

        $this->_programs = substr_replace($this->_programs, $progA, $b, 1);
        $this->_programs = substr_replace($this->_programs, $progB, $a, 1);
    }

    private function _partner(string $a, string $b)
    {
        $posA = strpos($this->_programs, $a);
        $posB = strpos($this->_programs, $b);

        $this->_programs = substr_replace($this->_programs, $b, $posA, 1);
        $this->_programs = substr_replace($this->_programs, $a, $posB, 1);
    }

    public function getPrograms():string
    {
        return $this->_programs;
    }
}
