<?php

interface SessionHandler
{
}

abstract class Session
{

  private $session;

  public function __construct()
  {
    // Start the session if it is not iniliazed
    if (!isset($_SESSION)) session_start();

    $this->session = $_SESSION;
  }

  /**
   * Create the session with the given key and value
   * 
   * @param {string} $key - The key value to be stored into session
   * @param {any} $value - The value of the session could be any datatype
   * 
   */
  public function create($key, $value)
  {
    $this->session[$key] = $value;
  }

  /**
   * Delete the session with the given key and value
   * 
   * @param {string} $key - The key value to be stored into session
   * 
   */
  public function delete($key)
  {
    unset($this->session[$key]);
  }


  /**
   * Delete the session with the given key and value
   * 
   * @param {string} $key - The key value to be stored into session
   * 
   */
  public function self($key)
  {
    unset($this->session[$key]);
  }
}
