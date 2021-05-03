<?php

namespace App\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractFilter;
use Doctrine\ORM\QueryBuilder;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;

class StudentSearchFilter extends AbstractFilter
{
  protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, ?string $operationName = null)
  {
    if ($property !== 'search') {
      return;
    }
    $alias = $queryBuilder->getRootAliases()[0];
    $queryBuilder->andWhere("$alias.title LIKE :search")
      ->orWhere("$alias.firstName LIKE :search")
      ->orWhere("$alias.lastName LIKE :search")
      ->orWhere("$alias.firstName LIKE :search")
      ->orWhere("$alias.gender LIKE :search")
      ->orWhere("$alias.promotion LIKE :search")
      ->orWhere("$alias.university LIKE :search")
      ->setParameter('search', "%$value%");
  }

  public function getDescription(string $resourceClass): array
  {
    return [
      'search' => [
        'property' => null,
        'type' => 'string',
        'required' => false,
      ]
    ];
  }
}
