<?php

namespace Tasuk\GuessWhereBundle\Model;

use FSC\HateoasBundle\Annotation as Hateoas;

/**
 * Base API root node
 *
 * @Hateoas\Relation("self", href = @Hateoas\Route("get"))
 * @Hateoas\Relation("games", href = @Hateoas\Route("post_games"))
 */
class Root
{
}
