<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function _invoke(Newsletter $newsletter)
    {
        // require_once('/path/to/MailchimpMarketing/vendor/autoload.php');

        request()->validate(['email' => 'required|email']);
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter'
            ]);
        }

        // $response = $mailchimp->lists->getList('');
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
