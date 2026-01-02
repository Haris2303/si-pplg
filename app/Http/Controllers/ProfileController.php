<?php

namespace App\Http\Controllers;

use App\Models\DepartmentProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private function getProfile()
    {
        return DepartmentProfile::first() ?? new DepartmentProfile();
    }

    public function background()
    {
        $profile = $this->getProfile();

        return view('background', compact('profile'));
    }

    public function visionMission()
    {
        $profile = $this->getProfile();
        return view('vision-mision', compact('profile'));
    }

    public function leadership()
    {
        $profile = $this->getProfile();
        return view('leadership', compact('profile'));
    }

    public function contact()
    {
        $profile = $this->getProfile();
        return view('contact', compact('profile'));
    }
}
