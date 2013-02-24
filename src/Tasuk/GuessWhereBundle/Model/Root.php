<?php

namespace Tasuk\GuessWhereBundle\Model;

use FSC\HateoasBundle\Annotation as Hateoas;

/**
 * @Hateoas\Relation("games", href = @Hateoas\Route("post_games"))
 */
class Root
{
}
