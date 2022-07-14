<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Reset implements FilterInterface
{
 public function before(RequestInterface $request, $arguments = null)
 {
  // IF USER UN-RESET IN
  if (!session()->get('reset_in')) {
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
