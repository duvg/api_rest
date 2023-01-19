<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\Exception\ORMException;

class UserRepository extends BaseRepository
{
    protected static function entityClass(): string
    {
        return User::class;
    }

    /**
     * Save a user Entity.
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(User $user): void
    {
        $this->saveEntity($user);
    }

    public function getAll(): array
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->from('App:User', 'u')
            ->select('u')
            ->getQuery()
            ->getResult();
    }

    /**
     * Remove user entity.
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(User $user): void
    {
        $this->removeEntity($user);
    }
}
