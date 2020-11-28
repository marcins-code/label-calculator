<?php


namespace App\Repository\Iterator;


use App\Entity\Teeth;
use Doctrine\ORM\EntityManagerInterface;
use Iterator;

class TeethIterator implements Iterator
{


    private int $position = 1;


    /**
     * @var Teeth[]|array
     */
    private array $teeth;

    public function __construct(EntityManagerInterface $em)
    {
        $this->teeth = $em ->getRepository(Teeth::class)->findAll();
    }


    public function current()
    {
        return $this->teeth->getId($this->position);

    }

    public function next()
    {
        $this->position++;
    }


    public function key()
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
       return !is_null($this->teeth->getId($this->position));
    }

    /**
     *
     */
    public function rewind()
    {
        $this->position = 0;
    }
}