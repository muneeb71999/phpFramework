<?php

interface Authentication
{
  /**
   * Check if the user is Loggedin
   */
  public function isLoggedIn();

  /**
   * Login the user to the application using sessions
   * @param {Object} $user - Takes the User object | Assiociated Array
   * 
   */
  public function login($user);

  /**
   * Register the user to the application using sessions
   * @param {Object} $user - Takes the User object | Assiociated Array
   * 
   */
  public function register($user);

  /**
   * Logout the currently loggedIn user
   */
  public function logout();
}


class Auth implements Authentication
{
  /**
   * Check if the user is Loggedin
   */
  public function isLoggedIn()
  {
  }

  /**
   * Login the user to the application using sessions
   * @param {Object} $user - Takes the User object | Assiociated Array
   * 
   */
  public function login($user)
  {
  }

  /**
   * Register the user to the application using sessions
   * @param {Object} $user - Takes the User object | Assiociated Array
   * 
   */
  public function register($user)
  {
  }

  /**
   * Logout the currently loggedIn user
   */
  public function logout()
  {
  }
}
