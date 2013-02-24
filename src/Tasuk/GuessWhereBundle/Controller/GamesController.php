<?php

namespace Tasuk\GuessWhereBundle\Controller;

use Tasuk\GuessWhereBundle\Entity\Game;
use Tasuk\GuessWhereBundle\Model\Root;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\Rest\Util\Codes;

/**
 * Games controller
 */
class GamesController extends FOSRestController
{
    /**
     * Root node
     *
     * @return FOS\RestBundle\View\View
     */
    public function getAction()
    {
        return $this->view(new Root);
    }

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

        return $this->redirectView($this->get('router')->generate(
            'get_game', array('gameId' => $gameId), true
        ), $statusCode);
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
        $session = $this->getRequest()->getSession();
        if ((int) $gameId !== $session->get('game_id')) {
            throw new AccessDeniedHttpException('You are not authorized to guess on this game.');
        }

        return $this->view(null, Codes::HTTP_NOT_IMPLEMENTED);
    }
}
