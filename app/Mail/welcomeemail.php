<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class welcomeemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    // public $mailmessage;
    // public $subject;
    // protected  $details;

    public $request;
    public $fileName;

    public function __construct($request, $fileName)
    {
        // $this->mailmessage= $message;
        // $this->subject= $subject;
        // $this->details = $details;

         $this->fileName= $fileName;
         $this->request = $request;


    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "contact form",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view:'mail.welcome-mail',
            // // text:'mail.welcome-mail',
            // with:[
            //     'name'=>$this->details['name'],
            //     'price'=>$this->details['price'],
            //     'cetagory'=>$this->details['cetagory'],
            // ]


            view:'mail.welcome-mail'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        if($this->fileName){
            $attachments= [
            Attachment::fromPath(public_path('/uploads/'.$this->fileName))
            ];
        }
        return $attachments;
    }
}
