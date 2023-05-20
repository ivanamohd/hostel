<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];
    public $viewName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $viewName)
    {
        $this->data = $data;
        $this->viewName = $viewName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hostelcare23@gmail.com', 'HostelCare')
            ->subject($this->data['subject'])->view('emails.' . $this->viewName)->with('data', $this->data);
    }
}
