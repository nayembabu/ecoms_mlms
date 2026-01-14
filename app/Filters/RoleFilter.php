<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;


class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $required = null;
        if (is_array($arguments) && isset($arguments[0])) {
            $required = $arguments[0];
        } elseif (is_string($arguments) && $arguments !== '') {
            $required = $arguments;
        }

        // If no specific role required, allow access.
        if (!$required) {
            return;
        }

        $role = $session->get('userRole');

        if ($role !== $required) {
            // If AJAX or API request, return 403
            $accepts = $request->getHeaderLine('Accept');
            if (strpos($accepts, 'application/json') !== false) {
                return Services::response()->setStatusCode(403, 'Forbidden');
            }

            // Redirect to login (or home) with an error message
            return redirect()->to('/login')->with('error', 'Unauthorized access');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action after controller
    }
}
