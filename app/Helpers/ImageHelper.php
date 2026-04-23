<?php

namespace App\Helpers;

class ImageHelper 
{
    /**
     * Get the correct URL for a payment screenshot image
     * Handles spaces and special characters in filenames
     */
    public static function getPaymentScreenshotUrl($filename)
    {
        $resolved = self::resolvePaymentScreenshotPath($filename);

        if ($resolved === null) {
            return asset('images/no-image.jpg');
        }

        $encoded = str_contains($resolved, ' ') ? rawurlencode($resolved) : $resolved;
        return asset('uploads/payments/' . $encoded);
    }

    /**
     * Check if payment screenshot exists
     */
    public static function paymentScreenshotExists($filename)
    {
        return self::resolvePaymentScreenshotPath($filename) !== null;
    }

    private static function resolvePaymentScreenshotPath($filename)
    {
        $result = null;

        if ($filename) {
            // Strip stored path prefix so we always work with just the filename
            $name      = ltrim(preg_replace('#^uploads/payments/#', '', $filename), '/');
            $basePath  = public_path('uploads/payments/');
            $sanitized = preg_replace('/[^A-Za-z0-9_\-\.]/', '', str_replace(' ', '_', $name));

            if (file_exists($basePath . $name)) {
                $result = $name;
            } elseif (file_exists($basePath . $sanitized)) {
                $result = $sanitized;
            }
        }

        return $result;
    }
}