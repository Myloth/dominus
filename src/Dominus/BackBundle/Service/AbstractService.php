<?php


namespace Dominus\BackBundle\Service;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class AbstractService
 */
abstract class AbstractService
{
    /** @var Paginator */
    protected $paginator;

    /** @var EntityRepository */
    protected $repository;
    /**
     * @param Paginator $paginator
     */
    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * @param QueryBuilder $qb
     * @param int          $page
     * @param int          $limit
     *
     * @return PaginatorInterface
     */
    final protected function paginateResults(QueryBuilder $qb, $page, $limit = 10)
    {
        return $this->paginator->paginate($qb, $page, $limit);
    }

    /**
     * Magic method in order to use the Doctrine magic methods.
     *
     * @param int   $name
     * @param array $arguments
     *
     * @return array
     */
    public function __call($name, $arguments)
    {
        if (1 === preg_match('/^findBy|^findOneBy/', $name)) {
            return $this->repository->$name($arguments[0]);
        }

        throw new \BadMethodCallException('The called method "'.$name.'" does not exist.');
    }
}
