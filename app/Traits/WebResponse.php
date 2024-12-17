<?php


namespace App\Traits;


use Illuminate\Http\RedirectResponse;

trait WebResponse
{
    public function webCreatedResponse($message = null): RedirectResponse
    {
        return redirect()->back()->with("success", $message ?? "Maglumat üstünlikli goşuldy.");
    }

    public function webUpdatedResponse($message = null): RedirectResponse
    {
        return redirect()->back()->with("success", $message ?? "Maglumat üstünlikli üýtgedildi.");
    }

    public function webDeletedResponse($message = null): RedirectResponse
    {
        return redirect()->back()->with("success", $message ?? "Maglumat üstünlikli pozuldy.");
    }

    public function webSuccessResponse(string $message): RedirectResponse
    {
        return redirect()->back()->with("success", $message);
    }

    public function webErrorResponse(string $message): RedirectResponse
    {
        return redirect()->back()->withErrors($message);
    }

    public function webErrorNoAccessResponse(): RedirectResponse
    {
        return redirect()->back()->withErrors("The selected record is either invalid or does not belong to you.");
    }
}
