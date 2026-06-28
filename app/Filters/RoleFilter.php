<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    /**
     * Checks if the user session matches the requested route permission parameters.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is authenticated at all
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please login to access this page.');
        }

        // Check if the route requires a specific role (passed via arguments in Routes.php)
        if (!empty($arguments)) {
            $allowedRoles = $arguments;
            $userRole     = session()->get('user_type');

            if (!in_array($userRole, $allowedRoles)) {
                // If unauthorized, redirect to their own correct dashboard view
                $redirectUrl = '/' . $userRole . '/dashboard';
                return redirect()->to($redirectUrl)->with('error', 'You do not have permission to view that page.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action required after execution
    }
}