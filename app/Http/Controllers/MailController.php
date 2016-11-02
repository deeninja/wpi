<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmSubscribe;
use Illuminate\Http\Request;

use App\Http\Requests\MailRequest;
use Illuminate\Mail\Transport\MailgunTransport;
use Mailgun\Mailgun;
use GuzzleHttp\ClientInterface;

class MailController extends Controller
{

    public function newsletter_subscribe(MailRequest $request)
    {
        $form_data = $request->all();
        $email = $form_data['email'];
        $name = $form_data['name'];

        $mailgun = new Mailgun(MAILGUN_KEY);

        // validate email as not spam
        $mailgunValidate = new Mailgun(MAILGUN_PUBKEY);

        $mailgunOptIn = $mailgun->OptInHandler();

        /* TODO:: Set absolute URL to confirm page */

        $hash = $mailgunOptIn->generateHash(MAILGUN_LIST, MAILGUN_SECRET, $email);

        $mailgun->sendMessage(MAILGUN_DOMAIN, [
        'from' => 'noreply@wpi.org',
        'to' => $email,
        'subject' => 'Please confirm subscription',
        'html' => "
            Hello{$name}, <br><br>
            You signed up to our mailing list. Please confirm below <br><br>
            http://wpi.dev/confirm/{$hash}"
        ]);

        $mailgun->post('lists/' . MAILGUN_LIST . '/members', [
        'name' => $name,
        'address' => $email,
        'subscribed' => 'no'
        ]);


        return redirect('/subscribe');

    }

    // extracts and decrypts confirm link hash, then adds it to set mailgun mailing list
    public function newsletter_confirm(ConfirmSubscribe $request, $hash)
    {

        // create mailgun instance
        $mailgun = new Mailgun(MAILGUN_KEY);

        // get option handler object
        $mailgunOptIn = $mailgun->OptInHandler();

        // decrypt hash from uri into mailing list + recipient address
        $hash = $mailgunOptIn->validateHash(MAILGUN_SECRET, $hash);

        if( $hash ) {

            // get subscribe details from decrypted uri
            $list = $hash['mailingList'];
            $email = $hash['recipientAddress'];

            $mailgun->put('lists/' . MAILGUN_LIST . '/members/' . $email, [ 'subscribed' => 'yes' ]);

            /* TODO:: CONVERT ALL PLACEHOLDER NOREPLY@WPI.ORG LINKS TO WPI DOMAIN*/
            // send confirm email
            $mailgun->sendMessage(MAILGUN_DOMAIN, [
            'from' => 'noreply@wpi.org',
            'to' => $email,
            'subject'=>'Subscription confirmed!',
                'text' =>'Dear user, Thank you for confirming, you are now subscribed to our newsletters!'
            ]);
        }

        return redirect('/confirm');
    }

}