<?php

namespace Notifly\Storage;

class SessionDriver implements DriverInterface
{
    /**
     * This is the root node for all the driver's messages
     */
    const ROOT_NODE = 'notifly_messages';

    /**
     * Store the notifications using the driver
     *
     * @param string $message
     * @param string $bucket
     * @return bool
     */
    public function store($message, $bucket)
    {
        // Get current messages for bucket
        $messages = $this->fetch($bucket);
        // Check current message does not exist
        if (true === in_array($message, $messages)) {
            // If message already exists, do not add the duplicate
            return false;
        }
        // Add message to stack
        $messages[] = $message;
        // Return the message stack to the session
        $_SESSION[self::ROOT_NODE][$bucket] = $messages;
    }

    /**
     * Fetch the notifications from the driver
     *
     * @param string $bucket
     * @return array
     */
    public function fetch($bucket)
    {
        // Ensure that the root node exists
        if (true === empty($_SESSION[self::ROOT_NODE])) {
            $_SESSION[self::ROOT_NODE] = [];
        }
        // Ensure that the bucket exists
        if (true === empty($_SESSION[self::ROOT_NODE][$bucket])) {
            $_SESSION[self::ROOT_NODE][$bucket] = [];
        }
        // Get the messages for the bucket
        return $_SESSION[self::ROOT_NODE][$bucket];
    }
}