<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Invoice;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvoiceEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $invoice;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $invoice = $this->invoice;

        // create the pdf of the printed invoice
        $pdf = \PDF::loadView('invoice.print', compact('invoice'));
        $filename = '/tmp/invoice'.$invoice->invoice_number.'.pdf';

        // and save it somewhere
        $pdf->save($filename);

        // then email the customer attaching the invoice
        $sent = $mailer->send('emails.invoice', ['invoice' => $invoice], function ($m) use ($invoice) {
            // $m->from('mail@computerwhiz.com.au', 'Computer Whiz - Canberra');
            $m->to($invoice->customer->email, $invoice->customer->full_name)
              ->subject('Invoice '.$invoice->invoice_number)
              ->attach($filename);
        });

        \File::delete($filename);
    }
}
