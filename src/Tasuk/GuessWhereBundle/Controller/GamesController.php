<?php

namespace Tasuk\GuessWhereBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\Rest\Util\Codes;
use Tasuk\GuessWhereBundle\Entity\Game;

/**
 * Games controller
 */
class GamesController extends FOSRestController
{
    /**
     * Get games by parameters
     *
     * @return FOS\RestBundle\View\View
     */
    public function getGamesAction()
    {
        return $this->view(null, Codes::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Create new game, get game id if in progress
     *
     * @return FOS\RestBundle\View\View
     */
    public function postGamesAction()
    {
        $session = $this->getRequest()->getSession();
        if ($gameId = $session->get('game_id')) {
            $statusCode = Codes::HTTP_FOUND;
        } else {
            $game = new Game;
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($game);
            $em->flush();
            $gameId = $game->getId();

            $session->set('game_id', $gameId);
            $statusCode = Codes::HTTP_CREATED;
        }

        return $this->view(array(
            'session' => $session->getId(),
        ), $statusCode, array(
            'Location' => $gameId,
        ));
    }

    /**
     * Get single game
     *
     * @param int $gameId
     *
     * @return FOS\RestBundle\View\View
     */
    public function getGameAction($gameId = null)
    {
        return $this->view(null, Codes::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Get round for game
     *
     * @param int $gameId
     * @param int $roundSequence
     *
     * @return FOS\RestBundle\View\View
     */
    public function getGameRoundAction($gameId, $roundSequence)
    {
        return $this->view(null, Codes::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Guess
     *
     * @param int $gameId
     * @param int $roundSequence
     * @param int $woeid
     *
     * @return FOS\RestBundle\View\View
     */
    public function putGameRoundGuessAction($gameId, $roundSequence, $woeid)
    {
        return $this->view(null, Codes::HTTP_NOT_IMPLEMENTED);
    }
}
