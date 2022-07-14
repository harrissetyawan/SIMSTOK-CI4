<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
 public function before(RequestInterface $request, $arguments = null)
 {
  // IF USER UN-LOGGED IN
  if (!session()->get('logged_in')) {
   // Redirect To Login
   return redirect()->to('/login');
  }
 }

 //--------------------------------------------------------------------

 public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
 {
  // Do something here
 }
}
