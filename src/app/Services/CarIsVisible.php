<?php
namespace App\Services;

class CarIsVisible
{
    public function carIsVisible(bool $isAvailable, ?string $publishRequestState): bool
    {
        if ($isAvailable) {
            if ($publishRequestState !== null && $publishRequestState !== 'accepted') {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}