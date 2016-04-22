<?php

namespace Gertjanroke\Notification;

/**
 * NotificationFlash class
 * @package notification
 * @author Gertjan Roke
 */

class NotificationFlash
{

    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an information message.
     *
     * @param  string|array $message
     * @param  string $title
     * @return $this
     */
    public function info($message, $title = null)
    {
        $this->message($message, $title, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string|array $message
     * @param  string $title
     * @return $this
     */
    public function success($message, $title = null)
    {
        $this->message($message, $title, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string|array $message
     * @param  string $title
     * @return $this
     */
    public function error($message, $title = null)
    {
        $this->message($message, $title, 'danger');

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string|array $message
     * @param  string $title
     * @return $this
     */
    public function warning($message, $title = null)
    {
        $this->message($message, $title, 'warning');

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string|array $message
     * @param  string $title
     * @param  string $level
     * @return $this
     */
    public function message($message, $title, $level = 'info')
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.title', $title);
        $this->session->flash('flash_notification.level', $level);

        return $this;
    }
    
     /**
     * Flash an overlay modal.
     *
     * @param  string|array $message
     * @param  string $title
     * @return $this
     */
    public function overlay($message, $title = 'Notice')
    {
        $this->message($message, $title, 'info');
        $this->session->flash('flash_notification.overlay', true);
        $this->session->flash('flash_notification.title', $title);
        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', ' important');

        return $this;
    }

}
