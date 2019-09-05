<?php


namespace App\Entity\Factory;


use App\Entity\MyCollectionInterface;
use App\Entity\Role;
use App\Entity\User;

class UserFactory
{
    const NAME_ANON = 'anon.';

    const ROLE_USER = 'ROLE_USER';

    /**
     * @var MyCollectionInterface
     */
    private $collection;

    /**
     * UserFactory constructor.
     * @param MyCollectionInterface $collection
     */
    public function __construct(MyCollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    public function create(string $name, string $email, Role... $roles): User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setName($name);

        $user->setRoles($this->createCollection($roles));

        return $user;
    }

    /**
     * @param object ...$objects
     * @return MyCollectionInterface
     */
    public function createCollection(object... $objects): MyCollectionInterface
    {
        $collection = clone $this->collection;
        foreach ($objects as $object) {
            $collection->add($object);
        }

        return $collection;
    }
}
