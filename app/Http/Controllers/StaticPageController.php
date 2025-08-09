<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class StaticPageController extends Controller
{
    /**
     * Serve static HTML pages from public/Madarek Front End via Laravel routes for quick integration.
     */
    public function show(string $role, string $path = 'index.html'): Response
    {
        $roleToDir = [
            'teacher' => 'المعلم',
            'student' => 'الطالب',
            'parent'  => 'ولي الامر',
            'manager' => 'المدير',
            'admin'   => 'المدير', // Map admin to the same folder used for manager UI
            'staff'   => 'الإداري',
            'auth'    => 'Login-Signup',
        ];

        if (!array_key_exists($role, $roleToDir)) {
            abort(404);
        }

        $arabicDir = $roleToDir[$role];

        // Normalize path, prevent traversal
        $normalized = trim($path, "/\\\t\n\r ");
        if ($normalized === '') {
            $normalized = 'index.html';
        }
        if (str_contains($normalized, '..')) {
            abort(400);
        }
        // Append .html if no extension provided
        if (!preg_match('/\.[A-Za-z0-9]+$/u', $normalized)) {
            $normalized .= '.html';
        }

        $baseDir = public_path("Madarek Front End/{$arabicDir}");
        $fullPath = $baseDir . DIRECTORY_SEPARATOR . $normalized;

        // Resolve real path and ensure it stays under base dir
        $realBase = realpath($baseDir);
        $realFull = $fullPath && file_exists($fullPath) ? realpath($fullPath) : null;
        if (!$realFull || !str_starts_with($realFull, $realBase)) {
            abort(404, "Static page not found: {$role}/{$path}");
        }

        $contents = File::get($realFull);

        // Inject <base> to make relative links (css/js/img) resolve correctly under this route
        $baseHref = rtrim(url("/Madarek Front End/{$arabicDir}/"), '/');
        if (stripos($contents, '<base ') === false) {
            $contents = preg_replace('/<head(\s*[^>]*)>/', '<head$1><base href="' . addslashes($baseHref) . '/">', $contents, 1);
        }

        return new Response($contents, 200, ['Content-Type' => 'text/html; charset=UTF-8']);
    }
}